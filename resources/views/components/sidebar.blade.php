<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                {{-- <a href="index.html"><img src="{{ asset('assets/img/logo-smk.png') }}" width="70"
                        height="70"></a> --}}
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <div class="d-flex d-md-none align-items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=John+Doe" alt="" class="rounded-circle w-25">
                    <div class="d-flex flex-column">
                        <a class="font-semibold">Ibrahim Rangkuti</a>
                        <span class="text-muted">Administrator</span>
                    </div>
                </div>
                <li class="sidebar-title">Master</li>

                <li class="sidebar-item active">
                    <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                        <ion-icon name="grid"></ion-icon>
                        <span>Dashboard</span>
                    </a>
                </li>
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
                    <a href="index.html" class='sidebar-link'>
                        <ion-icon name="body"></ion-icon>
                        <span>Ekstrakurikuler</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="index.html" class='sidebar-link'>
                        <ion-icon name="newspaper"></ion-icon>
                        <span>Berita</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="index.html" class='sidebar-link'>
                        <ion-icon name="bookmarks"></ion-icon>
                        <span>Postingan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="index.html" class='sidebar-link'>
                        <ion-icon name="mail"></ion-icon>
                        <span>Pesan</span>
                    </a>
                <li class="sidebar-item">
                    <a href="{{ route('admin.settings') }}" class='sidebar-link'>
                        <ion-icon name="cog"></ion-icon>
                        <span>Pengaturan</span>
                    </a>
                </li>

                {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Components</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="component-alert.html">Alert</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-badge.html">Badge</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-breadcrumb.html">Breadcrumb</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-button.html">Button</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-card.html">Card</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-carousel.html">Carousel</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-dropdown.html">Dropdown</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-list-group.html">List Group</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-modal.html">Modal</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-navs.html">Navs</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-pagination.html">Pagination</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-progress.html">Progress</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-spinner.html">Spinner</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-tooltip.html">Tooltip</a>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
