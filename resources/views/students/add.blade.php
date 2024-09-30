@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Add Student</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Student</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="alert alert-primary rounded-3" role="alert">
                            <div class="d-flex gap-4">
                                <span><i class="fa-solid fa-circle-info icon-primary"></i></span>
                                <div class="d-flex flex-column gap-2">
                                    <h6 class="mb-0">Remember to create related "Class" and "Section" before adding
                                        student</h6>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <form class="row g-3" action="{{ route('school.student.create') }}" method="POST">
                                @csrf

                                <div class="row g-6">
                                    <div class="col-md-6 mt-5">
                                        <h5 class="fw-bold mb-5">Student Information</h5>
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
                                                <label for="inputEmail4" class="form-label">Email*</label>
                                                <input type="email" class="form-control" id="inputEmail4" name="email"
                                                    required value="{{ old('email') }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputPassword4" class="form-label">Password*</label>
                                                <input type="password" class="form-control" id="inputPassword4"
                                                    name="password" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputState" class="form-label">Gender*</label>
                                            <select id="inputState" class="form-select" name="gender" required>
                                                <option value="Male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                                    Male
                                                </option>
                                                <option value="Female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputIdCardNumber" class="form-label">Id Card Number*</label>
                                            <input type="text" class="form-control" id="inputIdCardNumber"
                                                name="id_card_number"
                                                placeholder="e.g. 2021-03-01-02-01"
                                                required value="{{ old('id_card_number') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-5">
                                        <h5 class="fw-bold mb-5">Personal Information</h5>
                                        <div class="mb-3">
                                            <label for="inputPhone" class="form-label">Phone*</label>
                                            <input type="text" class="form-control" id="inputPhone" name="phone"
                                                placeholder="+91 98......" required value="{{ old('phone') }}">
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="formFile" class="form-label">Photo</label>
                                                <input class="form-control" type="file" id="formFile"
                                                    onchange="previewFile()">
                                                <div id="previewPhoto"></div>
                                                <input type="hidden" id="photoHiddenInput" name="photo" value="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputBirthday" class="form-label">Birthday*</label>
                                                <input type="date" class="form-control" id="inputBirthday"
                                                    name="birthday" placeholder="Birthday" required
                                                    value="{{ old('birthday') }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputAddress" class="form-label">Address*</label>
                                            <input type="text" class="form-control" id="inputAddress" name="address"
                                                placeholder="634 Main St" required value="{{ old('address') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputAddress2" class="form-label">Address 2</label>
                                            <input type="text" class="form-control" id="inputAddress2" name="address2"
                                                placeholder="Apartment, studio, or floor" value="{{ old('address2') }}">
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
                                        <div class="mb-3">
                                            <label for="inputBloodType" class="form-label">BloodType*</label>
                                            <select id="inputBloodType" class="form-select" name="blood_type" required>
                                                <option {{ old('blood_type') == 'A+' ? 'selected' : '' }}>A+</option>
                                                <option {{ old('blood_type') == 'A-' ? 'selected' : '' }}>A-</option>
                                                <option {{ old('blood_type') == 'B+' ? 'selected' : '' }}>B+</option>
                                                <option {{ old('blood_type') == 'B-' ? 'selected' : '' }}>B-</option>
                                                <option {{ old('blood_type') == 'O+' ? 'selected' : '' }}>O+</option>
                                                <option {{ old('blood_type') == 'O-' ? 'selected' : '' }}>O-</option>
                                                <option {{ old('blood_type') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                <option {{ old('blood_type') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                <option {{ old('blood_type') == 'other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputReligion" class="form-label">Religion*</label>
                                            <select id="inputReligion" class="form-select" name="religion" required>
                                                <option {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                <option {{ old('religion') == 'Hinduism' ? 'selected' : '' }}>Hinduism
                                                </option>
                                                <option {{ old('religion') == 'Christianity' ? 'selected' : '' }}>
                                                    Christianity
                                                </option>
                                                <option {{ old('religion') == 'Buddhism' ? 'selected' : '' }}>Buddhism
                                                </option>
                                                <option {{ old('religion') == 'Judaism' ? 'selected' : '' }}>Judaism
                                                </option>
                                                <option {{ old('religion') == 'Others' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-5">
                                        <h5 class="fw-bold mb-5">Parent Information</h5>
                                        <div class="row g-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputFatherName" class="form-label">Father Name*</label>
                                                <input type="text" class="form-control" id="inputFatherName"
                                                    name="father_name" placeholder="Father Name" required
                                                    value="{{ old('father_name') }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputFatherPhone" class="form-label">Father's Phone*</label>
                                                <input type="text" class="form-control" id="inputFatherPhone"
                                                    name="father_phone" placeholder="+91 98......" required
                                                    value="{{ old('father_phone') }}">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputMotherName" class="form-label">Mother Name*</label>
                                                <input type="text" class="form-control" id="inputMotherName"
                                                    name="mother_name" placeholder="Mother Name" required
                                                    value="{{ old('mother_name') }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputMotherPhone" class="form-label">Mother's Phone*</label>
                                                <input type="text" class="form-control" id="inputMotherPhone"
                                                    name="mother_phone" placeholder="+91 98......" required
                                                    value="{{ old('mother_name') }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputParentAddress" class="form-label">Address*</label>
                                            <input type="text" class="form-control" id="inputParentAddress"
                                                name="parent_address" placeholder="634 Main St" required
                                                value="{{ old('parent_address') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-5">
                                        <h5 class="fw-bold mb-5">Academic Information</h5>
                                        <div class="mb-3">
                                            <label for="inputAssignToClass" class="form-label">Assign to class:*</label>
                                            <select onchange="getSections(this);" class="form-select"
                                                id="inputAssignToClass" name="class_id" required>
                                                @isset($school_classes)
                                                    <option selected disabled>Please select a class</option>
                                                    @foreach ($school_classes as $school_class)
                                                        <option value="{{ $school_class->id }}">
                                                            {{ $school_class->class_name }}
                                                        </option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputAssignToSection" class="form-label">Assign to
                                                section:*</label>
                                            <select class="form-select" id="inputAssignToSection" name="section_id"
                                                required>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputBoardRegistrationNumber" class="form-label">Board
                                                registration
                                                No.</label>
                                            <input type="text" class="form-control" id="inputBoardRegistrationNumber"
                                                name="board_reg_no" placeholder="Registration No."
                                                value="{{ old('board_reg_no') }}">
                                        </div>
                                        <input type="hidden" name="session_id"
                                            value="{{ $current_school_session_id }}">
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-lg btn-primary">
                                            <i class="bi bi-person-plus"></i> Add
                                        </button>
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
    <script>
        function getSections(obj) {
            var class_id = obj.options[obj.selectedIndex].value;

            var url = "{{ route('get.sections.courses.by.classId') }}?class_id=" + class_id

            fetch(url)
                .then((resp) => resp.json())
                .then(function(data) {
                    var sectionSelect = document.getElementById('inputAssignToSection');
                    sectionSelect.options.length = 0;
                    data.sections.unshift({
                        'id': 0,
                        'section_name': 'Please select a section'
                    })
                    data.sections.forEach(function(section, key) {
                        sectionSelect[key] = new Option(section.section_name, section.id);
                    });
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
    @include('components.photos.photo-input')
@endsection
