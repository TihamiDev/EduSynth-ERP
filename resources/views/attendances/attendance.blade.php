@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/fullcalendar5.9.0.min.css') }}">
<script src="{{ asset('js/fullcalendar5.9.0.main.min.js') }}"></script>
<div class="mx-5">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h3 class="fw-bold mb-3">View Attendance</h3>
                    <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                        <ol class="breadcrumb mt-4 mx-3">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Student List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Attendance</li>
                        </ol>
                    </nav>

                    <h5 class="fw-bold">Student Name: {{$student->first_name}} {{$student->last_name}}</h5>
                    <div class="row mx-2 mt-3">
                        <div class="col bg-white p-3 border shadow-sm rounded-3">
                            <div id="attendanceCalendar"></div>
                        </div>
                    </div>
                    <div class="row mx-2 mt-4 mb-5">
                        <div class="card">
                            <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Context</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        <tr>
                                            <td>
                                                @if ($attendance->status == "on")
                                                    <span class="badge bg-success">PRESENT</span>
                                                @else
                                                    <span class="badge bg-danger">ABSENT</span>
                                                @endif
                                                
                                            </td>
                                            <td>{{$attendance->created_at}}</td>
                                            <td>{{($attendance->section == null)?$attendance->course->course_name:$attendance->section->section_name}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (sizeof($attendances) == 0)
                                <p class="text-center">Nothing to Show!</p>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@php
$events = array();
if(count($attendances) > 0){
    foreach ($attendances as $attendance){
        if($attendance->status == "on"){
            $events[] = ['title'=> "Present", 'start' => $attendance->created_at, 'color'=>'green'];
        } else {
            $events[] = ['title'=> "Absent", 'start' => $attendance->created_at, 'color'=>'red'];
        }
    }
}
@endphp
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('attendanceCalendar');
    var attEvents = @json($events);
                            
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 350,
        events: attEvents,
    });
    calendar.render();
});
</script>
@endsection
