@extends('layouts.app')

@section('content')
    <section id="forum" class="forum">
        <div class="container">
            <h1>Forum Diskusi</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae iusto officiis consectetur, sequi ad
                tenetur vel commodi voluptate voluptatem sint consequuntur praesentium esse! Libero fugit eum neque
                exercitationem aspernatur ex.</p>
            <form action="">
                <div class="input-group my-5">
                    <input type="text" class="form-control search-input" placeholder="Cari..."
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary btn-none" type="button" id="button-addon2">Cari</button>
                </div>
            </form>
            <div class="d-flex gap-3 mb-5 overflow-x-auto category">
                <a href="" class="btn btn-primary">Semua</a>
                <a href="" class="btn btn-outline-primary">Tugas</a>
                <a href="" class="btn btn-outline-primary">Teknologi</a>
                <a href="" class="btn btn-outline-primary">Sejarah</a>
                <a href="" class="btn btn-outline-primary">Apa Kek</a>
                <a href="" class="btn btn-outline-primary">Bla Bla Bla</a>
                <a href="" class="btn btn-outline-primary">Gatau Bingung</a>
                <a href="" class="btn btn-outline-primary">Gatau Bingung</a>
                <a href="" class="btn btn-outline-primary">Gatau Bingung</a>
            </div>
            {{-- <form action="" class="mb-5 d-md-none">
                <select name="" id="" class="form-control">
                    <option hidden>Pilih kategori</option>
                    <option value="">Semua</option>
                    <option value="">Tugas</option>
                </select>
            </form> --}}
            <div class="row row-gap-3">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=580&q=80"
                                alt="" class="rounded-circle mb-3" width="70" height="70">
                            <h5 class="card-title text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Odit,
                                voluptatibus similique quasi nostrum quibusdam autem ea obcaecati enim ipsum repudiandae
                                architecto cumque blanditiis. Labore, praesentium id suscipit recusandae tenetur
                                voluptatem.</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Author here</h6>
                            <p class="card-text text-secondary">Some quick example text to build on the card title and
                                make up the bulk
                                of the card's content.</p>
                            <a href="#" class="card-link">Lanjut baca</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=580&q=80"
                                alt="" class="rounded-circle mb-3" width="70" height="70">
                            <h5 class="card-title text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Odit,
                                voluptatibus similique quasi nostrum quibusdam autem ea obcaecati enim ipsum repudiandae
                                architecto cumque blanditiis. Labore, praesentium id suscipit recusandae tenetur
                                voluptatem.</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Author here</h6>
                            <p class="card-text text-secondary">Some quick example text to build on the card title and
                                make up the bulk
                                of the card's content.</p>
                            <a href="#" class="card-link">Lanjut baca</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=580&q=80"
                                alt="" class="rounded-circle mb-3" width="70" height="70">
                            <h5 class="card-title text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Odit,
                                voluptatibus similique quasi nostrum quibusdam autem ea obcaecati enim ipsum repudiandae
                                architecto cumque blanditiis. Labore, praesentium id suscipit recusandae tenetur
                                voluptatem.</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Author here</h6>
                            <p class="card-text text-secondary">Some quick example text to build on the card title and
                                make up the bulk
                                of the card's content.</p>
                            <a href="#" class="card-link">Lanjut baca</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=580&q=80"
                                alt="" class="rounded-circle mb-3" width="70" height="70">
                            <h5 class="card-title text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Odit,
                                voluptatibus similique quasi nostrum quibusdam autem ea obcaecati enim ipsum repudiandae
                                architecto cumque blanditiis. Labore, praesentium id suscipit recusandae tenetur
                                voluptatem.</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Author here</h6>
                            <p class="card-text text-secondary">Some quick example text to build on the card title and
                                make up the bulk
                                of the card's content.</p>
                            <a href="#" class="card-link">Lanjut baca</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
