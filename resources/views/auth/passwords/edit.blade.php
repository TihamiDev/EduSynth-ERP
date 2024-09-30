@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Change Password</h3>
                        <nav class="breadcrumb-card rounded-3 mb-4" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                            </ol>
                        </nav>

                        @include('session-messages')

                        <div class="card col-8 mx-auto">
                            <div class="card-header">
                                <i class="bi bi-shield-check"></i> Change Password
                            </div>
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf

                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="old-password" class="form-label">Old Password*</label>
                                        <input class="form-control" id="old-password" name="old_password" type="password"
                                            placeholder="Old password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="new-password" class="form-label">New Password*</label>
                                        <input class="form-control" id="new-password" name="new_password" type="password"
                                            placeholder="New password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password_confirmation" class="form-label">Confirm new
                                            Password*</label>
                                        <input class="form-control" id="new_password_confirmation"
                                            name="new_password_confirmation" type="password"
                                            placeholder="Confirm new password">
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-lg btn-primary"><i class="bi bi-check2"></i>
                                        Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection
