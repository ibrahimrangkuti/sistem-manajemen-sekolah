<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        $administrator = User::whereRole('admin')->where('is_active', '1')->get();

        return view('pages.admin.news.index', compact('news', 'administrator'));
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

        $validatedData['user_id'] = $request->author;
        $validatedData['slug'] = Str::slug($request->title);

        News::create($validatedData);

        return back()->with('success', 'Data berita berhasil ditambahkan!');
    }

    public function delete($id)
    {
        News::find($id)->delete();

        return back()->with('success', 'Data berita berhasil dihapus!');
    }
}
