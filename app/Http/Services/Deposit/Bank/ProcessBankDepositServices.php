<?php
namespace App\Http\Services\Deposit\Bank;

use App\Http\Services\Deposit\Bank\ManualBankDepositServices;
use App\Models\Setting;

class ProcessBankDepositServices
{
    private $manual;
    private $gtr;
    private $qepay;
    private $mapay;
    private $watchpay;
    private $hxpayment;

    public function __construct(
        ManualBankDepositServices $manual,
        GTRBankDepositServices $gtr,
        QePayBankDepositServices $qepay,
        MaPayBankDepositServices $mapay,
        WatchPayBankDepositServices $watchpay,
        HXPaymentBankDepositServices $hxpayment
    )
    {
        $this->manual = $manual;
        $this->gtr = $gtr;
        $this->qepay = $qepay;
        $this->mapay = $mapay;
        $this->watchpay = $watchpay;
        $this->hxpayment = $hxpayment;
    } 

    /**
     * Deposit Payment
     * 
     * @param string reference
     * @param string currency
     * @param string amount
     * @param string method
     */
    public function deposit(
        string $reference,
        string $currency,
        string $amount,
        string $method
    )
    {
        try {

            // Hold User
            $setting = Setting::first();

            if($setting->auto_deposit) {

                // Verify transfer Type
                if(!in_array($method, ['mapay','qepay','gtr','watchpay','hxpayment'])) throw new \Exception("Deposit not available at the moment");

                // GTR
                if(in_array($method, ['gtr'])) {
                    $payment = $this->gtr->deposit($reference, $currency, $amount, $method);
                }
                // qe Pay
            if(in_array($method, ['qepay'])) {
                $payment = $this->qepay->deposit($reference, $currency, $amount, $method);
            }
            // maPay
            if(in_array($method, ['mapay'])) {
                $payment = $this->mapay->deposit($reference, $currency, $amount, $method);
            }
            // watchPay
            if(in_array($method, ['watchpay'])) {
                $payment = $this->watchpay->deposit($reference, $currency, $amount, $method);
            }
            // HXPayment
            if(in_array($method, ['hxpayment'])) {
                $payment = $this->hxpayment->deposit($reference, $currency, $amount, $method);
            }
                
            }else {
                // Manual
                $payment = $this->manual->deposit($reference, $currency, $amount, $method);
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
