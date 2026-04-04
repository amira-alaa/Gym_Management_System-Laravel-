@extends('Shared.layout')
@section('title' , 'Member Details')

@section('content')
{{-- @if( $member == null) --}}
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-details border-0 p-2 shadow">
                    <div class="text-center mt-3">

                        @if ($member->photo == null || $member->photo == "")
                            <img src="~/images/user.jpg" alt="MemberName" class="rounded-circle"
                                 style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #fff; margin-top: -60px;" />

                        @else
                            <img src="~/images/Members/{{$member->Photo}}" alt="MemberName" class="rounded-circle"
                                 style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #fff; margin-top: -60px;" />
                        @endif
                    </div>
                    <div class="card-body text-center">
                        <h2 class="mb-1 text-primary-color">{{$member->name}}</h2>
                        <h4 class="mb-2 pb-1 border-bottom d-block">@(Model.PlanName is not null ? Model.PlanName : "No Active Plan")</h4>
                        <div class="mt-4 text-start">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="p-3 bg-light rounded">
                                        <small class="text-muted d-block mb-1">Email</small>
                                        <strong>{{$member->email}}</strong>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="p-3 bg-light rounded">
                                        <small class="text-muted d-block mb-1">Phone</small>
                                        <strong>{{$member->phone}}</strong>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 bg-light rounded">
                                        <small class="text-muted d-block mb-1">Gender</small>
                                        <strong>{{$member->gender}}</strong>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 bg-light rounded">
                                        <small class="text-muted d-block mb-1">Date of Birth</small>
                                        <strong>{{$member->dateOfBirth}}</strong>
                                    </div>
                                </div>

                                {{-- @if (Model.PlanName is not null)
                                { --}}
                                    <div class="col-6">
                                        <div class="p-3 bg-light rounded">
                                            <small class="text-muted d-block mb-1">Membership Start Date</small>
                                            <strong>$member.MemberShipStartDate</strong>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-3 bg-light rounded">
                                            <small class="text-muted d-block mb-1">Membership End Date</small>
                                            <strong>$member.MemberShipEndDate</strong>
                                        </div>
                                    </div>
                                {{-- } --}}
                                <div class="col-12">
                                    <div class="p-3 bg-light rounded">
                                        <small class="text-muted d-block mb-1">Address</small>
                                        <strong>{{$member->building_no." - ". $member->street." - ".$member->city}}</strong>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between gap-2 px-3 pb-3">
                        <a href="{{ route('members.index') }}" class="btn btn-fill flex-fill">Back to List</a>
                    </div>



                </div>
            </div>
        </div>
    </div>

{{-- @endif --}}
@endsection