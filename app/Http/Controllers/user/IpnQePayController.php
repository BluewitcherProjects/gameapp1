<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\PaymentMethod;
use App\Models\Setting;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

/**
 * Laravel/Symfony Developer
 * Name: bukar mai 
 * Telegram: @MB_TECH_Admin
 * Hire me via Telegram: @MB_TECH_Admin
 */
class IpnQePayController extends Controller
{
    public function ipnDeposit(Request $request)
    {

        try {

            // Validate request
            $validator = Validator::make($request->all(), [
                'mchOrderNo' => 'required|string',
                'orderNo' => 'required|string',
                'amount' => 'required',
                'tradeResult' => 'required|in:SUCCESS,1'
            ]);

            // Validation Failed
            if ($validator->fails()) throw new \Exception(implode('...', $validator->errors()->all()));

            // Find Transaction
            $recharge = Deposit::where('order_id', $request->mchOrderNo)->first();

            if(!$recharge) {
                $notify = ['success' => true, 'status' => 'ok', 'message' => ['success' => 'Transaction reference not found']];
                return response($notify, 200);
            }

            // Deposit Handle
            $updateData = self::updateDeposit($request->mchOrderNo, $request->amount, $request->all());

            // Exception
            if($updateData instanceof \Exception) throw new \Exception($updateData->getMessage());

            /*$notify = ['success' => true, 'status' => 'ok', 'message'=>['success'=> 'Transaction was successful']];
            return response($notify, 200);*/
            return 'success';
        } catch (\Exception $th) {
            //throw $th;
            $notify = ['success' => true, 'status' => 'error', 'message'=>['error'=> $th->getMessage()]];
            return response($notify, 400);
        }

    }

    /**
     * Deposit update transaction
     */
    public static function updateDeposit(
        string $reference,
        string $amount,
        array $data
    ) {
        try {
            
            // Find Transaction
            $transaction = Deposit::where('order_id', $reference)->first();

            // Verify is transaction exisit
            if (!$transaction) throw new \Exception('Transaction not found');

            // Verify if transaction status not complete
            if (in_array($transaction->status, ['approved', 'rejected'])) throw new \Exception('Transaction was already complete');

            // Verify if transaction amount are the same
            //if ($transaction->amount != $amount) throw new \Exception('Transaction not the same as order its');
            
            
            // Update transaction details
            $transaction->detail = $data;
            $transaction->status = 'approved';
            $transaction->transaction_id = $data['orderNo'];
            $transaction->save();

            $user = User::find($transaction->user_id);

            // Update user balance
            $user->balance = $user->balance + $transaction->amount;
            $user->save();

            return $transaction;
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Payout update transaction
     */

    public function ipnTransfer(Request $request)
    {

        try {

            // Validate request
            $validator = Validator::make($request->all(), [
                //'event' => 'required|string|in:PAYIN,PAYOUT',
                'merTransferId' => 'required|string',
                'tradeNo' => 'required|string',
                'transferAmount' => 'required',
                'tradeResult' => 'required|in:SUCCESS,FAIL,1,2'
            ]);

            // Validation Failed
            if ($validator->fails()) throw new \Exception(implode('...', $validator->errors()->all()));

            // Find Transaction
            $payout = Withdrawal::where('trx', $request->merTransferId)->first();

            if(!$payout) {
                $notify = ['success' => true, 'status' => 'ok', 'message' => ['success' => 'Transaction reference not found']];
                return response($notify, 200);
            }

            // Payout Handle
            $updateData = self::updatePayout($request->tradeResult, $request->merTransferId, $request->transferAmount, $request->all());

            // Exception
            if($updateData instanceof \Exception) throw new \Exception($updateData->getMessage());

            /*$notify = ['success' => true, 'status' => 'ok', 'message'=>['success'=> 'Transaction was successful']];
            return response($notify, 200);*/
            return 'success';
        } catch (\Exception $th) {
            //throw $th;
            $notify = ['success' => true, 'status' => 'error', 'message'=>['error'=> $th->getMessage()]];
            return response($notify, 400);
        }

    }

    /**
     * Payout update transaction
     */
    public static function updatePayout(
        string $status,
        string $reference,
        string $amount,
        array $data
    ) {
        try {
            // Find payout
            $payout = Withdrawal::where('trx', $reference)->first();

            // Verify is payout exisit
            if (!$payout) throw new \Exception('Transaction not found');

            $user = User::find($payout->user_id);

            // Verify if payout status not complete
            if (in_array($payout->status, ['rejected'])) throw new \Exception('Transaction was already complete');

            // Verify successful status
            if(in_array($status, [1])) {
                // Update payout
                $payout->status = 'approved';
                $payout->save();
            }

            // Verify failed status | Refund amount to user
            if(in_array($status, [2])) {
                // Update payout
                $payout->status = 'rejected';
                $payout->save();

                // Refund amount to User Wallet
                $user->income = $user->income + $payout->amount;
                $user->save();
            }

            return $payout;
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * WatchPay Deposit IPN
     */
    public function ipnWatchPayDeposit(Request $request)
    {
        try {

            $params = $request->all();
            if (empty($params)) {
                $params = $request->json()->all();
            }

            Log::info('WatchPay Deposit IPN Received', ['params' => $params]);

            $sign = $params['sign'] ?? null;
            $mchOrderNo = $params['mchOrderNo'] ?? $params['mch_order_no'] ?? null;
            $tradeResult = $params['tradeResult'] ?? null;

            // Build signature string from all params except sign and signType
            $signParams = [];
            foreach ($params as $key => $value) {
                if ($key === 'sign' || $key === 'signType' || $key === 'sign_type') {
                    continue;
                }
                if ($value !== '' && $value !== null) {
                    $signParams[$key] = $value;
                }
            }
            ksort($signParams);
            $signStr = '';
            foreach ($signParams as $key => $value) {
                if ($signStr !== '') {
                    $signStr .= '&';
                }
                $signStr .= $key . '=' . $value;
            }

            // Get merchant key for verification
            $setting = PaymentMethod::where(['tag' => 'watchpay', 'status' => 'active'])->first();
            if (!$setting) {
                Log::error('WatchPay IPN: Payment method not found');
                return 'error';
            }
            $settingData = json_decode($setting->settings);
            $merchant_key = $settingData->secret_key->value;

            // Verify signature
            $expectedSign = md5($signStr . '&key=' . $merchant_key);
            Log::info('WatchPay IPN Signature Check', ['expected' => $expectedSign, 'received' => $sign]);

            if ($sign !== $expectedSign) {
                Log::error('WatchPay IPN: Signature mismatch');
                return 'Signature error';
            }

            if ($tradeResult == '1' || $tradeResult == 'SUCCESS') {
                // Find deposit and update
                $recharge = Deposit::where('order_id', $mchOrderNo)->first();
                if (!$recharge) {
                    return 'success';
                }

                $updateData = self::updateDeposit($mchOrderNo, $params['amount'] ?? '0', $params);
                if ($updateData instanceof \Exception) throw new \Exception($updateData->getMessage());
            }

            return 'success';

        } catch (\Exception $th) {
            Log::error('WatchPay Deposit IPN Error: ' . $th->getMessage());
            return response('error', 400);
        }
    }

    /**
     * WatchPay Transfer/Withdrawal IPN
     */
    public function ipnWatchPayTransfer(Request $request)
    {
        try {

            $params = $request->all();
            if (empty($params)) {
                $params = $request->json()->all();
            }

            Log::info('WatchPay Transfer IPN Received', ['params' => $params]);

            $tradeResult = $params['tradeResult'] ?? null;
            $merTransferId = $params['merTransferId'] ?? null;
            $transferAmount = $params['transferAmount'] ?? '0';

            if (!$merTransferId || !$tradeResult) {
                return 'error';
            }

            // Find withdrawal
            $payout = Withdrawal::where('trx', $merTransferId)->first();
            if (!$payout) {
                return 'success';
            }

            $updateData = self::updatePayout($tradeResult, $merTransferId, $transferAmount, $params);
            if ($updateData instanceof \Exception) throw new \Exception($updateData->getMessage());

            return 'success';

        } catch (\Exception $th) {
            Log::error('WatchPay Transfer IPN Error: ' . $th->getMessage());
            return response('error', 400);
        }
    }

    /**
     * HXPayment Deposit IPN
     * Callback Parameters from HXPayment Documentation:
     * - merchantLogin: Merchant Account
     * - orderCode: Platform Order Number (e.g., C20210919210649238840)
     * - merchantCode: Merchant Order Number (our order_id)
     * - status: Order status (PENDING, SUCCESS, FAILED)
     * - orderAmount: Order amount
     * - paidAmount: Payment amount
     * - sign: Signature
     */
    public function ipnHXPaymentDeposit(Request $request)
    {
        try {

            $params = $request->all();
            if (empty($params)) {
                $params = $request->json()->all();
            }

            Log::info('HXPayment Deposit IPN Received', ['params' => $params]);

            // Extract callback parameters
            $sign = $params['sign'] ?? null;
            $merchantLogin = $params['merchantLogin'] ?? null;
            $orderCode = $params['orderCode'] ?? null; // Platform order number
            $merchantCode = $params['merchantCode'] ?? null; // Our order_id
            $status = $params['status'] ?? null; // PENDING, SUCCESS, FAILED
            $orderAmount = $params['orderAmount'] ?? 0;
            $paidAmount = $params['paidAmount'] ?? 0;

            // Validate required parameters
            if (!$merchantCode || !$status || !$sign) {
                Log::error('HXPayment IPN: Missing required parameters');
                return response()->json(['error' => 'Missing required parameters'], 400);
            }

            // Build signature string from all params except sign
            $signParams = [];
            foreach ($params as $key => $value) {
                if ($key === 'sign') {
                    continue;
                }
                if ($value !== '' && $value !== null) {
                    $signParams[$key] = $value;
                }
            }
            ksort($signParams);
            $signStr = '';
            foreach ($signParams as $key => $value) {
                if ($signStr !== '') {
                    $signStr .= '&';
                }
                $signStr .= $key . '=' . $value;
            }

            // Get merchant key for verification
            $setting = PaymentMethod::where(['tag' => 'hxpayment', 'status' => 'active'])->first();
            if (!$setting) {
                Log::error('HXPayment IPN: Payment method not found');
                return response()->json(['error' => 'Payment method not found'], 500);
            }
            $settingData = json_decode($setting->settings);
            $merchant_key = $settingData->merchant_key->value;

            // Verify signature
            $expectedSign = md5($signStr . '&key=' . $merchant_key);
            Log::info('HXPayment IPN Signature Check', [
                'expected' => $expectedSign, 
                'received' => $sign,
                'signStr' => $signStr
            ]);

            if ($sign !== $expectedSign) {
                Log::error('HXPayment IPN: Signature mismatch', [
                    'expected' => $expectedSign,
                    'received' => $sign
                ]);
                return response()->json(['error' => 'Invalid signature'], 403);
            }

            // Process payment based on status
            if ($status == 'SUCCESS') {
                // Find deposit by our merchant order code
                $recharge = Deposit::where('order_id', $merchantCode)->first();
                if (!$recharge) {
                    Log::warning('HXPayment IPN: Deposit not found for order: ' . $merchantCode);
                    return response()->json(['status' => 'success', 'message' => 'Order not found but acknowledged']);
                }

                // Check if already processed
                if ($recharge->status === 'approved') {
                    Log::info('HXPayment IPN: Deposit already processed: ' . $merchantCode);
                    return response()->json(['status' => 'success', 'message' => 'Already processed']);
                }

                // Update deposit with paid amount
                $updateData = self::updateDeposit($merchantCode, $paidAmount, $params);
                if ($updateData instanceof \Exception) {
                    Log::error('HXPayment IPN: Failed to update deposit: ' . $updateData->getMessage());
                    throw new \Exception($updateData->getMessage());
                }

                Log::info('HXPayment IPN: Deposit updated successfully', [
                    'order_id' => $merchantCode,
                    'amount' => $paidAmount,
                    'platform_order' => $orderCode
                ]);

            } elseif ($status == 'FAILED') {
                // Find deposit and mark as rejected
                $recharge = Deposit::where('order_id', $merchantCode)->first();
                if ($recharge && $recharge->status == 'pending') {
                    $recharge->status = 'rejected';
                    $recharge->detail = $params;
                    $recharge->save();
                    Log::info('HXPayment IPN: Deposit marked as failed: ' . $merchantCode);
                }
            } elseif ($status == 'PENDING') {
                Log::info('HXPayment IPN: Payment still pending: ' . $merchantCode);
            }

            return response()->json(['status' => 'success', 'message' => 'Callback processed']);

        } catch (\Exception $th) {
            Log::error('HXPayment Deposit IPN Error: ' . $th->getMessage(), [
                'trace' => $th->getTraceAsString()
            ]);
            return response()->json(['error' => 'Internal error'], 500);
        }
    }

    /**
     * HXPayment Transfer/Withdrawal IPN
     * Callback Parameters from HXPayment Documentation:
     * - merchantLogin: Merchant Account
     * - orderCode: Platform Order Number (e.g., P20210919210649238840)
     * - merchantCode: Merchant Order Number (our trx)
     * - status: Order status (PENDING, SUCCESS, FAILED)
     * - utr: UTR number (if status is SUCCESS)
     * - amount: Amount (if status is SUCCESS)
     * - sign: Signature
     */
    public function ipnHXPaymentTransfer(Request $request)
    {
        try {

            $params = $request->all();
            if (empty($params)) {
                $params = $request->json()->all();
            }

            Log::info('HXPayment Transfer IPN Received', ['params' => $params]);

            // Extract callback parameters
            $sign = $params['sign'] ?? null;
            $merchantLogin = $params['merchantLogin'] ?? null;
            $orderCode = $params['orderCode'] ?? null; // Platform order number
            $merchantCode = $params['merchantCode'] ?? null; // Our trx
            $status = $params['status'] ?? null; // PENDING, SUCCESS, FAILED
            $utr = $params['utr'] ?? null; // Only present if SUCCESS
            $amount = $params['amount'] ?? 0; // Only present if SUCCESS

            // Validate required parameters
            if (!$merchantCode || !$status || !$sign) {
                Log::error('HXPayment Transfer IPN: Missing required parameters');
                return response()->json(['error' => 'Missing required parameters'], 400);
            }

            // Build signature string from all params except sign
            $signParams = [];
            foreach ($params as $key => $value) {
                if ($key === 'sign') {
                    continue;
                }
                if ($value !== '' && $value !== null) {
                    $signParams[$key] = $value;
                }
            }
            ksort($signParams);
            $signStr = '';
            foreach ($signParams as $key => $value) {
                if ($signStr !== '') {
                    $signStr .= '&';
                }
                $signStr .= $key . '=' . $value;
            }

            // Get merchant key for verification
            $setting = PaymentMethod::where(['tag' => 'hxpayment', 'status' => 'active'])->first();
            if (!$setting) {
                Log::error('HXPayment Transfer IPN: Payment method not found');
                return response()->json(['error' => 'Payment method not found'], 500);
            }
            $settingData = json_decode($setting->settings);
            $merchant_key = $settingData->merchant_key->value;

            // Verify signature
            $expectedSign = md5($signStr . '&key=' . $merchant_key);
            Log::info('HXPayment Transfer IPN Signature Check', [
                'expected' => $expectedSign, 
                'received' => $sign,
                'signStr' => $signStr
            ]);

            if ($sign !== $expectedSign) {
                Log::error('HXPayment Transfer IPN: Signature mismatch', [
                    'expected' => $expectedSign,
                    'received' => $sign
                ]);
                return response()->json(['error' => 'Invalid signature'], 403);
            }

            // Find withdrawal
            $payout = Withdrawal::where('trx', $merchantCode)->first();
            if (!$payout) {
                Log::warning('HXPayment Transfer IPN: Withdrawal not found for trx: ' . $merchantCode);
                return response()->json(['status' => 'success', 'message' => 'Order not found but acknowledged']);
            }

            // Check if already processed
            if (in_array($payout->status, ['approved', 'rejected'])) {
                Log::info('HXPayment Transfer IPN: Withdrawal already processed: ' . $merchantCode);
                return response()->json(['status' => 'success', 'message' => 'Already processed']);
            }

            // Process based on status
            if ($status == 'SUCCESS') {
                // Update payout as approved
                $payout->status = 'approved';
                $payout->detail = $params;
                if ($utr) {
                    $payout->transaction_id = $utr;
                }
                $payout->save();

                Log::info('HXPayment Transfer IPN: Withdrawal approved', [
                    'trx' => $merchantCode,
                    'amount' => $amount,
                    'utr' => $utr,
                    'platform_order' => $orderCode
                ]);

            } elseif ($status == 'FAILED') {
                // Refund to user balance
                $user = User::find($payout->user_id);
                if ($user) {
                    $user->income = $user->income + $payout->amount;
                    $user->save();
                }

                // Update payout as rejected
                $payout->status = 'rejected';
                $payout->detail = $params;
                $payout->save();

                Log::info('HXPayment Transfer IPN: Withdrawal failed, amount refunded', [
                    'trx' => $merchantCode,
                    'amount' => $payout->amount,
                    'user_id' => $payout->user_id
                ]);

            } elseif ($status == 'PENDING') {
                Log::info('HXPayment Transfer IPN: Withdrawal still pending: ' . $merchantCode);
            }

            return response()->json(['status' => 'success', 'message' => 'Callback processed']);

        } catch (\Exception $th) {
            Log::error('HXPayment Transfer IPN Error: ' . $th->getMessage(), [
                'trace' => $th->getTraceAsString()
            ]);
            return response()->json(['error' => 'Internal error'], 500);
        }
    }
}
