<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            return view('pages.admin.dashboard');
        } elseif (Auth::user()->role === 'siswa') {
            return view('pages.student.dashboard');
        } elseif (Auth::user()->role === 'guru') {
            return view('pages.teacher.dashboard');
        }
    }
}
