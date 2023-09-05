@extends('layouts.app')

@section('content')
    <section id="hero" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span>Tiada Hari Tanpa Prestasi</span>
                    <h1 id="hero-title" class="mt-1"></h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum totam amet id sequi tempora
                        saepe
                        dolorum architecto, quod possimus ad enim qui nam pariatur temporibus, quos est laborum eligendi
                        laboriosam.</p>
                    <a href="{{ url('/login') }}" class="btn btn-primary">Masuk sebagai siswa</a>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/img/hero.svg') }}" alt="" class="w-100 d-none d-md-block">
                </div>
            </div>
        </div>
    </section>

    <section id="welcome" class="welcome">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3" data-aos="fade-right">
                    {{-- <img src="https://images.unsplash.com/flagged/photo-1571367034861-e6729ad9c2d5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=464&q=80"
                        alt="" class="img-fluid img-thumbnail"> --}}
                    <img src="{{ asset('assets/img/surta.png') }}" alt="" class="img-fluid w-100 rounded shadow-lg">
                </div>
                <div class="col-md-8" data-aos="fade-left">
                    <h1>Sambutan Kepala Sekolah</h1>
                    <p>Assalamu’alaikum Warohmatullohi Wabarokatuh
                        Puji syukur kita panjatkan kehadirat Allah SWT yang telah memberikan karunia hidayah dan taufik-Nya
                        serta kesehatan sehingga kita masih mampu beraktivitas dengan nyaman sampai hari ini.
                        Shalawat teriring salam kita sanjungkan kepada junjungan kita Nabi Muhammad SAW beserta keluarganya,
                        para sahabatnya dan umatnya sampai akhir zaman.
                    </p>
                    <span class="fw-semibold fst-italic">{{ $setting->headmaster }}</span>
                </div>
            </div>
        </div>
    </section>

    <section id="counts" class="counts">
        <div class="container">
            <div class="row row-gap-3">
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="value" count="2000">0</h2>
                            <span>Peserta Didik</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="value" count="99">0</h2>
                            <span>Tenaga Pendidik</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="value" count="10">0</h2>
                            <span>Konsentrasi Keahlian</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="value" count="15">0</h2>
                            <span>Ekstrakurikuler</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="posts" class="posts">
        <div class="container">
            <h2 class="mb-5 text-center text-md-start">Berita Terbaru</h2>
            <div class="row row-gap-3">
                @foreach ($news as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ $item->image ? asset($item->image) : asset('assets/img/no-img-placeholder.png') }}"
                                class="card-img-top object-fit-cover" height="280">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">{{ $item->title }}</h5>
                                <span class="text-muted">{{ $item->user->name }}</span>
                                <p class="card-text">{!! Str::limit($item->body, 150) !!}</p>
                                <a href="{{ route('news.show', $item->slug) }}" class="btn btn-primary">Baca
                                    selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="departments" class="departments">
        <div class="container">
            <h2 class="mb-5 text-center text-md-start">Konsentrasi Keahlian</h2>
            <div class="d-flex gap-3 overflow-scroll">
                <div class="d-flex flex-column align-items-center gap-3">
                    <img src="{{ asset('assets/img/logo-jurusan/tkro.png') }}" alt="" width="150" height="150">
                    <span class="fw-semibold fs-4">TKRO</span>
                </div>
                <div class="d-flex flex-column align-items-center gap-3">
                    <img src="{{ asset('assets/img/logo-jurusan/tpm.png') }}" alt="" width="150" height="150">
                    <span class="fw-semibold fs-4">TPM</span>
                </div>
                <div class="d-flex flex-column align-items-center gap-3">
                    <img src="{{ asset('assets/img/logo-jurusan/tbsm.png') }}" alt="" width="150"
                        height="150">
                    <span class="fw-semibold fs-4">TBSM</span>
                </div>
                <div class="d-flex flex-column align-items-center gap-3">
                    <img src="{{ asset('assets/img/logo-jurusan/tkj.png') }}" alt="" width="150" height="150">
                    <span class="fw-semibold fs-4">TKJ</span>
                </div>
                <div class="d-flex flex-column align-items-center gap-3">
                    <img src="{{ asset('assets/img/logo-jurusan/mm.png') }}" alt="" width="150" height="150">
                    <span class="fw-semibold fs-4">DKV</span>
                </div>
                <div class="d-flex flex-column align-items-center gap-3">
                    <img src="{{ asset('assets/img/logo-jurusan/rpl.png') }}" alt="" width="150"
                        height="150">
                    <span class="fw-semibold fs-4">RPL</span>
                </div>
                <div class="d-flex flex-column align-items-center gap-3">
                    <img src="{{ asset('assets/img/logo-jurusan/otkp.png') }}" alt="" width="150"
                        height="150">
                    <span class="fw-semibold fs-4">MP</span>
                </div>
                <div class="d-flex flex-column align-items-center gap-3">
                    <img src="{{ asset('assets/img/logo-jurusan/akl.png') }}" alt="" width="150"
                        height="150">
                    <span class="fw-semibold fs-4">AK</span>
                </div>
                <div class="d-flex flex-column align-items-center gap-3">
                    <img src="{{ asset('assets/img/logo-jurusan/aphp.png') }}" alt="" width="150"
                        height="150">
                    <span class="fw-semibold fs-4">APHP</span>
                </div>
                <div class="d-flex flex-column align-items-center gap-3">
                    <img src="{{ asset('assets/img/logo-jurusan/ph.png') }}" alt="" width="150"
                        height="150">
                    <span class="fw-semibold fs-4">PH</span>
                </div>

            </div>
    </section>

    <section id="question" class="question">
        <div class="container">
            <h2 class="mb-5 text-center text-md-start">Pertanyaan Yang Paling Sering Muncul</h2>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Bagaimana sekolah ini menangani masalah disiplin? </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Disini terdapat program yang dilakukan rutin setiap tahun yang dinamakan
                            <strong>TARUNA</strong>, yang
                            bertujuan untuk mendisiplinkan siswa/siswi yang bersekolah disini.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Ada eskul apa saja di SMKN 5 Kab. Tangerang?
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        1. Basket <br>
                        2. Futsal Putri <br>
                        3. Futsal Putra <br>
                        4. Bulu Tangkis <br>
                        5. Voly putri <br>
                        6. Volly putra <br>
                        7. Rohis <br>
                        8. Tenis meja <br>
                        9. Marching band <br>
                        10. Pramuka <br>
                        11. sastra <br>
                        12. atletik <br>
                        13. PMR <br>
                        14. Seni vokal <br>
                        15. Musik modern <br>
                        16. Paskibra <br>
                        17. Pencak silat <br>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Bagaimana fasilitas kejuruan di SMK ini mendukung pembelajaran saya?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            1. Laboratorium dan Workshop <br>
                            2. Perangkat Lunak dan Hardware <br>
                            3. Bengkel <br>
                            4. Studio Kreatif <br>
                            5. Peralatan dan Alat-Alat <br>
                            6. Kegiatan Praktik Lapangan <br>
                            7. Pusat Komputer dan Teknologi <br>
                            8. Ruang Presentasi <br>
                            9. Masjid <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        const counters = document.querySelectorAll('.value');
        const speed = 300;

        counters.forEach(counter => {
            const animate = () => {
                const value = +counter.getAttribute('count');
                const data = +counter.innerText;

                const time = value / speed;
                if (data < value) {
                    counter.innerText = Math.ceil(data + time);
                    setTimeout(animate, 1);
                } else {
                    counter.innerText = value;
                }

            }

            animate();
        });
    </script>
@endpush
