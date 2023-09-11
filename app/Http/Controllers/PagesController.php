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
        $comments = $post->comments()->latest()->get();

        return view('pages.post.show', compact('post', 'comments'));
    }

    // Berita
    public function news()
    {
        $news = Post::filter()->whereType('news')->latest()->paginate(18);
        $categories = Category::where('type', 'news')->orWhere('type', 'general')->get();

        if (request('category')) {
            $category = Category::where('slug', request('category'))->first();
            $news = Post::filter()->whereType('news')->where('category_id', $category->id)->paginate(18);
        }

        return view('pages.news', compact('news', 'categories'));
    }

    // Forum
    public function forum()
    {
        $categories = Category::where('type', 'post')->orWhere('type', 'general')->get();
        $posts = Post::filter()->whereType('post')->whereStatus('2')->paginate(20);

        if (request('category')) {
            $category = Category::where('slug', request('category'))->first();
            $posts = Post::filter()->whereType('post')->whereStatus('2')->where('category_id', $category->id)->paginate(20);
        }

        return view('pages.forum', compact('categories', 'posts'));
    }

    // Lowongan
    public function vacancy()
    {
        return view('pages.vacancy');
    }
}
