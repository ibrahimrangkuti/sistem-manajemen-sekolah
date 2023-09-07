<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\TeachersImport;
use App\Models\User;
use App\Models\Department;
use App\Models\Classes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::whereRole('guru')->latest()->get();

        confirmDelete('Hapus Guru', 'Apakah anda yakin ingin menghapus data?');

        return view('pages.admin.teacher.index', compact('teachers'));
    }

    public function create()
    {
        return view('pages.admin.teacher.create');
    }

    public function store(Request $request)
    {
        $faker = \Faker\Factory::create('id_ID');

        $validatedData = $request->validate([
            'nik' => ['required', 'numeric', 'min:16', 'unique:users,nik'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'gender' => ['required'],
        ]);

        $validatedData['place_of_birth'] = $faker->city;
        $validatedData['date_of_birth'] = $faker->dateTimeBetween('-50 years', '-25 years')->format('Y-m-d');
        $validatedData['phone'] = '08' . $faker->numerify('##########');
        $validatedData['address'] = $faker->address();
        $validatedData['role'] = 'guru';
        $validatedData['password'] = bcrypt($request->password);
        User::create($validatedData);

        Alert::success('Berhasil!', 'Data guru berhasil ditambahkan!');
        return redirect()->route('admin.teacher.create');
    }

    public function edit($id)
    {
        $teacher = User::whereRole('guru')->where('id', $id)->first();

        return view('pages.admin.teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = User::whereRole('guru')->where('id', $id)->first();

        $validatedData = $request->validate([
            'nik' => ['numeric', 'min:16', 'unique:users,nik,' . $id],
            'name' => ['string'],
            'email' => ['email', 'unique:users,email,' . $id],
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

        Alert::success('Berhasil!', 'Data guru berhasil diubah!');
        return redirect()->route('admin.teacher.index');
    }

    public function delete($id)
    {
        $user = User::whereRole('guru')->where('id', $id)->first();
        $checkDepartment = Department::where('user_id', $id)->first();
        $checkClass = Classes::where('user_id', $id)->first();

        if ($checkDepartment) {
            $checkDepartment->update(['user_id' => null]);
        }

        if ($checkClass) {
            $checkClass->update(['user_id' => null]);
        }

        $user->delete();

        Alert::success('Berhasil!', 'Data guru berhasil dihapus!');
        return back();
    }

    public function import(Request $request)
    {
        Excel::import(new TeachersImport, $request->file('file'));

        Alert::success('Berhasil!', 'Data guru berhasil diimport!');
        return back();
    }
}
