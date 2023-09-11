@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    Senin
                    <ul class="list-group py-3 text-center">
                        @foreach ($mondaySchedules as $mondaySchedule)
                            <li
                                class="list-group-item {{ $currentDate->format('l') === 'Monday' ? 'list-group-item-info' : '' }}">
                                {{ $mondaySchedule?->lesson->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    Selasa
                    <ul class="list-group py-3 text-center">
                        @foreach ($tuesdaySchedules as $tuesdaySchedule)
                            <li
                                class="list-group-item {{ $currentDate->format('l') === 'Tuesday' ? 'list-group-item-info' : '' }}">
                                {{ $tuesdaySchedule?->lesson->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    Rabu
                    <ul class="list-group py-3 text-center">
                        @foreach ($wednesdaySchedules as $wednesdaySchedule)
                            <li
                                class="list-group-item {{ $currentDate->format('l') === 'Wednesday' ? 'list-group-item-info' : '' }}">
                                {{ $wednesdaySchedule?->lesson->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    Kamis
                    <ul class="list-group py-3 text-center">
                        @foreach ($thursdaySchedules as $thursdaySchedule)
                            <li
                                class="list-group-item {{ $currentDate->format('l') === 'Thursday' ? 'list-group-item-info' : '' }}">
                                {{ $thursdaySchedule?->lesson->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    Jumat
                    <ul class="list-group py-3 text-center">
                        @foreach ($fridaySchedules as $fridaySchedule)
                            <li
                                class="list-group-item {{ $currentDate->format('l') === 'Friday' ? 'list-group-item-info' : '' }}">
                                {{ $fridaySchedule?->lesson->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (!$todayPresence)
                <div class="alert alert-danger">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="alert-heading">{{ Auth::user()->student->name }}</h4>
                            <p>Hari ini <b>{{ Auth::user()->student->name }}</b> belum absen kehadiran. Mohon diperhatikan
                            </p>
                        </div>
                        <ion-icon name="finger-print" size="large" class="d-none d-md-block"></ion-icon>
                    </div>
                    <hr />
                    <p class="mb-0">{{ dayName(date('Y-m-d')) }}, {{ date('d/m/Y') }}</p>
                </div>
            @else
                <div class="alert alert-success">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="alert-heading">{{ Auth::user()->student->name }}</h4>
                            <p>Hari ini {{ $todayPresence->status }}, absen pada jam
                                {{ $todayPresence->created_at->format('H:i') }}</p>
                        </div>
                        <ion-icon name="finger-print" size="large" class="d-none d-md-block"></ion-icon>
                    </div>
                    <hr />
                    <p class="mb-0">{{ dayName(date('Y-m-d')) }}, {{ date('d/m/Y') }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
@endpush
