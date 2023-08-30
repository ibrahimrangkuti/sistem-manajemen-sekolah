<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    // Home
    public function home()
    {
        $news = Post::whereType('news')->latest()->take(3)->get();

        return view('pages.home', compact('news'));
    }

    public function showNews($slug)
    {
        $post = Post::where('type', 'news')->where('slug', $slug)->first();

        return view('pages.post.show', compact('post'));
    }

    public function showForum($slug)
    {
        $post = Post::where('type', 'post')->where('slug', $slug)->first();

        return view('pages.post.show', compact('post'));
    }

    // public function addComentar(Request $request, $slug)
    // {
    //     $post = Post::where('slug', $slug)->first();
    //     CommentarForum::createa([
    //         'post_forum_id' => $post->id,
    //         'user_id' => Auth::user()->id,
    //         'body' => $request->body
    //     ]);

    //     return back();
    // }

    // Berita
    public function news()
    {
        $news = Post::whereType('news')->latest()->get();
        if (request('search')) {
            $news = Post::whereType('news')->where('title', 'like', '%' . request('search') . '%')->orWhere('body', 'like', '%' . request('search') . '%')->get();
        }

        return view('pages.news', compact('news'));
    }

    // Forum
    public function forum()
    {
        return view('pages.forum');
    }

    // Lowongan
    public function vacancy()
    {
        return view('pages.vacancy');
    }
}
