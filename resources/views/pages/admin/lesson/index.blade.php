@extends('layouts.dashboard')

@section('title')
    Mata Pelajaran
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('components.alert')
                    <form
                        action="{{ !request('id') ? route('admin.lesson.store') : route('admin.lesson.update', $lesson->id) }}"
                        method="POST">
                        @csrf
                        @if (request('id'))
                            @method('put')
                        @endif
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ $lesson ? $lesson->name : null }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if (!request('id'))
                            <button type="submit" class="btn btn-success float-end">Tambah Mata Pelajaran</button>
                        @else
                            <button type="submit" class="btn btn-success float-end">Simpan</button>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lessons as $lesson)
                                    <tr>
                                        <td class="col-1">{{ $loop->iteration }}</td>
                                        <td>{{ $lesson->name }}</td>
                                        <td class="col-1">
                                            <div class="d-flex gap-2">
                                                <a href="?id={{ $lesson->id }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.lesson.delete', $lesson->id) }}"
                                                    method="POST">
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
@endsection
