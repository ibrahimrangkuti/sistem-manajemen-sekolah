@extends('layouts.dashboard')

@section('title', 'Profil')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('components.alert')
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="photo" class="form-label">Foto</label>
                                    <input type="file" name="photo" id="photo" class="form-control">
                                    <img id="previewPhoto" src="{{ asset(Auth::user()->photo) }}" alt="Preview"
                                        class="my-3 rounded-circle" width="80" height="80">
                                </div>
                            </div>
                            @if (Auth::user()->role == 'guru')
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="nik" class="form-label">NIK</label>
                                        <input type="number" name="nik" id="nik" class="form-control"
                                            value="{{ Auth::user()->nik }}" disabled>
                                    </div>
                                </div>
                            @elseif(Auth::user()->role == 'siswa')
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="nis" class="form-label">NIS</label>
                                        <input type="number" name="nis" id="nis" class="form-control"
                                            value="{{ Auth::user()->nis }}" disabled>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ Auth::user()->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ Auth::user()->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label">Telepon</label>
                                    <input type="number" name="phone" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ Auth::user()->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="place_of_birth" class="form-label">Tempat Lahir</label>
                                    <input type="text" name="place_of_birth" id="place_of_birth"
                                        class="form-control @error('place_of_birth') is-invalid @enderror"
                                        value="{{ Auth::user()->place_of_birth }}">
                                    @error('place_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="date_of_birth" id="date_of_birth"
                                        class="form-control @error('date_of_birth') is-invalid @enderror"
                                        value="{{ Auth::user()->date_of_birth }}">
                                    @error('date_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea name="address" id="address" cols="30" rows="3"
                                        class="form-control @error('address') is-invalid @enderror">{{ Auth::user()->address }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Ganti Password
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Password
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('changePassword') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <label for="old_password" class="form-label">Password
                                                        Lama</label>
                                                    <input type="password" name="old_password" id="old_password"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="new_password" class="form-label">Password
                                                        Baru</label>
                                                    <input type="password" name="new_password" id="new_password"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-end">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->role === 'siswa')
        <div class="row">
            <h3 class="mb-5">Data Orang Tua</h3>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{-- @include('components.alert') --}}
                        <span class="text-danger">* hanya bisa sekali mengisi data orang tua</span><br />
                        <span class="text-danger">* jika ada kesalahan dalam pengisian data silakan hubungi
                            admin.</span>
                        <form action="{{ route('parent.profile.update') }}" method="POST" class="mt-3">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="parent_nik" class="form-label">NIK</label>
                                        <input type="number" name="parent_nik" id="parent_nik" class="form-control"
                                            value="{{ $parent ? Auth::user()->parent->nik : null }}"
                                            {{ Auth::user()->parent ? 'disabled' : '' }}>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="parent_name" class="form-label">Nama</label>
                                        <input type="text" name="parent_name" id="parent_name"
                                            class="form-control @error('parent_name') is-invalid @enderror"
                                            value="{{ $parent ? Auth::user()->parent->name : null }}"
                                            {{ Auth::user()->parent ? 'disabled' : '' }}>
                                        @error('parent_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="parent_email" class="form-label">Email</label>
                                        <input type="email" name="parent_email" id="parent_email"
                                            class="form-control @error('parent_email') is-invalid @enderror"
                                            value="{{ $parent ? Auth::user()->parent->email : null }}"
                                            {{ Auth::user()->parent ? 'disabled' : '' }}>
                                        @error('parent_email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="parent_gender" class="form-label">Jenis Kelamin</label>
                                        <select name="parent_gender" id="parent_gender" class="form-control"
                                            {{ Auth::user()->parent ? 'disabled' : '' }}>
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="parent_phone" class="form-label">Telepon</label>
                                        <input type="number" name="parent_phone" id="parent_phone"
                                            class="form-control @error('parent_phone') is-invalid @enderror"
                                            value="{{ $parent ? Auth::user()->parent->phone : null }}"
                                            {{ Auth::user()->parent ? 'disabled' : '' }}>
                                        @error('parent_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="parent_place_of_birth" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="parent_place_of_birth" id="parent_place_of_birth"
                                            class="form-control @error('parent_place_of_birth') is-invalid @enderror"
                                            value="{{ $parent ? Auth::user()->parent->place_of_birth : null }}"
                                            {{ Auth::user()->parent ? 'disabled' : '' }}>
                                        @error('parent_place_of_birth')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="parent_date_of_birth" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="parent_date_of_birth" id="parent_date_of_birth"
                                            class="form-control @error('parent_date_of_birth') is-invalid @enderror"
                                            value="{{ $parent ? Auth::user()->parent->date_of_birth : null }}"
                                            {{ Auth::user()->parent ? 'disabled' : '' }}>
                                        @error('parent_date_of_birth')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="parent_address" class="form-label">Alamat</label>
                                        <textarea name="parent_address" id="parent_address" cols="30" rows="3"
                                            class="form-control @error('parent_address') is-invalid @enderror" {{ Auth::user()->parent ? 'disabled' : '' }}>{{ $parent ? Auth::user()->parent->address : null }}</textarea>
                                        @error('parent_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if (!Auth::user()->parent)
                                <button type="submit" class="btn btn-success float-end">Simpan</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#photo').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewPhoto').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(this.files[0]);
            });
        })
    </script>
@endpush
