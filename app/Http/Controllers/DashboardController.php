<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Schedule;
use App\Models\StudentPresence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        if (Auth::user()->role === 'admin') {
            return $this->DashboardAdmin();
        } elseif (Auth::user()->role === 'siswa') {
            return $this->DashboardSiswa();
        } elseif (Auth::user()->role === 'guru') {
            return $this->DashboardGuru();
        } elseif (Auth::user()->role === 'ortu') {
            return $this->DashboardOrtu();
        }
    }

    public function DashboardAdmin()
    {
        $messages = Message::where('receiver_id', Auth::user()->id)->take(5)->latest()->get();

        return view('pages.admin.dashboard', compact('messages'));
    }

    public function DashboardSiswa()
    {
        $currentDate = Carbon::now();
        $mondaySchedules = Schedule::where('class_id', Auth::user()->class_id)->where('day', 'Senin')->get();
        $tuesdaySchedules = Schedule::where('class_id', Auth::user()->class_id)->where('day', 'Selasa')->get();
        $wednesdaySchedules = Schedule::where('class_id', Auth::user()->class_id)->where('day', 'Rabu')->get();
        $thursdaySchedules = Schedule::where('class_id', Auth::user()->class_id)->where('day', 'Kamis')->get();
        $fridaySchedules = Schedule::where('class_id', Auth::user()->class_id)->where('day', 'Jumat')->get();
        return view('pages.student.dashboard', compact('currentDate', 'mondaySchedules', 'tuesdaySchedules', 'wednesdaySchedules', 'thursdaySchedules', 'fridaySchedules'));
    }

    public function DashboardGuru()
    {
        return view('pages.teacher.dashboard');
    }

    public function DashboardOrtu()
    {
        $todayPresence = StudentPresence::where('user_id', Auth::user()->student->id)->whereDate('presence_date', date('Y-m-d'))->first();

        // retrieve student attendance data with a vulnerability of 7 days
        if (request()->has('sort')) {
            $sortTime = '-' . request('sort') . ' days';
            $studentPresences = StudentPresence::where('user_id', Auth::user()->student->id)->whereDate('presence_date', '>=', date('Y-m-d', strtotime($sortTime)))->get();
        } else {
            $studentPresences = StudentPresence::where('user_id', Auth::user()->student->id)->whereDate('presence_date', '>=', date('Y-m-d', strtotime('-7 days')))->get();
        }

        return view('pages.parent.dashboard', compact('todayPresence', 'studentPresences'));
    }
}
