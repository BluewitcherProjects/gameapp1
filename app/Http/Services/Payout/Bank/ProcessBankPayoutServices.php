<?php
namespace App\Http\Services\Payout\Bank;

use App\Models\Setting;

class ProcessBankPayoutServices
{
    private $manual;
    private $gtr;
    private $qepay;
    private $mapay;
    private $watchpay;

    public function __construct(
        ManualBankPayoutServices $manual,
        GTRBankPayoutServices $gtr,
        QePayBankPayoutServices $qepay,
        MaPayBankPayoutServices $mapay,
        WatchPayBankPayoutServices $watchpay
    )
    {
        $this->manual = $manual;
        $this->gtr = $gtr;
        $this->qepay = $qepay;
        $this->mapay = $mapay;
        $this->watchpay = $watchpay;
    }

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
        string $narration = null
    )
    {
        try {

            // Hold User
            $setting = Setting::first();

            if($setting->auto_transfer) {

                // Verify transfer Type
                if(!in_array($setting->auto_transfer_default, ['mapay','qepay','watchpay'])) throw new \Exception("Payout not available at the moment");

                // qepay
                if(in_array($setting->auto_transfer_default, ['qepay'])) {
                $payment = $this->qepay->transfer($reference, $currency, $amount, $method, $bank_code, $bank_name, $account_number, $account_name, $narration);

                }
                // mapay
                if(in_array($setting->auto_transfer_default, ['mapay'])) {
                $payment = $this->mapay->transfer($reference, $currency, $amount, $method, $bank_code, $bank_name, $account_number, $account_name, $narration);

                }
                // watchpay
                if(in_array($setting->auto_transfer_default, ['watchpay'])) {
                $payment = $this->watchpay->transfer($reference, $currency, $amount, $method, $bank_code, $bank_name, $account_number, $account_name, $narration);

                }
                
            }else {
                // Manual
                $payment = $this->manual->transfer($reference, $currency, $amount, $method, $bank_code, $bank_name, $account_number, $account_name, $narration);
            }

            // Exception
            if($payment instanceof \Exception) throw new \Exception($payment->getMessage());

            // Response
            return $payment;

        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }
}
