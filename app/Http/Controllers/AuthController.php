<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth};

class AuthController extends Controller
{
    public function index() 
    {
        return view('auth.login');
    }
    public function perform(Request $request) 
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        $validator['error'] = 'Your details are incorrect.';
        return redirect("login")->withErrors($validator);
    }
}
