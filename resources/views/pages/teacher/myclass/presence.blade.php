@extends('layouts.dashboard')

@section('title', 'Absensi Siswa ' . $class->name)

@section('content')
    <a href="{{ route('teacher.myclass.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="class_id" value="{{ $class->id }}">
                        <div class="table-responsive">
                            <table class="table-hover table-striped table">
                                <thead class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Keterangan</th>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($students as $student)
                                        @php
                                            $checkPresence = \App\Models\StudentPresence::where('user_id', $student->id)
                                                ->whereDate('presence_date', date('Y-m-d'))
                                                ->pluck('status')
                                                ->first();
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->class->name }}</td>
                                            <td>
                                                @foreach ($status as $absen)
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @if ($absen == 'hadir') hadircuy @endif"
                                                            type="radio" name="absen[{{ $student->id }}]"
                                                            id="{{ $absen }}-{{ $student->name }}"
                                                            value="{{ $absen }}"
                                                            {{ $checkPresence === $absen ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="{{ $absen }}-{{ $student->name }}">
                                                            {{ Str::ucfirst($absen) }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex gap-2 float-end">
                                <button type="button" class="btn btn-outline-primary" onclick="hadirSemua()">Hadir
                                    semua</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function hadirSemua() {
            const radios = document.querySelectorAll('.hadircuy');
            radios.forEach(radio => {
                radio.checked = true;
            });
        }
    </script>
@endpush
