@extends('Shared.layout')
@section('title' , 'Edit Member')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-details border-0 p-2 shadow">
                <div class="card-body text-center">
                    <div class="text-center mt-3">
                        {{-- <img src="../images/Members/{{ $membertoupdate->photo }}" alt="{{ $membertoupdate->name }}" class="rounded-circle"
                             style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #fff; margin-top: -60px;" /> --}}

                    </div>
                    <div class="card-body text-center">
                        <h2 class="mb-1 text-primary-color">{{ $membertoupdate->name }}</h2>
                        <form  action="{{ route('members.update' , $membertoupdate->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input name="name" value="{{ $membertoupdate->name }}" hidden/>
                            <input name="photo" value="{{ $membertoupdate->photo }}" hidden />
                            <div class="mt-4 text-start">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="p-3 bg-light rounded">
                                            <small class="text-muted d-block mb-1">Email</small>
                                            <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $membertoupdate->email }}"/>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-3 bg-light rounded">
                                            <small class="text-muted d-block mb-1">Phone</small>
                                            <input name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $membertoupdate->phone }}"/>
                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="p-3 bg-light rounded">
                                            <small class="text-muted d-block mb-1">Building Number</small>
                                            <input name="building_no" class="form-control @error('building_no') is-invalid @enderror" value="{{ $membertoupdate->building_no }}"/>
                                            @error('building_no')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-3 bg-light rounded">
                                            <small class="text-muted d-block mb-1">City</small>
                                            <input name="city" class="form-control @error('city') is-invalid @enderror" value="{{ $membertoupdate->city }}"/>
                                            @error('city')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-3 bg-light rounded">
                                            <small class="text-muted d-block mb-1">Street</small>
                                            <input name="street" class="form-control @error('street') is-invalid @enderror" value="{{ $membertoupdate->street }}"/>
                                            @error('street')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="d-flex justify-content-between gap-2 mt-3 px-3 pb-3">
                                <a href="{{ route('members.index') }}" class="btn btn-fill ">
                                    Back to
                                    List
                                </a>
                                <button type="submit" class="btn btn-fill ">Done</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
