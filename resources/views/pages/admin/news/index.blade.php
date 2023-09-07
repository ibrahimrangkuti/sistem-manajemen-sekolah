@extends('layouts.dashboard')

@section('title', 'Berita')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
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
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ $editNews ? $editNews->title : null }}">
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
                            <select name="category" id="category" class="form-select" data-placeholder="Pilih Kategori">
                                <option></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="body" class="form-label">Isi</label>
                            <textarea id="editor" name="body" id="body" cols="30"
                                class="form-control @error('body') is-invalid @enderror">{{ $editNews ? $editNews->body : null }}</textarea>
                            @error('body')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    {{-- <th>Gambar</th> --}}
                                    <th>Pembuat</th>
                                    <th>Judul</th>
                                    <th>Dibuat pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td><img src="{{ asset($item->image) }}" alt="" class="img-fluid rounded"
                                                width="100"></td> --}}
                                        <td>{{ $item->user->name }}</td>
                                        <td><a href="{{ route('news.show', $item->slug) }}"
                                                target="_blank">{{ $item->title }}</a></td>
                                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
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
