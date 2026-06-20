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
    public function userRegister(){
    
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

        $otp = rand(1, 999999);
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

        Mail::to($user->email)->send(new OtpMail($user->name, $otp));

        //Session::put('verify_email', $user->email); //Need for varification 
        Session::put('verify_email', $user->email);

       
        return redirect()->route('otp.form', ['email' => $user->email])
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
            'email' => 'required|email|exists:users,email'
        ]);

        $email = Session::get('verify_email');
        return $email;

        if (!$email) {
            return back()->with('error', 'Session expired. Please register again.');
        }

        
        $user = User::where('email', $email)
            ->where('otp', $request->otp)
            ->where('otp_expires_at', '>', now())
            ->first();

        if ($user) {
          
            $user->otp = null;
            $user->otp_expires_at = null;
            $user->email_verified_at = now();
            $user->save();

            Session::forget('verify_email');
            auth()->login($user);

            return redirect()->route('dashboard')
                ->with('message', 'Email verified successfully!');
        }

        // expire or wrong otp
        return back()
            ->with('error', 'Invalid or expired OTP. Please try again.')
            ->withInput();
    }
    public function userLogin()
    {
        return view('auth.login');
    }
    public function forgetPassword()
    {
        return view('auth.forget');
    }
}
