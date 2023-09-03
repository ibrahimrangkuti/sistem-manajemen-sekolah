@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="card-body">
                        <h4 class="card-title">Nama : {{ Auth::user()->student->name }}</h4>
                        <div class="card-text">
                            <p>NIS : {{ Auth::user()->student->nis }}</p>
                            <p>Kelas : {{ Auth::user()->student->class->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-md-12">
            @if (!$todayPresence)
                <div class="alert alert-danger">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="alert-heading">{{ Auth::user()->student->name }}</h4>
                            <p>Hari ini <b>{{ Auth::user()->student->name }}</b> belum absen kehadiran. Mohon diperhatikan
                            </p>
                        </div>
                        <ion-icon name="finger-print" size="large" class="d-none d-md-block"></ion-icon>
                    </div>
                    <hr />
                    <p class="mb-0">{{ dayName(date('Y-m-d')) }}, {{ date('d/m/Y') }}</p>
                </div>
            @else
                <div class="alert alert-success">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="alert-heading">{{ Auth::user()->student->name }}</h4>
                            <p>Hari ini {{ $todayPresence->status }}, absen pada jam
                                {{ $todayPresence->created_at->format('H:i') }}</p>
                        </div>
                        <ion-icon name="finger-print" size="large" class="d-none d-md-block"></ion-icon>
                    </div>
                    <hr />
                    <p class="mb-0">{{ dayName(date('Y-m-d')) }}, {{ date('d/m/Y') }}</p>
                </div>
            @endif
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Riwayat Kehadiran</h4>
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
                                    <th>Nama</th>
                                    <th>Kelas</th>
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
                                        <td>{{ Auth::user()->student->name }}</td>
                                        <td>{{ Auth::user()->student->class->name }}</td>
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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Anak</h4>
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <img src="{{ Auth::user()->student->photo ? Auth::user()->student->photo : 'https://ui-avatars.com/api/?name=' . Auth::user()->student->name }}"
                                alt="" class="w-100">
                        </div>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td class="col-8">{{ Auth::user()->student->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>NIS</td>
                                            <td>:</td>
                                            <td class="col-8">{{ Auth::user()->student->nis }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>:</td>
                                            <td class="col-8">{{ Auth::user()->student->class->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat, Tanggal Lahir</td>
                                            <td>:</td>
                                            <td class="col-8">{{ Auth::user()->student->place_of_birth }},
                                                {{ \Carbon\Carbon::parse(Auth::user()->student->date_of_birth)->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td class="col-8">{{ Auth::user()->student->gender }}</td>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td>:</td>
                                            <td class="col-8">
                                                {{ Auth::user()->student->phone ? Auth::user()->student->phone : '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td class="col-8">
                                                {{ Auth::user()->student->email ? Auth::user()->student->email : '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td class="col-8">
                                                {{ Auth::user()->student->address ? Auth::user()->student->address : '-' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
