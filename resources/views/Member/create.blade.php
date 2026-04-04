@extends('Shared.layout')
@section('title' , 'Add Member')
@section('content')
{{-- @use(app\Enums\Gender) --}}

<header class="mb-4">
    <h3 class="text-primary-color">Add Member</h3>
</header>
<form action="{{route('members.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- Step navigation -->
    <ul class="nav nav-tabs mb-4" id="addMemberTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="member-tab" data-bs-toggle="tab"
                    data-bs-target="#member-info" type="button" role="tab">
                Member Info
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="health-tab" data-bs-toggle="tab" data-bs-target="#health-info"
                    type="button" role="tab">
                Health Data
            </button>
        </li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content">
        <!-- Member Info -->
        <div class="tab-pane fade show active" id="member-info" role="tabpanel"
             aria-labelledby="member-tab">
            <div class="section-header mb-3">
                <h5 class="text-primary fw-bold">Personal Information</h5>
                <hr class="mt-2">
            </div>
            <div class="row g-3">
                <div class="form-group">
                    <!-- Photo Preview -->
                    <div class="mt-2">
                        <img id="photoPreview" src="#" alt="Photo Preview" style="max-width: 200px; display: none;"
                             class="img-thumbnail" />
                    </div>
                     <label class="control-label">Profile Photo <span class="text-danger">*</span></label>
                    <input name="PhotoFile" type="file" class="form-control" accept="image/*" id="photoInput"  />
                    <span  class="text-danger"></span>
                    <small class="form-text text-muted">Max size: 5 MB. Allowed types: JPG, PNG, GIF (Required)</small>
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label">Name</label>
                    <input name = "name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label asp-for="Email"  class="form-label">Email</label>
                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="col-12 col-md-6">
                    <label asp-for="Phone" class="form-label">Phone</label>
                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"/>
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label asp-for="BirthDate" class="form-label">Birth Date</label>
                    <input name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" type="date" value="{{ old('date_of_birth') }}" />
                    @error('date_of_birth')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label asp-for="Gender" class="form-label">Gender</label>
                    <select name="gender" class="form-select @error('gender') is-invalid @enderror" value="{{ old('gender') }}">
                        <option value="">-- Select Gender --</option>
                        @foreach(\App\Enums\Gender::cases() as $gender)
                        <option value="{{ $gender->value }}" {{ old('gender') == $gender->value ? 'selected' : '' }}>
                            {{ $gender->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="section-header mb-3 mt-4">
                <h5 class="text-primary fw-bold">Address Information</h5>
                <hr class="mt-2">
            </div>
            <div class="row g-3">

                <div class="col-12 col-md-6">
                    <label asp-for="BuildingNumber" class="form-label">Building Number</label>
                    <input name="building_no" class="form-control @error('building_no') is-invalid @enderror" value="{{ old('building_no') }}"/>
                    @error('building_no')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label asp-for="Street"  class="form-label">Street</label>
                    <input name="street" class="form-control @error('street') is-invalid @enderror" value="{{ old('street') }}"/>
                    @error('street')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label asp-for="City" class="form-label">City</label>
                    <input name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}"/>
                    @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Health Data -->
        <div class="tab-pane fade" id="health-info" role="tabpanel" aria-labelledby="health-tab">
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label class="form-label">Height</label>
                    <input name="health_record_height" class="form-control @error('health_record_height') is-invalid @enderror" value="{{ old('health_record_height') }}"/>
                    @error('health_record_height')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label">Weight</label>
                    <input name="health_record_weight" class="form-control @error('health_record_weight') is-invalid @enderror" value="{{ old('health_record_weight') }}"/>
                    @error('health_record_weight')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label">Blood Type</label>
                    <select name="health_record_blood_type" class="form-select @error('health_record_blood_type') is-invalid @enderror" >
                        <option value="{{ old('health_record_blood_type') }}">Select</option>
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>O+</option>
                        <option>O-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                    </select>
                    @error('health_record_blood_type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">Note</label>
                    <input name="health_record_note" class="form-control" />
                </div>
            </div>
        </div>
    </div>

    <footer class="d-flex justify-content-end gap-3 mt-4">
        <a href="{{route('members.index')}}" class="btn btn-outline-secondary px-4">
            <i class="bi bi-arrow-left me-2"></i> Back to List
        </a>

        <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-plus-circle me-2"></i> Add
        </button>
    </footer>

</form>

<script>
    // Preview photo before upload
    document.getElementById('photoInput').addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = document.getElementById('photoPreview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection
