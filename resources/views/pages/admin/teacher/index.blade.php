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
                                        <td>{{ $loop->iteration }}</td>
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
                                        <td>
                                            <a href="">Hapus</a>
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

@push('script')
    <script>
        let table;
        $(function() {
            table = $('.table').DataTable()
        });
    </script>
@endpush
