@extends('layouts.app')

@section('content')
    <style>
        /* .table th:first-child,
    .table td:first-child {
      position: relative;
      background-color: #f8f9fa;
    } */
    </style>
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Student</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('student.list.show') }}">Student List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-sm-8 col-md-9">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h6>Student Information</h6>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-responsive">
                                                <tbody>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">First Name:</th>
                                                        <td>{{ $student->first_name }}</td>
                                                        <th class="fw-bold">Last Name:</th>
                                                        <td>{{ $student->last_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">Email:</th>
                                                        <td>{{ $student->email }}</td>
                                                        <th class="fw-bold">Birthday:</th>
                                                        <td>{{ $student->birthday }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">Nationality:</th>
                                                        <td>{{ $student->nationality }}</td>
                                                        <th class="fw-bold">Religion:</th>
                                                        <td>{{ $student->religion }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">Address:</th>
                                                        <td>{{ $student->address }}</td>
                                                        <th class="fw-bold">Address2:</th>
                                                        <td>{{ $student->address2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">City:</th>
                                                        <td>{{ $student->city }}</td>
                                                        <th class="fw-bold">Zip:</th>
                                                        <td>{{ $student->zip }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">Blood Type:</th>
                                                        <td>{{ $student->blood_type }}</td>
                                                        <th class="fw-bold">Phone:</th>
                                                        <td>{{ $student->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">Gender:</th>
                                                        <td colspan="3">{{ $student->gender }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h6>Parent Information</h6>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-responsive">
                                                <tbody>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">Father's Name:</th>
                                                        <td>{{ $student->parent_info->father_name }}</td>
                                                        <th class="fw-bold">Mother's Name:</th>
                                                        <td>{{ $student->parent_info->mother_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">Father's Phone:</th>
                                                        <td>{{ $student->parent_info->father_phone }}</td>
                                                        <th class="fw-bold">Mother's Phone:</th>
                                                        <td>{{ $student->parent_info->mother_phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">Address:</th>
                                                        <td colspan="3">{{ $student->parent_info->parent_address }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h6>Academic Information</h6>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-responsive">
                                                <tbody>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">Class:</th>
                                                        <td>{{ $promotion_info->section->schoolClass->class_name }}</td>
                                                        <th class="fw-bold">Board Reg. No.:</th>
                                                        <td>{{ $student->academic_info->board_reg_no }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">Section:</th>
                                                        <td colspan="3">{{ $promotion_info->section->section_name }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3">
                                    <div class="card bg-light">
                                        <div class="px-5 pt-2 mx-auto">
                                            @if (isset($student->photo))
                                                <img src="{{ asset('/storage' . $student->photo) }}"
                                                    class="rounded-circle card-img-top" alt="Profile photo">
                                            @else
                                                <img src="{{ asset('imgs/profile.png') }}"
                                                    class="rounded-circle card-img-top" alt="Profile photo">
                                            @endif
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold">{{ $student->first_name }}
                                                {{ $student->last_name }}</h5>
                                            <p class="card-text fw-bold">#ID: {{ $promotion_info->id_card_number }}</p>
                                        </div>
                                        <ul class="list-group list-group-flush mb-2">
                                            <li class="list-group-item"><span class="fw-bold">Gender:</span>
                                                {{ $student->gender }}</li>
                                            <li class="list-group-item"><span class="fw-bold">Phone:</span>
                                                {{ $student->phone }}</li>
                                            {{-- <li class="list-group-item"><a href="#">View Marks &amp; Results</a></li> --}}
                                        </ul>
                                    </div>
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
