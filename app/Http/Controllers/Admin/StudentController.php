<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::with('class')->where('role', 'siswa')->latest()->get();
        return view('pages.admin.student.index', compact('students'));
    }

    public function create()
    {
        $classes = Classes::all();
        $student = null;

        return view('pages.admin.student.form', compact('classes', 'student'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => ['required', 'numeric', 'min:8', 'unique:users,nis'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:3'],
            'gender' => ['required'],
            'phone' => ['numeric'],
            'address' => ['string'],
            'place_of_birth' => ['required', 'string'],
            'date_of_birth' => ['required', 'date']
        ]);

        $validatedData['class_id'] = $request->class;
        $validatedData['password'] = bcrypt($request->password);
        User::create($validatedData);

        return redirect()->route('admin.student.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $classes = Classes::all();
        $student = User::where('role', 'siswa')->where('id', $id)->first();

        return view('pages.admin.student.form', compact('classes', 'student'));
    }

    public function update(Request $request, $id)
    {
        $teacher = User::where('role', 'siswa')->where('id', $id)->first();

        $validatedData = $request->validate([
            'nis' => ['numeric', 'min:16', 'unique:users,nis,' . $id],
            'name' => ['string'],
            'email' => ['email', 'unique:users,email,' . $id],
            'phone' => ['numeric'],
            'address' => ['string'],
            'place_of_birth' => ['string'],
            'date_of_birth' => ['date']
        ]);

        $validatedData['class_id'] = $request->class;
        $validatedData['gender'] = $request->gender;
        if ($request->password !== null) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            $validatedData['password'] = $teacher->password;
        }

        $teacher->update($validatedData);

        return redirect()->route('admin.student.index')->with('success', 'Data siswa berhasil diubah!');
    }

    public function delete($id)
    {
        User::where('role', 'siswa')->where('id', $id)->delete();

        return back()->with('success', 'Data siswa berhasil dihapus!');
    }
}
