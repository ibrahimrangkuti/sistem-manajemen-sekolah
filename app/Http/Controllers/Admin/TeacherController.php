<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();

        return view('pages.admin.teacher.index', compact('teachers'));
    }

    public function create()
    {
        return view('pages.admin.teacher.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => ['required', 'numeric', 'min:16', 'unique:teachers,nik'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:teachers,email'],
            'password' => ['required', 'string'],
            'gender' => ['required'],
            'phone' => ['numeric'],
            'address' => ['string'],
            'place_of_birth' => ['required', 'string'],
            'date_of_birth' => ['required', 'date']
        ]);

        $validatedData['password'] = bcrypt($request->password);
        Teacher::create($validatedData);

        return redirect()->route('admin.teacher.index')->with('success', 'Data guru berhasil ditambahkan!');
    }
}
