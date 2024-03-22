@extends('backend.layout.master')
@section('title', 'Admins')
@section('content')

<div class="lime-body">
    <div class="content-wrapper">
        <div class="card stores">
          @include('backend.partials.flash_message')
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Admins</h4>
                    <a href="{{route('admins.create')}}">
                      <button type="button"  class="btn btn-secondary px-4">
                        Create Admin
                      </button>
                    </a>
                  </div>
                <div class="insert-table">
                    @include('backend.partials.tables.admins') 
                </div>     
            </div>
        </div>
    </div>
</div>


@endsection