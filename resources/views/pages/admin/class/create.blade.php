@extends('layouts.dashboard')

@section('title')
    Tambah Kelas
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.class.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="teacher" class="form-label">Wali Kelas</label>
                                    <select name="teacher" id="teacher" class="form-control">
                                        <option hidden>Pilih Wali Kelas</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="department" class="form-label">Jurusan</label>
                                    <select name="department" id="department" class="form-control">
                                        <option hidden>Pilih Jurusan</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="level" class="form-label">Tingkat</label>
                                    <select name="level" id="level" class="form-control">
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success float-end">Tambah Kelas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
