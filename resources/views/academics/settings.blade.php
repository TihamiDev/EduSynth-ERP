@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Settings</h3>
                        <nav class="breadcrumb-card rounded-3" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="card mb-5">
                            <div class="card-header">
                                <i class="bi bi-gear"></i> Session Settings
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-subtle" data-bs-toggle="modal"
                                    data-bs-target="#createSession">
                                    Create Session <i class="bi bi-arrow-right"></i>
                                </button>
                                <button type="button" class="btn btn-subtle" data-bs-toggle="modal"
                                    data-bs-target="#browseSession">
                                    Browse By Session <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card mb-5">
                            <div class="card-header">
                                <i class="bi bi-gear"></i> Academic Settings
                            </div>
                            <div class="card-body">

                                <button type="button" class="btn btn-subtle" data-bs-toggle="modal"
                                    data-bs-target="#attendanceType">
                                    Attendance Type <i class="bi bi-arrow-right"></i>
                                </button>
                                <button type="button" class="btn btn-subtle" data-bs-toggle="modal"
                                    data-bs-target="#assignTeacher">
                                    Assign Teacher <i class="bi bi-arrow-right"></i>
                                </button>
                                <button type="button" class="btn btn-subtle" data-bs-toggle="modal"
                                    data-bs-target="#createClass">
                                    Create Class <i class="bi bi-arrow-right"></i>
                                </button>
                                <button type="button" class="btn btn-subtle" data-bs-toggle="modal"
                                    data-bs-target="#createSection">
                                    Create Section <i class="bi bi-arrow-right"></i>
                                </button>
                                <button type="button" class="btn btn-subtle" data-bs-toggle="modal"
                                    data-bs-target="#createCourse">
                                    Create Course <i class="bi bi-arrow-right"></i>
                                </button>
                                <button type="button" class="btn btn-subtle" data-bs-toggle="modal"
                                    data-bs-target="#finalMarks">
                                    Allow final Marks Submission <i class="bi bi-arrow-right"></i>
                                </button>
                                <button type="button" class="btn btn-subtle" data-bs-toggle="modal"
                                    data-bs-target="#createSemester">
                                    Create Semester for Current Session <i class="bi bi-arrow-right"></i>
                                </button>
                                
                            </div>
                        </div>

                        {{-- Create Session Modal --}}
                        <div class="modal fade" tabindex="-1" id="createSession" aria-labelledby="createSession"
                            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('school.session.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createSession-heading">Create Session</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-primary rounded-3" role="alert">
                                                <div class="d-flex gap-4">
                                                    <span><i class="fa-solid fa-circle-info icon-primary"></i></span>
                                                    <div class="d-flex flex-column gap-2">
                                                        <h6 class="mb-0">
                                                            <small>Create one Session per academic year. Last created session will be considered as the latest academic session.</small>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="2021 - 2022" aria-label="Current Session"
                                                    name="session_name" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-subtle"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Create Session Modal --}}

                        {{-- Browse By Session Modal --}}
                        <div class="modal fade" tabindex="-1" id="browseSession" aria-labelledby="browseSession"
                            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('school.session.browse') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="browseSession-heading">Browse By Session</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-primary rounded-3" role="alert">
                                                <div class="d-flex gap-4">
                                                    <span><i class="fa-solid fa-circle-info icon-primary"></i></span>
                                                    <div class="d-flex flex-column gap-2">
                                                        <h6 class="mb-0">
                                                            <small>Only use this when you want to browse data from previous Sessions.</small>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="semester_id" class="form-label" class="mt-2">Select "Session" to browse by</label>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm"
                                                    name="session_id" required>
                                                    @isset($school_sessions)
                                                        @foreach ($school_sessions as $school_session)
                                                            <option value="{{ $school_session->id }}">
                                                                {{ $school_session->session_name }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-subtle"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> Set</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Browse By Session Modal --}}

                        {{-- Attendance Type Modal --}}
                        <div class="modal fade" tabindex="-1" id="attendanceType" aria-labelledby="attendanceType"
                            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('school.attendance.type.update') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="attendanceType-heading">Attendance Type</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-primary rounded-3" role="alert">
                                                <div class="d-flex gap-4">
                                                    <span><i class="fa-solid fa-circle-info icon-primary"></i></span>
                                                    <div class="d-flex flex-column gap-2">
                                                        <h6 class="mb-0">
                                                            <small>Do not change the type in the middle of a Semester.</small>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mx-2 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="attendance_type"
                                                        id="attendance_type_section"
                                                        {{ $academic_setting->attendance_type == 'section' ? 'checked="checked"' : null }}
                                                        value="section">
                                                    <label class="form-check-label" for="attendance_type_section">
                                                        Attendance by Section
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="attendance_type"
                                                        id="attendance_type_course"
                                                        {{ $academic_setting->attendance_type == 'course' ? 'checked="checked"' : null }}
                                                        value="course">
                                                    <label class="form-check-label" for="attendance_type_course">
                                                        Attendance by Course
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-subtle"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Attendance Type Modal --}}

                        {{-- Assign Teacher Modal --}}
                        <div class="modal fade" tabindex="-1" id="assignTeacher" aria-labelledby="assignTeacher"
                            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('school.teacher.assign') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="assignTeacher-heading">Assign Teacher</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="session_id"
                                                value="{{ $current_school_session_id }}">
                                            <div class="mb-3">
                                                <label for="teacher_id" class="form-label">Select Teacher*</label>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm"
                                                    name="teacher_id" id="teacher_id" required>
                                                    @isset($teachers)
                                                        @foreach ($teachers as $teacher)
                                                            <option value="{{ $teacher->id }}">{{ $teacher->first_name }}
                                                                {{ $teacher->last_name }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="semester_id" class="form-label">Assign to semester*</label>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm"
                                                    name="semester_id" id="semester_id" required>
                                                    @isset($semesters)
                                                        @foreach ($semesters as $semester)
                                                            <option value="{{ $semester->id }}">
                                                                {{ $semester->semester_name }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="class_id" class="form-label">Assign to class*</label>
                                                <select onchange="getSectionsAndCourses(this);"
                                                    class="form-select form-select-sm" aria-label=".form-select-sm"
                                                    name="class_id" id="class_id" required>
                                                    @isset($school_classes)
                                                        <option selected disabled>Please select a class</option>
                                                        @foreach ($school_classes as $school_class)
                                                            <option value="{{ $school_class->id }}">
                                                                {{ $school_class->class_name }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="section-select" class="form-label">Assign to section*</label>
                                                <select class="form-select form-select-sm" id="section-select"
                                                    aria-label=".form-select-sm" name="section_id" required>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="course-select" class="form-label">Assign to course*</label>
                                                <select class="form-select form-select-sm" id="course-select"
                                                    aria-label=".form-select-sm" name="course_id" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-subtle"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Assign Teacher Modal --}}

                        {{-- Create Class Modal --}}
                        <div class="modal fade" tabindex="-1" id="createClass" aria-labelledby="createClass"
                            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('school.class.create') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createClass-heading">Create Class</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="session_id"
                                                value="{{ $current_school_session_id }}">
                                            <div class="mb-3">
                                                <label for="class_name" class="form-label">Class Name*</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="class_name" id="class_name" placeholder="Class name" aria-label="Class name"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-subtle"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Create Class Modal --}}

                        {{-- Create Section Modal --}}
                        <div class="modal fade" tabindex="-1" id="createSection" aria-labelledby="createSection"
                            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('school.section.create') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createSection-heading">Create Section</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="session_id"
                                                value="{{ $current_school_session_id }}">
                                            <div class="mb-3">
                                                <label for="section_name" class="form-label">Section Name*</label>
                                                <input class="form-control form-control-sm" name="section_name" id="section_name"
                                                    type="text" placeholder="Section name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="room_no" class="form-label">Room No.*</label>
                                                <input class="form-control form-control-sm" name="room_no" id="room_no" type="text"
                                                    placeholder="Room No." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="s_class_id" class="form-label">Assign section to class*</label>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm"
                                                    name="class_id" id="s_class_id" required>
                                                    @isset($school_classes)
                                                        @foreach ($school_classes as $school_class)
                                                            <option value="{{ $school_class->id }}">
                                                                {{ $school_class->class_name }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-subtle"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Create Section Modal --}}

                        {{-- Create Course Modal --}}
                        <div class="modal fade" tabindex="-1" id="createCourse" aria-labelledby="createCourse"
                            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('school.course.create') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createCourse-heading">Create Course</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="session_id"
                                                value="{{ $current_school_session_id }}">
                                            <div class="mb-3">
                                                <label for="course_name" class="form-label">Course Name*</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="course_name" id="course_name" placeholder="Course name" aria-label="Course name"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="course_type" class="form-label">Course Type*</label>
                                                <select class="form-select form-select-sm" name="course_type" id="course_type"
                                                    aria-label=".form-select-sm" required>
                                                    <option value="Core">Core</option>
                                                    <option value="General">General</option>
                                                    <option value="Elective">Elective</option>
                                                    <option value="Optional">Optional</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="semester_id" class="form-label">Assign to semester*</label>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm"
                                                    name="semester_id" id="semester_id" required>
                                                    @isset($semesters)
                                                        @foreach ($semesters as $semester)
                                                            <option value="{{ $semester->id }}">
                                                                {{ $semester->semester_name }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="class_id" class="form-label">Assign to class*</label>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm"
                                                    name="class_id" id="class_id" required>
                                                    @isset($school_classes)
                                                        @foreach ($school_classes as $school_class)
                                                            <option value="{{ $school_class->id }}">
                                                                {{ $school_class->class_name }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-subtle"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Create Course Modal --}}
                        
                        {{-- Allow final Marks Submission Modal --}}
                        <div class="modal fade" tabindex="-1" id="finalMarks" aria-labelledby="finalMarks"
                            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('school.final.marks.submission.status.update') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="finalMarks-heading">Allow final Marks Submission</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-primary rounded-3" role="alert">
                                                <div class="d-flex gap-4">
                                                    <span><i class="fa-solid fa-circle-info icon-primary"></i></span>
                                                    <div class="d-flex flex-column gap-2">
                                                        <h6 class="mb-0">
                                                            <small>Usually teachers are allowed to submit final marks just before the end of a "Semester".</small>
                                                            <small>Disallow at the start of a "Semester".</small>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch" style="--bs-form-switch-width:55px;--bs-form-switch-height:30px">
                                                <input class="form-check-input" type="checkbox"
                                                    name="marks_submission_status" role="switch" id="marks_submission_status_check"
                                                    {{ $academic_setting->marks_submission_status == 'on' ? 'checked="checked"' : null }}>
                                                <label class="form-check-label mx-2 mt-2"
                                                    for="marks_submission_status_check"><h5>{{ $academic_setting->marks_submission_status == 'on' ? 'Allowed' : 'Disallowed' }}</h5></label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-subtle"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Allow final Marks Submission Modal --}}

                        {{-- Create Semester for Current Session Modal --}}
                        <div class="modal fade" tabindex="-1" id="createSemester" aria-labelledby="createSemester"
                            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('school.semester.create') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createSemester-heading">Create Semester for Current Session</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="session_id"
                                                value="{{ $current_school_session_id }}">
                                            <div class="mb-3">
                                                <label for="semester_name" class="form-label">Semester Name*</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="First Semester" aria-label="Semester name"
                                                    name="semester_name" id="semester_name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputStarts" class="form-label">Starts*</label>
                                                <input type="date" class="form-control form-control-sm"
                                                    id="inputStarts" placeholder="Starts" name="start_date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputEnds" class="form-label">Ends*</label>
                                                <input type="date" class="form-control form-control-sm" id="inputEnds"
                                                    placeholder="Ends" name="end_date" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-subtle"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Create Semester for Current Session Modal --}}

                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
    <script>
        function getSectionsAndCourses(obj) {
            var class_id = obj.options[obj.selectedIndex].value;

            var url = "{{ route('get.sections.courses.by.classId') }}?class_id=" + class_id

            fetch(url)
                .then((resp) => resp.json())
                .then(function(data) {
                    var sectionSelect = document.getElementById('section-select');
                    sectionSelect.options.length = 0;
                    data.sections.unshift({
                        'id': 0,
                        'section_name': 'Please select a section'
                    })
                    data.sections.forEach(function(section, key) {
                        sectionSelect[key] = new Option(section.section_name, section.id);
                    });

                    var courseSelect = document.getElementById('course-select');
                    courseSelect.options.length = 0;
                    data.courses.unshift({
                        'id': 0,
                        'course_name': 'Please select a course'
                    })
                    data.courses.forEach(function(course, key) {
                        courseSelect[key] = new Option(course.course_name, course.id);
                    });
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection
