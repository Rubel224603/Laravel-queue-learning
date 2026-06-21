<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function userRegister()
    {

        return view('auth.register');
    }

    public function userStore(Request $request)
    {
        //return $request;
        $request->validate([
            'name'      => 'required|string|max:250|min:2',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:8|max:250|confirmed',
            'phone'     => 'required|string',
        ]);

        $otp = rand(100000, 999999);
        //return response()->json($otp);
        $user            = new User();
        $user->name      = $request->name;
        $user->email     = $request->email;
        if ($request->password === $request->password_confirmation) {
            $user->password = bcrypt($request->password);
        }
        $user->phone    = $request->phone;
        $user->otp      = $otp;
        $user->otp_expires_at = now()->addMinutes(5);

        $user->save();

        //Mail::to($user->email)->send(new OtpMail($user->name, $otp));
        Mail::to($user->email)->queue(new OtpMail($user->name, $otp)); //for background work

        //Session::put('verify_email', $user->email); //Need for varification 
        Session::put('verify_email', $user->email);


        return redirect()->route('otp.form')
            ->with('message', 'OTP sent to your email. Please verify.');
    }

    public function otpForm()
    {
        return view('auth.otpVerify');
    }

    public function otpVerification(Request $request)
    {

        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $email = Session::get('verify_email');

        if (!$email) {
            return back()->with('error', 'Session expired. Please register again.');
        }

        $user = User::where('email', $email)
            ->where('otp', $request->otp)
            ->where('otp_expires_at', '>', now())
            ->first();

        if (!$user) {
            return back()->with('error', 'Invalid or expired OTP. Please try again.')
                ->withInput();
        }
        $user->update([
            'otp' => null,
            'otp_expires_at' => null,
            'is_verified' => now(),
        ]);

        Session::forget('verify_email');
        auth()->login($user);

        return redirect('/dashboard')->with('message', 'Email verified successfully!');
    }
    public function dashboard()
    {
        return view('auth.dashboard');
    }
    public function userLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => "required|email:exists:users",
            'password' => "required|max:8"
        ]);

    }
    public function forgetPassword()
    {
        return view('auth.forget');
    }
}
