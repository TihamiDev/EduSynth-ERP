@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Create Routine</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create Routine</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="card mb-5">
                            <div class="card-header">
                                Create Routine
                            </div>
                            <form action="{{ route('section.routine.store') }}" method="POST">
                                @csrf

                                <div class="card-body">
                                    <input type="hidden" name="session_id" value="{{ $current_school_session_id }}">
                                    <div class="mb-3">
                                        <label for="class_id" class="form-label">Select class*</label>
                                            <select onchange="getSectionsAndCourses(this);" class="form-select"
                                                name="class_id" id="class_id" required>
                                                @isset($classes)
                                                    <option selected disabled>Please select a class</option>
                                                    @foreach ($classes as $school_class)
                                                        <option value="{{ $school_class->id }}">{{ $school_class->class_name }}
                                                        </option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="section-select" class="form-label">Select section*</label>
                                        <select class="form-select" id="section-select" name="section_id" required>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="course-select" class="form-label">Select course*</label>
                                        <select class="form-select" id="course-select" name="course_id" required>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="week-select" class="form-label">Week Day*</label>
                                        <select class="form-select" id="week-select" name="weekday" required>
                                            <option value="1">Monday</option>
                                            <option value="2">Tuesday</option>
                                            <option value="3">Wednesday</option>
                                            <option value="4">Thursday</option>
                                            <option value="5">Friday</option>
                                            <option value="6">Saturday</option>
                                            <option value="7">Sunday</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputStarts" class="form-label">Starts*</label>
                                        <input type="text" class="form-control" id="inputStarts" name="start"
                                            placeholder="09:00am" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputEnds" class="form-label">Ends*</label>
                                        <input type="text" class="form-control" id="inputEnds" name="end"
                                            placeholder="09:50am" required>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-lg btn-primary"><i class="bi bi-check2"></i>
                                        Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
