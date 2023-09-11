@extends('layouts.dashboard')

@section('title')
    Kelas
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ request('id') ? route('admin.class.update', $class->id) : route('admin.class.store') }}"
                        method="POST">
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
                                                    {{ $class ? ($teacher->id == $class->user_id ? 'selected' : '') : null }}>
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
                                                {{ $class ? ($department->id === $class->department_id ? 'selected' : '') : null }}>
                                                {{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $class ? $class->name : null }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="level" class="form-label">Tingkat</label>
                                    <select name="level" id="level" class="form-select"
                                        data-placeholder="Pilih Tingkat">
                                        <option></option>
                                        <option value="X"
                                            {{ $class ? ($class->level === 'X' ? 'selected' : '') : null }}>X</option>
                                        <option value="XI"
                                            {{ $class ? ($class->level === 'XI' ? 'selected' : '') : null }}>XI</option>
                                        <option value="XII"
                                            {{ $class ? ($class->level === 'XII' ? 'selected' : '') : null }}>XII</option>
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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-boredered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Wali Kelas</th>
                                    <th>Nama</th>
                                    <th>Tingkat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classes as $class)
                                    <tr>
                                        <td class="col-1">{{ $loop->iteration }}</td>
                                        <td>{{ $class->teacher?->name }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->level }}</td>
                                        <td class="col-1">
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{ route('admin.class.detail', $class->id) }}"
                                                    class="btn btn-info btn-sm">Detail</a>
                                                <a href="?id={{ $class->id }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.class.delete', $class->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        onclick="return confirm('Apakah kamu yakin ingin menghapus?')"
                                                        class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </div>
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
