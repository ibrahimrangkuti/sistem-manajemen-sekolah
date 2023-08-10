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
                    <img src="hero.svg" alt="" class="w-100 d-none d-md-block">
                </div>
            </div>
        </div>
    </section>

    <section id="welcome" class="welcome">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3">
                    <img src="https://images.unsplash.com/flagged/photo-1571367034861-e6729ad9c2d5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=464&q=80"
                        alt="" class="img-fluid img-thumbnail">
                </div>
                <div class="col-md-8">
                    <h1>Welcome Message Here....</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis incidunt ex modi officia
                        distinctio non iusto quo. Distinctio ab nemo commodi provident eos, modi nesciunt, id, atque
                        magni qui facere repellendus maiores perspiciatis similique eum est iure perferendis culpa fuga
                        saepe blanditiis nostrum hic. Sunt modi magni qui facere vitae perspiciatis, labore
                        exercitationem nulla minus explicabo aliquid voluptatibus dignissimos harum. Ex id nemo unde
                        qui, repellendus odio ipsa illum saepe maxime, magnam voluptatibus nulla voluptatem
                        necessitatibus eaque vero error deserunt sit facilis, consectetur culpa optio placeat. Libero
                        aperiam natus ut magni provident consequuntur reprehenderit nihil error, voluptatem temporibus
                        blanditiis sed.</p>
                    <span class="fw-semibold fst-italic">Surta Wijaya, S.Kom. M.M</span>
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
                            <h2>2000+</h2>
                            <span>Peserta Didik</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h2>99</h2>
                            <span>Tenaga Pendidik</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h2>10</h2>
                            <span>Konsentrasi Keahlian</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h2>15</h2>
                            <span>Ekstrakurikuler</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="posts" class="posts">
        <div class="container">
            <h1 class="mb-5">Berita Terbaru</h1>
            <div class="row row-gap-3">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80."
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Id,
                                nostrum omnis! Molestiae odit at mollitia, sequi dolorem praesentium saepe itaque
                                sunt harum, alias in quam dolore provident temporibus, cupiditate dolores!</h5>
                            <span class="text-muted">Author here</span>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Baca selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80."
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Id,
                                nostrum omnis! Molestiae odit at mollitia, sequi dolorem praesentium saepe itaque
                                sunt harum, alias in quam dolore provident temporibus, cupiditate dolores!</h5>
                            <span class="text-muted">Author here</span>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Baca selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80."
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Id,
                                nostrum omnis! Molestiae odit at mollitia, sequi dolorem praesentium saepe itaque
                                sunt harum, alias in quam dolore provident temporibus, cupiditate dolores!</h5>
                            <span class="text-muted">Author here</span>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Baca selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
