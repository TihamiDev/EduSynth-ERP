@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Edit Class</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Classes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Class</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="card">
                            <div class="card-header">
                                Edit Class
                            </div>
                            <form class="col" action="{{ route('school.class.update') }}" method="POST">
                                @csrf
                                <div class="card-body">

                                    <input type="hidden" name="session_id" value="{{ $current_school_session_id }}">
                                    <input type="hidden" name="class_id" value="{{ $class_id }}">
                                    <div class="mb-3">
                                        <label for="class_name" class="form-label">Class Name</label>
                                        <input class="form-control" id="class_name" name="class_name" type="text"
                                            value="{{ $schoolClass->class_name }}">
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
