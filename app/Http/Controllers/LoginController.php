<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function adminLogin()
    {
        return view('pages.auth.admin');
    }
}
