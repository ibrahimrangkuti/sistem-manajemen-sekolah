@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row justify-content-center">
                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="{{ route('admin.class.index') }}">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon text-white" style="background-color: salmon">
                                                <ion-icon name="easel"></ion-icon>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Kelas</h6>
                                            <h6 class="font-extrabold mb-0">{{ \App\Models\Classes::count() }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="{{ route('admin.student.index') }}">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon bg-warning text-white">
                                                <ion-icon name="school"></ion-icon>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Siswa</h6>
                                            <h6 class="font-extrabold mb-0">
                                                {{ \App\Models\User::where('role', 'siswa')->count() }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="{{ route('admin.teacher.index') }}">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon bg-danger text-white">
                                                <ion-icon name="people"></ion-icon>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Guru</h6>
                                            <h6 class="font-extrabold mb-0">
                                                {{ \App\Models\User::where('role', 'guru')->count() }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="{{ route('admin.department.index') }}">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon bg-info text-white">
                                                <ion-icon name="grid"></ion-icon>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Jurusan</h6>
                                            <h6 class="font-extrabold mb-0">{{ App\Models\Department::count() }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="{{ route('admin.lesson.index') }}">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon bg-primary text-white">
                                                <ion-icon name="book"></ion-icon>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Mata Pelajaran</h6>
                                            <h6 class="font-extrabold mb-0">{{ \App\Models\Lesson::count() }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="{{ route('admin.schedule.index') }}">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon text-white" style="background-color: #84cc16">
                                                <ion-icon name="calendar"></ion-icon>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Jadwal Pelajaran</h6>
                                            <h6 class="font-extrabold mb-0">{{ App\Models\Schedule::count() }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="{{ route('admin.ekskul.index') }}">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon bg-success text-white">
                                                <ion-icon name="body"></ion-icon>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Ekstrakurikuler</h6>
                                            <h6 class="font-extrabold mb-0">{{ App\Models\Extracurricular::count() }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="{{ route('admin.news.index') }}">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple text-white">
                                                <ion-icon name="newspaper"></ion-icon>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Berita</h6>
                                            <h6 class="font-extrabold mb-0">
                                                {{ App\Models\Post::whereType('news')->count() }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon bg-secondary text-white">
                                            <ion-icon name="bookmarks"></ion-icon>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Postingan</h6>
                                        <h6 class="font-extrabold mb-0">
                                            {{ \App\Models\Post::whereType('forum')->count() }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon text-white" style="background-color: #f97316">
                                            <ion-icon name="briefcase"></ion-icon>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Lowongan</h6>
                                        <h6 class="font-extrabold mb-0">2000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon bg-dark text-white">
                                            <ion-icon name="mail"></ion-icon>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Pesan</h6>
                                        <h6 class="font-extrabold mb-0">2000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Kotak Pesan</h4>
                    </div>
                    <div class="card-content pb-4">
                        @if ($messages->count() > 0)
                            @foreach ($messages as $message)
                                <a href="{{ route('message.show', $message->slug) }}">
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="avatar avatar-lg">
                                            <img src="{{ asset('mazer/assets/images/faces/4.jpg') }}">
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">{{ Str::limit($message->sender->name, 10) }}</h5>
                                            <h6 class="text-muted mb-0">
                                                {{ $message->created_at->diffForHumans() }}
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            <div class="px-4">
                                <a href="{{ route('message.index') }}"
                                    class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Pesan
                                    lainnya</a>
                            </div>
                        @else
                            <span class="px-4">Tidak ada pesan</span>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
