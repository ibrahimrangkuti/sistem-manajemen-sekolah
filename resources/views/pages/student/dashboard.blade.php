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
@endsection

@push('scripts')
@endpush
