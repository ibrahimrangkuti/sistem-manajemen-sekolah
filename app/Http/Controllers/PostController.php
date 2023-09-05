<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $posts = Post::whereType('post')->latest()->get();
        } else {
            $posts = Post::whereType('post')->where('user_id', Auth::user()->id)->latest()->get();
        }

        $editPost = [];
        if (request('id')) {
            $editPost = Post::find(request('id'));
        }

        $categories = Category::where('type', 'post')->orWhere('type', 'general')->get();

        return view('pages.post.index', compact('posts', 'editPost', 'categories'));
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
        $validatedData['category_id'] = $request->category;
        $validatedData['slug'] = Str::slug($request->title) . '-' . time();

        if (Auth::user()->role === 'admin') {
            $validatedData['status'] = 2;
        }

        Post::create($validatedData);

        return back()->with('success', 'Data postingan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $validatedData = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);

        $validatedData['slug'] = Str::slug($request->title) . '-' . time();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/post'), $imageName);

            // hapus gambar lama
            if (isset($request->oldImage)) {
                $oldImagePath = public_path($request->oldImage);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
            $validatedData['image'] = 'img/post/' . $imageName;
        }

        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'Data postingan berhasil diubah!');
    }

    public function approved($id)
    {
        $post = Post::findOrFail($id);
        $post->status = 2;
        $post->update();

        return back()->with('success', 'Data postingan disetujui!');
    }

    public function disapproved($id)
    {
        $post = Post::findOrFail($id);
        $post->status = 3;
        $post->update();

        return back()->with('success', 'Data postingan tidak disetujui!');
    }

    public function delete($id)
    {
        $post = Post::find($id);

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
