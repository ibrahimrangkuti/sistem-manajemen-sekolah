<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Lesson;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();

        return view('pages.admin.schedule.index', compact('schedules'));
    }

    public function create()
    {
        $lessons = Lesson::all();
        $teachers = User::whereRole('guru')->get();
        $classes = Classes::all();

        return view('pages.admin.schedule.create', compact('lessons', 'teachers', 'classes'));
    }

    public function store(Request $request)
    {
        $data = [
            'lesson_id' => $request->lesson,
            'user_id' => $request->teacher,
            'class_id' => $request->class,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ];

        Schedule::create($data);

        Alert::success('Berhasil!', 'Data jadwal pelajaran berhasil ditambahkan!');

        return redirect()->route('admin.schedule.index');
    }

    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $lessons = Lesson::all();
        $teachers = User::whereRole('guru')->get();
        $classes = Classes::all();

        return view('pages.admin.schedule.edit', compact('schedule', 'lessons', 'teachers', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);

        $data = [
            'lesson_id' => $request->lesson,
            'user_id' => $request->teacher,
            'class_id' => $request->class,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ];

        $schedule->update($data);

        Alert::success('Berhasil!', 'Data jadwal pelajaran berhasil diubah!');

        return redirect()->route('admin.schedule.index');
    }

    public function delete($id)
    {
        Schedule::find($id)->delete();

        Alert::success('Berhasil!', 'Data jadwal pelajaran berhasil dihapus!');

        return redirect()->route('admin.schedule.index');
    }
}
