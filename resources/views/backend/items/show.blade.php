@extends('backend.layout.master')
@section('title', 'Show Item')
@section('content')
<style>
.card .card-body + .card-body {
    padding-top: 2.5rem;
}
.ml-4b{
    margin-left: 32px;
}
.wrapper .page-wrap .main-content {
    background: transparent;
}

</style>
@push('child-styles')

{{-- <link rel="stylesheet" href="{{asset('backend/css/all.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('backend/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/css/iconkit.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/css/theme.min.css')}}">
@endpush
<div class="content-wrapper">
    <div class="wrapper">
        <div class="page-wrap">
            <div class="main-content mt-0 pt-0 pl-0">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row align-items-end w-100">
                            <div class="col-lg-12">
                                <div class="page-header-title">
                                    <i class="ik ik-file-text bg-success"></i>
                                    <div class="d-inline">
                                        <h5>Assignation</h5>
                                        <span>Show User and laptop details</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="text-center"> 
                                        <img src="{{$item->user->avatar()}}" class="rounded-circle" width="150">
                                        <h4 class="card-title mt-10">{{$item->user->fullname()}}</h4>
                                        <p class="card-subtitle">{{$item->user->job_title}}</p>
                                        {{-- <div class="row text-center justify-content-md-center">
                                           <p>{{$item->user->phone}}</p>
                                        </div> --}}
                                    </div>
                                </div>
                                <hr class="mb-0"> 
                                <div class="card-body"> 
                                    <small class="text-muted d-block">Email address </small>
                                    <h6>{{$item->user->email}}</h6> 
                                    <small class="text-muted d-block pt-10">Phone</small>
                                    <h6>{{$item->user->phone}}</h6> 
                                    <small class="text-muted d-block pt-10">Address</small>
                                    <h6>{{$item->user->address}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 pr-md-0">
                            <div class="card shadow">
                                <ul class="nav nav-pills custom-pills ml-3 mt-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Laptop</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">QrCode</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade active show" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 col-12 order-2 order-md-1">
                                                    <div class="col-12"> <strong>Model</strong>
                                                        <br>
                                                        <p class="text-muted"><a class="text-primary" href="{{route('products.show', $item->product->slug)}}">{{$item->product->name}}</a></p>
                                                    </div>
                                                    <div class="col-12"> <strong>Serial Number</strong>
                                                        <br>
                                                        <p class="text-muted">{{$item->serial_no}}</p>
                                                    </div>
                                                    <div class="col-12"> <strong>Brand</strong>
                                                        <br>
                                                        <p class="text-muted">{{$item->product->brand->name}}</p>
                                                    </div>
                                                    <div class="col-12"> <strong>Color</strong>
                                                        <br>
                                                        <p class="text-muted">{{$item->color}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 order-1 order-md-2">
                                                    <img class="w-100" src="{{count($item->product->images) > 0 ? $item->product->images[0]['temp_url'][0]['src'] : asset('backend/images/dummy/banner_dummy.PNG')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                       $url = Request::url().'/qr';
                                    @endphp
                                    <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="card-body">
                                            <div class="qrcode">
                                                <div class="visible-print text-center mt-3">
                                                    {!! QrCode::size(200)->color(40,40,40)->generate($url); !!}
                                                    <p class="mt-3"> 
                                                        <a href="{{$url}}" class="text-success"><strong>{{$url}}</strong></a>
                                                    </p>
                                                </div>
                                            </div>
                                         
                                            <a id="basic" href="#" class="button btn btn-success">Print QR</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('child-scripts')
<script src="{{asset('backend/js/printThis.js')}}"></script>
<script>
    $('#basic').on('click', function(e){
        $('.qrcode').printThis();
    })
    
</script>
@endpush