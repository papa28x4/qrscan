@extends('backend.layout.master')
@section('title', 'Brands')
@push('child-styles')
  <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
@endpush
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h4 class="card-title">Brands</h4>
              <a href="{{route('brands.create')}}">
                <button type="button"  class="btn btn-secondary px-4">
                  Create Brand
                </button>
              </a>
            </div>
            <div class="table-box">
              @include('backend.partials.tables.brands')
            </div>
            
          </div>
        </div>
    </div>
</div>
@endsection