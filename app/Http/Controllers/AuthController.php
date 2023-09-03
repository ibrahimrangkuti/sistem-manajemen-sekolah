<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    function showWelcomeMessage()
    {
        return Alert::success('Halo, ' . Auth::user()->name, 'Selamat datang di Sistem Informasi SMKN 5 Kab. Tangerang!');
    }

    function showAlertError($message)
    {
        return Alert::error('Gagal!', $message);
    }

    public function processLogin(Request $request)
    {
        if ($request->nis !== null) {
            if (Auth::attempt($request->only('nis', 'password'))) {
                $this->showWelcomeMessage();
                return redirect()->route('dashboard');
            } else {
                $this->showAlertError('NIS atau password salah!');
                return back();
            }
        } elseif ($request->nik !== null) {
            if (Auth::attempt($request->only('nik', 'password'))) {
                $this->showWelcomeMessage();
                return redirect()->route('dashboard');
            } else {
                $this->showAlertError('NIK atau password salah!');
                return back();
            }
        } elseif ($request->email !== null) {
            if (Auth::attempt($request->only('email', 'password'))) {
                $this->showWelcomeMessage();
                return redirect()->route('dashboard');
            } else {
                $this->showAlertError('Email atau password salah!');
                return back();
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

    public function loginOrangTua(Request $request)
    {
        $parent = User::where('phone', $request->parent_phone)->first();
        if ($parent->isParent()) {
            $checkStudent = User::find($parent->student_id);
            if ($checkStudent->nis === $request->nis) {
                if (Auth::loginUsingId($parent->id)) {
                    $this->showWelcomeMessage();
                    return redirect()->route('dashboard');
                } else {
                    $this->showAlertError('No. HP atau NIS salah!');
                    return back();
                }
            } else {
                $this->showAlertError('No. HP atau NIS salah!');
                return back();
            }
        } else {
            $this->showAlertError('No. HP atau NIS salah!');
            return back();
        }
    }
}
