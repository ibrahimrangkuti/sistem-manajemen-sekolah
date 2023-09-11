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
                                    <form action="{{ route('posts.add-comment', $post->id) }}" method="POST">
                                        @csrf
                                        <textarea name="body" id="body" cols="30" rows="0" class="form-control mt-2"
                                            placeholder="Tulis komentar kamu di sini..."></textarea>
                                        <button type="submit" class="btn btn-success btn-sm float-end mt-3">Kirim</button>
                                    </form>
                                </div>
                                @foreach ($comments as $comment)
                                    <div class="d-flex gap-3 mt-4">
                                        <div>
                                            <img src="{{ $comment->user->photo ? $comment->user->photo : 'https://ui-avatars.com/api/?name=' . $comment->user->name }}"
                                                class="rounded-circle object-fit-cover" width="50" height="50">
                                        </div>
                                        <div class="w-100">
                                            <div class="d-flex gap-2">
                                                <h6 class="fw-semibold">{{ $comment->user->name }}</h6>
                                                <span class="text-muted">{{ $comment->created_at->format('d-m-Y') }}</span>
                                            </div>
                                            <p>{{ $comment->body }}</p>
                                            <a href="javascript:void(0)" class="reply-comment">Balas</a>
                                            <form action="{{ route('posts.add-subcomment', $comment->id) }}" method="POST"
                                                style="display: none" class="replyForm">
                                                @csrf
                                                <div class="form-group mt-2">
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="body" class="form-control"
                                                            placeholder="Tulis komentar kamu di sini..." />
                                                        <button class="btn btn-success btn-sm" type="submit"
                                                            id="button-addon2">Kirim</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @foreach ($comment->sub_comments as $sub_comment)
                                                <div class="d-flex gap-3 mt-4">
                                                    <div>
                                                        <img src="{{ $sub_comment->user->photo ? $sub_comment->user->photo : 'https://ui-avatars.com/api/?name=' . $sub_comment->user->name }}"
                                                            class="rounded-circle object-fit-cover" width="50"
                                                            height="50">
                                                    </div>
                                                    <div>
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="fw-semibold">{{ $sub_comment->user->name }}</h6>
                                                            <span
                                                                class="text-muted">{{ $sub_comment->created_at->format('d-m-Y') }}</span>
                                                        </div>
                                                        <p>{{ $sub_comment->body }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.reply-comment').click(function(e) {
                e.preventDefault();
                $(this).next('.replyForm').slideToggle();
            });
        });
    </script>
@endpush
