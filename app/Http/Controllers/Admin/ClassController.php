<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::with('teacher')->get();

        return view('pages.admin.class.index', compact('classes'));
    }

    public function create()
    {
        $teachers = Teacher::all();

        return view('pages.admin.class.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'unique:classes,name'],
        ]);

        $validatedData['teacher_id'] = $request->teacher;
        $validatedData['level'] = $request->level;
        Classes::create($validatedData);

        return redirect()->route('admin.class.index')->with('success', 'Data kelas berhasil ditambahkan!');
    }
}
