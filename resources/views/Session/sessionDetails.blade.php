@extends('Shared.layout')
@section('title' , 'Session Details')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <!-- If Session Ongoing  bg-success -->
                <!-- If Session Upcoming  bg-primary -->
                <!-- If Session Completed  bg-secondary -->
                <div class="card-header  text-white text-center py-4 {{  $session['status'] == "Upcoming" ? "bg-primary" :($session['status'] == "Ongoing" ? "bg-success" : "bg-secondary") }}">
                    <i class="bi bi-calendar-event display-4 mb-3"></i>
                    <h2 class="mb-2">{{ $session['category_name'] }}</h2>
                    <span class="badge bg-light text-dark fs-6">{{ $session['status'] }}</span>
                </div>

                <div class="card-body p-4">
                    <!-- Description -->
                    <div class="mb-4 p-3 bg-light rounded">
                        <h6 class="text-primary-color mb-2">
                            <i class="bi bi-file-text me-2"></i>Description
                        </h6>
                        <p class="mb-0">{{ $session['description'] }}</p>
                    </div>

                    <!-- Session Details -->
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="detail-box p-3 border rounded">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box me-3">
                                        <i class="bi bi-person-circle text-primary-color fs-3"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Trainer</small>
                                        <strong>{{ $session['trainer_name'] }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-box p-3 border rounded">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box me-3">
                                        <i class="bi bi-people text-primary-color fs-3"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Capacity</small>
                                        <strong>{{ $session['available_slots'] }} / {{ $session['capacity'] }} spots</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-box p-3 border rounded">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box me-3">
                                        <i class="bi bi-calendar-check text-primary-color fs-3"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Start Time</small>
                                        <strong>{{ $session['start_date']->format('d M Y h:i A') }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-box p-3 border rounded">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box me-3">
                                        <i class="bi bi-calendar-x text-primary-color fs-3"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">End Time</small>
                                        <strong>{{ $session['end_date'] }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="detail-box p-3 border rounded bg-light">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box me-3">
                                        <i class="bi bi-hourglass-split text-primary-color fs-3"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Duration</small>
                                        <strong class="text-primary-color fs-5">
                                           {{ $session['duration']->d > 0 ? $session['duration']->d : ''}} days {{ $session['duration']->h  }} hours {{ $session['duration']->i }} minutes
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white border-0 p-4">
                    <div class="d-flex justify-content-between gap-2">
                        <a href="{{ route('sessions.index') }}" class="btn btn-outline flex-fill">
                            <i class="bi bi-arrow-left me-1"></i>Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
