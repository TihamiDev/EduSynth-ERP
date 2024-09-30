@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Add Grading Rule</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Grading Rule</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="card mb-5">
                            <div class="card-header">
                                Add Grading Rule
                            </div>
                            <form action="{{ route('exam.grade.system.rule.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="grading_system_id" value="{{ $grading_system_id }}">
                                    <input type="hidden" name="session_id" value="{{ $current_school_session_id }}">
                                    <div class="mb-3">
                                        <label for="inputPoint" class="form-label">Point*</label>
                                        <input type="number" step="0.01" name="point" class="form-control"
                                            id="inputPoint" placeholder="3.5, 4.0, ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputGrade" class="form-label">Grade*</label>
                                        <input type="text" name="grade" class="form-control" id="inputGrade"
                                            placeholder="A+, A-, ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputStarts" class="form-label">Starts*</label>
                                        <input type="number" step="0.01" name="start_at" class="form-control"
                                            id="inputStarts" placeholder="90, 85, ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputEnds" class="form-label">Ends*</label>
                                        <input type="number" step="0.01" name="end_at" class="form-control"
                                            id="inputEnds" placeholder="100, 89, ...">
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="mt-3 btn btn-lg btn-primary"><i class="bi bi-plus"></i>
                                        Add</button>
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
