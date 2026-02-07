<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Services\PaymentServices;
use App\Models\BankList;
use App\Models\Admin;
use App\Models\BonusLedger;
use App\Models\Checkin;
use App\Models\Commission;
use App\Models\Deposit;
use App\Models\Fund;
use App\Models\Setting;
use App\Models\Improvment;
use App\Models\Mining;
use App\Models\Notice;
use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\Purchase;
use App\Models\Task;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\VipSlider;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function single_deposit__pay($amount, $method, PaymentServices $payment)
    {

        $setting = Setting::first();

        $payment_method = PaymentMethod::where(['id' => $method, 'status' => 'active'])->inRandomOrder()->first();
        if (!$payment_method) {
            return back()->with('error', 'Method not available.');
        }

        // Verify if Recharge Allowed
        if ($setting->open_deposit != 1) {
            return redirect()->back()->with('error', "You can't Recharge your wallet now, Service not available. Try again later.");
        }

        $jsonData = '';
        $linkData = '';
        $reference = rand(00000, 99999);

        // Auto Deposit
        if ($payment_method->auto && $setting->auto_deposit) {
            // Charge Payment
            $chargePayment = $payment->charge($reference, 'NGN', $amount, $payment_method->tag);

            // Exception
            if ($chargePayment['status'] == false) {
                return back()->with("error", $chargePayment['message']);
            }

            $jsonData = json_encode([
                'reference' => $chargePayment['data']['reference'],
                'order_ref' => $chargePayment['data']['order_ref']
            ]);

            $linkData = $chargePayment['data']['link'];

            $model = new Deposit();
            $model->user_id = Auth::id();
            $model->method_name = $payment_method->name;
            $model->order_id = $reference;
            $model->transaction_id = $chargePayment['data']['order_ref'];
            $model->amount = $amount;
            $model->final_amount = $amount;
            $model->pay_link = $linkData;
            $model->data = $jsonData;
            $model->date = date('d-m-Y H:i:s');
            $model->status = 'pending';
            $model->save();

            return redirect()->away($linkData);
        }

        $channel = PaymentMethod::where('id', $method)->first();

        if (!$channel) {
            return redirect()->back()->with('success', 'Channel not found');
        }

        if ($channel->type == 'usdt') {
            return view('app.main.deposit.recharge_confirm', compact('amount', 'channel'));

        }
        else {
            return view('app.main.deposit.wallet', compact('amount', 'channel'));
        }

    }
    public function apiPayment(Request $request)
    {
        $model = new Deposit();
        $model->user_id = \auth()->id();
        $model->method_name = $request->channel;
        $model->address = $request->address;
        $model->order_id = rand(0, 999999);
        $model->transaction_id = $request->transaction;
        $model->amount = $request->amount;
        $model->date = date('d-m-Y H:i:s');
        $model->status = 'pending';
        $model->save();

        return redirect('deposit')->with('success', 'Successful');
    }
    public function channel($oid, $amount, $root_url, $number_url, $uid)
    {
        session()->put('root_url', base64_decode($root_url));
        session()->put('number_url', base64_decode($number_url));
        session()->put('amount', $amount);
        session()->put('oid', $oid);
        session()->put('uid', $uid);
        return view('app.main.deposit.channel', compact('amount', 'oid'));
    }

    public function confirm($amount, $channel, $number)
    {
        return view('app.main.deposit.confirm', compact('amount', 'channel', 'number'));
    }

    public function final ($number, $trx, $amount)
    {
        return view('app.main.deposit.final', compact('number', 'trx', 'amount'));
    }

    public function dashboard()
    {
        return view('app.main.index');
    }
    public function vip()
    {
        return view('app.main.vip');
    }

    public function message()
    {
        $notices = Notice::where('status', 'active')->latest()->get();
        return view('app.main.message', compact('notices'));
    }

    public function purchase_history()
    {
        return view('app.main.purchase_history');
    }

    public function history()
    {
        return view('app.main.history');
    }

    public function history_all()
    {
        return view('app.main.history_all');
    }

    public function ordered()
    {
        return view('app.main.ordered');
    }


    public function exchange()
    {
        return view('app.main.exchange');
    }

    public function checkin()
    {
        $user = \auth()->user();
        if ($user->checkin > 0) {
            $checkin = new Checkin();
            $checkin->user_id = $user->id;
            $checkin->date = date('Y-m-d');
            $checkin->amount = $user->checkin;
            $checkin->save();

            $userUpdate = User::where('id', $user->id)->first();
            $userUpdate->income = $user->income + $user->checkin;
            $userUpdate->checkin = 0;
            $userUpdate->save();

            $ledger = new UserLedger();
            $ledger->user_id = $user->id;
            $ledger->reason = 'checkin';
            $ledger->perticulation = 'checkin commission received';
            $ledger->amount = $user->checkin;
            $ledger->debit = $user->checkin;
            $ledger->status = 'approved';
            $ledger->step = 'third';
            $ledger->date = date('d-m-Y H:i');
            $ledger->save();

            return response()->json(['message' => 'Check-in balance received.']);
        }
        else {
            return response()->json(['message' => 'Check-in balance 0']);
        }
    }

    public function vip_commission()
    {
        return view('app.main.vip_commission');
    }

    public function task()
    {
        $user = Auth::user();
        //First Level Users
        $first_level_users = User::where('ref_by', $user->ref_id)->get();
        $first_level_users_ids = [];
        foreach ($first_level_users as $user) {
            array_push($first_level_users_ids, $user->id);
        }

        //Second Level Users
        $second_level_users_ids = [];
        foreach ($first_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user) {
                array_push($second_level_users_ids, $user->id);
            }
        }
        $second_level_users = User::whereIn('id', $second_level_users_ids)->get();

        //Third Level Users
        $third_level_users_ids = [];
        foreach ($second_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user) {
                array_push($third_level_users_ids, $user->id);
            }
        }
        $third_level_users = User::whereIn('id', $third_level_users_ids)->get();
        $team_size = $first_level_users->count() + $second_level_users->count() + $third_level_users->count();

        //Get level wise user ids
        $first_ids = $first_level_users->pluck('id'); //first
        $second_ids = $second_level_users->pluck('id'); //Second
        $third_ids = $third_level_users->pluck('id'); //Third

        $lv1Recharge = Deposit::whereIn('user_id', $first_ids)->where('status', 'approved')->sum('amount');
        $lv2Recharge = Deposit::whereIn('user_id', $second_ids)->where('status', 'approved')->sum('amount');
        $lv3Recharge = Deposit::whereIn('user_id', $third_ids)->where('status', 'approved')->sum('amount');
        $lvTotalDeposit = $lv1Recharge + $lv2Recharge + $lv3Recharge;

        $lv1Withdraw = Withdrawal::whereIn('user_id', $first_ids)->where('status', 'approved')->sum('amount');
        $lv2Withdraw = Withdrawal::whereIn('user_id', $second_ids)->where('status', 'approved')->sum('amount');
        $lv3Withdraw = Withdrawal::whereIn('user_id', $third_ids)->where('status', 'approved')->sum('amount');
        $lvTotalWithdraw = $lv1Withdraw + $lv2Withdraw + $lv3Withdraw;

        $activeMembers1 = Deposit::whereIn('user_id', $first_ids)->where('status', 'approved')->groupBy('user_id')->count();
        $activeMembers2 = Deposit::whereIn('user_id', $second_ids)->where('status', 'approved')->groupBy('user_id')->count();
        $activeMembers3 = Deposit::whereIn('user_id', $third_ids)->where('status', 'approved')->groupBy('user_id')->count();


        $Lv1active = 0;
        $Lv2active = 0;
        $Lv3active = 0;

        foreach ($first_level_users as $uuss) {
            $purchase = Purchase::where('user_id', $uuss->id)->first();
            if ($purchase) {
                $Lv1active = $Lv1active + 1;
            }
        }
        foreach ($second_level_users as $uuss) {
            $purchase = Purchase::where('user_id', $uuss->id)->first();
            if ($purchase) {
                $Lv2active = $Lv2active + 1;
            }
        }
        foreach ($third_level_users as $uuss) {
            $purchase = Purchase::where('user_id', $uuss->id)->first();
            if ($purchase) {
                $Lv3active = $Lv3active + 1;
            }
        }

        $teamTotalActiveMembers = $Lv1active + $Lv2active + $Lv3active;


        return view('app.main.task', compact('team_size', 'teamTotalActiveMembers', 'lv1Recharge', 'lv2Recharge', 'lv3Recharge', 'lv1Withdraw', 'lv2Withdraw', 'lv3Withdraw', 'first_level_users', 'second_level_users', 'third_level_users'));
    }

    public function task_history()
    {
        return view('app.main.task_history');
    }

    public function reword_history()
    {
        return view('app.main.reword_history');
    }

    public function recharge_history()
    {
        return view('app.main.deposit_history');
    }

    public function payment_processing($order_id)
    {
        $deposit = Deposit::where('order_id', $order_id)->first();
        
        if (!$deposit) {
            return redirect()->route('user.deposit')->with('error', 'Order not found');
        }

        return view('app.main.deposit.payment_processing', [
            'order_id' => $order_id,
            'amount' => $deposit->amount,
            'gateway' => $deposit->method_name
        ]);
    }

    public function check_payment_status($order_id)
    {
        $deposit = Deposit::where('order_id', $order_id)->first();
        
        if (!$deposit) {
            return response()->json(['status' => 'not_found', 'message' => 'Order not found']);
        }

        if ($deposit->status === 'success') {
            return response()->json([
                'status' => 'success',
                'message' => 'Payment confirmed',
                'data' => [
                    'order_id' => $deposit->order_id,
                    'amount' => $deposit->amount,
                    'status' => $deposit->status
                ]
            ]);
        } elseif ($deposit->status === 'pending') {
            return response()->json([
                'status' => 'pending',
                'message' => 'Payment is being processed'
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Payment failed or rejected'
            ]);
        }
    }

    public function commission()
    {
        return view('app.main.commission');
    }

    public function amount_history()
    {
        return view('app.main.amount_history');
    }

    public function package_details($id)
    {
        $package = Package::find($id);
        return view('app.main.package_details', compact('package'));
    }

    public function profile()
    {
        return view('app.main.profile');
    }

    public function team()
    {
        return view('app.main.team.index');
    }


    public function setting()
    {
        return view('app.main.setting');
    }

    public function recharge()
    {
        return view('app.main.deposit.index');
    }

    public function recharge_amount($oid, $amount, $root_url, $number_url, $uid)
    {
        session()->put('root_url', base64_decode($root_url));
        session()->put('number_url', base64_decode($number_url));
        session()->put('amount', $amount);
        session()->put('oid', $oid);
        session()->put('uid', $uid);
        return view('app.main.deposit.payment-method', compact('amount', 'oid'));
    }
    public function payment_Confirm(Request $request)
    {
        $channel = PaymentMethod::where('id', $request->channel_id)->first();

        $model = new Deposit();
        $model->user_id = user()->id;
        $model->method_name = $channel->channel;
        $model->order_id = $request->ref;
        $model->transaction_id = $request->transaction_id;
        $model->address = $request->address;
        $model->amount = $request->amount;
        $model->final_amount = $request->amount;
        $model->date = now();
        $model->status = 'pending';
        $model->save();

        return redirect()->route('user.deposit')->with('success', 'Successful');
    }

    public function rechargeApi(Request $request)
    {
        if (Deposit::where('order_id', $request->oid)->first()) {
            return response()->json(['status', false, 'message' => 'Submitted successfully']);
        }
        if ($request->has('amount') && $request->has('channel') && $request->has('transaction_id') && $request->has('number') && $request->has('uid')) {
            $model = new Deposit();
            $model->user_id = $request->uid;
            $model->channel = $request->channel;
            $model->number = $request->number;
            $model->order_id = $request->oid;
            $model->transaction_id = $request->transaction_id;
            $model->amount = $request->amount;
            $model->date = date('d-m-Y H:i:s');
            $model->status = 'pending';
            $model->save();
            return response()->json(['status', true, 'message' => 'সফলভাবে জমা দেওয়া হয়েছে৷']);
        }
    }

    public function return_pay_number($method)
    {
        $method = DB::table('payment_methods')->where('type', $method)->inRandomOrder()->first();
        return response()->json(['status' => true, 'data' => $method]);
    }

    public function update_profile(Request $request)
    {
        $user = User::find(Auth::id());
        $path = uploadImage(false, $request, 'photo', 'upload/profile/', 200, 200, $user->photo);
        $user->photo = $path ?? $user->photo;

        $user->update();
        return redirect()->route('my.profile')->with('success', 'Successful');
    }

    public function personal_details()
    {
        return view('app.main.update_personal_details');
    }

    /*public function card()
     {
     
     return view('app.main.gateway_setup', compact('methods'));
     }
     public function setupGateway(Request $request)
     {
     
     $request->validate([
     'realname'       => 'required|string|max:255',
     'gateway_number' => 'required|string|max:255',
     'ifsc'           => 'required|string|max:50',
     'bank_name'      => 'required|string|max:255',
     ]);
     $user = User::find(Auth::id());
     $user->realname       = $request->realname;
     $user->gateway_number = $request->gateway_number;
     $user->gateway_method = 'Bank Transfer'; 
     $user->bank_name      = $request->bank_name;
     $user->ifsc           = $request->ifsc;
     $user->save();
     return redirect()->back()->with('success', 'Your withdraw account updated.');
     }*/


    public function invite()
    {
        return view('app.main.invite');
    }

    public function level()
    {
        return view('app.main.level');
    }


    public function service()
    {
        return view('app.main.service');
    }


    public function appreview()
    {
        return view('app.main.appreview');
    }

    public function rule()
    {
        return view('app.main.rule');
    }

    public function partner()
    {
        return view('app.main.partner');
    }

    public function climRecord()
    {
        return view('app.main.climRecord');
    }

    public function add_bank()
    {
        return view('app.main.gateway_setup');
    }

    public function add_bank_create()
    {
        return view('app.main.add_bank_create');
    }

    public function setting_change_password(Request $request)
    {
        //Check current password
        $user = User::find(Auth::id());
        if (Hash::check($request->old_password, $user->password)) {
            if ($request->new_password == $request->confirm_password) {
                $user->password = Hash::make($request->new_password);
                $user->update();
                return redirect()->route('login_password')->with('success', 'Password changed');
            }
            else {
                return redirect()->route('login_password')->with('success', 'Password not match.');
            }
        }
        else {
            return redirect()->route('login_password')->with('success', 'Password not match');
        }
    }


    public function download_apk()
    {
        $file = public_path('agri.apk');
        return response()->file($file, [
            'Content-Type' => 'application/vnd.android.package-archive',
            'Content-Disposition' => 'attachment; filename="agri.apk"',
        ]);
    }

}