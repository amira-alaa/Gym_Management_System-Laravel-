@extends('Shared.layout')
@section('title' , 'Edit Plan')

@section('content')
<div class="container mt-4">
    <header class="mb-4">
        <h3 class="text-primary-color">Edit Plan</h3>
        <p class="text-muted">Update plan details</p>
    </header>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="{{ route('plans.update' , $plan->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-12">
                                <label  class="form-label fw-semibold">
                                    Plan Name <span class="text-danger">*</span>
                                </label>
                                <input name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $plan->name }}" readonly />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label asp-for="DurationDays" class="form-label fw-semibold">
                                    Duration (Days) <span class="text-danger">*</span>
                                </label>
                                <input name="duration_days" type="number" class="form-control @error('duration_days') is-invalid @enderror" value="{{ $plan->duration_days }}" />
                                <small class="text-muted">e.g., 30 days = 1 month</small>
                                @error('duration_days')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label asp-for="Price" class="form-label fw-semibold">
                                    Price (EGP) <span class="text-danger">*</span>
                                </label>
                                <input name="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" value="{{ $plan->price }}"/>
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label asp-for="Description" class="form-label fw-semibold">
                                    Description <span class="text-danger">*</span>
                                </label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" >{{ $plan->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                            <a href="{{ route('plans.index') }}" class="btn btn-outline">
                                <i class="bi bi-arrow-left me-1"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-fill">
                                <i class="bi bi-check-lg me-1"></i>Update Plan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
