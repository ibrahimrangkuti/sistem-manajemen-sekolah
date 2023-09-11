@extends('layouts.dashboard')

@section('title')
    Jadwal Pelajaran
@endsection

@section('content')
    <a href="{{ route('admin.schedule.create') }}" class="btn btn-success mb-3">Tambah Jadwal Pelajaran</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Guru Pengampu</th>
                                    <th>Kelas</th>
                                    <th>Hari</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $schedule->lesson->name }}</td>
                                        <td>{{ $schedule->teacher->name }}</td>
                                        <td>{{ $schedule->class->name }}</td>
                                        <td>{{ $schedule->day }}</td>
                                        <td>{{ $schedule->start_time }}</td>
                                        <td>{{ $schedule->end_time }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.schedule.edit', $schedule->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.schedule.delete', $schedule->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
