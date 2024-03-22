@extends('backend.layout.master')
@section('title', 'Login')
@section('content')

  <div class="content-wrapper d-flex align-items-center auth">
    <div class="row flex-grow">
      <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left p-5">
          <div class="brand-logo">
            <img src="{{asset('backend/images/logo.svg')}}">
          </div>
          <h4>Hello! let's get started</h4>
          <h6 class="font-weight-light">Sign in to continue.</h6>
          <form class="pt-3" method="POST" action="{{ route('login')}}" >
          @csrf
            <div class="form-group">
              <input type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mt-3">
              <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center">
              <div class="form-check">
                <label class="form-check-label text-muted">
                  <input type="checkbox" class="form-check-input"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Keep me signed in <i class="input-helper"></i></label>
              </div>
              @if (Route::has('password.request'))
                <a class="auth-link text-black" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
              @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
@endsection