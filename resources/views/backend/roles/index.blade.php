@extends('backend.layout.master')
@section('title', 'Roles')
@push('child-styles')
  <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
@endpush
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h4 class="card-title">Roles</h4>
              <a href="{{route('roles.create')}}">
                <button type="button"  class="btn btn-secondary px-4">
                  Create Role
                </button>
              </a>
            </div>
            <div class="table-box">
              @include('backend.partials.tables.roles')
            </div>
            
          </div>
        </div>
    </div>
</div>
@endsection