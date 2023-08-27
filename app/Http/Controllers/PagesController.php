<?php

namespace App\Http\Controllers;

use App\Models\CommentarForum;
use App\Models\News;
use App\Models\PostForum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    // Home
    public function home()
    {
        $news = News::latest()->take(3)->get();

        return view('pages.home', compact('news'));
    }

    public function showNews($slug)
    {
        $post = News::where('slug', $slug)->first();

        return view('pages.post.show', compact('post'));
    }

    public function showForum($slug)
    {
        $post = PostForum::where('slug', $slug)->first();

        return view('pages.post.show', compact('post'));
    }

    public function addComentar(Request $request, $slug)
    {
        $post = PostForum::where('slug', $slug)->first();
        CommentarForum::createa([
            'post_forum_id' => $post->id,
            'user_id' => Auth::user()->id,
            'body' => $request->body
        ]);

        return back();
    }

    // Berita
    public function news()
    {
        $news = News::latest()->get();
        if (request('search')) {
            $news = News::where('title', 'like', '%' . request('search') . '%')->orWhere('body', 'like', '%' . request('search') . '%')->get();
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
} { {
    }
}
