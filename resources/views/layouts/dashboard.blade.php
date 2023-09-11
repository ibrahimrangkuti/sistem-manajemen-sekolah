<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISFO - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/bootstrap.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('mazer/assets/images/favicon.svg') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/css/dataTable.min.css') }}">

    {{-- Icon --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

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
    @include('sweetalert::alert')

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
                        @elseif(Auth::user()->role == 'siswa')
                            <span class="text-muted">Siswa</span>
                        @elseif(Auth::user()->role == 'ortu')
                            <span class="text-muted">Orang Tua</span>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-muted">Selamat Datang di Sistem Informasi SMKN 5 Kab. Tangerang!</h6>
                                <h5>Halo, {{ Auth::user()->name }}</h5>
                                <div class="mt-3">
                                    <a href="{{ route('profile') }}" class="btn btn-outline-primary btn-sm">Ubah
                                        Profil</a>
                                    {{-- Ganti password --}}
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Ganti Password
                                    </button>
                                    @include('components.modals.change-password')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @yield('content')

        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTable.min.js') }}"></script>
    <script src="{{ asset('mazer/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('mazer/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('mazer/assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $('#dataTable').DataTable()

        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var formattedTime = hours + ':' + minutes + ':' + seconds;

            document.getElementById('clock').textContent = formattedTime;
        }
        setInterval(updateClock, 1000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="{{ asset('assets/js/select2.min.js') }}"></script> --}}
    <script>
        $(document).ready(() => {
            $('.form-select').select2({
                theme: 'bootstrap-5',
                placeholder: $(this).data('placeholder'),
            })
        })
    </script>

    @stack('scripts')

</body>

</html>
