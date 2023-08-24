@extends('layouts.dashboard')

@section('title', 'Berita')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('components.alert')
                    <form
                        action="{{ !request('id') ? route('admin.news.store') : route('admin.news.update', $editNews->id) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @if (request('id'))
                            @method('put')
                            <input type="hidden" value="{{ $editNews->image }}" name="oldImage">
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $editNews ? $editNews->title : null }}">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="author" class="form-label">Nama</label>
                                    <select name="author" id="author" class="form-control">
                                        @foreach ($administrator as $admin)
                                            @if ($editNews)
                                                <option value="{{ $editNews->user->id }}" selected>{{ $editNews->user->name }}</option>
                                            @endif

                                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group mb-3">
                            <label for="body" class="form-label">Isi</label>
                            <textarea id="editor" name="body" id="body" cols="30" class="form-control">{{ $editNews ? $editNews->body : null }}</textarea>
                        </div>

                        @if (request('id'))
                            <button type="submit" class="btn btn-success float-end">Simpan</button>
                        @else
                            <button type="submit" class="btn btn-success float-end">Tambah Berita</button>
                        @endif
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
                                    <th>Gambar</th>
                                    <th>Pembuat</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset($item->image) }}" alt=""
                                                class="img-fluid rounded"width="200"></td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="?id={{ $item->id }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.news.delete', $item->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Apakah kamu yakin ingin menghapus?')"
                                                        class="btn btn-danger btn-sm">Hapus</button>
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
