@extends('layouts.app')

@section('content')
    <section id="vacancy" class="vacancy">
        <div class="container">
            <h1>Lowongan Kerja</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae iusto officiis consectetur, sequi ad
                tenetur vel commodi voluptate voluptatem sint consequuntur praesentium esse! Libero fugit eum neque
                exercitationem aspernatur ex.</p>
            <div class="row row-gap-3 mt-5">
                <div class="col-md-6">
                    <div class="card box">
                        <div class="card-body">
                            <img src="https://image-service-cdn.seek.com.au/74f8689b6f0c24639e2a835ab5558fbe2698206a/ee4dce1061f3f616224767ad58cb2fc751b8d2dc"
                                alt="" class="shadow mb-3 rounded" width="70" height="70">
                            <h5 class="card-title text-truncate">Web Developer</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">PT. Mencari Cinta Sejati</h6>
                            <p class="card-text text-secondary">Tangerang, Banten</p>
                            <a href="#" class="card-link">Lihat detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
