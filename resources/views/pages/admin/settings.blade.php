@extends('layouts.dashboard')

@section('title', 'Pengaturan Website')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('components.alert')
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control">
                                    <img id="previewLogo" src="{{ asset($setting->logo_path) }}" alt="Preview"
                                        class="my-3" width="60" height="80">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="school_name" class="form-label">Nama Sekolah</label>
                                    <input type="text" name="school_name" id="school_name"
                                        class="form-control @error('school_name') is_invalid @enderror"
                                        value="{{ $setting->school_name }}">
                                    @error('school_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="headmaster" class="form-label">Kepala Sekolah</label>
                                    <input type="text" name="headmaster" id="headmaster"
                                        class="form-control @error('headmaster') is-invalid @enderror"
                                        value="{{ $setting->headmaster }}">
                                    @error('headmaster')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $setting->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Telepon</label>
                                    <input type="text" name="phone" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ $setting->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" cols="30"
                                        rows="3">{{ $setting->address }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#logo').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewLogo').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(this.files[0]);
            });
        })
    </script>
@endpush
