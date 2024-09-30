@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Edit Teacher</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Teacher List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Teacher</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="mb-5">
                            <form class="row g-3" action="{{ route('school.teacher.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">

                                <div class="row g-6">
                                    <div class="col-md-6 mt-5">
                                        <h5 class="fw-bold mb-5">Teacher Information</h5>
                                        <div class="row g-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputFirstName" class="form-label">First Name*</label>
                                                <input type="text" class="form-control" id="inputFirstName"
                                                    name="first_name" placeholder="First Name" required
                                                    value="{{ $teacher->first_name }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputLastName" class="form-label">Last Name*</label>
                                                <input type="text" class="form-control" id="inputLastName"
                                                    name="last_name" placeholder="Last Name" required
                                                    value="{{ $teacher->last_name }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputEmail" class="form-label">Email*</label>
                                            <input type="email" class="form-control" id="inputEmail" name="email"
                                                required value="{{ $teacher->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputState" class="form-label">Gender*</label>
                                            <select id="inputState" class="form-select" name="gender" required>
                                                <option value="Male" {{ $teacher->gender == 'Male' ? 'selected' : null }}>
                                                    Male</option>
                                                <option value="Female"
                                                    {{ $teacher->gender == 'Female' ? 'selected' : null }}>
                                                    Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-5">
                                        <h5 class="fw-bold mb-5">Personal Information</h5>

                                        <div class="mb-3">
                                            <label for="inputPhone" class="form-label">Phone*</label>
                                            <input type="text" class="form-control" id="inputPhone" name="phone"
                                                placeholder="+880 01......" required value="{{ $teacher->phone }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputAddress" class="form-label">Address*</label>
                                            <input type="text" class="form-control" id="inputAddress" name="address"
                                                placeholder="634 Main St" required value="{{ $teacher->address }}">
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-4 mb-3">
                                                <label for="inputCity" class="form-label">City*</label>
                                                <input type="text" class="form-control" id="inputCity" name="city"
                                                    placeholder="Dhaka..." required value="{{ $teacher->city }}">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="inputZip" class="form-label">Zip*</label>
                                                <input type="text" class="form-control" id="inputZip" name="zip"
                                                    required value="{{ $teacher->zip }}">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="inputNationality" class="form-label">Nationality*</label>
                                                <input type="text" class="form-control" id="inputNationality"
                                                    name="nationality" placeholder="e.g. Bangladeshi, German, ..."
                                                    required value="{{ $teacher->nationality }}">
                                            </div>
                                        </div>
                                        {{-- <div class="col-3">
                                                <label for="inputAddress2" class="form-label">Address 2</label>
                                                <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Apartment, studio, or floor" value="{{$teacher->address2}}">
                                            </div> --}}


                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-lg btn-primary"><i
                                                    class="bi bi-person-check"></i> Update</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>

    @include('components.photos.photo-input')
@endsection
