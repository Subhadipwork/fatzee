<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {

            return redirect()->route('admin.dashboard');
        }
        return back()->withInput($request->only('email'))->withErrors(['email' => 'The provided credentials do not match our records.']);
    }


    public function logout()
    {

        auth()->logout();
        return redirect()->route('admin.login');
    }
}
