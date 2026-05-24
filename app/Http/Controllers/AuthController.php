<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;

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
        $user->phone     = $request->phone;
        $user->save();

        Mail::to($user->email)->send(new OtpMail($user->name, $otp));

        return redirect()->route('otp.form', ['email' => $user->email])
            ->with('message', 'OTP sent to your email. Please verify.');
    }
}
