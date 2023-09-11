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
                            <tr>
                                <td>Status Kehadiran Hari Ini</td>
                                <td class="col-8 d-flex gap-2">
                                    {{ formattedDate(now()) }}
                                    @if ($presenceToday)
                                        <span class="badge bg-success">Hadir</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Hadir</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                        <h1 class="card-title">Riwayat Kehadiran</h1>
                    </div>
                    <form method="GET" class="d-flex gap-2 mb-3">
                        <select name="sort" id="sort" class="form-control">
                            <option value="7" {{ request('sort') === '7' ? 'selected' : '' }}>Seminggu terakhir
                            </option>
                            <option value="31" {{ request('sort') === '31' ? 'selected' : '' }}>Sebulan terakhir
                            </option>
                            <option value="365" {{ request('sort') === '365' ? 'selected' : '' }}>Setahun terakhir
                            </option>
                        </select>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Absen</th>
                                    <th>Jam</th>
                                    <th>Hari</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentPresences as $studentPresence)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $studentPresence->status === 'hadir' ? 'success' : 'warning' }}">
                                                {{ Str::ucfirst($studentPresence->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $studentPresence->created_at->format('H:i') }}</td>
                                        <td>{{ dayName($studentPresence->presence_date) }}</td>
                                        <td>{{ $studentPresence->created_at->format('d/m/Y') }}</td>
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
