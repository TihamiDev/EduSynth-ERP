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
                        <h3 class="fw-bold mb-3">Teacher</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('teacher.list.show') }}">Teacher List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-sm-8 col-md-9">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6>Teacher Information</h6>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-responsive">
                                                <tbody>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">First Name:</th>
                                                        <td>{{ $teacher->first_name }}</td>
                                                        <th class="fw-bold">Last Name:</th>
                                                        <td>{{ $teacher->last_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">Email:</th>
                                                        <td>{{ $teacher->email }}</td>
                                                        <th class="fw-bold" scope="row">Nationality:</th>
                                                        <td>{{ $teacher->nationality }}</td>
                                                    </tr>
                                                    <tr>
                                                    </tr>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">Address:</th>
                                                        <td>{{ $teacher->address }}</td>
                                                        <th class="fw-bold">Address2:</th>
                                                        <td>{{ $teacher->address2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">City:</th>
                                                        <td>{{ $teacher->city }}</td>
                                                        <th class="fw-bold">Zip:</th>
                                                        <td>{{ $teacher->zip }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fw-bold" scope="row">Phone:</th>
                                                        <td>{{ $teacher->phone }}</td>
                                                        <th class="fw-bold">Gender:</th>
                                                        <td>{{ $teacher->gender }}</td>
                                                    </tr>
                                                    <tr>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3">
                                    <div class="card bg-light">
                                        <div class="px-5 pt-2 mx-auto">
                                            @if (isset($teacher->photo))
                                                <img src="{{ asset('/storage' . $teacher->photo) }}"
                                                    class="rounded-circle card-img-top" alt="Profile photo">
                                            @else
                                                <img src="{{ asset('imgs/profile.png') }}"
                                                    class="rounded-circle card-img-top" alt="Profile photo">
                                            @endif
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold">{{ $teacher->first_name }}
                                                {{ $teacher->last_name }}</h5>
                                        </div>
                                        <ul class="list-group list-group-flush mb-2">
                                            <li class="list-group-item"><span class="fw-bold">Gender:</span>
                                                {{ $teacher->gender }}</li>
                                            <li class="list-group-item"><span class="fw-bold">Phone:</span>
                                                {{ $teacher->phone }}</li>
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
