<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LessonController extends Controller
{
    public function index()
    {
        $lesson = [];
        if (request('id')) {
            $lesson = Lesson::find(request('id'));
        }

        $lessons = Lesson::latest()->get();

        return view('pages.admin.lesson.index', compact('lessons', 'lesson'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'unique:lessons,name']
        ]);

        Lesson::create($validatedData);

        Alert::success('Berhasil!', 'Data mata pelajaran berhasil ditambahkan!');

        return back();
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['string', 'unique:lessons,name,' . $id]
        ]);

        Lesson::find($id)->update($validatedData);

        Alert::success('Berhasil!', 'Data mata pelajaran berhasil diubah!');

        return redirect()->route('admin.lesson.index');
    }

    public function delete($id)
    {
        Lesson::find($id)->delete();

        Alert::success('Berhasil!', 'Data mata pelajaran berhasil dihapus!');

        return back();
    }
}
