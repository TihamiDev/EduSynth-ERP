@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Edit Student</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Student List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Student</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="mb-5">
                            <form class="row g-3" action="{{ route('school.student.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="student_id" value="{{ $student->id }}">

                                <div class="row g-6">
                                    <div class="col-md-6 mt-5">
                                        <h5 class="fw-bold mb-5">Student Information</h5>
                                        <div class="row g-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputFirstName" class="form-label">First Name*</label>
                                                <input type="text" class="form-control" id="inputFirstName"
                                                    name="first_name" placeholder="First Name" required
                                                    value="{{ $student->first_name }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputLastName" class="form-label">Last Name*</label>
                                                <input type="text" class="form-control" id="inputLastName"
                                                    name="last_name" placeholder="Last Name" required
                                                    value="{{ $student->last_name }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputEmail4" class="form-label">Email*</label>
                                            <input type="email" class="form-control" id="inputEmail4" name="email"
                                                required value="{{ $student->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputState" class="form-label">Gender*</label>
                                            <select id="inputState" class="form-select" name="gender" required>
                                                <option value="Male" {{ $student->gender == 'Male' ? 'selected' : null }}>
                                                    Male</option>
                                                <option value="Female" {{ $student->gender == 'Female' ? 'selected' : null }}>
                                                    Female</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputIdCardNumber" class="form-label">Id Card Number*</label>
                                            <input type="text" class="form-control" id="inputIdCardNumber"
                                                name="id_card_number"
                                                placeholder="e.g. 2021-03-01-02-01 (Year Semester Class Section Roll)"
                                                required value="{{ $promotion_info->id_card_number }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-5">
                                        <h5 class="fw-bold mb-5">Personal Information</h5>

                                        <div class="mb-3">
                                            <label for="inputPhone" class="form-label">Phone*</label>
                                            <input type="text" class="form-control" id="inputPhone" name="phone"
                                                placeholder="+880 01......" required value="{{ $student->phone }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputBirthday" class="form-label">Birthday*</label>
                                            <input type="date" class="form-control" id="inputBirthday" name="birthday"
                                                placeholder="Birthday" required value="{{ $student->birthday }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputAddress" class="form-label">Address*</label>
                                            <input type="text" class="form-control" id="inputAddress" name="address"
                                                placeholder="634 Main St" required value="{{ $student->address }}">
                                        </div>
                                        {{-- <div class="mb-3">
                                    <label for="inputAddress2" class="form-label">Address 2</label>
                                    <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Apartment, studio, or floor" value="{{$student->address2}}">
                                </div> --}}
                                        <div class="row g-3">
                                            <div class="col-md-4 mb-3">
                                                <label for="inputCity" class="form-label">City*</label>
                                                <input type="text" class="form-control" id="inputCity" name="city"
                                                    placeholder="Dhaka..." required value="{{ $student->city }}">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="inputZip" class="form-label">Zip*</label>
                                                <input type="text" class="form-control" id="inputZip" name="zip"
                                                    required value="{{ $student->zip }}">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="inputNationality" class="form-label">Nationality*</label>
                                                <input type="text" class="form-control" id="inputNationality"
                                                    name="nationality" placeholder="e.g. Bangladeshi, German, ..."
                                                    required value="{{ $student->nationality }}">
                                            </div>
                                        </div>
                                        {{-- <div class="mb-3">
                                    <label for="inputBloodType" class="form-label">BloodType*</label>
                                    <select id="inputBloodType" class="form-select" name="blood_type" required>
                                        <option value="A+" {{($student->blood_type == 'A+')?'selected':null}}>A+</option>
                                        <option value="A-" {{($student->blood_type == 'A-')?'selected':null}}>A-</option>
                                        <option value="B+" {{($student->blood_type == 'B+')?'selected':null}}>B+</option>
                                        <option value="B-" {{($student->blood_type == 'B-')?'selected':null}}>B-</option>
                                        <option value="O+" {{($student->blood_type == 'O+')?'selected':null}}>O+</option>
                                        <option value="O-" {{($student->blood_type == 'O-')?'selected':null}}>O-</option>
                                        <option value="AB+" {{($student->blood_type == 'AB+')?'selected':null}}>AB+</option>
                                        <option value="AB-" {{($student->blood_type == 'AB-')?'selected':null}}>AB-</option>
                                        <option value="Other" {{($student->blood_type == 'Other')?'selected':null}}>Other</option>
                                    </select>
                                </div> --}}
                                        {{-- <div class="mb-3">
                                    <label for="inputReligion" class="form-label">Religion*</label>
                                    <select id="inputReligion" class="form-select" name="religion" required>
                                        <option {{($student->religion == 'Islam')?'selected':null}}>Islam</option>
                                        <option {{($student->religion == 'Hinduism')?'selected':null}}>Hinduism</option>
                                        <option {{($student->religion == 'Christianity')?'selected':null}}>Christianity</option>
                                        <option {{($student->religion == 'Buddhism')?'selected':null}}>Buddhism</option>
                                        <option {{($student->religion == 'Judaism')?'selected':null}}>Judaism</option>
                                        <option {{($student->religion == 'Other')?'selected':null}}>Other</option>
                                    </select>
                                </div> --}}
                                    </div>

                                    <div class="col-md-6 mt-5">
                                        <h5 class="fw-bold mb-5">Parent Information</h5>
                                        <div class="row g-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputFatherName" class="form-label">Father Name*</label>
                                                <input type="text" class="form-control" id="inputFatherName"
                                                    name="father_name" placeholder="Father Name" required
                                                    value="{{ $parent_info->father_name }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputFatherPhone" class="form-label">Father's Phone*</label>
                                                <input type="text" class="form-control" id="inputFatherPhone"
                                                    name="father_phone" placeholder="+880 01......" required
                                                    value="{{ $parent_info->father_phone }}">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputMotherName" class="form-label">Mother Name*</label>
                                                <input type="text" class="form-control" id="inputMotherName"
                                                    name="mother_name" placeholder="Mother Name" required
                                                    value="{{ $parent_info->mother_name }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputMotherPhone" class="form-label">Mother's Phone*</label>
                                                <input type="text" class="form-control" id="inputMotherPhone"
                                                    name="mother_phone" placeholder="+880 01......" required
                                                    value="{{ $parent_info->mother_phone }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputParentAddress" class="form-label">Address*</label>
                                            <input type="text" class="form-control" id="inputParentAddress"
                                                name="parent_address" placeholder="634 Main St" required
                                                value="{{ $parent_info->parent_address }}">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-lg btn-primary"><i
                                                    class="bi bi-person-check"></i> Update</button>
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
