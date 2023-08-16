@extends('layouts.dashboard')

@section('title')
    Guru
@endsection

@section('content')
    <a href="{{ route('admin.teacher.create') }}" class="btn btn-success mb-3">Tambah Guru</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('components.alert')
                    <div class="table-responsive">
                        <table class="table table-striped table-boredered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td class="col-1">{{ $loop->iteration }}</td>
                                        <td>{{ $teacher->nik }}</td>
                                        <td>{{ $teacher->photo }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->gender }}</td>
                                        <td>{{ $teacher->phone }}</td>
                                        <td>{{ $teacher->address }}</td>
                                        <td>{{ $teacher->place_of_birth }}</td>
                                        <td>{{ $teacher->date_of_birth }}</td>
                                        <td>{{ $teacher->status }}</td>
                                        <td class="col-1">
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.teacher.edit', $teacher->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.teacher.delete', $teacher->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
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
