@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Exams</h3>
                        <nav class="breadcrumb-card rounded-3" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Exam</li>
                            </ol>
                        </nav>

                        @include('session-messages')
                        
                        <div class="text-end mb-3">
                            <a href="{{ route('exam.create.show') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Add
                                Exam</a>
                        </div>

                        <div class="card mb-5">
                            <div class="card-header">
                                <h6>Filter list by:</h6>
                                <div class="mb-4 mt-4">
                                    <form action="{{ route('exam.list.show') }}" method="GET">
                                        <div class="row">
                                            <div class="col-3">
                                                <select class="form-select" aria-label="Class" name="class_id">
                                                    @isset($classes)
                                                        @foreach ($classes as $school_class)
                                                            <option value="{{ $school_class->id }}">
                                                                {{ $school_class->class_name }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <select class="form-select" aria-label="Status" name="semester_id">
                                                    @isset($semesters)
                                                        @foreach ($semesters as $semester)
                                                            <option value="{{ $semester->id }}">{{ $semester->semester_name }}
                                                            </option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="bi bi-arrow-counterclockwise"></i> Load List</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-data bg-white p-1 border shadow-sm">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Course</th>
                                                <th scope="col">Created at</th>
                                                <th scope="col">Starts</th>
                                                <th scope="col">Ends</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($exams as $exam)
                                                @if (Auth::user()->role == 'admin')
                                                    <tr>
                                                        <td>{{ $exam->exam_name }}</td>
                                                        <td>{{ $exam->course->course_name }}</td>
                                                        <td>{{ $exam->created_at }}</td>
                                                        <td>{{ $exam->start_date }}</td>
                                                        <td>{{ $exam->end_date }}</td>
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
                                                                            <a href="{{ route('exam.rule.create', ['exam_id' => $exam->id]) }}"
                                                                                role="button"
                                                                                class="btn btn-sm btn-subtle dropdown-item"><i
                                                                                    class="bi bi-plus"></i> Add Rule <i class="bi bi-arrow-right"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="{{ route('exam.rule.show', ['exam_id' => $exam->id]) }}"
                                                                                role="button"
                                                                                class="btn btn-sm btn-subtle dropdown-item"><i
                                                                                    class="bi bi-eye"></i> View Rule <i class="bi bi-arrow-right"></i></a>
                                                                        </li>
                                                                        {{-- <li>
                                                                            <a href="{{ route('exam.edit', ['exam_id' => $exam->id]) }}"
                                                                                role="button"
                                                                                class="btn btn-sm btn-subtle dropdown-item"><i
                                                                                    class="bi bi-pen"></i> Edit <i class="bi bi-arrow-right"></i></a>
                                                                        </li> --}}
                                                                        {{-- <li>
                                                                            <a href="{{ route('exam.delete') }}"
                                                                                role="button" class="btn btn-sm btn-subtle dropdown-item"
                                                                                onclick="event.preventDefault();
                                                                            document.getElementById('exam-delete-form-{{ $exam->id }}').submit();"><i
                                                                                    class="bi bi-trash2"></i> Delete <i class="bi bi-arrow-right"></i></a>
                                                                            <form id="exam-delete-form-{{ $exam->id }}"
                                                                                action="{{ route('exam.delete') }}"
                                                                                method="POST" class="d-none">
                                                                                @csrf
                                                                                <input type="hidden" name="exam_id"
                                                                                    value="{{ $exam->id }}">
                                                                            </form>
                                                                        </li> --}}
                                                                </div>
                                                        </td>
                                                    </tr>
                                                @elseif(Auth::user()->role == 'teacher')
                                                    @foreach ($teacher_courses as $teacher_course)
                                                        @if ($exam->course->id != $teacher_course->course_id)
                                                            @continue
                                                        @else
                                                            <tr>
                                                                <td>{{ $exam->exam_name }}</td>
                                                                <td>{{ $exam->course->course_name }}</td>
                                                                <td>{{ $exam->created_at }}</td>
                                                                <td>{{ $exam->start_date }}</td>
                                                                <td>{{ $exam->end_date }}</td>
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
                                                                        <a href="{{ route('exam.rule.create', ['exam_id' => $exam->id]) }}"
                                                                            role="button"
                                                                            class="btn btn-sm btn-subtle dropdown-item"><i
                                                                                class="bi bi-plus"></i> Add Rule <i class="bi bi-arrow-right"></i></a>
                                                                                </li>
                                                                                <li>
                                                                        <a href="{{ route('exam.rule.show', ['exam_id' => $exam->id]) }}"
                                                                            role="button"
                                                                            class="btn btn-sm btn-subtle dropdown-item"><i
                                                                                class="bi bi-eye"></i> View Rule <i class="bi bi-arrow-right"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p class="mt-3">Total Exams: {{ sizeof($exams) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection
