<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        $class = [];
        if ($request->id) {
            $class = Classes::find($request->id);
        }

        $classes = Classes::latest()->get();
        $teachers = User::where('role', 'guru')->get();
        $departments = Department::all();

        confirmDelete('Hapus Kelas', 'Apakah anda yakin ingin menghapus data?');

        return view('pages.admin.class.index', compact('classes', 'teachers', 'departments', 'class'));
    }

    public function detail($id)
    {
        $class = Classes::find($id);
        $students = User::where('class_id', $id)->get();
        $maleCount = User::where('class_id', $id)->whereGender('L')->count();
        $femaleCount = User::where('class_id', $id)->whereGender('P')->count();

        return view('pages.admin.class.detail', compact('class', 'students', 'maleCount', 'femaleCount'));
    }

    // public function create()
    // {
    //     $teachers = User::where('role', 'guru')->get();
    //     $departments = Department::all();

    //     return view('pages.admin.class.create', compact('teachers', 'departments'));
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'unique:classes,name'],
        ]);

        $cekWalas = Classes::where('user_id', $request->teacher)->first();
        if ($cekWalas) {
            Alert::error('Gagal!', 'Tidak bisa memilih guru tersebut!');
            return back();
        }

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
