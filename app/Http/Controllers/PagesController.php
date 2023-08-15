<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Home
    public function home()
    {
        return view('pages.home');
    }

    // Berita
    public function news()
    {
        return view('pages.news');
    }

    // Forum
    public function forum()
    {
        return view('pages.forum');
    }

    // Lowongan
    public function vacancy()
    {
        return view('pages.vacancy');
    }
}
