<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Extracurricular;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $ekskuls = Extracurricular::all();
        $ekskul = [];
        if (request('id')) {
            $ekskul = Extracurricular::find(request('id'));
        }
        $teachers = User::whereRole('guru')->where('is_active', '1')->get();

        return view('pages.admin.ekskul.index', compact('ekskuls', 'teachers', 'ekskul'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'unique:extracurriculars,name']
        ]);

        $validatedData['user_id'] = $request->teacher;
        $validatedData['instagram_link'] = $request->instagram;
        $validatedData['tiktok_link'] = $request->tiktok;
        $validatedData['youtube_link'] = $request->youtube;
        Extracurricular::create($validatedData);

        Alert::success('Berhasil!', 'Data ekskul berhasil ditambahkan!');

        return redirect()->route('admin.ekskul.index');
    }

    public function update(Request $request, $id)
    {
        $ekskul = Extracurricular::find($id);
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'unique:extracurriculars,name,' . $id]
        ]);

        $validatedData['user_id'] = $request->teacher;
        $validatedData['instagram_link'] = $request->instagram;
        $validatedData['tiktok_link'] = $request->tiktok;
        $validatedData['youtube_link'] = $request->youtube;
        $ekskul->update($validatedData);

        Alert::success('Berhasil!', 'Data ekskul berhasil diubah!');

        return redirect()->route('admin.ekskul.index');
    }

    public function delete($id)
    {
        Extracurricular::find($id)->delete();

        Alert::success('Berhasil!', 'Data ekskul berhasil dihapus!');

        return redirect()->route('admin.ekskul.index');
    }
}
