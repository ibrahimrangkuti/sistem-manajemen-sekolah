<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $ekskuls = Extracurricular::all();

        return view('pages.admin.ekskul.index', compact('ekskuls'));
    }
}
