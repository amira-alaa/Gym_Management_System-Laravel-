@extends('Shared.layout')
@section('content')
@section('title' , 'Members')


@if (session("Error"))
    <div id="Alert" class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        {{ session("Error") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
@if (session("Success"))
    <div id="Alert" class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session("Success") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif


            <div class="container">
                <header class="d-flex justify-content-end mt-5 mb-4 align-items-center">
                    <a href="{{route('members.create')}}" class="btn btn-fill fw-medium rounded-pill px-3 py-3">
                        + Add Member
                    </a>
                </header>

                @if($members->count() > 0)

                    <div class="table-responsive " style="overflow: visible;">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th><span>Photo</span></th>
                                    <th><span>Name</span></th>
                                    <th><span>Email</span></th>
                                    <th><span>Gender</span></th>
                                    <th><span>Phone</span></th>
                                    <th><span>Action</span></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($members as $member)

                                    <tr>
                                        @if ( $member->photo == null)

                                            <td>
                                                <span class="avatar">
                                                    <img src="../images/Members/{{$member->Photo}}" alt="Default Avatar" class="rounded-circle"
                                                         style="width: 40px; height: 40px;" />
                                                </span>
                                            </td>

                                        @else

                                            <td>
                                                <span class="avatar">
                                                    <img src="../images/user.jpg" alt="Default Avatar" class="rounded-circle"
                                                         style="width: 40px; height: 40px;" />
                                                </span>
                                            </td>
                                        @endif


                                        <td><span>{{$member->name}}</span></td>
                                        <td><span>{{$member->email}}</span></td>
                                        <td><span>{{$member->gender}}</span></td>
                                        <td><span>{{$member->phone}}</span></td>
                                        <td class="action position-relative">
                                            <div class="dropdown">
                                                <button class="btn btn-link p-0 border-0" type="button"
                                                id="dropdownMenuButton-{{$member->id}}" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                    <img src="../images/action dots.jpg" alt="action icon" />
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-start"
                                                aria-labelledby="dropdownMenuButton-{{$member->id}}">
                                                    <li>
                                            <a href="{{ route('members.show',$member->id) }}"
                                                        class="dropdown-item d-flex align-items-center gap-3">
                                                            <img src="../images/info 1.jpg" alt="info icon"
                                                            style="width: 20px; height: 20px;"  />
                                                            <span>View Member Data</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                            <a href="{{route('HRData' , $member->id)}}"
                                                        class="dropdown-item d-flex align-items-center gap-3">
                                                            <img src="../images/info 1.jpg" alt="info icon"
                                                            style="width: 20px; height: 20px;" />
                                                            <span>View Health Record Data</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                            <a  href="{{ route('members.edit' , $member->id)  }}"
                                                        class="dropdown-item d-flex align-items-center gap-3">
                                                            <img src="../images/edit.jpg" alt="edit icon"
                                                            style="width: 20px; height: 20px;" />
                                                            <span>Edit Member Data</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                            <a  href="{{ route('deleteMember' , $member->id) }}"
                                                        class="dropdown-item d-flex align-items-center gap-3 text-danger">
                                                            <img src="../images/x-circle 1.jpg" alt="delete icon"
                                                            style="width: 20px; height: 20px;" />
                                                            <span>Delete</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                @else
                    <div class="text-center py-5">
                        <i class="bi bi-person-workspace display-1 text-muted"></i>
                        <h4 class="mt-3 text-muted">No Members Available</h4>
                        <p class="text-muted">Add your first Member to get started</p>
                    </div>
                @endif
            </div>



{{-- @section Scripts {
    <partial name="_AlertBoxScript" />
}
--}}
@endsection
