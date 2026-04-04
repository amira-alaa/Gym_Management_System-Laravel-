@extends('Shared.layout')
@section('title' , 'Edit Session')

@section('content')

<div class="container mt-4">

    <header class="mb-4">
        <h3 class="text-primary-color">Edit Session</h3>
        <p class="text-muted">Update session information</p>
    </header>

    <form action="{{ route('sessions.update', $session->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">

                        <!-- Session Information -->
                        <div class="section-header mb-3">
                            <h5 class="text-primary fw-bold">Session Information</h5>
                            <hr class="mt-2">
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label asp-for="TrainerId" class="form-label fw-semibold">
                                    Trainer <span class="text-danger">*</span>
                                </label>
                                <select name="trainer_id"  class="form-select @error('trainer_id') is-invalid @enderror">
                                    <option value="">Select Trainer</option>
                                    @foreach($trainers as $trainer)
                                        <option value="{{ $trainer->id }}" {{ $session->trainer->id == $trainer->id ? 'selected' : '' }} >
                                            {{ $trainer->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('trainer_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label asp-for="Description" class="form-label fw-semibold">
                                    Description <span class="text-danger">*</span>
                                </label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ $session->description }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Date & Time -->
                        <div class="section-header mb-3">
                            <h5 class="text-primary fw-bold">Date & Time</h5>
                            <hr class="mt-2">
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label asp-for="StartDate" class="form-label fw-semibold">
                                    Start Date & Time <span class="text-danger">*</span>
                                </label>
                                <input name="start_time" type="datetime-local" class="form-control @error('start_time') is-invalid @enderror" value="{{ $session->start_time}}" />
                                @error('start_time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label asp-for="EndDate" class="form-label fw-semibold">
                                    End Date & Time <span class="text-danger">*</span>
                                </label>
                                <input name="end_time" type="datetime-local" class="form-control @error('end_time') is-invalid @enderror" value="{{ $session->end_time }}" />
                                @error('end_time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                            <a asp-action="Index" class="btn btn-outline">
                                <i class="bi bi-arrow-left me-1"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-fill">
                                <i class="bi bi-check-lg me-1"></i>Update Session
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
