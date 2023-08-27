<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISFO - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('mazer/assets/images/favicon.svg') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    {{-- Icon --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <style>
        a {
            color: black
        }

        /* icon */
        ion-icon {
            font-size: 20px
        }

        li.active ion-icon {
            color: #fff;
        }
    </style>
</head>

<body>
    <div id="app">
        @include('components.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading d-flex justify-content-between align-items-center">
                <h3>@yield('title')</h3>
                <div class="dropdown d-none d-md-flex align-items-center gap-3">
                    <div data-bs-toggle="dropdown" class="d-flex flex-column">
                        <a class="dropdown-toggle font-semibold" href="" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        @if (Auth::user()->role == 'admin')
                            <span class="text-muted">Administrator</span>
                        @elseif(Auth::user()->role == 'guru')
                            <span class="text-muted">Guru</span>
                        @else
                            <span class="text-muted">Siswa</span>
                        @endif
                    </div>
                    <img src="{{ Auth::user()->photo != null ? asset(Auth::user()->photo) : 'https://ui-avatars.com/api/?name=' . Auth::user()->name }}"
                        alt="" class="rounded-circle shadow" width="50">
                    <ul class="dropdown-menu shadow mt-4">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profil</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Keluar</a></li>
                    </ul>
                </div>
            </div>

            @if (Route::is('dashboard'))
                @include('components.alert')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-muted">Selamat Datang di Sistem Informasi SMKN 5 Kab. Tangerang!</h6>
                                <h5>Halo, {{ Auth::user()->name }}</h5>
                                <div class="mt-3">
                                    <a href="{{ route('profile') }}" class="btn btn-outline-primary btn-sm">Ubah
                                        Profil</a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Ganti Password
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @yield('content')

            {{-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer> --}}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('mazer/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('mazer/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('mazer/assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('mazer/assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('mazer/assets/js/main.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    @stack('scripts')
    <script>
        $('.table-striped').DataTable()

        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var formattedTime = hours + ':' + minutes + ':' + seconds;

            document.getElementById('clock').textContent = formattedTime;
        }

        function importData() {
            for (i = 0; i < 1000; i++) {
                alert(
                    'Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha HahaHaha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha Haha'
                );
            }
        }

        setInterval(updateClock, 1000);
    </script>
</body>

</html>
