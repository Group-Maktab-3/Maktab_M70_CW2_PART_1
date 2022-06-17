<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // auth()->attempt($request->only("email","password"));
    //    if(auth()->attempt($request->only("email","password"))){
    //        return redirect("/");
    //    } 
    //     return  redirect('/login')->with("error","your info are wrong");

        // $user=  User::where('email',$request->get('email'))->firstOrFail();
        
        $user=  User::where('email',$request->get('email'))->first();
        if(Hash::check($request->get('password'),$user->password)){
            auth()->login($user);
            
            return   to_route('home');
            // return redirect()->route('');
        }

        return back();

    }
}
