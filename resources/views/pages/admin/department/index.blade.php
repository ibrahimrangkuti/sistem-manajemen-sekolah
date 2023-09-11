@extends('layouts.dashboard')

@section('title')
    Jurusan
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form
                        action="{{ !request()->id ? route('admin.department.store') : route('admin.department.update', $department->id) }}"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" class="form-control" id="logo" name="logo" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nama Jurusan</label>
                                    <input type="text" class="form-control @error('name') @enderror" id="name"
                                        name="name" value="{{ $department ? $department->name : '' }}" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="teacher" class="form-label">Kepala Jurusan</label>
                                    <select name="teacher" id="teacher" class="form-select"
                                        data-placeholder="Pilih Kepala Jurusan">
                                        <option></option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"
                                                {{ $department ? ($teacher->id === $department->teacher_id ? 'selected' : '') : null }}>
                                                {{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if (!request()->id)
                            <button type="submit" class="btn btn-success float-end">Tambah Jurusan</button>
                        @else
                            <button type="submit" class="btn btn-success float-end">Simpan</button>
                        @endif
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
                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kepala Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td class="col-1">{{ $loop->iteration }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->teacher->name ?? 'None' }}</td>
                                        <td class="col-1">
                                            <div class="d-flex gap-2">
                                                <a href="?id={{ $department->id }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.department.delete', $department->id) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
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
