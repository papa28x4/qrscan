@extends('backend.layout.master')
@section('title', 'Change Password')
@push('child-styles')
    <link href="/backend/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
@endpush
@section('content')
<div class="content-wrapper">
    @include('backend.partials.flash_message')
    <form class="bg-white" action="{{route('user.password.update')}}" method="POST">
        <div class="row">
            @method('PUT')
            @csrf
            
            
            <div class="col-md-8 mx-auto">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <a class="back" href="{{route('dashboard.index')}}">
                                <h6 class="text-success">Back</h6>
                            </a>
                        </div>
                        <h6 class="text-right">Change Password</h6>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="{{ old('current_password') }}" placeholder="Current Password" required  autofocus>

                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="{{ old('new_password') }}" placeholder="New Password"required >

                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <input id="confirm_new_password" type="password" class="form-control @error('confirm_new_password') is-invalid @enderror" name="confirm_new_password" required placeholder="Confirm New Password" autocomplete="new-password">
                            @error('confirm_new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-5 text-right"><button class="btn btn-success profile-button" type="submit">Update Password</button></div>
                </div>
            </div> 
        </div>
    </form>  
</div>
@endsection
@push('child-scripts')
    <script src="/backend/plugins/select2/js/select2.min.js"></script>
    <script>
        $('#category').select2()
        $('#designation').select2()
    </script>
@endpush