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
        try {
            
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                if(auth()->user()->role == 'admin') {
                    return redirect('admin');
                }

                return redirect('/');
            }
            $validator['error'] = 'Your details are incorrect.';
            return redirect("login")->withErrors($validator);

        } catch (\Exception $e) {
            DB::rollBack();
            $validator['error'] = $e->getMessage();
            return back()->withErrors($validator);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
