@extends('Shared.layout')
@section('title' , 'Edit Trainer')

@section('content')

<div class="container mt-4">
    <header class="mb-4">
        <h3 class="text-primary-color">Edit Trainer</h3>
        <p class="text-muted">Update trainer information</p>
    </header>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="mb-4 pb-3 border-bottom">
                        <small class="text-muted d-block mb-1">Editing Profile For</small>
                        <h4 class="mb-0 text-black">{{ $trainer['name'] }}</h4>
                    </div>
                    <form action="{{ route('trainers.update' , $trainer['id']) }}" method="post">
                        @csrf
                        @method('PUT')
                        <!-- Personal Information -->
                        <div class="section-header mb-3">
                            <h5 class="text-primary fw-bold">Personal Information</h5>
                            <hr class="mt-2">
                        </div>
                        <div class="row g-3 mb-4">

                            {{-- <input name="name" hidden /> --}}
                            <div class="col-md-6">
                                <label asp-for="Email" class="form-label"></label>
                                <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $trainer['email'] }}"/>
                                 @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                
                            </div>

                            <div class="col-md-6">
                                <label asp-for="Phone" class="form-label"></label>
                                <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ $trainer['phone'] }}"/>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>    
                                @enderror        

                            </div>
                            <div class="col-md-6">
                                <label asp-for="BuildingNumber" class="form-label"></label>
                                <input name="building_no" type="text" class="form-control @error('building_no') is-invalid @enderror"
                                        value="{{ $trainer['building_no'] }}"/>
                                @error('building_no')                                 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label asp-for="Street" class="form-label"></label>
                                <input name="street" type="text" class="form-control @error('street') is-invalid @enderror"
                                        value="{{ $trainer['street'] }}"/>
                                @error('street')
                                    <span class="text-danger">{{ $message }}</span>    
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label asp-for="City" class="form-label"></label>
                                <input name="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                        value="{{ $trainer['city'] }}"/>
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
                                <label  class="form-label fw-semibold">
                                    Specialties<span class="text-danger">*</span>
                                </label>

                                {{-- <label  class="form-label fw-semibold">Specialties</label> --}}
                                <select name="specialties" class="form-select @error('specialties') is-invalid @enderror" >
                                    @foreach ( \App\Enums\Specialties::cases() as $spec )                          
                                        <option value="{{ $spec->value }}" {{ $trainer['specialties'] == $spec->value ? 'selected' : '' }}> {{ $spec->name }}</option>
                                    @endforeach
                                </select>
                                @error('specialties')        
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                            <a href="{{ route('trainers.index') }}" class="btn btn-outline">
                                <i class="bi bi-arrow-left me-1"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-fill">
                                <i class="bi bi-check-lg me-1"></i>Update Trainer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection