@extends('Shared.layout')
@section('title' , 'Plans')

@section('content')

@if (session('Success') != null)
    <div id="Alert" class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('Success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if (session('Error') != null)
    <div id="Alert" class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        {{ session('Error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif


<div class="container">
    <header class="d-flex justify-content-between mt-5 mb-4 align-items-center">
        <div>
            <h2 class="text-primary-color mb-0">Membership Plans</h2>
            <p class="text-muted">Manage your gym membership packages</p>
        </div>
    </header>
    @if ($plans != null && $plans->isNotEmpty())
        <div class="row g-4">
            @foreach ($plans as $plan)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 plan-card">
                    <!-- bg-primary-color if plan is Active  bg-secondary is Inactive-->
                        <div class="card-header text-white text-center py-4 {{$plan->is_active ? "bg-primary-color" : "bg-secondary"}}">
                        <h4 class="mb-0">{{ $plan->name }}</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="text-center mb-4">
                            <div class="display-4 fw-bold text-primary-color">{{ $plan->price }}</div>
                            <small class="text-muted">EGP</small>
                        </div>

                        <div class="mb-3">
                            <p class="text-muted mb-2">
                                <i class="bi bi-calendar-check text-primary-color me-2"></i>
                                <strong>Duration:</strong> {{ $plan->duration_days }} Days
                            </p>
                            <p class="text-muted mb-3">
                                <i class="bi bi-file-text text-primary-color me-2"></i>
                                <strong>Description:</strong>
                            </p>
                            <p class="small">{{ $plan->description }}</p>
                        </div>

                        <div class="mt-auto">
                            <div class="d-grid gap-2">
                                    <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-outline btn-sm">
                                    <i class="bi bi-eye me-1"></i>View Details
                                </a>
                                <div class="d-flex gap-2">
                                        <a href="{{ route('plans.edit' , $plan->id) }}" class="btn btn-outline btn-sm flex-fill">
                                        <i class="bi bi-pencil me-1"></i>Edit
                                    </a>
                                        <form method="post" class="flex-fill" action="{{ route('UPStatus', $plan->id) }}">
                                            @csrf
                                            @method('PUT')
                                        <!-- If Plan Active -->
                                            @if ($plan->is_active)
                                                <button type="submit" class="btn btn-outline btn-sm w-100  text-danger">

                                                    <i class="bi bi-x-circle me-1"> Deactivate </i>
                                                </button>

                                            @else
                                                <button type="submit" class="btn btn-outline btn-sm w-100  text-danger">

                                                    <i class="bi bi-check-circle me-1"> Activate </i>
                                                </button>
                                            @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    @else

        <div class="text-center py-5">
            <i class="bi bi-inbox display-1 text-muted"></i>
            <h4 class="mt-3 text-muted">No Plans Available</h4>
        </div>

    @endif


</div>

@endsection
