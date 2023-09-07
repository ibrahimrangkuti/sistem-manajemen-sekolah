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
                                    <select name="teacher" id="teacher" class="form-select"
                                        data-placeholder="Pilih Wali Kelas">
                                        <option></option>
                                        @foreach ($teachers as $teacher)
                                            @if (
                                                !\App\Models\Department::where('user_id', $teacher->id)->first() &&
                                                    !\App\Models\Classes::where('user_id', $teacher->id)->first())
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="department" class="form-label">Jurusan</label>
                                    <select name="department" id="department" class="form-select"
                                        data-placeholder="Pilih Jurusan">
                                        <option></option>
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
                                    <select name="level" id="level" class="form-select"
                                        data-placeholder="Pilih Tingkat">
                                        <option></option>
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
