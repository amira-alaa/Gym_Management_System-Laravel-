@extends('Shared.layout')
@section('title' , 'Create Membership')

@section('content')

@if(session('Error') != null)
    <div id="Alert" class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        @session('Error')
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Create</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('memberships.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Member</label>
                            <select  name="member_id" class="form-select">
                                <option value="">-- Select Member --</option>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}">
                                        {{ $member->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Plan</label>
                            <select name="plan_id" class="form-select">
                                <option value="">-- Select Plan --</option>
                                @foreach($plans as $plan)
                                    <option value="{{ $plan->id }}">
                                        {{ $plan->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span asp-validation-for="PlanId" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Create Membership</button>
                            <a asp-action="Index" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
