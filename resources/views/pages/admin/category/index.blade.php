@extends('layouts.dashboard')

@section('title', 'Kategori')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form
                        action="{{ !request('id') ? route('admin.category.store') : route('admin.category.update', $category->id) }}"
                        method="POST">
                        @csrf
                        @if (request('id'))
                            @method('put')
                        @endif
                        <div class="row">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $category ? $category->name : null }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <input type="text" name="description" id="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    value="{{ $category ? $category->description : null }}">
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="type" class="form-label">Tipe</label>
                                <select name="type" id="type"
                                    class="form-control @error('type') is-invalid @enderror">
                                    @if (request('id'))
                                        <option hidden value="{{ $category->type }}">
                                            @if ($category->type == 'news')
                                                Berita
                                            @elseif($category->type == 'post')
                                                Forum
                                            @elseif($category->type == 'general')
                                                Umum
                                            @endif
                                        </option>
                                    @endif
                                    <option value="general">Umum</option>
                                    <option value="post">Forum</option>
                                    <option value="news">Berita</option>
                                </select>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @if (request('id'))
                            <button type="submit" class="btn btn-success float-end">Simpan</button>
                        @else
                            <button type="submit" class="btn btn-success float-end">Tambah Kategori</button>
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
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Slug</th>
                                    <th>Deskripsi</th>
                                    <th>Tipe</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            @if ($category->type == 'news')
                                                Berita
                                            @elseif($category->type == 'post')
                                                Forum
                                            @elseif($category->type == 'general')
                                                Umum
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="?id={{ $category->id }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.category.delete', $category->id) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
@endsection
