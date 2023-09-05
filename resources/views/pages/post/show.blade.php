@extends('layouts.app')

@section('content')
    <section id="post_detail" class="post-detail">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ $post->type == 'news' ? route('news') : route('forum') }}">{{ $post->type == 'news' ? 'Berita' : 'Forum' }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-md-12">
                    @if ($post->type == 'news')
                        <img src="{{ $post->image ? asset($post->image) : asset('assets/img/no-img-placeholder.png') }}"
                            alt="" class="w-100 rounded mt-3" height="400"
                            style="background-size: cover; object-fit: cover">
                    @endif
                    <h3 class="my-3">{{ $post->title }}</h3>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-secondary">{{ $post->user->name }}</span>
                        <span class="text-secondary">{{ $post->created_at->format('d/m/Y') }}</span>
                    </div>
                    <p>
                        {!! $post->body !!}
                    </p>
                    @if ($post->type == 'post')
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h5>Komentar</h5>
                                <div class="row">
                                    <form action="{{ route('forum.add-comentar', $post->slug) }}" method="POST">
                                        @csrf
                                        <textarea name="body" id="body" cols="30" rows="0" class="form-control mt-2"
                                            placeholder="Tulis komentar kamu di sini..."></textarea>
                                        <button type="submit" class="btn btn-success btn-sm float-end mt-3">Kirim</button>
                                    </form>
                                </div>
                                <div class="d-flex gap-3 mt-4">
                                    <div>
                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80"
                                            class="rounded-circle object-fit-cover" width="50" height="50">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="fw-semibold">Nama</h6>
                                            <span class="text-muted">2023-08-24</span>
                                        </div>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque eum
                                            repudiandae
                                            saepe. Magni, incidunt. Rerum laborum eum accusantium assumenda pariatur.
                                        </p>
                                        <div class="d-flex gap-3 mt-4">
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80"
                                                    class="rounded-circle object-fit-cover" width="50" height="50">
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="fw-semibold">Nama</h6>
                                                    <span class="text-muted">2023-08-24</span>
                                                </div>
                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque eum
                                                    repudiandae
                                                    saepe. Magni, incidunt. Rerum laborum eum accusantium assumenda
                                                    pariatur.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
@endsection
