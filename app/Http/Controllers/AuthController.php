<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreCardentialsRequest;
use App\Models\User;
use App\Traits\Handler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    use Handler;

    public function showLogin(){
        return view('Account.login' );
    }
    public function showRegister()
    {
        return view('Account.register');
    }
    public function login(Request $request)
    {


        $user = User::where('email', $request->email)->first();
        session(['login_email' => $user->email]);
        if (!$user) {
            return back()->withErrors(['email' => 'No account found with this email.']);
        }
        $this->generateOtp($user);
        $otp =$this->GetOtp();
        $email = $user->email;

        Auth::logout();
        // // return $user;
        return redirect()->route('otpform.index')->with('otp' , $otp);

    }
    public function register(StoreCardentialsRequest $request)
    {


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/home');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function OtpForm(){
        $email = session('login_email');
        return view('Account.OtpForm' , compact('email'));
    }
    public function verifyOtp(Request $request)
    {
        $user = auth()->user();
        if (!$user) return back()->withErrors(['email' => 'User not found']);

        if ($user->otp !== $request->otp) {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }

        if (now()->gt($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'OTP expired']);
        }

        // login user
        Auth::login($user);

        // clear otp
        $user->update([
            'otp' => null,
            'otp_expires_at' => null
        ]);

        return redirect('/home');
    }
    public function ResendOtp(){
        $email = session('login_email');

        $user = User::where('email', $email)->first();
        $this->generateOtp($user);
        return redirect()->route('otpform.index')->with('Success', 'New OTP sent!');
    }

    public function GetOtp(){
        $email = session('login_email');
        $user = User::where('email', $email)->first();
        $otp = $user->otp;

        return $otp;
        // return back()->with('otp' ,$otp) ;
    }

}
