@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Edit Section</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Classes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Section</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="card mb-5">
                            <div class="card-header">
                                Edit Section
                            </div>
                            <form class="col" action="{{ route('school.section.update') }}" method="POST">
                                @csrf

                                <div class="card-body">
                                    <input type="hidden" name="session_id" value="{{ $current_school_session_id }}">
                                    <input type="hidden" name="section_id" value="{{ $section_id }}">
                                    <div class="mb-3">
                                        <label for="section_name" class="form-label">Section Name</label>
                                        <input class="form-control" id="section_name" name="section_name" type="text"
                                            value="{{ $section->section_name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="room_no" class="form-label">Room number</label>
                                        <input class="form-control" id="room_no" name="room_no" type="text"
                                            value="{{ $section->room_no }}">
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
