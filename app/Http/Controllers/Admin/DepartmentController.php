<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = [];
        if (request()->id) {
            $department = Department::find(request()->id);
        }

        $teachers = User::where('role', 'guru')->get();
        $departments = Department::with('teacher')->latest()->get();
        return view('pages.admin.department.index', compact('teachers', 'departments', 'department'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'teacher' => 'required'
        ]);

        $validatedData['user_id'] = $request->teacher;
        Department::create($validatedData);

        Alert::success('Berhasil!', 'Data jurusan berhasil ditambahkan!');

        return back();
    }

    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $request->validate([
            'name' => 'required',
        ]);

        $department->user_id = $request->teacher;
        $department->name = $request->name;
        $department->update();

        Alert::success('Berhasil!', 'Data jurusan berhasil diubah!');

        return redirect()->route('admin.department.index');
    }

    public function delete($id)
    {
        Department::find($id)->delete();

        Alert::success('Berhasil!', 'Data jurusan berhasil dihapus!');

        return back();
    }

    public function deleteAll()
    {
        Schema::disableForeignKeyConstraints();
        Department::truncate();
        Schema::enableForeignKeyConstraints();

        Alert::success('Berhasil!', 'Semua data berhasil dihapus!');

        return back()->with('success');
    }
}
