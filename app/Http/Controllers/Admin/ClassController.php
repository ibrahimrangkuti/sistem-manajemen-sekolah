<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::with('teacher')->latest()->get();

        return view('pages.admin.class.index', compact('classes'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $departments = Department::all();

        return view('pages.admin.class.create', compact('teachers', 'departments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'unique:classes,name'],
        ]);

        $validatedData['department_id'] = $request->department;
        $validatedData['teacher_id'] = $request->teacher;
        $validatedData['level'] = $request->level;
        Classes::create($validatedData);

        return redirect()->route('admin.class.index')->with('success', 'Data kelas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $class = Classes::find($id);
        $teachers = Teacher::all();
        $departments = Department::all();

        return view('pages.admin.class.edit', compact('class', 'teachers', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $class = Classes::find($id);

        $request->validate([
            'name' => 'required|string|unique:classes,name,' . $class->id,
        ]);

        $class->teacher_id = $request->teacher;
        $class->department_id = $request->department;
        $class->name = $request->name;
        $class->level = $request->level;
        $class->update();

        return redirect()->route('admin.class.index')->with('success', 'Data kelas berhasil diubah!');
    }

    public function delete($id)
    {
        Classes::find($id)->delete();

        return back()->with('success', 'Data kelas berhasil dihapus!');
    }
}
