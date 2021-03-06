@extends('layouts.app', ['class' => ''])

@section('content')

<div class="container mt-5 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card shadow">
        <div class="card-body px-lg-5 py-lg-5">
          <div class="text-muted text-center mt-2 mb-3">{{ __('Please sign in') }}</div>
          <form role="form" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}"
                  value="admin@argon.com" required autofocus>
              </div>
              @if ($errors->has('email'))
              <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                  placeholder="{{ __('Password') }}" type="password" required>
              </div>
              @if ($errors->has('password'))
              <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary my-2">{{ __('Sign in') }}</button>
            </div>
            <div class="row">
              <div class="col-sm-8 text-center text-sm-left">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                  <small>{{ __('Forgot password?') }}</small>
                </a>
                @endif
              </div>
              <div class="col-sm-4 text-center text-sm-left">
                <a href="{{ route('register') }}">
                  <small>{{ __('Create new account') }}</small>
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
