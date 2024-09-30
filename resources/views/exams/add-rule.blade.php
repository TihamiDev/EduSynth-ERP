@extends('layouts.app')

@section('content')
<div class="mx-5">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h3 class="fw-bold mb-3">Add Exam Rule</h3>
                    <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                        <ol class="breadcrumb mt-4 mx-3">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">Exams</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Exam Rule</li>
                        </ol>
                    </nav>
                    
                    @include('session-messages')

                    <div class="card">
                        <div class="card-header">
                            <i class="bi bi-card-checklist"></i> Add Exam Rule
                        </div>
                        
                            <div class="card-body mb-4">
                            <form action="{{route('exam.rule.store')}}" method="POST">
                                @csrf
                                    <input type="hidden" name="exam_id" value="{{$exam_id}}">
                                    <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                    <div class="mt-2">
                                        <label for="inputTotalMarks" class="form-label">Total Marks*</label>
                                        <input type="number" class="form-control" id="inputTotalMarks" placeholder="10, 100, ..." name="total_marks" step="0.01">
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputPassMarks" class="form-label">Pass Marks*</label>
                                        <input type="number" class="form-control" id="inputPassMarks" placeholder="5, 33, ..." name="pass_marks" step="0.01">
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputMarksDistributionNote" class="form-label">Marks Distribution Note*</label>
                                        <textarea class="form-control" id="inputMarksDistributionNote" rows="3" placeholder="Written: 7, MCQ: 3, ..." name="marks_distribution_note"></textarea>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-lg btn-primary"><i class="bi bi-plus"></i> Add</button>
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
@endsection
