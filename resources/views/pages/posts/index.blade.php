@extends('layouts.dashboard')

@section('title', 'Postingan Forum')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @include('components.alert')
                <form action="" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="">
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
                        <textarea id="editor" name="body" id="body" cols="30" class="form-control"></textarea>
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
                                <th>Gambar</th>
                                <th>Pembuat</th>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postForum as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset( $item->image ) }}" alt="" class="img-fluid rounded" width="100">
                                    </td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @if ($item->status === '1')
                                            Menunggu Persetujuan
                                        @elseif ($item->status === '2')
                                            Disetujui
                                        @else
                                            Ditolak
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="">edit</a>
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
