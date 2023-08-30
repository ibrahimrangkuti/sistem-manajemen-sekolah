@extends('layouts.dashboard')

@section('title', 'Kategori')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('components.alert')
                    <form action="{{ route('admin.category.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <input type="text" name="description" id="description" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="type" class="form-label">Tipe</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="general">Umum</option>
                                    <option value="post">Forum</option>
                                    <option value="news">Berita</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success float-end">Tambah Kategori</button>
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
                                                Postingan
                                            @elseif($category->type == 'general')
                                                Umum
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-danger">Hapus</a>
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
