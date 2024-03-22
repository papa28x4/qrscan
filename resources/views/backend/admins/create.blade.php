@extends('backend.layout.master')
@section('title', 'Create Admin')
@push('child-styles')
    <link href="/backend/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
@endpush
@section('content')
<div class="content-wrapper lime-body">  
    <form class="bg-white" action="{{route('admins.store')}}" method="POST">
        @include('backend.partials.flash_message')
        <div class="row">
            @csrf
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    {{-- <img class="rounded-circle mt-5" src="{{auth()->user()->avatar}}" width="90"> --}}
                    <div class="profile-img">
                        <img class="rounded-circle mt-5" src="/backend/images/faces/avatar.PNG"  width="100">
                        <span class="edit-circle second-svg" title="Click to edit avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>			
                        </span>
                        <input type="file" name="avatar" class="avatar-file files fileInput" accept="image/x-png,image/gif,image/jpeg">
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
                        <h6 class="text-right">Add Admin</h6>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input name="name" type="text" class="form-control" placeholder="First name" value="{{old('name')}}">
                            @error('name')
                            <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input name="last_name" type="text" class="form-control" value="{{old('last_name')}}" placeholder="Last name">
                            @error('last_name')
                            <small id="lastnameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input name="email" type="text" class="form-control" placeholder="Email" value="{{old('email')}}">
                            @error('email')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input name="password" type="password" class="form-control" value="{{old('password')}}" placeholder="Password">
                            @error('password')
                            <small id="passwordHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input name="phone" type="text" class="form-control" value="{{old('phone')}}" placeholder="Phone number">
                            @error('phone')
                            <small id="phoneHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <select id="roles" class="form-control roles" name="roles">
                                <option value="">Admin Type</option>
                                @foreach($roles as $role)
                                <option value="{{$role->name}}">
                                    {{$role->name}}
                                </option>
                               @endforeach
                            </select>
                            @error('roles')
                            <small id="rolesHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-5 text-right"><button class="btn btn-success profile-button" type="submit">Create Admin</button></div>
                </div>
            </div> 
        </div>
    </form>  
</div>
@endsection
@push('child-scripts')
    <script src="/backend/plugins/select2/js/select2.min.js"></script>
    <script>
        $('#roles').select2()
    </script>
@endpush