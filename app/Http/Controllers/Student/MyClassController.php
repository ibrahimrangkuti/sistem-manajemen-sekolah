<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentPresence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyClassController extends Controller
{
    public function index()
    {
        $class = Auth::user()->class;
        $students = User::whereRole('siswa')->where('class_id', $class->id)->get();
        $maleCount = User::whereRole('siswa')->where('class_id', $class->id)->whereGender('L')->count();
        $femaleCount = User::whereRole('siswa')->where('class_id', $class->id)->whereGender('P')->count();
        $presenceToday = StudentPresence::where('class_id', $class->id)->where('user_id', Auth::user()->id)->whereDate('presence_date', date('Y-m-d'))->first();
        $studentPresences = StudentPresence::where('class_id', $class->id)->where('user_id', Auth::user()->id)->get();

        // retrieve student attendance data with a vulnerability of 7 days
        if (request()->has('sort')) {
            $sortTime = '-' . request('sort') . ' days';
            $studentPresences = StudentPresence::where('user_id', Auth::user()->id)->whereDate('presence_date', '>=', date('Y-m-d', strtotime($sortTime)))->get();
        } else {
            $studentPresences = StudentPresence::where('user_id', Auth::user()->id)->whereDate('presence_date', '>=', date('Y-m-d', strtotime('-7 days')))->get();
        }

        return view('pages.student.myclass.index', compact('class', 'students', 'maleCount', 'femaleCount', 'presenceToday', 'studentPresences'));
    }
}
