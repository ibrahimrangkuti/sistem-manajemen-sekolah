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
                        <table class="table table-striped table-boredered table-hover">
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
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $class->teacher->name }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->level }}</td>
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
