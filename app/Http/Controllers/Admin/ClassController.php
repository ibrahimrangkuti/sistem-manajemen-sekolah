<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::with('teacher')->latest()->get();

        confirmDelete('Hapus Kelas', 'Apakah anda yakin ingin menghapus data?');

        return view('pages.admin.class.index', compact('classes'));
    }

    public function create()
    {
        $teachers = User::where('role', 'guru')->get();
        $departments = Department::all();

        return view('pages.admin.class.create', compact('teachers', 'departments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'unique:classes,name'],
        ]);

        $validatedData['department_id'] = $request->department;
        $validatedData['user_id'] = $request->teacher;
        $validatedData['level'] = $request->level;
        Classes::create($validatedData);

        Alert::success('Berhasil!', 'Data kelas berhasil ditambahkan!');

        return redirect()->route('admin.class.index');
    }

    public function edit($id)
    {
        $class = Classes::find($id);
        $teachers = User::whereRole('guru')->get();
        $departments = Department::all();

        return view('pages.admin.class.edit', compact('class', 'teachers', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $class = Classes::find($id);

        $request->validate([
            'name' => 'required|string|unique:classes,name,' . $class->id,
        ]);

        $class->user_id = $request->teacher;
        $class->department_id = $request->department;
        $class->name = $request->name;
        $class->level = $request->level;
        $class->update();

        Alert::success('Berhasil!', 'Data kelas berhasil diubah!');

        return redirect()->route('admin.class.index');
    }

    public function delete($id)
    {
        $students = User::whereRole('siswa')->where('class_id', $id)->get();
        foreach ($students as $student) {
            $student->update(['class_id' => null]);
        }

        Classes::find($id)->delete();

        Alert::success('Berhasil!', 'Data kelas berhasil dihapus!');

        return back();
    }
}
