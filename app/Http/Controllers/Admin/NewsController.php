<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class NewsController extends Controller
{
    public function index()
    {
        $news = Post::where('type', 'news')->get();

        $editNews = [];
        if (request('id')) {
            $editNews = Post::find(request('id'));
        }

        $categories = Category::where('type', 'news')->orWhere('type', 'general')->get();

        return view('pages.admin.news.index', compact('news', 'categories', 'editNews'));
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
            $image->move(public_path('img/news_image'), $imageName);
            $validatedData['image'] = 'img/news_image/' . $imageName;
        }

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['slug'] = Str::slug($request->title) . '-' . time();
        $validatedData['type'] = "news";
        $validatedData['category_id'] = $request->category;
        $validatedData['status'] = '2';

        Post::create($validatedData);

        Alert::success('Berhasil!', 'Data berita berhasil ditambahkan!');

        return back();
    }

    public function update(Request $request, $id)
    {
        $news = Post::find($id);

        $validatedData = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);

        $validatedData['slug'] = Str::slug($request->title) . '-' . time();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/news_image'), $imageName);

            // hapus gambar lama
            if ($request->oldImage) {
                $oldImagePath = public_path($request->oldImage);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
            $validatedData['image'] = 'img/news_image/' . $imageName;
        }

        $news->update($validatedData);

        Alert::success('Berhasil!', 'Data berita berhasil diubah!');

        return redirect()->route('admin.news.index');
    }

    public function delete($id)
    {
        $news = Post::find($id);

        if ($news->image) {
            $delImage = public_path($news->image);
            if (File::exists($delImage)) {
                File::delete($delImage);
            }
        }

        $news->delete();

        Alert::success('Berhasil!', 'Data berita berhasil dihapus!');

        return back();
    }
}
