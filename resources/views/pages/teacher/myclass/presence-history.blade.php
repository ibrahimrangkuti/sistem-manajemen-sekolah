@extends('layouts.dashboard')

@section('title')
    Riwayat Kehadiran
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="GET">
                        <div class="d-flex gap-2">
                            <input type="date" name="date" id="date" class="form-control"
                                value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            <button class="btn btn-success float-end">Submit</button>
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
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Status Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($presences as $presence)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $presence->student->nis }}</td>
                                        <td>{{ $presence->student->name }}</td>
                                        <td>
                                            @if ($presence->status == 'hadir')
                                                <div class="badge bg-success">{{ Str::ucfirst($presence->status) }}</div>
                                            @elseif($presence->status == 'sakit')
                                                <div class="badge bg-warning">{{ Str::ucfirst($presence->status) }}</div>
                                            @elseif($presence->status == 'izin')
                                                <div class="badge bg-info">{{ Str::ucfirst($presence->status) }}</div>
                                            @elseif($presence->status == 'alpa')
                                                <div class="badge bg-danger">{{ Str::ucfirst($presence->status) }}</div>
                                            @endif
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
