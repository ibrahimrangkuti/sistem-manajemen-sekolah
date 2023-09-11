<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <div class="d-flex d-md-none align-items-center gap-3">
                    <img src="{{ asset(Auth::user()->photo) }}" alt="" class="rounded-circle shadow w-25">
                    <div class="d-flex flex-column">
                        <a class="font-semibold">{{ Auth::user()->name }}</a>
                        <span class="text-muted">
                            @if (Auth::user()->role == 'admin')
                                Administrator
                            @elseif(Auth::user()->role == 'guru')
                                Guru
                            @elseif(Auth::user()->role == 'siswa')
                                Siswa
                            @endif
                        </span>
                    </div>
                </div>
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <ion-icon name="home"></ion-icon>
                        <span>Beranda Website</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <ion-icon name="grid"></ion-icon>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->role === 'admin')
                    <li class="sidebar-item">
                        <a href="{{ route('admin.class.index') }}" class='sidebar-link'>
                            <ion-icon name="easel"></ion-icon>
                            <span>Kelas</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.student.index') }}" class='sidebar-link'>
                            <ion-icon name="school"></ion-icon>
                            <span>Siswa</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.teacher.index') }}" class='sidebar-link'>
                            <ion-icon name="people"></ion-icon>
                            <span>Guru</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.department.index') }}" class='sidebar-link'>
                            <ion-icon name="grid"></ion-icon>
                            <span>Jurusan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.lesson.index') }}" class='sidebar-link'>
                            <ion-icon name="book"></ion-icon>
                            <span>Mata Pelajaran</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.schedule.index') }}" class='sidebar-link'>
                            <ion-icon name="calendar"></ion-icon>
                            <span>Jadwal Pelajaran</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="javascript:void(0)" onclick="return alert('Coming soon!')" class='sidebar-link'>
                            <ion-icon name="clipboard"></ion-icon>
                            <span>Tugas Harian</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.ekskul.index') }}" class='sidebar-link'>
                            <ion-icon name="body"></ion-icon>
                            <span>Ekstrakurikuler</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.category.index') }}" class='sidebar-link'>
                            <ion-icon name="bookmark"></ion-icon>
                            <span>Kategori</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.news.index') }}" class='sidebar-link'>
                            <ion-icon name="newspaper"></ion-icon>
                            <span>Berita</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.settings') }}" class='sidebar-link'>
                            <ion-icon name="cog"></ion-icon>
                            <span>Pengaturan Website</span>
                        </a>
                    </li>
                @elseif (Auth::user()->role === 'guru')
                    @if (\App\Models\Classes::where('user_id', Auth::user()->id)->count())
                        <li class="sidebar-item">
                            <a href="{{ route('teacher.myclass.index') }}" class='sidebar-link'>
                                <ion-icon name="easel"></ion-icon>
                                <span>Kelas Saya</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" onclick="return alert('Coming soon!')" class='sidebar-link'>
                                <ion-icon name="clipboard"></ion-icon>
                                <span>Tugas Harian</span>
                            </a>
                        </li>
                    @elseif (\App\Models\Department::where('user_id', Auth::user()->id)->count())
                        <li class="sidebar-item">
                            <a href="{{ route('teacher.mydepartment.index') }}" class='sidebar-link'>
                                <ion-icon name="grid"></ion-icon>
                                <span>Jurusan Saya</span>
                            </a>
                        </li>
                    @endif
                    <li class="sidebar-item">
                        <a href="{{ route('teacher.schedule.index') }}" class='sidebar-link'>
                            <ion-icon name="calendar"></ion-icon>
                            <span>Jadwal Mengajar</span>
                        </a>
                    </li>
                @elseif(Auth::user()->role === 'siswa')
                    <li class="sidebar-item">
                        <a href="{{ route('student.myclass.index') }}" class='sidebar-link'>
                            <ion-icon name="easel"></ion-icon>
                            <span>Kelas Saya</span>
                        </a>
                    </li>
                @elseif (Auth::user()->role !== 'ortu')
                @endif

                <li class="sidebar-item">
                    <a href="{{ route('posts.index') }}" class='sidebar-link'>
                        <ion-icon name="bookmarks"></ion-icon>
                        <span>Postingan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('message.index') }}" class='sidebar-link'>
                        <ion-icon name="mail"></ion-icon>
                        <span>Pesan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('profile') }}" class='sidebar-link'>
                        <ion-icon name="person-circle"></ion-icon>
                        <span>Profil</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('logout') }}" class='sidebar-link'>
                        <ion-icon name="log-out"></ion-icon>
                        <span>Keluar</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
