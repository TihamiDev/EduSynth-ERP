@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Create Grading System</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create Grading System</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="card mb-5">
                            <div class="card-header">
                                Create Grading System
                            </div>
                            <div class="card-body">
                                <form action="{{ route('exam.grade.system.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="session_id" value="{{ $current_school_session_id }}">
                                    <div class="mb-3">
                                        <label for="class_id" class="form-label">Select class*</label>
                                        <select class="form-select" name="class_id" id="class_id" required>
                                            @isset($school_classes)
                                                @foreach ($school_classes as $school_class)
                                                    <option value="{{ $school_class->id }}">{{ $school_class->class_name }}
                                                    </option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="semester_id" class="form-label">Select semester*</label>
                                        <select class="form-select" aria-label=".form-select-sm" name="semester_id"
                                            id="semester_id" required>
                                            @isset($semesters)
                                                @foreach ($semesters as $semester)
                                                    <option value="{{ $semester->id }}"
                                                        {{ $semester->id === request()->query('semester_id') ? 'selected' : '' }}>
                                                        {{ $semester->semester_name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="system_name" class="form-label">Grading System name*</label>
                                        <input type="text" class="form-control" placeholder="Grading System 1"
                                            aria-label="Grading System 1" name="system_name" id="system_name" required>
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
@endsection
