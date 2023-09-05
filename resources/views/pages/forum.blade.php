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
                    <input type="text" class="form-control search-input" placeholder="Cari..."
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary btn-none" type="button" id="button-addon2">Cari</button>
                </div>
            </form>
            <div class="d-flex gap-3 mb-5 overflow-x-auto category">
                <a href="" class="btn btn-outline-primary">Semua</a>
                @foreach ($categories as $category)
                    <a href="" class="btn btn-outline-primary">{{ $category->name }}</a>
                @endforeach
            </div>
            <div class="row row-gap-3">
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
            </div>
        </div>
    </section>
@endsection
