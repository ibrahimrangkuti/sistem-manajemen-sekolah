<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    // Home
    public function home()
    {
        $news = Post::whereType('news')->latest()->take(3)->get();
        // dd(Auth::user());

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
        $categories = Category::where('type', 'post')->orWhere('type', 'general')->get();
        $posts = Post::filter()->whereType('post')->whereStatus('2')->paginate(20);

        if (request()->has('category')) {
            $posts = Post::filter()->whereType('post')->whereStatus('2')->where('category_id', request('category'))->paginate(20);
        }

        return view('pages.forum', compact('categories', 'posts'));
    }

    // Lowongan
    public function vacancy()
    {
        return view('pages.vacancy');
    }
}
