@extends('layouts.dashboard')

@section('title', 'Pesan dari ' . $message->sender->name)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{ $message->title }}</h3>
                        <span class="text-muted">{{ $message->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <p class="mt-3">{{ $message->body }}</p>

                    <div class="row mt-5">
                        <h5 class="mb-4">Balasan</h5>
                        @php
                            $prevSender = null;
                        @endphp
                        @foreach ($replies as $item)
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    @if ($prevSender !== $item->sender->name)
                                        <span class="fw-bold mt-2">{{ $item->sender->name }}</span>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>{{ $item->body }}</span>
                                    <span class="text-muted">{{ $item->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                            @php
                                $prevSender = $item->sender->name;
                            @endphp
                        @endforeach
                    </div>

                    {{-- create form to reply the message --}}
                    <form action="{{ route('message.reply', $message->slug) }}" method="POST">
                        @csrf
                        <div class="input-group my-3">
                            <input type="text" class="form-control" name="body" placeholder="Balas pesan di sini">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
