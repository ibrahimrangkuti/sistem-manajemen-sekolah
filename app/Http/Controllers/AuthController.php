<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function processLogin(Request $request)
    {
        if ($request->nis !== null) {
            if (Auth::attempt($request->only('nis', 'password'))) {
                return redirect()->route('dashboard');
            } else {
                return back()->with('failed', 'NIS atau password salah!');
            }
        } elseif ($request->nik !== null) {
            if (Auth::attempt($request->only('nik', 'password'))) {
                return redirect()->route('dashboard');
            } else {
                return back()->with('failed', 'NIK atau password salah!');
            }
        } elseif ($request->email !== null) {
            if (Auth::attempt($request->only('email', 'password'))) {
                return redirect()->route('dashboard');
            } else {
                return back()->with('failed', 'Email atau password salah!');
            }
        }
    }
}
