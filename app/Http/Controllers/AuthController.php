<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // dd($request->username);
 
        if (Auth::attempt($credentials)) {
            session(['username' => $request->username]);
            $request->session()->regenerate();
 
            return redirect()->intended('/dashboard');
        }
        
        Session::flash('status', 'error');
        Session::flash('message', 'Anda Gagal Login!');

        return redirect('/login');
    }

    public function logout() {
        Auth::logout();
        // $request->session->invalidate();
        // $request->session->regenerateToken();

        return redirect('/login');
    }
}
