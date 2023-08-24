@extends('layouts.dashboard')

@section('title')
    Jadwal Mengajar
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="card-title">Jadwal Sekarang</h1>
                        <div>Waktu Sekarang: <span id="clock"></span></div>
                    </div>
                    <div class="table-responsive">
                        @if ($nowSchedule)
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Mata Pelajaran</td>
                                        <td>{{ $nowSchedule->lesson->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>{{ $nowSchedule->class->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Hari</td>
                                        <td>{{ $nowSchedule?->day }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Mulai</td>
                                        <td>{{ $nowSchedule->start_time }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Selesai</td>
                                        <td>{{ $nowSchedule->end_time }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <span>Tidak ada jadwal</span>
                        @endif
                    </div>
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
                                    <th>No</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Hari</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $schedule->lesson->name }}</td>
                                        <td>{{ $schedule->class->name }}</td>
                                        <td>{{ $schedule->day }}</td>
                                        <td>{{ $schedule->start_time }}</td>
                                        <td>{{ $schedule->end_time }}</td>
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
