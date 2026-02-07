<?php

namespace App\Http\Services\Payout\Bank;

use App\Http\Services\Payout\Bank\Util\ResponseBankUtilPayoutServices;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\URL;

class HXPaymentBankPayoutServices
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
        string $narration = 'Withdrawal'
    )
    {
        try {

            // Request Body
            $requestBody = array(
                "merchantLogin" => '****',
                "orderCode" => $reference,
                "amount" => floatval($amount),
                "name" => $account_name,
                "account" => $account_number,
                "ifsc" => $bank_code,
                "remark" => $narration
            );

            // Send Curl Request
            $sendRequest = $this->curlRequest('POST', 'payment/payout', $requestBody);

            // Exception
            if($sendRequest instanceof \Exception) throw new \Exception($sendRequest->getMessage());

            // Format Response
            $response = ResponseBankUtilPayoutServices::response(200, 2, true, $reference, $sendRequest['platformOrderCode'], $currency, $amount, $method, $bank_code, $bank_name, $account_number, $account_name, $narration);

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
            $setting = PaymentMethod::where(['tag' => 'hxpayment', 'status' => 'active'])->first();

            // Exception
            if(!$setting) throw new \Exception("HXPayment service not enabled at the moment");

            // Parse setting
            $setting = json_decode($setting->settings);

            $body['merchantLogin'] = $setting->merchantLogin->value;

            // Build Sign
            $sign = self::buildSignDigest($body, $setting->merchant_key->value);
            $body['sign'] = $sign;

            // Convert request data to JSON
            $jsonData = json_encode($body);

            // Curl Request
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $setting->api_url->value . '/' . $endpoint,
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
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            if ($err) throw new \Exception('Curl returned error: ' . $err);

            $response_array = json_decode($response, true);

            if(!in_array($httpcode, ['200'])) throw new \Exception($response_array['message'] ?? 'Request failed');

            if(!isset($response_array['platformOrderCode'])) throw new \Exception('Transfer initialization failed');

            return $response_array;

        } catch (\Exception $th) {
            return $th;
        }
    }

    /**
     * Build Sign Digest
     * 
     * @param array data
     * @param string md5_key
     */
    public static function buildSignDigest($data, $md5_key) {
        // Remove sign if exists
        unset($data['sign']);
        
        // Sort by key (ASCII order)
        ksort($data);

        // Filter empty values and build string
        $signString = '';
        foreach ($data as $key => $value) {
            if ($value !== '' && $value !== null) {
                if ($signString !== '') {
                    $signString .= '&';
                }
                $signString .= $key . '=' . $value;
            }
        }

        // Append key
        $signString .= '&key=' . $md5_key;

        // Return MD5 hash
        return md5($signString);
    }
}
