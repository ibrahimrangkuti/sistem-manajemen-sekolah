@extends('layouts.app')

@section('content')
    <section id="post_detail" class="post-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                        alt="" class="w-100" height="400" style="background-size: cover; object-fit: cover">
                    <h3 class="my-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque, exercitationem.</h3>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-secondary">Author here</span>
                        <span class="text-secondary">11/08/2023</span>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, possimus fuga! Reprehenderit
                        incidunt corrupti accusantium tempora, architecto cum voluptas eum, molestias ea maxime in accusamus
                        unde ullam pariatur voluptatem porro quibusdam maiores possimus illo excepturi quidem. Odit neque
                        voluptatibus nostrum rem laboriosam unde veniam, commodi voluptas soluta, tempore, quo alias
                        veritatis quia iure sint quasi praesentium! Blanditiis laborum officia dolore necessitatibus
                        praesentium reprehenderit repudiandae rerum. Architecto voluptatem magni sit. Nulla ut officiis
                        deleniti? Animi ipsam optio quae itaque, quo rerum, soluta eum aperiam sequi ratione cum, reiciendis
                        id doloremque deleniti voluptas debitis expedita. Deleniti temporibus quaerat tempore optio quasi
                        consectetur a? Error atque corrupti expedita, optio dicta dolore totam, sed unde beatae debitis
                        tempore. Quae beatae voluptatem unde architecto nobis maiores. Consequatur architecto molestiae
                        doloribus in explicabo necessitatibus sequi quis doloremque inventore temporibus corrupti odio, vel
                        eos accusamus dicta rerum itaque! Sint, libero voluptates cupiditate quibusdam quod rerum id
                        doloremque.</p>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                                alt="" class="w-100" height="200"
                                style="background-size: cover; object-fit: cover">
                            <h5 class="mt-3 text-truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h5>
                            <span class="text-secondary">Author here</span>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <h5 class="mb-4">Postingan lainnya</h5>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                                        alt="" class="w-100" height="110"
                                        style="background-size: cover; object-fit: cover">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h6>
                                    <span class="text-secondary">Author here</span>
                                    <p style="font-size: 14px">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Incidunt omnis esse labore!</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                                        alt="" class="w-100" height="110"
                                        style="background-size: cover; object-fit: cover">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h6>
                                    <span class="text-secondary">Author here</span>
                                    <p style="font-size: 14px">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Sint, et.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                                        alt="" class="w-100" height="110"
                                        style="background-size: cover; object-fit: cover">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h6>
                                    <span class="text-secondary">Author here</span>
                                    <p style="font-size: 14px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut,
                                        doloribus!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-4">
                            <h6>Komentar</h6>
                            <div class="d-flex align-items-center gap-3 mt-3 comment-item">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80"
                                    alt="" class="rounded-circle shadow" width="40" height="40"
                                    style="object-fit: cover">
                                <div>
                                    <span class="fw-medium">User Name</span>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex, quibusdam.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3 mt-3 comment-item">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80"
                                    alt="" class="rounded-circle shadow" width="40" height="40"
                                    style="object-fit: cover">
                                <div>
                                    <span class="fw-medium">User Name</span>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex, quibusdam.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
