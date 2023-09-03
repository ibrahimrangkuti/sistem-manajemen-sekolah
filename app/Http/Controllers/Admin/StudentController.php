<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use App\Exports\StudentsExport;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'siswa')->get();
        $classes = Classes::all();

        $maleCount = User::whereRole('siswa')->whereGender('L')->count();
        $femaleCount = User::whereRole('siswa')->whereGender('P')->count();

        confirmDelete('Hapus Siswa', 'Apakah anda yakin ingin menghapus data?');

        return view('pages.admin.student.index', compact('students', 'classes', 'maleCount', 'femaleCount'));
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

        Alert::success('Berhasil!', 'Data siswa berhasil ditambahkan!');

        return redirect()->route('admin.student.index');
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

        Alert::success('Berhasil!', 'Data siswa berhasil diubah!');

        return redirect()->route('admin.student.index');
    }

    public function delete($id)
    {
        User::where('role', 'siswa')->where('id', $id)->delete();

        Alert::success('Berhasil!', 'Data siswa berhasil dihapus!');
        return back();
    }

    public function deleteAll()
    {
        User::whereRole('siswa')->delete();

        Alert::success('Berhasil!', 'Semua data siswa berhasil dihapus!');
        return back();
    }

    public function deleteByClass(Request $request)
    {
        User::whereRole('siswa')->where('class_id', $request->class)->delete();

        Alert::success('Berhasil!', 'Semua data siswa kelas berhasil dihapus!');
        return back();
    }

    public function import(Request $request)
    {
        Excel::import(new StudentsImport, $request->file('file'));

        Alert::success('Berhasil!', 'Data siswa berhasil diimport!');
        return back();
    }

    public function export()
    {
        Alert::success('Berhasil!', 'Data siswa berhasil diexport!');
        return Excel::download(new StudentsExport, 'Data Siswa - ' . date('d-m-Y') . '.xlsx');
    }
}
