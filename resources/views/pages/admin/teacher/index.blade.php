@extends('layouts.dashboard')

@section('title')
    Guru
@endsection

@section('content')
    <div>
        <a href="{{ route('admin.teacher.create') }}" class="btn btn-success">Tambah Guru</a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importTeacherData">
            Import Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="importTeacherData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Import Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.teacher.import') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <input type="file" name="file" id="file" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
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
                        <table class="table table-striped table-boredered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
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
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->gender }}</td>
                                        <td>{{ $teacher->phone }}</td>
                                        <td>{{ $teacher->address }}</td>
                                        <td>{{ $teacher->place_of_birth }}</td>
                                        <td>{{ $teacher->date_of_birth }}</td>
                                        <td>{{ $teacher->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                                        <td class="col-1">
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.teacher.edit', $teacher->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <a href="{{ route('admin.teacher.delete', $teacher->id) }}"
                                                    class="btn btn-danger btn-sm" data-confirm-delete="true">Hapus</a>
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
