@extends('Shared.layout')
@section('title' , 'Add Trainer')
@section('content')


<div class="container mt-4">
    <header class="mb-4">
        <h3 class="text-primary-color">Add New Trainer</h3>
    </header>

    <form method="post" action="{{ route('trainers.store') }}">
        @csrf

        <!-- Trainer Info -->
        <div class="section-header mb-3">
            <h5 class="text-primary fw-bold">Personal Information</h5>
            <hr class="mt-2">
        </div>
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <label name="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 col-md-6">
                <label name="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 col-md-6">
                <label name="phone" class="form-label">Phone</label>
                <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"/>
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="col-12 col-md-6">
                <label name="date_of_birth" class="form-label">Date of Birth</label>
                <input name="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') }}"/>
                @error('date_of_birth')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 col-md-6">
                <label name="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                    <option value="">-- Select Gender --</option>
                    @foreach (\App\Enums\Gender::cases() as $gender )
                        <option value="{{ $gender->value }}" {{ $gender->value == old('gender') ? 'selected' : '' }}>{{ $gender->name }}</option>
                    @endforeach
                </select>
                @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

        </div>
        <div class="section-header mb-3 mt-4">
            <h5 class="text-primary fw-bold">Address Information</h5>
            <hr class="mt-2">
        </div>
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label name="building_no" class="form-label">Building Number</label>
                <input name="building_no" type="text" class="form-control @error('building_no') is-invalid @enderror" value="{{ old('building_no') }}"/>
                @error('building_no')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 col-md-6">
                <label name="street" class="form-label">Street</label>
                <input name="street" type="text" class="form-control @error('street') is-invalid @enderror" value="{{ old('street') }}"/>
                @error('street')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 col-md-6">
                <label name="city" class="form-label">City</label>
                <input name="city" type="text" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}"/>
                @error('city')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- Professional Information -->
        <div class="section-header mb-3">
            <h5 class="text-primary fw-bold">Professional Information</h5>
            <hr class="mt-2">
        </div>
        <div class="row g-3">
            <div class="col-12">
                <label name="specialties" class="form-label fw-semibold">Specialties</label>
                <select name="specialties" class="form-select @error('specialties') is-invalid @enderror">
                    <option value="">-- Select Specialist --</option>
                    @foreach (\App\Enums\Specialties::cases() as $specialty)
                        <option value="{{ $specialty->value }}" {{ $specialty->value == old('specialties') ? 'selected' : '' }}>{{ $specialty->name }}</option>
                    @endforeach
                </select>
                @error('specialties')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <footer class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-fill">Add</button>
        </footer>
    </form>

</div>

@endsection

