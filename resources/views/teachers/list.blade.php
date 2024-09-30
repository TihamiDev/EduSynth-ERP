@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Teacher List</h3>
                        <nav class="breadcrumb-card rounded-3" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Teacher List</li>
                            </ol>
                        </nav>
                        
                        @include('session-messages')

                        <div class="card mb-5">
                            <div class="card-header">
                                <div class="text-end mb-3">
                                    <a href="{{ route('teacher.create.show') }}" class="btn btn-primary"><i
                                            class="bi bi-plus"></i>
                                        Add Teacher</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-data bg-white border shadow-sm p-1">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                {{-- <th scope="col">Photo</th> --}}
                                                <th scope="col">First Name</th>
                                                <th scope="col">Last Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($teachers as $teacher)
                                                <tr>
                                                    {{-- <td>
                                                        @if (isset($teacher->photo))
                                                            <img src="{{ asset('/storage' . $teacher->photo) }}"
                                                                class="rounded" alt="Profile picture" height="30"
                                                                width="30">
                                                        @else
                                                            <i class="bi bi-person-square"></i>
                                                        @endif
                                                    </td> --}}
                                                    <td>{{ $teacher->first_name }}</td>
                                                    <td>{{ $teacher->last_name }}</td>
                                                    <td>{{ $teacher->email }}</td>
                                                    <td>{{ $teacher->phone }}</td>
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
                                                                        <a href="{{ url('teachers/view/profile/' . $teacher->id) }}"
                                                                            role="button"
                                                                            class="btn btn-sm btn-subtle dropdown-item"><i
                                                                                class="bi bi-eye"></i> Profile <i
                                                                                class="bi bi-arrow-right"></i></a>
                                                                    </li>
                                                                    @can('edit users')
                                                                        <li>
                                                                            <a href="{{ route('teacher.edit.show', ['id' => $teacher->id]) }}"
                                                                                role="button"
                                                                                class="btn btn-sm btn-subtle dropdown-item"><i
                                                                                    class="bi bi-pen"></i> Edit <i
                                                                                    class="bi bi-arrow-right"></i></a>
                                                                        </li>
                                                                    @endcan
                                                                </ul>
                                                            </div>

                                                            {{-- <button type="button" class="btn btn-sm btn-primary"><i class="bi bi-trash2"></i> Delete</button> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p class="mt-3">Total Teachers: {{ sizeof($teachers) }}</p>
                            </div>
                        </div>
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    @endsection
