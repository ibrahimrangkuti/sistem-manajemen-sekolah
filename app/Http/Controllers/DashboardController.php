<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            return view('pages.admin.dashboard');
        } elseif (Auth::user()->role === 'siswa') {
            // dd(Auth::user()->parent);
            $currentDate = Carbon::now();
            $mondaySchedules = Schedule::where('class_id', Auth::user()->class_id)->where('day', 'Senin')->get();
            $tuesdaySchedules = Schedule::where('class_id', Auth::user()->class_id)->where('day', 'Selasa')->get();
            $wednesdaySchedules = Schedule::where('class_id', Auth::user()->class_id)->where('day', 'Rabu')->get();
            $thursdaySchedules = Schedule::where('class_id', Auth::user()->class_id)->where('day', 'Kamis')->get();
            $fridaySchedules = Schedule::where('class_id', Auth::user()->class_id)->where('day', 'Jumat')->get();
            return view('pages.student.dashboard', compact('currentDate', 'mondaySchedules', 'tuesdaySchedules', 'wednesdaySchedules', 'thursdaySchedules', 'fridaySchedules'));
        } elseif (Auth::user()->role === 'guru') {
            return view('pages.teacher.dashboard');
        } elseif (Auth::user()->role === 'ortu') {
            dd([
                'nama_anak' => Auth::user()->student->name,
                'nama_orangtua' => Auth::user()->name
            ]);
        }
    }
}
