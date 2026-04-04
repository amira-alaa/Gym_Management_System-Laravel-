@extends('Shared.layout')
@section('title' , 'MemberShips')

@section('content')


@if(session('Success') != null)
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






<div class="container-fluid">
    <header class="bg-primary text-white rounded-3 p-4 shadow-sm mt-5 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="mb-1 fw-semibold">Active Memberships</h2>
                <p class="mb-0 text-light opacity-75">Members That have Active Plans</p>
            </div>
            <div class="col text-end">
                <a href="{{ route('memberships.create') }}" class="btn btn-light">
                    <i class="fas fa-plus"></i> New Membership
                </a>
            </div>
        </div>
    </header>


    <div class="card">
        <div class="card-body">
            @if ($memberships != null && $memberships->isNotEmpty())

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Member</th>
                            <th>Plan</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach ( $memberships as $memberShip )
                        <tbody>

                            <tr>
                                <td>{{ $memberShip->member->name }}</td>
                                <td>{{ $memberShip->plan->name }}</td>
                                <td>{{ $memberShip->start_date }}</td>
                                <td>{{ $memberShip->end_date }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <form method="post" action="{{ route('memberships.delete', $memberShip->id) }}" class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <input hidden readonly name="MemberId" value="{{ $memberShip->member_id }}" />
                                            <input hidden readonly name="PlanId" value="{{ $memberShip->plan_id }}" />
                                            <button type="submit" class="btn btn-sm btn-danger">
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
                    <h4 class="mt-3 text-muted">No Active Memberships Available</h4>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
