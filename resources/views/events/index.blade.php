@extends('layouts.app')

@section('content')
<div class="mx-5">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h3 class="fw-bold mb-3">Create Events</h3>
                    <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                        <ol class="breadcrumb mt-4 mx-3">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Events</li>
                        </ol>
                    </nav>

                    <div class="row bg-white p-4 shadow-sm">
                        @include('components.events.event-calendar', ['editable' => 'true', 'selectable' => 'true'])
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection
