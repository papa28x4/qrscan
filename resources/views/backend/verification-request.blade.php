@extends('backend.layout.master')
@section('title', 'Verify Email')
@push('child-styles')
<link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
@endpush
@section('content')
  

        <!-- main-panel starts -->
        
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-email-outline"></i>
                </span> Verify Your Email Address
              </h3>
            </div>
            <div class="card">
                <div class="row">
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        <p>We have sent an email to {{auth()->user()->email}}</p>   
                        <p> You need to verify your email to continue. If you have not received the verification email, please check your <b>Spam</b> or <b>Bulk</b> Email Folder. You can also click the resend button below to have it sent to you again.</p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Resend Verification Email</button>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        
      
        <!-- main-panel ends -->
    

@endsection
 