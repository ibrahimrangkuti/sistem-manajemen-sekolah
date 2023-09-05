@extends('layouts.app')

@section('content')
    <section id="forum" class="forum">
        <div class="container">
            <h1>Forum Diskusi</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae iusto officiis consectetur, sequi ad
                tenetur vel commodi voluptate voluptatem sint consequuntur praesentium esse! Libero fugit eum neque
                exercitationem aspernatur ex.</p>
            <form action="">
                <div class="input-group my-5">
                    <form method="GET">
                        <input type="text" class="form-control search-input" name="keyword" placeholder="Cari..."
                            value="{{ request('keyword') }}">
                        <button type="submit" class="btn btn-primary btn-none" id="button-addon2">Cari</button>
                    </form>
                </div>
            </form>
            <div class="d-flex gap-3 mb-5 overflow-x-auto category">
                <a href="{{ route('forum') }}"
                    class="btn {{ !request('category') ? 'btn-primary' : 'btn-outline-primary' }} btn-sm">Semua</a>
                @foreach ($categories as $category)
                    <a href="?category={{ $category->slug }}"
                        class="btn {{ request('category') == $category->slug ? 'btn-primary' : 'btn-outline-primary' }} btn-sm">{{ $category->name }}</a>
                @endforeach
            </div>
            <div class="row row-gap-3">
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ $post->user->photo != null ? asset($post->user->photo) : 'https://ui-avatars.com/api/?name=' . $post->user->name }}"
                                        alt="" class="rounded-circle mb-3" width="70" height="70">
                                    <h5 class="card-title text-truncate">{{ $post->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $post->user->name }}</h6>
                                    <p class="card-text text-secondary">{!! Str::limit($post->body) !!}</p>
                                    <a href="{{ route('forum.show', $post->slug) }}" class="card-link">Lanjut baca</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <span class="text-center">Postingan tidak ditemukan!</span>
                @endif
            </div>
        </div>
    </section>
@endsection
