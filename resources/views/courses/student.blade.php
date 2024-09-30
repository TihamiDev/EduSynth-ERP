@extends('layouts.app')

@section('content')
<div class="mx-5">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h3 class="fw-bold mb-3">My Courses</h3>
                    <nav class="breadcrumb-card rounded-3" aria-label="breadcrumb">
                        <ol class="breadcrumb mt-4 mx-3">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My courses</li>
                        </ol>
                    </nav>

                    @include('session-messages')

                    <div class="card">
                        <div class="card-header">
                            My Courses
                        </div>
                    <div class="card-body">
                        <div class="p-1 bg-white border shadow-sm">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Course Name</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($courses)
                                        @foreach ($courses as $course)
                                        <tr>
                                            <td>{{$course->course_name}}</td>
                                            <td>
                                                <div class="link-group" role="group">
                                                    <div class="dropdown">
                                                        <button class="btn btn-default dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                    <a href="{{route('course.mark.show', [
                                                        'course_id' => $course->id,
                                                        'course_name' => $course->course_name,
                                                        'semester_id' => $course->semester_id,
                                                        'class_id'  => $class_info->class_id,
                                                        'session_id' => $course->session_id,
                                                        'section_id' => $class_info->section_id,
                                                        'student_id' => Auth::user()->id
                                                        ])}}" role="button" class="btn btn-sm btn-subtle dropdown-item"><i class="bi bi-cloud-sun"></i> View Marks <i class="bi bi-arrow-right"></i></a></li>
                                                    <li><a href="{{route('course.syllabus.index', ['course_id'  => $course->id])}}" role="button" class="btn btn-sm btn-subtle dropdown-item"><i class="bi bi-journal-text"></i> View Syllabus <i class="bi bi-arrow-right"></i></a></li>
                                                    <li><a href="{{route('assignment.list.show', ['course_id' => $course->id])}}" role="button" class="btn btn-sm btn-subtle dropdown-item"><i class="bi bi-file-post"></i> View Assignments <i class="bi bi-arrow-right"></i></a></li>
                                                            </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection
