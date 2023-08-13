<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function show()
    {
        return view('pages.vacancy.show');
    }
}
