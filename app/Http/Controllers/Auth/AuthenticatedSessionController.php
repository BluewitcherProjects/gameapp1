<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Deposit;
use App\Models\User;
use App\Models\UserLedger;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(Request $request)
    {
        if (Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('app.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request){
       $user = User::where('phone', $request->phone)->first();

        if (Auth::check()){
            return redirect()->route('dashboard');
        }


       if (!$user){
           return response()->json(['status'=> false, 'message'=> 'Incorrect number type']);
        }

        //Check user ban or unban
        if ($user->ban_unban == 'ban')
        {
            return response()->json(['status'=> false, 'message'=> 'Your account has been banned']);
        }

        if ($user){
            if (Hash::check($request->password, $user->password)){
                Auth::login($user);
                // Debug: Log successful login
                \Log::info('User logged in successfully: ' . $user->phone . ' (ID: ' . $user->id . ')');
                return response()->json(['status'=> true, 'message'=> 'Successful']);
            }else{
                return response()->json(['status'=> false, 'message'=> 'Incorrect Password type']);
            }
        }else{
            return response()->json(['status'=> false, 'message'=> 'Incorrect Information type']);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
