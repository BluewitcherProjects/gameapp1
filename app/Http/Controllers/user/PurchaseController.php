<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use App\Models\FundInvest;
use App\Models\Package;
use App\Models\Purchase;
use App\Models\Rebate;
use App\Models\User;
use App\Models\UserLedger;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{

    public function purchase_vip($id){
        $package = Package::find($id);
        return view('app.main.vip_details', compact('package'));
    }

public function purchaseConfirmation($id)
{
    $package = Package::find($id);
    $user = Auth::user();
    
    // Debug: Log authentication status
    \Log::info('Purchase confirmation request - User: ' . ($user ? $user->id : 'null') . ', Package: ' . $id);
    \Log::info('Request referrer: ' . request()->headers->get('referer'));
    \Log::info('Current URL: ' . url()->current());

    session()->put('buy', true);

    // Check package status
    if ($package->status != 'active') {
        session()->flash('message', 'This package is inactive');
        return redirect()->back();
    }

    // Check how many times the user already purchased this package
    $purchaseCount = Purchase::where('user_id', $user->id)
        ->where('package_id', $package->id)
        ->where('status', 'active')
        ->count();

    if ($purchaseCount >= $package->buy_limit) {
        session()->flash('message', "You have reached the buy limit for this package ({$package->buy_limit})");
        return redirect()->back();
    }


    // Proceed with purchase
    if ($package->price <= $user->balance) {
        // Deduct balance
        User::where('id', $user->id)->update([
            'balance'=> $user->balance - $package->price,
            'investor' => 1
        ]);

        // Create purchase
        $purchase = new Purchase();
        $purchase->user_id = $user->id;
        $purchase->package_id = $package->id;
        $purchase->amount = $package->price;
        $purchase->daily_income = $package->commission_with_avg_amount / $package->validity;
       // $purchase->date = now()->addHours(24);
        $purchase->date = now()->addDay()->startOfDay()->addSecond(); //12:00 drop 
        $purchase->validity = now()->addDays($package->validity);
        $purchase->status = 'active';
        $purchase->save();

        // Handle referral commissions (same as before)
        $rebate = Rebate::first();
        $first_ref = User::where('ref_id', $user->ref_by)->first();
        if ($first_ref){
            $amount = $package->price * $rebate->team_commission1 / 100;
            User::where('id', $first_ref->id)->update(['balance' => $first_ref->balance + $amount]);

            $ledger = new UserLedger();
            $ledger->user_id = $first_ref->id;
            $ledger->get_balance_from_user_id = $user->id;
            $ledger->reason = 'commission';
            $ledger->perticulation = 'First Level Commission Received';
            $ledger->amount = $amount;
            $ledger->debit = $amount;
            $ledger->status = 'approved';
            $ledger->step = 'first';
            $ledger->date = date('d-m-Y H:i');
            $ledger->save();

            $second_ref = User::where('ref_id', $first_ref->ref_by)->first();
            if ($second_ref){
                $amount = $package->price * $rebate->team_commission2 / 100;
                User::where('id', $second_ref->id)->update(['balance' => $second_ref->balance + $amount]);

                $ledger = new UserLedger();
                $ledger->user_id = $second_ref->id;
                $ledger->get_balance_from_user_id = $user->id;
                $ledger->reason = 'commission';
                $ledger->perticulation = 'Second Level Commission Received';
                $ledger->amount = $amount;
                $ledger->debit = $amount;
                $ledger->status = 'approved';
                $ledger->step = 'second';
                $ledger->date = date('d-m-Y H:i');
                $ledger->save();

                $third_ref = User::where('ref_id', $second_ref->ref_by)->first();
                if ($third_ref){
                    $amount = $package->price * $rebate->team_commission3 / 100;
                    User::where('id', $third_ref->id)->update(['balance' => $third_ref->balance + $amount]);

                    $ledger = new UserLedger();
                    $ledger->user_id = $third_ref->id;
                    $ledger->get_balance_from_user_id = $user->id;
                    $ledger->reason = 'commission';
                    $ledger->perticulation = 'Third Level Commission Received';
                    $ledger->amount = $amount;
                    $ledger->debit = $amount;
                    $ledger->status = 'approved';
                    $ledger->step = 'third';
                    $ledger->date = date('d-m-Y H:i');
                    $ledger->save();
                }
            }
        }

        session()->flash('message', 'Package purchased successfully');
        \Log::info('Purchase successful, redirecting back to: ' . url()->previous());
        return redirect()->back();
    } else {
        session()->flash('message', 'Insufficient balance');
        return redirect()->back();
    }
}


    public function vip_confirm($vip_id)
    {
        $vip = Package::find($vip_id);
        return view('app.main.vip_confirm', compact('vip'));
    }

    protected function ref_user($ref_by)
    {
        return User::where('ref_id', $ref_by)->first();
    }
}
