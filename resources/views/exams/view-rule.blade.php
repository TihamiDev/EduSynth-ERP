@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Exam Rules</h3>
                        <nav class="breadcrumb-card rounded-3" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Exams</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Exam Rules</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="card mb-5">
                            <div class="card-header">
                                <div class="text-end mb-3">
                                    <a href="{{ route('exam.rule.create') }}" class="btn btn-primary"><i
                                            class="bi bi-plus"></i>
                                        Add Exam Rule</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-data bg-white border shadow-sm p-1">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">Total Marks</th>
                                                <th scope="col">Pass Marks</th>
                                                <th scope="col">Marks Distribution Note</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($exam_rules as $exam_rule)
                                                <tr>
                                                    <td>{{ $exam_rule->total_marks }}</td>
                                                    <td>{{ $exam_rule->pass_marks }}</td>
                                                    <td>{{ $exam_rule->marks_distribution_note }}</td>
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
                                                                        <a type="button"
                                                                            href="{{ route('exam.rule.edit', [
                                                                                'exam_rule_id' => $exam_rule->id,
                                                                            ]) }}"
                                                                            class="btn btn-sm btn-subtle dropdown-item"><i
                                                                                class="bi bi-pen"></i> Edit <i
                                                                                class="bi bi-arrow-right"></i></a>
                                                                    </li>
                                                                    {{-- <li>
                                                                        <button type="button" class="btn btn-sm btn-subtle dropdown-item"><i class="bi bi-trash2"></i> Delete <i class="bi bi-arrow-right"></i></button>
                                                                    </li> --}}
                                                            </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p class="mt-3">Total Exam Rules: {{ sizeof($exam_rules) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection
