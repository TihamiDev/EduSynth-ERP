@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Edit Course</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Courses</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="card">
                            <div class="card-header">
                                Edit Course
                            </div>
                            <form class="col" action="{{ route('school.course.update') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="session_id" value="{{ $current_school_session_id }}">
                                    <input type="hidden" name="course_id" value="{{ $course_id }}">
                                    <div class="mb-3">
                                        <label for="course_name" class="form-label">Course Name</label>
                                        <input class="form-control" id="course_name" name="course_name" type="text"
                                            value="{{ $course->course_name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="course_type" class="form-label">Course Type</label>
                                        <select class="form-select" id="course_type" name="course_type"
                                            aria-label="Course type">
                                            <option value="Core" {{ $course->course_type == 'Core' ? 'selected' : '' }}>
                                                Core</option>
                                            <option value="General"
                                                {{ $course->course_type == 'General' ? 'selected' : '' }}>General</option>
                                            <option value="Elective"
                                                {{ $course->course_type == 'Elective' ? 'selected' : '' }}>Elective
                                            </option>
                                            <option value="Optional"
                                                {{ $course->course_type == 'Optional' ? 'selected' : '' }}>Optional
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-lg btn-primary"><i class="bi bi-check2"></i>
                                        Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection
