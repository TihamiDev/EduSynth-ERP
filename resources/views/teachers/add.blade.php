@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Add Teacher</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Teacher</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="mb-5">
                            <form class="row g-3" action="{{ route('school.teacher.create') }}" method="POST">
                                @csrf

                                <div class="row g-6">
                                    <div class="col-md-6 mt-5">
                                        <h5 class="fw-bold mb-5">Teacher Information</h5>
                                        <div class="row g-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputFirstName" class="form-label">First Name*</label>
                                                <input type="text" class="form-control" id="inputFirstName"
                                                    name="first_name" placeholder="First Name" required
                                                    value="{{ old('first_name') }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputLastName" class="form-label">Last Name*</label>
                                                <input type="text" class="form-control" id="inputLastName"
                                                    name="last_name" placeholder="Last Name" required
                                                    value="{{ old('last_name') }}">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputEmail" class="form-label">Email*</label>
                                                <input type="email" class="form-control" id="inputEmail" name="email"
                                                    required value="{{ old('email') }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputPassword" class="form-label">Password*</label>
                                                <input type="password" class="form-control" id="inputPassword"
                                                    name="password" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputGender" class="form-label">Gender*</label>
                                            <select id="inputGender" class="form-select" name="gender" required>
                                                <option value="Male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="Female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-5">
                                        <h5 class="fw-bold mb-5">Personal Information</h5>
                                        <div class="row g-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputPhone" class="form-label">Phone*</label>
                                                <input type="text" class="form-control" id="inputPhone" name="phone"
                                                    placeholder="+91 98......" required value="{{ old('phone') }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="formFile" class="form-label">Photo</label>
                                                <input class="form-control" type="file" id="formFile"
                                                    onchange="previewFile()">
                                                <div id="previewPhoto"></div>
                                                <input type="hidden" id="photoHiddenInput" name="photo" value="">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputAddress" class="form-label">Address*</label>
                                                <input type="text" class="form-control" id="inputAddress"
                                                    name="address" placeholder="Flat No., Floor" required
                                                    value="{{ old('address') }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputAddress2" class="form-label">Address 2</label>
                                                <input type="text" class="form-control" id="inputAddress2"
                                                    name="address2" placeholder="Apartment, Area, or Landmark"
                                                    value="{{ old('address2') }}">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-4 mb-3">
                                                <label for="inputCity" class="form-label">City*</label>
                                                <input type="text" class="form-control" id="inputCity" name="city"
                                                    placeholder="Noida..." required value="{{ old('city') }}">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="inputZip" class="form-label">Zip*</label>
                                                <input type="text" class="form-control" id="inputZip" name="zip"
                                                    required value="{{ old('zip') }}">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="inputNationality" class="form-label">Nationality*</label>
                                                <input type="text" class="form-control" id="inputNationality"
                                                    name="nationality" placeholder="e.g. India, ..."
                                                    required value="{{ old('nationality') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-lg btn-primary"><i
                                                class="bi bi-person-plus"></i> Add</button>
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
