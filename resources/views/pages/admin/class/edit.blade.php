@extends('layouts.dashboard')

@section('title')
    Edit Kelas
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.class.update', $class->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="teacher" class="form-label">Wali Kelas</label>
                                    <select name="teacher" id="teacher" class="form-select"
                                        data-placeholder="Pilih Wali Kelas">
                                        <option></option>
                                        @foreach ($teachers as $teacher)
                                            @if (!\App\Models\Department::where('user_id', $teacher->id)->first())
                                                <option value="{{ $teacher->id }}"
                                                    {{ $teacher->id === $class->user_id ? 'selected' : '' }}>
                                                    {{ $teacher->name }}</option>
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
                                            <option value="{{ $department->id }}"
                                                {{ $department->id === $class->department_id ? 'selected' : '' }}>
                                                {{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $class->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="level" class="form-label">Tingkat</label>
                                    <select name="level" id="level" class="form-select"
                                        data-placeholder="Pilih Tingkat">
                                        <option value="X" {{ $class->level == 'X' ? 'selected' : '' }}>X</option>
                                        <option value="XI" {{ $class->level == 'XI' ? 'selected' : '' }}>XI</option>
                                        <option value="XII" {{ $class->level == 'XII' ? 'selected' : '' }}>XII</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success float-end">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
