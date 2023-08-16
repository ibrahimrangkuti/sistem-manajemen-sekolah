<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->get();

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
            'password' => ['required', 'string', 'min:3'],
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

    public function edit($id)
    {
        $teacher = Teacher::find($id);

        return view('pages.admin.teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);

        $validatedData = $request->validate([
            'nik' => ['numeric', 'min:16', 'unique:teachers,nik,' . $id],
            'name' => ['string'],
            'email' => ['email', 'unique:teachers,email,' . $id],
            'phone' => ['numeric'],
            'address' => ['string'],
            'place_of_birth' => ['string'],
            'date_of_birth' => ['date']
        ]);

        $validatedData['gender'] = $request->gender;
        if ($request->password !== null) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            $validatedData['password'] = $teacher->password;
        }

        $teacher->update($validatedData);

        return redirect()->route('admin.teacher.index')->with('success', 'Data guru berhasil diubah!');
    }

    public function delete($id)
    {
        Teacher::find($id)->delete();

        return back()->with('success', 'Data guru berhasil dihapus!');
    }
}
