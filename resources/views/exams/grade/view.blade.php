@extends('layouts.app')

@section('content')
<div class="mx-5">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h3 class="fw-bold mb-3">View Grading Systems</h3>
                    <nav class="breadcrumb-card rounded-3" aria-label="breadcrumb">
                        <ol class="breadcrumb mt-4 mx-3">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Grading Systems</li>
                        </ol>
                    </nav>

                    @include('session-messages')

                    <div class="card mb-5">
                    <div class="card-header">
                        <div class="text-end mb-3">
                            <a href="{{ route('exam.grade.system.create') }}" class="btn btn-primary"><i
                                    class="bi bi-plus"></i>
                                Add Grading System</a>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-data bg-white border shadow-sm p-1">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">System Name</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($gradingSystems)
                                    @foreach ($gradingSystems as $gradingSystem)
                                    <tr>
                                        <td>{{$gradingSystem->system_name}}</td>
                                        <td>{{$gradingSystem->schoolClass->class_name}}</td>
                                        <td>{{$gradingSystem->semester->semester_name}}</td>
                                        <td>{{$gradingSystem->created_at}}</td>
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
                                                   
                                                        <a href="{{route('exam.grade.system.rule.create', ['grading_system_id' => $gradingSystem->id])}}" role="button" class="btn btn-sm btn-subtle dropdown-item"><i class="bi bi-plus"></i> Add Rule <i class="bi bi-arrow-right"></i></a>
                                                        </li>
                                                        <li>
                                                        <a href="{{route('exam.grade.system.rule.show', ['grading_system_id' => $gradingSystem->id])}}" role="button" class="btn btn-sm btn-subtle dropdown-item"><i class="bi bi-eye"></i> View Rules <i class="bi bi-arrow-right"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="mt-3">Total Grading Systems: {{ sizeof($gradingSystems) }}</p>
                </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection
