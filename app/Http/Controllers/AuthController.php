<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function indexl(){
        return view('auth.login');
    }
    public function login(Request $request){
        // dd($request->all());
        // Validate data
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        // Login code
    }

    
    public function register_view(){
        return view('auth.register');
    }
    public function register(Request $request){
        // Validate data
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:user|email',
            'password'=>'required|confirmed',
            
        ]);
        // Data will save in user table     
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>\Hash::make($request->password),
        ]);
        // Login 
        if(\Auth::attempt($request->only('email','password'))){
            return redirect('/')->withSuccess('Welcome');
        }
        return redirect('register')->withError('Error');
    }
}
