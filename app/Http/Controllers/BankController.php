<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    
    public function card()
    {
        return view('app.main.gateway_setup');
    }

    public function setupGateway(Request $request)
    {
        $request->validate([
            'realname'       => 'required',
            'gateway_number' => 'required',
            'ifsc'           => 'required',
            'bank_name'      => 'required',
        ]);

        $user = User::find(Auth::id());

        $user->realname       = $request->realname;
        $user->gateway_number = $request->gateway_number;
        $user->gateway_method = 'Bank Transfer';
        $user->bank_name      = $request->bank_name;
        $user->ifsc           = $request->ifsc;

        $user->save();

        return redirect()->back()->with('success', 'Your withdraw account updated.');
    }
}
