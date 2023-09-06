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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createNews">
                    Buat Berita
                </button>
                <!-- Modal Ganti Password -->
                <div class="modal fade" id="createNews" tabindex="-1" aria-labelledby="createNewsLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="createNewsLabel">Buat Berita
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.news.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label for="title" class="form-label">Judul</label>
                                                <input type="text" class="form-control" id="title" name="title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="image" class="form-label">Gambar</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="category" class="form-label">Kategori</label>
                                        <select name="category" id="category" class="form-control">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="body" class="form-label">Isi</label>
                                        <textarea id="editor" name="body" id="body" cols="30" class="form-control"></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            <form action="">
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari berita di sini">
            </form>
        </div>
        <div class="d-flex gap-3 mb-5 overflow-x-auto category">
            <a href="{{ route('news') }}"
                class="btn {{ !request('category') ? 'btn-primary' : 'btn-outline-primary' }} btn-sm">Semua</a>
            @foreach ($categories as $category)
                <a href="?category={{ $category->slug }}"
                    class="btn {{ request('category') == $category->slug ? 'btn-primary' : 'btn-outline-primary' }} btn-sm">{{ $category->name }}</a>
            @endforeach
        </div>
        <div class="row row-gap-3">
            @if ($news->count() > 0)
                @foreach ($news as $item)
                    <div class="col-md-4">
                        <div class="card box">
                            <img src="{{ $item->image ? asset($item->image) : asset('assets/img/no-img-placeholder.png') }}"
                                class="card-img-top object-fit-cover" height="280">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">{{ $item->title }}</h5>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">{{ $item->user->name }}</span>
                                    <span class="badge bg-success">{{ $item->category->name }}</span>
                                </div>
                                <p class="card-text">{!! Str::limit($item->body, 150) !!}</p>
                                <a href="{{ route('news.show', $item->slug) }}" class="btn btn-primary">Baca
                                    selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <span class="text-center">Berita tidak ditemukan!</span>
            @endif

        </div>
    </section>
@endsection
