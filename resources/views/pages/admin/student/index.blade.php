@extends('layouts.dashboard')

@section('title')
    Siswa
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a href="{{ route('admin.student.create') }}" class="btn btn-success">Tambah Siswa</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                Import Data
            </button>
            <a href="{{ route('admin.student.delete-all') }}"
                onclick="return confirm('Apakah kamu yakin ingin menghapus semua data?')" class="btn btn-outline-danger">Hapus
                Semua
                Data</a>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Hapus Berdasarkan Kelas
            </button>
            {{-- <button onclick="importData()" class="btn btn-primary">Import Data</button> --}}

            <!-- Modal -->
            <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Import Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.student.import') }}" method="POST" enctype="multipart/form-data">
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

            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Berdasarkan Kelas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.student.delete-by-class') }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                <select name="class" id="class" class="form-control">
                                    @foreach ($classes as $class)
                                        @if (\App\Models\User::whereRole('siswa')->where('class_id', $class->id)->count() > 0)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit"
                                    onclick="return confirm('Apakah kamu yakin ingin menghapus semua data?')"
                                    class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <span>Total <b>{{ \App\Models\User::whereRole('siswa')->count() }} siswa</b></span>
    </div>
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
                                    <th>NIS</th>
                                    <th>Kelas</th>
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
                                @foreach ($students as $student)
                                    <tr>
                                        <td class="col-1">{{ $loop->iteration }}</td>
                                        <td>{{ $student->nis }}</td>
                                        <td>{{ $student->class?->name }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->address }}</td>
                                        <td>{{ $student->place_of_birth }}</td>
                                        <td>{{ $student->date_of_birth }}</td>
                                        <td>{{ $student->status }}</td>
                                        <td class="col-1">
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.student.edit', $student->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.student.delete', $student->id) }}"
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
