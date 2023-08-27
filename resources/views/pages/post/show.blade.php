@extends('layouts.app')

@section('content')
    <section id="post_detail" class="post-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                        alt="" class="w-100 rounded" height="400" style="background-size: cover; object-fit: cover">
                    <h3 class="my-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque, exercitationem.</h3>
<di class="d-flex justify-content-between mb-3">
                        <span class="text-secondary">Author here</span>
                            <span class="text-secondary">11/08/2023</span>
                       </di v>
                       <p>L orem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, possimus fuga! Reprehenderit
                            incidunt corrupti accusantium tempora, architecto cum voluptas eum, molestias ea maxime in accusamus
                            unde ullam pariatur voluptatem porro quibusdam maiores possimus illo excepturi quidem. Odit neque
                        voluptatibus nostrum rem laboriosam unde veniam, commodi voluptas soluta, tempore, quo alias
                        veritatis quia iure sint quasi praesentium! Blanditiis laborum officia dolore necessitatibus
            @if ($post->type == 'post')
                <div class="row mt-5">
                    <div class="col-md-12">
                        <h5>Komentar</h5>
                        <div class="row">
                            <form action="{{ route('forum.add-comentar', $post->slug) }}" method="POST">
                                @csrf
                                <textarea name="body" id="body" cols="30" rows="0" class="form-control mt-2"
                                    placeholder="Tulis komentar kamu di sini..."></textarea>
                                <button type="submit" class="btn btn-success btn-sm float-end mt-3">Kirim</button>
                            </form>
                        </div>
                        {{-- <div class="d-flex align-items-center gap-3 mt-3 comment-item">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80"
                                    alt="" class="rounded-circle object-fit-cover shadow" width="40"
                                    height="40">
                                <div>
                                    <span class="fw-medium">User Name</span>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex, quibusdam.</p>
                                </div>
                            </div> --}}
                        <div class="d-flex gap-3 mt-4">
                            <div>
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80"
                                    class="rounded-circle object-fit-cover" width="50" height="50">
                            </div>
                            <div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="fw-semibold">Nama</h6>
                                    <span class="text-muted">2023-08-24</span>
                                </div>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque eum repudiandae
                                    saepe. Magni, incidunt. Rerum laborum eum accusantium assumenda pariatur.</p>
                                <div class="d-flex gap-3 mt-4">
                                    <div>
                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80"
                                            class="rounded-circle object-fit-cover" width="50" height="50">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="fw-semibold">Nama</h6>
                                            <span class="text-muted">2023-08-24</span>
                                        </div>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque eum
                                            repudiandae
                                            saepe. Magni, incidunt. Rerum laborum eum accusantium assumenda pariatur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif                          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque eum
                                                repudiandae
                                                saepe. Magni, incidunt. Rerum laborum eum accusantium assumenda pariatur.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
