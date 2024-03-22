@extends('backend.layout.master')
@section('title', 'Create User')
@push('child-styles')
    <link href="/backend/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
    <style>
        select.chosen{
            color: rgb(73, 80, 87);
        }
        label{
            color: #777;
        }
    </style>
@endpush

@section('content')
<div class="content-wrapper lime-body">
    @include('backend.partials.flash_message')
    <form class=" bg-white" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
        <div class="row">
            @csrf
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    {{-- <img class="rounded-circle mt-5" src="{{auth()->user()->avatar}}" width="90"> --}}
                    <div class="profile-img edit-target" title="Click to edit avatar">
                        <img class="rounded-circle mt-5" src="https://i.ibb.co/jzfhPsd/avatar.png"  width="100">
                        <span class="edit-circle second-svg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>			
                        </span>
                        <input type="file" name="avatar" class="avatar-file files fileInput" accept="image/x-png,image/gif,image/jpeg">
                    </div>
                    <div class="d-flex flex-column mt-2">
                        @error('avatar')
                        <small id="avatarHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <a class="back" href="{{route('users.index')}}">
                                <h6 class="text-success">Back</h6>
                            </a>
                        </div>
                        <h6 class="text-right">Create User</h6>
                    </div>
                    <div class="text-right">
                        <small>
                            Fields marked with <span class="text-danger">*</span> are required
                        </small>
                    </div>
                <hr class="mt-2 mb-4 w-25 mr-0" style="padding-left:22%"/>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="name">First Name<span class="text-danger">*</span></label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="First name" value="{{old('name')}}">
                            @error('name')
                            <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last_name">Last Name<span class="text-danger">*</span></label>
                            <input id="last_name" name="last_name" type="text" class="form-control" value="{{old('last_name')}}" placeholder="Last name">
                            @error('last_name')
                            <small id="lastnameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input id="email" name="email" type="text" class="form-control" placeholder="Email" value="{{old('email')}}">
                            @error('email')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Phone<span class="text-danger">*</span></label>
                            <input id="phone" name="phone" type="text" class="form-control" value="{{old('phone')}}" placeholder="Phone number">
                            @error('phone')
                            <small id="phoneHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        {{-- <div class="col-md-6">
                            <input name="date_of_birth" type="date" class="form-control" value="{{old('date_of_birth') ?? $user->date_of_birth}}" placeholder="Date Of Birth">
                            @error('date_of_birth')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
                        {{-- <div class="col-md-6">
                            <input name="hire_date" type="date" class="form-control" value="{{old('hire_date') ?? $user->hire_date}}" placeholder="Hire Date">
                            @error('hire_date')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
                        <div class="col-md-6">
                            <label for="date_of_birth">Date of Birth</label>
                            <input id="date_of_birth" name="date_of_birth" type="text" class="form-control" placeholder="DD/MM/YY" value="{{old('date_of_birth')}}" 
                            onfocus="(this.type='date')">
                            @error('date_of_birth')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                      
                        <div class="col-md-6">
                            <label for="hire_date">Hire Date</label>
                            <input id="hire_date" name="hire_date" type="text" class="form-control" placeholder="DD/MM/YY" value="{{old('hire_date')}}" 
                            onfocus="(this.type='date')">
                            @error('hire_date')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="job_title">Job Title</label>
                            <input id="job_title" name="job_title" type="text" class="form-control" value="{{old('job_title')}}" placeholder="Job Title">
                            @error('job_title')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="department">Department</label>
                            <select id="department" class="form-control @if(old('department_id')) chosen @endif" name="department_id" id="">
                                <option value="">Select a department</option>
                                @foreach ($departments as $department)
                                <option @if(old('department_id') == $department->id ) selected @endif value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="address">Address</label>
                            <input id="address" name="address" type="text" class="form-control" placeholder="address" value="{{old('address')}}">
                            @error('address')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="employee_status">Employee Status</label>
                            <select id="employee_status" class="form-control @if(old('employee_status')) chosen @endif" name="employee_status" id="">
                                <option value="">Select a department</option>
                                @foreach ($types as $type)
                                <option @if(old('employee_status') == $type) selected @endif value="{{$type}}">{{$type}}</option>
                                @endforeach
                            </select>
                            @error('employee_status')
                            <small class="form-text text-danger">{{ $message }}</small>
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