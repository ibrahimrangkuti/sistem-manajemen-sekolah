<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\StudentPresence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MyClassController extends Controller
{
    public function index()
    {
        $class = Classes::where('user_id', Auth::user()->id)->first();
        $students = User::whereRole('siswa')->where('class_id', $class->id)->get();
        $maleCount = User::whereRole('siswa')->where('class_id', $class->id)->whereGender('L')->count();
        $femaleCount = User::whereRole('siswa')->where('class_id', $class->id)->whereGender('P')->count();

        return view('pages.teacher.myclass.index', compact('class', 'students', 'maleCount', 'femaleCount'));
    }

    public function presence()
    {
        $class = Classes::where('user_id', Auth::user()->id)->first();
        $students = User::whereRole('siswa')->where('class_id', $class->id)->get();
        $status = ["hadir", "sakit", "izin", "alpa"];

        return view('pages.teacher.myclass.presence', compact('class', 'students', 'status'));
    }

    public function storePresence(Request $request)
    {
        foreach ($request->absen as $userId => $status) {

            // store data to database or update if already exist using updateOrCreate
            StudentPresence::updateOrCreate(
                [
                    'class_id' => $request->class_id,
                    'user_id' => $userId,
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

    public function presenceHistory()
    {
        $class = Classes::where('user_id', Auth::user()->id)->first();
        $presences = [];
        if (request('date')) {
            $presences = StudentPresence::where('class_id', $class->id)->whereDate('presence_date', request('date'))->get();
        }

        return view('pages.teacher.myclass.presence-history', compact('presences'));
    }
}
