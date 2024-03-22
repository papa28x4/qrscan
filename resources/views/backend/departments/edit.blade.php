@extends('backend.layout.master')
@section('title', 'Edit Department')
@push('child-styles')
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
@endpush
@section('content')
<div class="content-wrapper">
    <div class="container">
        @include('backend.partials.flash_message')
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4 flex-end text-right mb-5">Edit Department</h5>
                        <form action="{{route('departments.update', $department->slug)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                           @method('put')
                            
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-4">
                                    {{-- <label for="name">Name</label> --}}
                                    <input name="name" type="text" class="form-control" id="name" value="{{old('name') ?? $department->name}}" placeholder="Enter a department">
                                    @error('name')
                                    <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                
                            <button class="btn btn-success mt-3" type="submit">Update department</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('child-scripts')
   
@endpush