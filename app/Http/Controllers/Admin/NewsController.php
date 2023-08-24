<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();

        $editNews = [];
        if (request('id')) {
            $editNews = News::find(request('id'));
        }

        $administrator = User::whereRole('admin')->where('is_active', '1')->get();

        return view('pages.admin.news.index', compact('news', 'administrator', 'editNews'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/image'), $imageName);
            $validatedData['image'] = 'img/image/' . $imageName;
        }

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['slug'] = Str::slug($request->title);

        News::create($validatedData);

        return back()->with('success', 'Data berita berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $News =News::find($id);

        $validatedData = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/image'), $imageName);

            // hapus gambar lama
            if (isset($request->oldImage)) {
                $oldImagePath = public_path($request->oldImage);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
            $validatedData['image'] = 'img/image/' . $imageName;
        }

        $News->update($validatedData);

        return redirect()->route('admin.news.index')->with('success', 'Data berita berhasil diubah!');

    }

    public function delete($id)
    {
        $news = News::find($id);

        if ($news->image) {
            $delImage = public_path($news->image);
            if (File::exists($delImage)) {
                File::delete($delImage);
            }
        }

        $news->delete();

        return back()->with('success', 'Data berita berhasil dihapus!');
    }
}
