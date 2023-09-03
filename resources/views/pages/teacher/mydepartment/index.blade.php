@extends('layouts.dashboard')

@section('title', 'Jurusan Saya')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ Auth::user()->department->logo_path ? Auth::user()->logo_path : 'https://ui-avatars.com/api/?name=' . Auth::user()->department->name }}"
                                alt="" class="w-100 rounded-circle">
                        </div>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td>Nama Jurusan</td>
                                            <td>:</td>
                                            <td class="col-8">
                                                {{ Auth::user()->department->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Laki - Laki</td>
                                            <td>:</td>
                                            <td class="col-8">{{ $maleCount }} orang</td>
                                        </tr>
                                        <tr>
                                            <td>Perempuan</td>
                                            <td>:</td>
                                            <td class="col-8">{{ $femaleCount }} orang</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Total Murid</td>
                                            <td>:</td>
                                            <td class="fw-bold col-8">{{ $students->count() }} orang</td>
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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
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
