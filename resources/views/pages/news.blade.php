@extends('layouts.app')

@section('content')
    <section class="container" id="posts">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Berita</li>
            </ol>
        </nav>

        <div class="py-3">
            <h1>Berita Terbaru</h1>
            <p>Terkait SMKN 5</p>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
            @if (Auth::check() && Auth::user()->role == 'admin')
                <a href="{{ route('admin.news.index') }}" class="btn btn-success mb-3">Buat Berita</a>
            @endif
            <form action="">
                <input type="text" name="search" id="search" class="form-control" placeholder="Cari berita di sini">
            </form>
        </div>
        <div class="row row-gap-3">
            @foreach ($news as $item)
                <div class="col-md-4">
                    <div class="card box">
                        <img src="{{ $item->image ? asset($item->image) : asset('assets/img/no-img-placeholder.png') }}"
                            class="card-img-top object-fit-cover" height="280">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $item->title }}</h5>
                            <span class="text-muted">{{ $item->user->name }}</span>
                            <p class="card-text">{!! Str::limit($item->body, 150) !!}</p>
                            <a href="{{ route('news.show', $item->slug) }}" class="btn btn-primary">Baca selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection
