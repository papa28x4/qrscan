@extends('backend.layout.master')
@section('title', 'Edit Profile')
@push('child-styles')
    <link href="/backend/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
@endpush
@section('content')
<div class="content-wrapper lime-body">
    @include('backend.partials.flash_message')
    <form class=" bg-white" action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
        <div class="row">
            @method('PUT')
            @csrf
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    {{-- <img class="rounded-circle mt-5" src="{{auth()->user()->avatar}}" width="90"> --}}
                    <div class="profile-img edit-target" title="Click to edit avatar">
                        <img class="rounded-circle mt-5" src="{{auth()->user()->avatar()}}"  width="100">
                        <span class="edit-circle second-svg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>			
                        </span>
                        <input type="file" name="avatar" class="avatar-file files fileInput" accept="image/x-png,image/gif,image/jpeg">
                    </div>
                    <div class="d-flex flex-column mt-2">
                        @error('avatar')
                        <small id="avatarHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        <span class="font-weight-bold mt-1">{{auth()->user()->fullname()}}</span>
                        <span class="text-black-50 mt-1">{{auth()->user()->email}}</span>
                        <span class="mt-1">{{auth()->user()->country ?? '' }}</span>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <a class="back" href="{{route('dashboard.index')}}">
                                <h6 class="text-success">Back</h6>
                            </a>
                        </div>
                        <h6 class="text-right">Edit Profile</h6>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input name="name" type="text" class="form-control" placeholder="First name" value="{{old('name') ?? auth()->user()->name}}">
                            @error('name')
                            <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input name="last_name" type="text" class="form-control" value="{{old('last_name') ?? auth()->user()->last_name}}" placeholder="Last name">
                            @error('last_name')
                            <small id="lastnameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input name="email" type="text" class="form-control" placeholder="Email" value="{{old('email') ?? auth()->user()->email}}">
                            @error('email')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input name="phone" type="text" class="form-control" value="{{old('phone') ?? auth()->user()->phone}}" placeholder="Phone number">
                            @error('phone')
                            <small id="phoneHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input name="company" type="text" class="form-control" placeholder="Company name" value="{{old('company') ?? auth()->user()->company}}">
                            @error('company')
                            <small id="companyHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input name="address" type="text" class="form-control" placeholder="address" value="{{old('address') ?? auth()->user()->address}}">
                            @error('address')
                            <small id="addressHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input name="city" type="text" class="form-control" value="{{old('city') ?? auth()->user()->city}}" placeholder="City">
                            @error('city')
                            <small id="cityHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input name="country" type="text" class="form-control" value="{{old('country') ?? auth()->user()->country}}" placeholder="Country">
                            @error('country')
                            <small id="countryHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-5 text-right"><button class="btn btn-success profile-button" type="submit">Save Profile</button></div>
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