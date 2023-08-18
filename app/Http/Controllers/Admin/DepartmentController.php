<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

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

        return back()->with('success', 'Data jurusan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $request->validate([
            'name' => 'required',
        ]);

        $department->teacher_id = $request->teacher;
        $department->name = $request->name;
        $department->update();

        return redirect()->route('admin.department.index')->with('success', 'Data jurusan berhasil diubah!');
    }

    public function delete($id)
    {
        Department::find($id)->delete();

        return back()->with('success', 'Data jurusan berhasil dihapus!');
    }

    public function deleteAll()
    {
        Schema::disableForeignKeyConstraints();
        Department::truncate();
        Schema::enableForeignKeyConstraints();

        return back()->with('success', 'Semua data berhasil dihapus!');
    }
}
