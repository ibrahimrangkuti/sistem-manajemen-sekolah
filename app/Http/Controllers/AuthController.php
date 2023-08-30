<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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
        } elseif ($request->parent_phone !== null && $request->nis !== null ) {
            if(Auth::attempt($request->only('parent_phone', 'nis'))) {
                return redirect()->route('dashboard');
            } else {
                return back()->with('failed', 'Nomor telepon atau NIS');
            }
        }
    }

    public function forgotPassword()
    {
        return view('pages.auth.forgot-password');
    }

    public function processForgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function processResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
