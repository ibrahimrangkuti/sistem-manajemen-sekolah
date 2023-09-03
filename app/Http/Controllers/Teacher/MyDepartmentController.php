<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyDepartmentController extends Controller
{
    public function index()
    {
        $classes = Classes::where('department_id', Auth::user()->department->id)->get();
        $getUser = User::whereRole('siswa')->whereIn('class_id', $classes->pluck('id'));

        // get data students in users table where role siswa and where class_id in array $classes->id
        $students = $getUser->get();

        $maleCount = User::whereRole('siswa')->whereIn('class_id', $classes->pluck('id'))->whereGender('L')->count();
        $femaleCount = User::whereRole('siswa')->whereIn('class_id', $classes->pluck('id'))->whereGender('P')->count();


        return view('pages.teacher.mydepartment.index', compact('students', 'maleCount', 'femaleCount'));
    }
}
