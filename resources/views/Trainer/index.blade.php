
@extends('Shared.layout')
@section('title' , 'Trainers')

@section('content')


@if (session('Success') != null)
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


<div class="container">
        <header class="d-flex justify-content-between mt-5 mb-4 align-items-center">
            <div>
                <h2 class="text-primary-color mb-0">Our Trainers</h2>
                <p class="text-muted">Professional fitness instructors</p>
            </div>
            <a href="{{ route('trainers.create') }}"
            class="btn btn-fill fw-medium rounded-pill px-4 py-3">
                <i class="bi bi-plus-lg me-2"></i>Add Trainer
            </a>
        </header>

    @if ($trainers != null && Count($trainers) > 0)
        <div class="table-responsive" style="overflow: visible;">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th><span>Name</span></th>
                        <th><span>Email</span></th>
                        <th><span>Phone</span></th>
                        <th><span>Specialties</span></th>
                        <th><span>Action</span></th>
                    </tr>
                </thead>
                @foreach ($trainers as $trainer)
                    <tbody>
                        <tr>
                            <td><span class="fw-bold">{{ $trainer['name'] }}</span></td>
                            <td><span>{{ $trainer['email'] }}</span></td>
                            <td><span>{{ $trainer['phone'] }}</span></td>
                            <td>
                                <span class="badge bg-primary-color">{{ $trainer['specialties'] }}</span>
                            </td>
                            <td class="action position-relative">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 border-0" type="button"
                                    id="dropdownMenuButton-{{ $trainer['id'] }}" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                        <img src="../images/action dots.jpg" alt="action icon" />
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-start"
                                    aria-labelledby="dropdownMenuButton-{{ $trainer['id'] }}">
                                        <li>
                                            <a href="{{ route('trainers.show', $trainer['id']) }}"
                                            class="dropdown-item d-flex align-items-center gap-3">
                                                <i class="bi bi-eye text-primary-color"></i>
                                                <span>View Details</span>
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a href="{{ route('trainers.edit' , $trainer['id']) }}"
                                            class="dropdown-item d-flex align-items-center gap-3">
                                                <i class="bi bi-pencil text-primary-color"></i>
                                                <span>Edit Details</span>
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a href = "{{ route('trainers.delete' , $trainer['id']) }}"
                                            class="dropdown-item d-flex align-items-center gap-3 text-danger">
                                                <i class="bi bi-trash"></i>
                                                <span>Delete</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    @else
        <div class="text-center py-5">
            <i class="bi bi-person-workspace display-1 text-muted"></i>
            <h4 class="mt-3 text-muted">No Trainers Available</h4>
            <p class="text-muted">Add your first trainer to get started</p>
        </div>
    @endif

</div>

@endsection
