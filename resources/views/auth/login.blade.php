@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="" style="display: flex; margin-top: 15px;">
                                <div class="line" style="height: 1px; width: 100%; background-color: #dbdbdb;"></div>
                                <span class="atau" style="color: #ccc; padding: 0 16px; font-size: .95rem; position: relative; bottom: 10px;">ATAU</span>
                                <div class="line" style="height: 1px; width: 100%; background-color: #dbdbdb;"></div>
                            </div>
    
                            <div class="row w-100 d-flex justify-content-center gap-3">
                                <div class="w-auto" style="margin-left: 15px;">
                                    <a href="/auth/github/redirect" class="btn btn-dark border border-dark rounded" style="width: 180px; font-size: 16px;">
                                        <img src="{{url('assets/img/GitHub-Mark (2).png')}}" alt="" width="35" class="rounded-circle" style="margin-right: 5px;">
                                        Github
                                    </a>
                                </div>
                                <div class="w-auto">
                                    <a href="/auth/google/redirect" class="btn btn-light border border-dark rounded" style="width: 180px; font-size: 16px;">
                                        <img src="{{url('assets/img/google.png')}}" alt="" width="35" class="rounded-circle" style="margin-right: 5px;">
                                        Google
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
