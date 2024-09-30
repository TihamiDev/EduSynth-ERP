@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Create Exam</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create Exam</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="card mb-5">
                            <div class="card-header">
                                Create Exam
                            </div>
                            <div class="card-body">
                                <form action="{{ route('exam.create') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="session_id" value="{{ $current_school_session_id }}">
                                    <div class="mb-3">
                                        <label for="semester_id" class="form-label">Select Semester:*</label>
                                        <select class="form-select" name="semester_id" id="semester_id">
                                            @isset($semesters)
                                                @foreach ($semesters as $semester)
                                                    <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="class_id" class="form-label">Select class:*</label>
                                        <select onchange="getCourses(this);" class="form-select" name="class_id" id="class_id">
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
                                        <label for="course_id" class="form-label">Select course:*</label>
                                        <select class="form-select" id="course-select" name="course_id" id="course_id">
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exam_name" class="form-label">Exam name*</label>
                                        <input type="text" class="form-control" name="exam_name" id="exam_name"
                                            placeholder="Quiz, Assignment, Mid term, Final, ..."
                                            aria-label="Quiz, Assignment, Mid term, Final, ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputStarts" class="form-label">Starts*</label>
                                        <input type="datetime-local" class="form-control" id="inputStarts" name="start_date"
                                            placeholder="Starts">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputEnds" class="form-label">Ends*</label>
                                        <input type="datetime-local" class="form-control" id="inputEnds" name="end_date"
                                            placeholder="Ends">
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
            @include('layouts.footer')
        </div>
    </div>
    </div>
    <script>
        function getCourses(obj) {
            var class_id = obj.options[obj.selectedIndex].value;

            var url = "{{ route('get.sections.courses.by.classId') }}?class_id=" + class_id

            fetch(url)
                .then((resp) => resp.json())
                .then(function(data) {

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
