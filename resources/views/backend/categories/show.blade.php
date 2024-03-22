@extends('backend.layout.master')
@section('title', 'View Category')
@push('child-styles')
  <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
@endpush
@section('content')

<div class="lime-body">
    <div class="content-wrapper">
        @include('backend.partials.flash_message')
        <div class="col-12 px-0">
            <div class="card">
                <div class="card-content col-xl-10 col-md-12 col-sm-12 mx-auto">
                    <div class="card-body view-category">
                        <h5 class="card-title mb-0">View Category</h5>
                    </div>
                   <div class="row">
                        <div class="col-lg-6 col-sm-12 order-2 order-lg-1 pt-4">
                            <ul class="list-group list-group-flush category-details">
                                <li class="list-group-item info">
                                    <h6>Name</h6>
                                    <p class="mb-0">{{$category->name}}</p> 
                                </li>
                                <li class="list-group-item info">
                                    <h6>Description</h6>
                                    <p>{{$category->description}}</p> 
                                </li>
                            </ul>
                        </div>
                        {{-- <div class="col-lg-6 col-sm-12 order-1 order-lg-2 mb-5">
                            <div class="mx-auto">
                                <img src="{{ $category->image() }}" style="width:640px; height:360px" alt="Product image" class="img-fluid d-block mx-auto">
                            </div>
                        </div> --}}
                   </div>
                   
                    <div class="card-body pl-3 float-right">
                        <a class="text-white btn btn-warning mt-3" href="{{route('categories.edit', $category->slug)}}" class="card-link">Edit</a>
                        <a class="btn btn-primary mt-3 card-link" href="{{route('categories.index')}}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection