@extends('layouts.app')

@section('content')
<div class="container " style="margin-top:3rem">
    <div class="row">
        <div class="col s6 offset-s3">
            <div class="card">
                <div class="card-content">
                        <div class="card-title center-align green-text darken-1"><h4><strong> Login</strong></h4></div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="email" class="icon-prefix">{{ __('E-Mail Address') }}</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="red-text">{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="red-text">{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="password" class="icon-prefix">{{ __('Password') }}</label>
                        </div>


                        <div class="input-field">
                                <button type="submit" class="btn green darken-1">
                                    {{ __('Login') }}
                                    <i class="material-icons right">send</i>
                                </button>
{{-- 
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
