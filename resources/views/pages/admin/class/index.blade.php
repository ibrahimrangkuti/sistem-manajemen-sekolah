@extends('layouts.dashboard')

@section('title')
    Kelas
@endsection

@section('content')
    <a href="{{ route('admin.class.create') }}" class="btn btn-success mb-3">Tambah Kelas</a>
    <div class="row">
        @include('components.alert')
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-boredered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Wali Kelas</th>
                                    <th>Nama</th>
                                    <th>Tingkat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classes as $class)
                                    <tr>
                                        <td class="col-1">{{ $loop->iteration }}</td>
                                        <td>{{ $class->teacher->name }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->level }}</td>
                                        <td class="col-1">
                                            <div class="d-flex align-items-center gap-3">
                                                <a href="{{ route('admin.class.edit', $class->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.class.delete', $class->id) }}" method="POST">
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
