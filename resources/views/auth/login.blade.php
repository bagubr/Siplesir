@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center" style="height:100%;width:100%;min-width:100%;min-height: 100vh; min-height: 100vh;">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header  d-flex justify-content-center">
                    Login {{env('APP_NAME')}}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-9">
                            <label for="email" class="col-form-label text-md-start">{{ __('Email') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-9">
                            <label for="password" class=" col-form-label text-md-start">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-2 text-center mb-5">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-secondary text-md-start" href="{{ route('password.request') }}">
                                        {{ __('Lupa Password?') }}
                                    </a>
                                @endif
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col-md-12 text-center">
                                <a class="btn btn-info text-md-start" href="{{ route('register') }}">
                                    {{ __('Belum Punya Akun? Daftar') }}
                                </a>
                                <a class="btn btn-danger text-md-start" href="#">
                                <i class="text-white fas fa-google-plus"></i>{{ __('Google') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
