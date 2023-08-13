@extends('layouts.app')

@section('content')
    <section id="portal_orangtua" class="portal_orangtua">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-4 mb-5">
                    <h2 class="mb-3">Portal Orang Tua</h2>
                    <form action="">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">No. HP</label>
                            <input type="number" name="" id="" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">NIS</label>
                            <input type="number" name="" id="" class="form-control">
                        </div>
                        <button class="btn btn-primary w-100 mt-3">Masuk</button>
                    </form>
                </div>

                <div class="col-12 col-md-8 d-flex justify-content-center">
                    {{-- <h2>Ingin melihat <strong>nilai</strong> anak?</h2>
                    <h2>Ingin melihat <strong>kinerja</strong> anak?</h2>
                    <h3>Ayo <strong>masuk</strong> untuk melihat semuanya</h3> --}}
                    <img src="{{ asset('assets/img/parent.svg') }}" alt="" class="d-none d-md-block w-50">
                </div>
            </div>
        </div>
    </section>
@endsection
