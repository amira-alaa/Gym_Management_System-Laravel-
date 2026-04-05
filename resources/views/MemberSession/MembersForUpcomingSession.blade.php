@extends('Shared.layout')
@section('title' , 'Members For Upcoming Session')

@section('content')

@if(session('Success') != null)
    <div id="Alert" class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle-fill me-2"></i>
            {{  session('Success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if (session('Error') != null)

    <div id="Alert" class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        {{  session('Error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif


<header class="bg-primary text-white rounded-3 p-4 shadow-sm mt-5 mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2 class="mb-1 fw-semibold">Session Members</h2>
            <p class="mb-0 text-light opacity-75">Members That Already Book Session</p>
        </div>
        <div class="text-end">
            <a href="{{ route('membersessions.show' , $session_id ) }}" class="btn btn-light">
                <i class="fas fa-plus me-1"></i> New Booking
            </a>
        </div>
    </div>
</header>
<div class="card shadow-sm">

    <div class="card-body">
        @if ($members != null && count($members) )
            <table class="table table-striped table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th>Member</th>
                        <th>Booking Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($members as $member)
                    <tbody>
                        <tr>
                            <td>{{ $member['member_name'] }}</td>
                            <td>{{ $member['booking_date'] }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-1">
                                    <form method="post" action="{{ route('membersessions.destroy', [ $member['member_id'], $member['session_id'] ]) }}" class="m-0">
                                        @csrf
                                        @method('DELETE')

                                        <input hidden readonly name="session_id" value="{{ $member['session_id'] }}" />
                                        <input hidden readonly name="member_id" value="{{ $member['member_id'] }}" />
                                        <button type="submit" class="btn btn-sm btn-danger">
                                                {{-- onclick="return confirm('Are you sure you want to cancel this booking?');"> --}}
                                            <i class="fas fa-times"></i> Cancel
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        @else
            <div class="text-center py-5">
                <i class="bi bi-person-workspace display-1 text-muted"></i>
                <h4 class="mt-3 text-muted">No Bookings Available</h4>
                <p class="text-muted">Add your first booking to get started</p>
            </div>
        @endif
    </div>
    <a href="{{ route('membersessions.index') }}" class="btn btn-fill ">Back to List</a>

</div>
@endsection
