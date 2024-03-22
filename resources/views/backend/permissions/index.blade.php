@extends('backend.layout.master')
@section('title', 'Permissions')
@push('child-styles')
  <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
@endpush
@section('content')
<div class="content-wrapper">
  @include('backend.partials.flash_message')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h4 class="card-title">Permissions</h4>
              <a href="{{route('permissions.create')}}">
                <button type="button"  class="btn btn-secondary px-4">
                  Create Permission
                </button>
              </a>
            </div>
            <div class="table-box">
              @include('backend.partials.tables.permissions')
            </div>
            
          </div>
        </div>
    </div>
</div>
@endsection