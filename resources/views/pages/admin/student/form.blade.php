@extends('layouts.dashboard')

@section('title')
    {{ $student ? 'Edit Siswa' : 'Tambah Siswa' }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form
                        action="{{ !$student ? route('admin.student.store') : route('admin.student.update', $student->id) }}"
                        method="POST">
                        @csrf
                        @if ($student)
                            @method('put')
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="number" name="nis" id="nis"
                                        class="form-control @error('nis') is-invalid @enderror"
                                        value="{{ $student ? $student->nis : null }}">
                                    @error('nis')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="photo" class="form-label">Foto</label>
                                    <input type="file" name="photo" id="photo" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $student ? $student->name : null }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="class" class="form-label">Kelas</label>
                                    <select name="class" id="class" class="form-control">
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}"
                                                {{ $student ? ($student->class_id === $class->id ? 'selected' : '') : null }}>
                                                {{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $student ? $student->email : null }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="L"
                                            {{ $student ? ($student->gender === 'L' ? 'selected' : '') : null }}>L</option>
                                        <option value="P"
                                            {{ $student ? ($student->gender === 'P' ? 'selected' : '') : null }}>P</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label">Telepon</label>
                                    <input type="number" name="phone" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ $student ? $student->phone : null }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea name="address" id="address" cols="30" rows="3"
                                        class="form-control @error('address') is-invalid @enderror">{{ $student ? $student->address : null }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="place_of_birth" class="form-label">Tempat Lahir</label>
                                    <input type="text" name="place_of_birth" id="place_of_birth"
                                        class="form-control @error('place_of_birth') is-invalid @enderror"
                                        value="{{ $student ? $student->place_of_birth : null }}">
                                    @error('place_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="date_of_birth" id="date_of_birth"
                                        class="form-control @error('place_of_birth') is-invalid @enderror"
                                        value="{{ $student ? $student->date_of_birth : null }}">
                                    @error('date_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if (!$student)
                            <button type="submit" class="btn btn-success float-end">Tambah Siswa</button>
                        @else
                            <button type="submit" class="btn btn-success float-end">Simpan</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
