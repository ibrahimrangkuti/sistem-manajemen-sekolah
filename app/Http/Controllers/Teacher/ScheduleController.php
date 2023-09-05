<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Schedule;
use App\Models\StudentPresence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    public function currentDay()
    {
        $days = [
            0 => 'Minggu',
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
        ];
        $currentDayNumber = now()->dayOfWeek;
        $currentDay = $days[$currentDayNumber];

        return $currentDay;
    }

    public function index()
    {
        $days = [
            0 => 'Minggu',
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
        ];
        $currentDayNumber = now()->dayOfWeek;
        $currentDay = $days[$currentDayNumber];
        $currentTime = now()->format('H:i:s');

        $schedules = Schedule::where('user_id', Auth::user()->id)->latest()->get();

        $nowSchedule = Schedule::where('user_id', Auth::user()->id)->where('day', $currentDay)->where('start_time', '<=', $currentTime)->where('end_time', '>', $currentTime)->first();

        return view('pages.teacher.schedule.index', compact('schedules', 'nowSchedule', 'currentTime'));
    }

    public function absen($id)
    {
        $schedule = Schedule::with('lesson')->find($id);

        // check if today is not the schedule day
        if ($this->currentDay() != $schedule->day) {
            Alert::error('Gagal!', 'Hari ini bukan hari jadwal pelajaran!');
            return redirect()->route('teacher.schedule.index');
        }

        $status = ["hadir", "sakit", "izin", "alpa"];
        $class = Classes::find($schedule->class_id);
        $students = User::where('role', 'siswa')->where('class_id', $class->id)->get();
        // $statusPresences = StudentPresence::where('schedule_id', $id)->where('presence_date', date('Y-m-d'))->pluck('status');
        $studentPresence = StudentPresence::whereDate('presence_date', date('Y-m-d'))->pluck('status')->first();
        // dd($statusPresences);

        return view('pages.teacher.schedule.absen', compact('students', 'schedule', 'status'));
    }

    public function storeAbsen(Request $request, $id)
    {
        foreach ($request->absen as $userId => $status) {

            // store data to database or update if already exist using updateOrCreate
            StudentPresence::updateOrCreate(
                [
                    'class_id' => $request->class_id,
                    'user_id' => $userId,
                    'schedule_id' => $id,
                    'presence_date' => date('Y-m-d'),
                ],
                [
                    'status' => $status
                ]
            );
        }

        Alert::success('Berhasil!', 'Data absensi berhasil ditambahkan!');
        return back();
    }
}
