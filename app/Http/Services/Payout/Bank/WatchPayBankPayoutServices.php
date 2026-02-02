<?php
namespace App\Http\Services\Payout\Bank;

use App\Http\Services\Payout\Bank\Util\ResponseBankUtilPayoutServices;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\URL;

class WatchPayBankPayoutServices
{

    /**
     * Transfer Payment
     *
     * @param string reference
     * @param string currency
     * @param string amount
     * @param string method
     * @param string bank code
     * @param string bank name
     * @param string account number
     * @param string account name
     * @param string narration
     */
    public function transfer(
        string $reference,
        string $currency,
        string $amount,
        string $method,
        string $bank_code,
        string $bank_name = null,
        string $account_number,
        string $account_name,
        string $narration = 'Goods'
    )
    {
        try {

            // Request Body
            $requestBody = array(
                "mch_id" => '****',
                "transfer_amount" => $amount,
                "mch_transferId" => $reference,
                "back_url" => URL::route('ipn.watchpay.payout'),
                "apply_date" => date('Y-m-d H:i:s'),
                "bank_code" => $bank_code,
                "receive_name" => $account_name,
                "receive_account" => $account_number,
                "sign_type" => "MD5"
              );

            // Send Curl Request
            $sendRequest = $this->curlRequest('POST', 'pay/transfer', $requestBody);

            // Exception
            if($sendRequest instanceof \Exception) throw new \Exception($sendRequest->getMessage());

            // Format Response
            $response = ResponseBankUtilPayoutServices::response(200, 2, true, $reference, $sendRequest['merTransferId'], $currency, $amount, $method, $bank_code, $bank_name, $account_number, $account_name, $narration);

            // Response
            return $response;

        } catch (\Exception $th) {
            return $th;
        }
    }

    /**
     * Curl Request
     *
     * @param string method
     * @param string endpoint
     * @param array body
     */
    public function curlRequest(
        string $method,
        string $endpoint,
        array $body = []
    ){

        try {

            // Find Setting
            $setting = PaymentMethod::where(['tag' => 'watchpay', 'status' => 'active'])->first();

            // Exception
            if(!$setting) throw new \Exception("WatchPay service not enabled at the moment");

            // Parse setting
            $setting = json_decode($setting->settings);

            $body['mch_id'] = $setting->mchtId->value;

            // Sign Data
            $signData = $body;
            unset($signData['sign_type']);

            // Build Sign
            $sign = self::buildSignDigest($signData, $setting->secret_key->value);
            $body['sign'] = $sign;

            // Convert request data
            $jsonData = http_build_query($body);

            // Curl Request
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.watchglb.com/'.$endpoint,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            if ($err) throw new \Exception('Curl returned error: ' . $err);

            $response_array = json_decode($response, true);

            if(!in_array($httpcode, ['200'])) throw new \Exception($response_array['errorMsg'] ?? 'Request failed');

            if($response_array['respCode'] != 'SUCCESS') throw new \Exception($response_array['errorMsg'] ?? 'Transfer failed');

            return $response_array;

        } catch (\Exception $th) {
            return $th;
        }
    }

    public static function buildSignDigest($data, $md5_key) {
        unset($data['sign']);
        ksort($data);

        $signString = '';
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                $signString .= $key . '=' . $value . '&';
            }
        }

        $signString .= 'key=' . $md5_key;

        return md5($signString);
    }
}
