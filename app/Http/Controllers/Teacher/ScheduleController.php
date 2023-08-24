<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $days = [
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            7 => 'Minggu',
        ];
        $currentDayNumber = now()->dayOfWeek;
        $currentDay = $days[$currentDayNumber];
        $currentTime = now()->format('H:i:s');

        $schedules = Schedule::where('user_id', Auth::user()->id)->latest()->get();

        $nowSchedule = Schedule::where('user_id', Auth::user()->id)->where('day', $currentDay)->where('start_time', '<=', $currentTime)->where('end_time', '>', $currentTime)->first();

        return view('pages.teacher.schedule.index', compact('schedules', 'nowSchedule', 'currentTime'));
    }
}
