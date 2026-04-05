@extends('Shared.layout')
@section('title' , 'MemberSessions')

@section('content')

{{-- @if (TempData["Success"] is not null){
    ﻿<div id="Alert" class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle-fill me-2"></i>
        @TempData["Success"]
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
}


@if (TempData["Error"] is not null){
    <div id="Alert" class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        @TempData["Error"]
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
} --}}





<header class="bg-primary text-white rounded-3 p-4 shadow-sm mt-5 mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2 class="mb-1 fw-semibold">Session Members</h2>
            <p class="mb-0 text-light opacity-75">Members Attendance</p>
        </div>
    </div>
</header>
<div class="card shadow-sm">

    <div class="card-body">

        @if ($members != null && count($members))

            <table class="table table-striped table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th>Member</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $member['member_name'] }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-1">
                                    <!-- If Member Attended -->
                                    @if ($member['is_attended'])
                                        <span class="text-success fw-bold">
                                            <i class="bi bi-check-circle me-1"></i> Attended
                                        </span>

                                    @else
                                        <form method="post" action="{{ route('membersessions.update' , $member['session_id'] ) }}"  class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input hidden readonly name="session_id" value="{{ $member['session_id'] }}" />
                                            <input hidden readonly name="member_id" value="{{ $member['member_id'] }}" />
                                            <button type="submit" class="btn btn-outline-success btn-sm">
                                                <i class="bi bi-check-circle me-1"></i> Mark as Attended
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
            </table>
        @else

            <div class="text-center py-5">
                <i class="bi bi-person-workspace display-1 text-muted"></i>
                <h4 class="mt-3 text-muted">No Members Available</h4>
            </div>
        @endif
    </div>

    <a href="{{ route('membersessions.index') }}" class="btn btn-fill ">Back to List</a>

</div>

@endsection
