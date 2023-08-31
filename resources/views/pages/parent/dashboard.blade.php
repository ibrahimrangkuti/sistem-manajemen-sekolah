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
            <div class="alert alert-success">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="alert-heading">{{ Auth::user()->student->name }}</h4>
                        <p>Hari ini hadir, absen pada jam 08:00</p>
                    </div>
                    <ion-icon name="finger-print" size="large"></ion-icon>
                </div>
                <hr />
                <p class="mb-0">Senin, 20/08/2023</p>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Riwayat Kehadiran Minggu Ini</h4>
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
                                <tr>
                                    <td>1</td>
                                    <td>{{ Auth::user()->student->name }}</td>
                                    <td>{{ Auth::user()->student->class->name }}</td>
                                    <td>Hadir</td>
                                    <td>08:00</td>
                                    <td>Senin</td>
                                    <td>20/08/2023</td>
                                </tr>
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
                                            <td>{{ Auth::user()->student->email ? Auth::user()->student->email : '-' }}
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
