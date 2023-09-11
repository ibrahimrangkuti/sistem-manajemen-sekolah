@extends('layouts.dashboard')

@section('title')
    Kelas Saya
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Kelas</td>
                                <td class="col-8">{{ $class->name }}</td>
                            </tr>
                            <tr>
                                <td>Tingkat</td>
                                <td class="col-8">{{ $class->level }}</td>
                            </tr>
                            <tr>
                                <td>Wali Kelas</td>
                                <td class="col-8">{{ $class->teacher->name }}</td>
                            </tr>
                            <tr>
                                <td>Laki - Laki</td>
                                <td class="col-8">{{ $maleCount }} orang</td>
                            </tr>
                            <tr>
                                <td>Perempuan</td>
                                <td class="col-8">{{ $femaleCount }} orang</td>
                            </tr>
                            <tr class="fw-bold">
                                <td>Total Murid</td>
                                <td class="col-8">{{ $students->count() }} orang</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                        <h1 class="card-title">Anggota Kelas</h1>
                        <div>
                            <a href="{{ route('teacher.myclass.presence') }}" class="btn btn-success">Absensi</a>
                            <a href="{{ route('teacher.myclass.presenceHistory') }}" class="btn btn-outline-primary">Riwayat
                                Kehadiran</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Status</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td class="col-1">{{ $loop->iteration }}</td>
                                        <td>{{ $student->nis }} </td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->address }}</td>
                                        <td>{{ $student->place_of_birth }}</td>
                                        <td>{{ $student->date_of_birth }}</td>
                                        <td>{{ $student->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                                        {{-- <td class="col-1">
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
                                        </td> --}}
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
