@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-7 col-xl-7 col-xxl-7">
                <div class="row pt-3">
                    <div class="col ps-4">
                        <!-- <h1 class="display-6 mb-3"><i class="ms-auto bi bi-grid"></i> {{ __('Dashboard') }}</h1> -->

                        @include('session-messages')
                        
                        @if (session()->has('browse_session_name') && session('browse_session_name') !== $current_school_session_name)
                            <div class="alert alert-warning rounded-3" role="alert">
                                <div class="d-flex gap-4">
                                    <span><i class="fa-solid fa-circle-exclamation icon-warning"></i></span>
                                    <div class="d-flex flex-column gap-2">
                                        <h6 class="mb-0">Browsing as Academic Session
                                            {{ session('browse_session_name') }}.</h6>
                                    </div>
                                </div>
                            </div>
                        @elseif(\App\Models\SchoolSession::latest()->count() > 0)
                            <div class="alert alert-warning rounded-3" role="alert">
                                <div class="d-flex gap-4">
                                    <span><i class="fa-solid fa-circle-info icon-primary"></i></span>
                                    <div class="d-flex flex-column gap-2">
                                        <h6 class="mb-0">Current Academic Session {{ $current_school_session_name }}.</h6>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning rounded-3" role="alert">
                                <div class="d-flex gap-4">
                                    <span><i class="fa-solid fa-circle-exclamation icon-warning"></i></span>
                                    <div class="d-flex flex-column gap-2">
                                        <h6 class="mb-0">Create an Academic Session.</h6>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @php
                            $time = (int)date("H");

                            if ($time < '12') {
                                $greeting = 'Good Morning';
                            } else if ($time < '18') {
                                $greeting = 'Good Afternoon';
                            } else {
                                $greeting = 'Good Evening';
                            }
                        @endphp

                        @if (Auth::user()->role == 'teacher')
                       
                            <div class="col">
                                <div class="dashboard-banner p-3 rounded-3">
                                    <div class="row">
                                        <div class="col-8 message">
                                            <h4>{{$greeting}}, <strong>Mr. {{ Auth::user()->first_name }}!</strong></h4>
                                            <p><strong>Have a great day at work!</strong></p>
                                            <p><i>Important Notice: There's a staff meeting at 3 PM today. <br>Don't miss
                                                    it!</i></p>
                                        </div>
                                        <div class="col-4 image d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('imgs/business_meeting.png') }}" alt="img"
                                                height="100px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (Auth::user()->role == 'student')
                            <div class="col">
                                <div class="dashboard-banner p-3 rounded-3">
                                    <div class="row">
                                        <div class="col-8 message">
                                            <h4>{{$greeting}}, <strong>Mr. {{ Auth::user()->first_name }}!</strong></h4>
                                            <p><strong>Have a great day at work!</strong></p>
                                        </div>
                                        <div class="col-4 image d-flex justify-content-center align-items-center">
                                            <img width="96" height="96" src="https://img.icons8.com/color/96/partly-cloudy-day--v1.png" alt="partly-cloudy-day--v1"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row dashboard mt-4">

                            <div class="col">
                                <div class="card rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto mt-1">
                                                <div class="fw-bold mt-1">
                                                    <i class="fa-solid fa-user-graduate fa-2xl"></i>
                                                </div>
                                            </div>
                                            <h2>{{ $studentCount }}</h2>
                                        </div>
                                        <div class="text-end">Total Students</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto mt-1">
                                                <div class="fw-bold mt-1">
                                                    <i class="fa-solid fa-chalkboard-user fa-2xl"></i>
                                                </div>
                                            </div>
                                            <h2>{{ $teacherCount }}</h2>
                                        </div>
                                        <div class="text-end">Total Teachers</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto mt-1">
                                                <div class="fw-bold mt-1">
                                                    <i class="fa-solid fa-users-rectangle fa-2xl"></i>
                                                </div>
                                            </div>
                                            <h2>{{ $classCount }}</h2>
                                        </div>
                                        <div class="text-end">Total Classes</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($studentCount > 0)
                            <div class="card mt-3 p-3">
                                <div class="mb-3">
                                    <span class="ps-2 me-2">Students %</span>
                                    <span class="badge text-bg-primary rounded-2 p-1 border">Male</span>
                                    <span class="badge text-bg-secondary rounded-2 p-1 border">Female</span>
                                </div>
                                @php
                                    $maleStudentPercentage = round($maleStudentsBySession / $studentCount, 2) * 100;
                                    $maleStudentPercentageStyle = "style='background-color: #0678c8; width:
                                    $maleStudentPercentage%'";

                                    $femaleStudentPercentage =
                                        round(($studentCount - $maleStudentsBySession) / $studentCount, 2) * 100;
                                    $femaleStudentPercentageStyle = "style='background-color: #49a4fe; width:
                                    $femaleStudentPercentage%'";
                                @endphp

                                <div class="progress mx-2" style="height: 18px;" role="progressbar">
                                    <div class="progress-bar progress-bar-striped bg-primary" {!! $maleStudentPercentageStyle !!}
                                        aria-valuenow="{{ $maleStudentPercentage }}" aria-valuemin="0" aria-valuemax="100">
                                        {{ $maleStudentPercentage }}%</div>
                                    <div class="progress-bar progress-bar-striped bg-secondary" {!! $femaleStudentPercentageStyle !!}
                                        aria-valuenow="{{ $femaleStudentPercentage }}" aria-valuemin="0"
                                        aria-valuemax="100">{{ $femaleStudentPercentage }}%</div>
                                </div>

                            </div>
                        @endif

                        <div class="admin-quick-links">
                            <div class="row dashboard mt-5">

                                <h6 class="fw-bold">Quick Links</h6>

                                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'teacher')
                                <div class="col">
                                    <a href="{{ route('student.list.show') }}" class="card click-card rounded-3">
                                        <div class="card-body p-4 m-0">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold mt-1">
                                                        <img width="64" height="64"
                                                            src="https://img.icons8.com/arcade/64/students.png"
                                                            alt="students" />
                                                    </div>
                                                </div>
                                                <h5 class="mt-5 pt-2">Students</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endif

                                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'teacher')
                                <div class="col">
                                    <a href="{{ route('teacher.list.show') }}" class="card click-card rounded-3">
                                        <div class="card-body p-4 m-0">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto mt-1">
                                                    <div class="fw-bold mt-1">
                                                        <img width="64" height="64"
                                                            src="https://img.icons8.com/dusk/64/teacher.png"
                                                            alt="teacher" />
                                                    </div>
                                                </div>
                                                <h5 class="mt-5 pt-2">Teachers</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endif

                                @if (Auth::user()->role == 'student')
                                <div class="col">
                                    <a href="{{ route('student.attendance.show', ['id' => Auth::user()->id]) }}" class="card click-card rounded-3">
                                        <div class="card-body p-4 m-0">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold mt-1">
                                                        <img width="64" height="64"
                                                            src="https://img.icons8.com/arcade/64/students.png"
                                                            alt="students" />
                                                    </div>
                                                </div>
                                                <h5 class="mt-5 pt-2">Attendance</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endif

                                @if (Auth::user()->role == 'student')
                                <div class="col">
                                    <a href="{{ route('course.student.list.show', ['student_id' => Auth::user()->id]) }}" class="card click-card rounded-3">
                                        <div class="card-body p-4 m-0">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto mt-1">
                                                    <div class="fw-bold mt-1">
                                                        <img width="64" height="64"
                                                            src="https://img.icons8.com/dusk/64/teacher.png"
                                                            alt="courses" />
                                                    </div>
                                                </div>
                                                <h5 class="mt-5 pt-2">Courses</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endif

                                @if (Auth::user()->role == 'admin')
                                    <div class="col">
                                        <a href="{{ url('academics/settings') }}" class="card click-card rounded-3">
                                            <div class="card-body p-4 m-0">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto mt-1">
                                                        <div class="fw-bold mt-1">
                                                            <img width="64" height="64"
                                                                src="https://img.icons8.com/pulsar-gradient/64/motarboard.png"
                                                                alt="motarboard" />
                                                        </div>
                                                    </div>
                                                    <h5 class="mt-5 pt-2">Academic</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif

                                @if (Auth::user()->role == 'teacher')
                                    <div class="col">
                                        <a href="{{ route('course.teacher.list.show', ['teacher_id' => Auth::user()->id]) }}" class="card click-card rounded-3">
                                            <div class="card-body p-4 m-0">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto mt-1">
                                                        <div class="fw-bold mt-1">
                                                            <img width="64" height="64" src="https://img.icons8.com/external-topaz-kerismaker/64/external-Courses-e-learning-topaz-kerismaker.png" alt="external-Courses-e-learning-topaz-kerismaker"/>
                                                        </div>
                                                    </div>
                                                    <h5 class="mt-5 pt-2">My Courses</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </div>

                            @if (Auth::user()->role == 'admin')
                                <div class="row dashboard mt-5" style="margin-bottom: 50px">

                                    <div class="col">
                                        <a href="{{ route('notice.create') }}" class="card click-card rounded-3">
                                            <div class="card-body p-4 m-0">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto mt-1">
                                                        <div class="fw-bold mt-1">
                                                            <img width="64" height="64"
                                                                src="https://img.icons8.com/external-bearicons-blue-bearicons/64/external-Notice-reminder-and-to-do-bearicons-blue-bearicons.png"
                                                                alt="external-Notice-reminder-and-to-do-bearicons-blue-bearicons" />
                                                        </div>
                                                    </div>
                                                    <h5 class="mt-5 pt-2">Notices</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col">
                                        <a href="{{ route('events.show') }}" class="card click-card rounded-3">
                                            <div class="card-body p-4 m-0">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto mt-1">
                                                        <div class="fw-bold mt-1">
                                                            <img width="64" height="64"
                                                                src="https://img.icons8.com/cute-clipart/64/event-accepted.png"
                                                                alt="event-accepted" />
                                                        </div>
                                                    </div>
                                                    <h5 class="mt-5 pt-2">Events</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col">
                                        <a href="{{ url('classes') }}" class="card click-card rounded-3">
                                            <div class="card-body p-4 m-0">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto mt-1">
                                                        <div class="fw-bold mt-1">
                                                            <img width="64" height="64"
                                                                src="https://img.icons8.com/external-tal-revivo-fresh-tal-revivo/64/external-classroom-with-different-section-and-classes-in-school-school-fresh-tal-revivo.png"
                                                                alt="external-classroom-with-different-section-and-classes-in-school-school-fresh-tal-revivo" />
                                                        </div>
                                                    </div>
                                                    <h5 class="mt-5 pt-2">Classes</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
            <div class="right-menu col-xs-2 col-sm-2 col-md-2 col-lg-3 col-xl-3 col-xxl-3">
                <div class="card mb-3 mt-3" style="border: none">
                    <div class="card-header p-0 m-2 fw-bold" style="background: transparent !important">Schedule</div>
                    <div class="card-body text-dark p-0 m-2">
                        @include('components.events.event-calendar', [
                            'editable' => 'false',
                            'selectable' => 'false',
                        ])
                        {{-- <div class="overflow-auto" style="height: 250px;">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small>3 days ago</small>
                                </div>
                                <p class="mb-1">Some placeholder content in a paragraph.</p>
                                <small>And some small print.</small>
                            </a>
                        </div>
                    </div> --}}
                    </div>
                </div>

                <div class="card my-5 mx-0 p-0" style="border: none">
                    <div class="card-header m-2 p-0 d-flex justify-content-between" style="background: transparent !important">
                        <span class="fw-bold">Notifications</span> {{ $notices->links() }}
                    </div>
                    <div class="card-body m-2 p-0 text-dark">
                        <div>
                            @isset($notices)
                                {{-- <div class="accordion accordion-flush" id="noticeAccordion"> --}}
                                @foreach ($notices as $notice)
                                    <div class="notice mx-0 row mb-2" id="notice-{{ $notice->id }}">
                                        <div class="col-1 notice-col-1"></div>
                                        <div class="col-12 notice-col-2">
                                            <small class="notice-header fw-bold">Published at:
                                                {{ date_format($notice->created_at, 'd F, h:i') }}</small>
                                            <small class="notice-body m-0">{!! Purify::clean($notice->notice) !!}</small>
                                        </div>
                                    </div>
                                    {{-- <div class="accordion-item">
                                            <h6 class="accordion-header" id="flush-heading{{ $notice->id }}">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapse{{ $notice->id }}"
                                                    aria-expanded={{ $loop->first ? 'true' : 'false' }}
                                                    aria-controls="flush-collapse{{ $notice->id }}">
                                                    Published at: {{ $notice->created_at }}
                                                </button>
                                            </h6>
                                            <div id="flush-collapse{{ $notice->id }}"
                                                class="accordion-collapse collapse {{ $loop->first ? 'show' : 'hide' }}"
                                                aria-labelledby="flush-heading{{ $notice->id }}"
                                                data-bs-parent="#noticeAccordion">
                                                <div class="accordion-body overflow-auto">
                                                    {!! Purify::clean($notice->notice) !!}</div>
                                            </div>
                                        </div> --}}
                                @endforeach
                            @endisset
                            @if (count($notices) < 1)
                                <div class="p-2">No notices</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
