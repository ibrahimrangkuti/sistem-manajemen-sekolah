@extends('layouts.dashboard')

@section('title')
    Pengaturan
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('components.alert')
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="school_name" class="form-label">Nama Sekolah</label>
                                    <input type="text" name="school_name" id="school_name" class="form-control"
                                        value="{{ $setting->school_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="headmaster" class="form-label">Kepala Sekolah</label>
                                    <input type="text" name="headmaster" id="headmaster" class="form-control"
                                        value="{{ $setting->headmaster }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Telepon</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ $setting->phone }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea name="address" id="address" class="form-control" cols="30" rows="3">{{ $setting->address }}</textarea>
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
