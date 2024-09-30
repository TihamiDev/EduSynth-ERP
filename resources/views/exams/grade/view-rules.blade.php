@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">View Grading Rule</h3>
                        <nav class="breadcrumb-card rounded-3" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Grading Rule</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="card mb-5">
                            <div class="card-header">
                                View Grading Rule
                            </div>
                            <div class="card-body">

                                <div class="table-data bg-white border shadow-sm p-1">
                                    <table class="table mt-4">
                                        <thead>
                                            <tr>
                                                <th scope="col">System Name</th>
                                                <th scope="col">Points</th>
                                                <th scope="col">Grade</th>
                                                <th scope="col">Starts At</th>
                                                <th scope="col">Ends At</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($gradeRules)
                                                @foreach ($gradeRules as $gradeRule)
                                                    <tr>
                                                        <td>{{ $gradeRule->gradingSystem->system_name }}</td>
                                                        <td>{{ $gradeRule->point }}</td>
                                                        <td>{{ $gradeRule->grade }}</td>
                                                        <td>{{ $gradeRule->start_at }}</td>
                                                        <td>{{ $gradeRule->end_at }}</td>
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
                                                                            <a href="{{ route('exam.grade.system.rule.delete') }}"
                                                                                role="button" class="btn btn-sm btn-subtle dropdown-item"
                                                                                onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{ $gradeRule->id }}').submit();"><i
                                                                                    class="bi bi-trash2"></i> Delete <i
                                                                                    class="bi bi-arrow-right"></i></a>
                                                                            <form id="delete-form-{{ $gradeRule->id }}"
                                                                                action="{{ route('exam.grade.system.rule.delete') }}"
                                                                                method="POST" class="d-none">
                                                                                @csrf
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $gradeRule->id }}">
                                                                            </form>
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
                                <p class="mt-3">Total Grading Rule: {{ sizeof($gradeRules) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection
