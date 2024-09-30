@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Routine</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Classes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Section Routine</li>
                            </ol>
                        </nav>
                        @php
                            function getDayName($weekday)
                            {
                                if ($weekday == 1) {
                                    return 'MONDAY';
                                } elseif ($weekday == 2) {
                                    return 'TUESDAY';
                                } elseif ($weekday == 3) {
                                    return 'WEDNESDAY';
                                } elseif ($weekday == 4) {
                                    return 'THURSDAY';
                                } elseif ($weekday == 5) {
                                    return 'FRIDAY';
                                } elseif ($weekday == 6) {
                                    return 'SATURDAY';
                                } elseif ($weekday == 7) {
                                    return 'SUNDAY';
                                } else {
                                    return 'Noday';
                                }
                            }
                        @endphp
                        <div class="card mb-5">
                            <div class="card-header">
                                Routine
                            </div>
                            <div class="card-body">
                                @if (count($routines) > 0)
                                    <table class="table table-responsive table-bordered rounded-3 text-center">
                                        </thead>
                                        <tbody>
                                            @foreach ($routines as $day => $courses)
                                                <tr>
                                                    <th class="fw-bold">{{ getDayName($day) }}</th>
                                                    @php
                                                        $courses = $courses->sortBy('start');
                                                    @endphp
                                                    @foreach ($courses as $course)
                                                        <td>
                                                            <span class="fw-bold">{{ $course->course->course_name }}</span>
                                                            <div class="fw-bold">{{ $course->start }} - {{ $course->end }}</div>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="p-3 bg-white border shadow-sm">No routine.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection
