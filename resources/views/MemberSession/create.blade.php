@extends('Shared.layout')
@section('title' , 'Create')

@section('content')

<h1>Create New Booking</h1>

{{-- <hr /> --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="d-flex justify-content-center align-items-center h-100">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Booking Information</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('membersessions.store') }}">
                        @csrf

                        <div class="mb-3">
                            <input hidden readonly name="session_id"  value="{{ $session_id }}"/>
                            <input hidden readonly name="booking_date"  type="date" value="{{ now() }}"/>
                            <label class="form-label">Member</label>
                            <select name="member_id" class="form-select @error('member_id') is-invalid @enderror" >
                                <option value="">-- Select Member --</option>
                                @foreach ( $members as $member )
                                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id  ? 'selected' : '' }}>{{ $member->name }}</option>
                                @endforeach

                            </select>
                            @error('member_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Create Booking
                            </button>
                            <a  href="{{ route('membersessions.GetMembersUpcomingSession' , $session_id) }}" class="btn btn-secondary" >
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



<script>
    $(document).ready(function() {
        $('#MemberId').select2({
            placeholder: "Select a member",
            allowClear: true,
            width: '100%'
        });
    });
</script>

@endsection
