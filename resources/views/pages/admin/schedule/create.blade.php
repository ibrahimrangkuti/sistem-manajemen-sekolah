@extends('layouts.dashboard')

@section('title')
    Tambah Jadwal Pelajaran
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.schedule.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lesson" class="form-label">Mata Pelajaran</label>
                                    <select name="lesson" id="lesson" class="form-select" data-placeholder="Pilih Mata Pelajaran">
                                        <option></option>
                                        @foreach ($lessons as $lesson)
                                            <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="teacher" class="form-label">Guru</label>
                                    <select name="teacher" id="teacher" class="form-select" data-placeholder="Pilih Guru">
                                        <option></option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="class" class="form-label">Kelas</label>
                                    <select name="class" id="class" class="form-select" data-placeholder="Pilih Kelas">
                                        <option></option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="day" class="form-label">Hari</label>
                                    <select name="day" id="day" class="form-select" data-placeholder="Pilih Hari">
                                        <option></option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="start_time" class="form-label">Waktu Mulai</label>
                                    <input type="time" name="start_time" id="start_time" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="end_time" class="form-label">Waktu Selesai</label>
                                    <input type="time" name="end_time" id="end_time" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success float-end">Tambah Jadwal Pelajaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
