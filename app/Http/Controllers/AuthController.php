<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

       
        return back()->with('message',"otp send your email ,please verify ");
    }
}
