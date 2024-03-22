@extends('backend.layout.master')
@section('title', 'Users')
@push('child-styles')
  <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
@endpush
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h4 class="card-title">Users</h4>
              <a href="{{route('users.create')}}">
                <button type="button"  class="btn btn-secondary px-4">
                  Create User
                </button>
              </a>
            </div>
            <div class="table-box">
              @include('backend.partials.tables.users')
            </div>
            
          </div>
        </div>
    </div>
</div>
@endsection