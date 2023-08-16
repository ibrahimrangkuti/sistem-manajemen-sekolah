<nav class="navbar navbar-expand-lg py-3 py-md-4 sticky-top border-bottom">
    <div class="container">
        <div class="d-flex align-items-center gap-3">
            <img src="{{ asset($setting->logo_path) }}" alt="" width="40" height="60">
            <a class="navbar-brand" href="#">{{ $setting->school_name }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-4">
                <li class="nav-item">
                    <a class="nav-link" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/forum">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/lowongan">Lowongan</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/portal-orangtua">Portal Orangtua</a>
                </li>
                <a href="{{ url('/login') }}" class="btn btn-primary">Masuk</a>
            </ul>
        </div>
    </div>
</nav>
