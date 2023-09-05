@extends('layouts.dashboard')

@section('title')
    Ekstrakurikuler
@endsection

@section('content')
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('components.alert')
                    <form
                        action="{{ !request('id') ? route('admin.lesson.store') : route('admin.lesson.update', $lesson->id) }}"
                        method="POST">
                        @csrf
                        @if (request('id'))
                            @method('put')
                        @endif
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ $lesson ? $lesson->name : null }}">
                            @error('name')
                                <spa{{ n cl }}ass="text-danger">{{ $message }}</spa>
                            @enderror
                        </div>
                        @if (!request('id'))
                            <button {{ type }}="submit" class="btn btn-success float-end">Tambah Mata Pelajaran</button>
                        @else
                            <button type="submit" class="btn btn-success float-end">Simpan</button>
                        @endif
                    </form>{{  }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form
                        action="{{ !request('id') ? route('admin.ekskul.store') : route('admin.ekskul.update', $ekskul->id) }}"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="teacher" class="form-label">Pembina</label>
                                    <select name="teacher" id="teacher" class="form-control">
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"
                                                {{ $ekskul ? ($teacher->id == $ekskul->user_id ? 'selected' : '') : null }}>
                                                {{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $ekskul ? $ekskul->name : null }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="instagram" class="form-label">Instagram</label>
                                    <input type="text" name="instagram" id="instagram" class="form-control"
                                        value="{{ $ekskul ? $ekskul->instagram_link : null }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tiktok" class="form-label">Tiktok</label>
                                    <input type="text" name="tiktok" id="tiktok" class="form-control"
                                        value="{{ $ekskul ? $ekskul->tiktok_link : null }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="youtube" class="form-label">Youtube</label>
                                    <input type="text" name="youtube" id="youtube" class="form-control"
                                        value="{{ $ekskul ? $ekskul->youtube_link : null }}">
                                </div>
                            </div>
                        </div>
                        @if (request('id'))
                            <button type="submit" class="btn btn-success float-end">Simpan</button>
                        @else
                            <button type="submit" class="btn btn-success float-end">Tambah Data Ekstrakurikuler</button>
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
                                    <th>Pembina</th>
                                    <th>Nama</th>
                                    <th>Instagram</th>
                                    <th>Tiktok</th>
                                    <th>Youtube</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ekskuls as $ekskul)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ekskul->teacher->name }}</td>
                                        <td>{{ $ekskul->name }}</td>
                                        <td>{{ $ekskul->instagram_link }}</td>
                                        <td>{{ $ekskul->tiktok_link }}</td>
                                        <td>{{ $ekskul->youtube_link }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="?id={{ $ekskul->id }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.ekskul.delete', $ekskul->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah kamu yakin ingin menghapus?')">Hapus</button>
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
