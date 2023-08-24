<?php

namespace App\Http\Controllers;

use App\Models\PostForum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function show()
    {
        return view('pages.posts.show');
    }

    public function index()
    {
        if (Auth::user()->role === 'siswa') {
            $postForum = PostForum::where('user_id', Auth::user()->id)->latest()->get();
        } elseif (Auth::user()->role === 'guru') {
            $postForum = PostForum::where('user_id', Auth::user()->id)->latest()->get();
        } else {
            $postForum = PostForum::latest()->get();
        }

        return view('pages.posts.index', compact('postForum'));
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
            $image->move(public_path('img/post'), $imageName);
            $validatedData['image'] = 'img/post/' . $imageName;
        }

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['slug'] = Str::slug($request->title);

        if (Auth::user()->role === 'admin') {
            $validatedData['status'] = 2;
        }

        PostForum::create($validatedData);

        return back()->with('success', 'Data Postingan berhasil ditambahkan!');
    }

    public function delete($id)
    {
        $post = PostForum::find($id);

        if ($post->image) {
            $delImage = public_path($post->image);
            if (File::exists($delImage)) {
                File::delete($delImage);
            }
        }

        $post->delete();

        return back()->with('success', 'Data Postingan berhasil dihapus!');
    }
}
