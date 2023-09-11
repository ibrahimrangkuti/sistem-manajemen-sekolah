@extends('layouts.dashboard')

@section('title', 'Pesan')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('message.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="receiver" class="form-label">Penerima</label>
                                    <select name="receiver" id="receiver" class="form-select"
                                        data-placeholder="Pilih penerima">
                                        <option></option>
                                        @foreach ($receivers as $receiver)
                                            @if ($receiver->id != Auth::user()->id)
                                                <option value="{{ $receiver->id }}">{{ $receiver->name }}
                                                    {{ $receiver->class_id ? $receiver->class->name : null }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="body" class="form-label">Pesan</label>
                                    <textarea name="body" id="body" cols="30" rows="3"
                                        class="form-control @error('body') is-invalid @enderror"></textarea>
                                    @error('body')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success float-end">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pengirim</th>
                                    <th>Penerima</th>
                                    <th class="col-4">Judul</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $message->sender->name }}</td>
                                        <td>{{ $message->receiver->name }}</td>
                                        <td>{{ $message->title }}</td>
                                        <td>{{ $message->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            @if ($message->status == 'unread')
                                                <span class="badge bg-danger">Belum Dibaca</span>
                                            @else
                                                <span class="badge bg-success">Sudah Dibaca</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('message.show', $message->slug) }}"
                                                class="btn btn-primary btn-sm">Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
