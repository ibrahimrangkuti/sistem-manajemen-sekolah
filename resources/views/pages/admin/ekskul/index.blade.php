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
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if (!request('id'))
                            <button type="submit" class="btn btn-success float-end">Tambah Mata Pelajaran</button>
                        @else
                            <button type="submit" class="btn btn-success float-end">Simpan</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
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
