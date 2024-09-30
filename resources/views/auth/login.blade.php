@extends('layouts.app')

@section('content')
<div class="m-0 p-0 h-100">
    <div class="row align-items-center h-100">
        <div class="col-md-6 justify-content-center text-center m-0 p-0 h-100" style="background: #367BF5">
            <h1 class="fw-bold mt-5 pt-5">Welcome To ERP.</h1>
            <p class="fw-bold text-white">Powering student-centric education <br>in universities & colleges</p>
            <img src="{{asset('imgs/login_illustrator.png')}}" alt="img" height="380px">
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center m-0 p-0 h-100 bg-white">
            <div class="login-card">
                <div class="mb-4 bg-white text-center">
                    <h2><b>{{ __('Login') }}</b></h2>
                </div>

                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Email address" />

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Password" />

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <div class="d-flex mb-3 form-check">
                            <div class="pt-2 me-auto">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                            <div class="pt-0">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
