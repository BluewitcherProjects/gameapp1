<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Services\PaymentServices;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Deposit;
use App\Models\Setting;
use App\Models\Purchase;
use Carbon\Carbon;

class WithdrawController extends Controller
{
    public function withdraw()
    {
        if (user()->gateway_method == null || user()->gateway_number == null){
            return redirect('add-bank');
        }
        return view('app.main.withdraw.index');
    }

    public function withdraw_history()
    {
        return view('app.main.withdraw_history');
    }

  public function withdrawRequest(Request $request)
{
    $validate = Validator::make($request->all(), [
        'amount' => 'required|numeric',
    ]);

    $currentHour = now()->format('H'); 
    if ($currentHour < 1 || $currentHour >= 12) {
        return redirect()->back()->with('error', 'Withdrawals allowed only between 00:00 AM to 12:00 PM');
    }

    if ($request->amount == null){
        return redirect()->back()->with('error', 'Withdraw Amount Required');
    }

    $user = Auth::user();
    $setting = Setting::first();

    if ($setting->open_transfer != 1) {
        return redirect()->back()->with('error', "You can't withdraw now, Service not available. Try again later.");
    }

    if ($validate->fails()) {
        return redirect()->back()->withErrors($validate->errors());
    } 

    if ($request->amount < setting('minimum_withdraw')) {
        return redirect()->back()->with('error', 'Minimum withdrawal is: ' . setting('minimum_withdraw'));
    }

    if ($request->amount > setting('maximum_withdraw')) {
        return redirect()->back()->with('error', 'Maximum withdrawal is: ' . setting('maximum_withdraw'));
    }

    if ($request->amount > $user->income) {
        return redirect()->back()->with('error', 'Insufficient income balance');
    }

    $charge = 0;
    if (setting('withdraw_charge') > 0) {
        $charge = ($request->amount * setting('withdraw_charge')) / 100;
    }

    $finalAmount = $request->amount - $charge;

    $user->income -= $request->amount;
    $user->save();

    $oid = 'QEW' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 9));

    $account_info = [
        'bank_account' => $user->gateway_number,
        'full_name' => $user->realname,
        'bank_name' => $user->bank_name,
        'bank_code' => $user->gateway_method,
    ];

    $status_bank = $user->bank_name.' '.$user->gateway_number;

    $withdrawal = new Withdrawal();
    $withdrawal->user_id = $user->id;
    $withdrawal->method_name = 'Bank Transfer'; 
    $withdrawal->trx = rand(10000,99999); 
    $withdrawal->account_info = json_encode($account_info);
    $withdrawal->number = $user->gateway_number;
    $withdrawal->amount = $request->amount;
    $withdrawal->currency = 'NGN';
    $withdrawal->charge = $charge;
    $withdrawal->oid = $oid;
    $withdrawal->final_amount = $finalAmount;
    $withdrawal->status = 'pending';
    $withdrawal->save();

    $ledger = new UserLedger();
    $ledger->user_id = $user->id;
    $ledger->reason = 'withdraw_request';
    $ledger->perticulation = $status_bank;
    $ledger->amount = $request->amount;
    $ledger->debit = $finalAmount;
    $ledger->status = 'pending';
    $ledger->date = date('d-m-Y H:i');
    $ledger->save();

    return redirect()->back()->with('success', "Withdrawal request submitted successfully");
}

}