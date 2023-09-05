@extends('layouts.dashboard')

@section('title', 'Postingan Forum')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ !request('id') ? route('posts.store') : route('posts.update', $editPost->id) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf

                        @if (request('id'))
                            @method('put')
                            <input type="hidden" name="oldImage" value="{{ $editPost->image }}">
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ $editPost ? $editPost->title : null }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                            <textarea id="editor" name="body" id="body" cols="30"
                                class="form-control @error('body') is-invalid @enderror">{{ $editPost ? $editPost->body : null }}</textarea>
                            @error('body')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success float-end">Tambah Postingan Forum</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pembuat</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>
                                            @if ($item->status === '1')
                                                <span class="text-warning">Menunggu Persetujuan</span>
                                            @elseif ($item->status === '2')
                                                <span class="text-success">Disetujui</span>
                                            @else
                                                <span class="text-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end gap-2">
                                                @if (Auth::user()->role === 'admin')
                                                    @if ($item->status == '1')
                                                        <a href="{{ route('posts.approved', $item->id) }}"
                                                            class="btn btn-outline-success btn-sm">Setuju</a>
                                                        <a href="{{ route('posts.disapproved', $item->id) }}"
                                                            class="btn btn-outline-danger btn-sm">Tidak Setuju</a>
                                                    @endif
                                                @endif
                                                <a href="?id={{ $item->id }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('posts.delete', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
