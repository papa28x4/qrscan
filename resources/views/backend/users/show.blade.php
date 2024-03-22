@extends('backend.layout.master')
@section('title', 'Show User')
@section('content')
<style>
    .card .card-body + .card-body {
    padding-top: 2.5rem;
}
</style>
<div class="content-wrapper lime-body">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row show-user">
                        <div class="card-body col-lg-5 col-xs-12">
                            <div class="text-center"> 
                                <img src="{{$user->avatar()}}" class="rounded-circle" width="150">
                                {{-- <img src="/backend/images/avatars/avatar3.png" class="rounded-circle" width="150"> --}}
                                <div class="card-subtitle append-role">
                                    {{-- @include('backend.users.roles') --}}
                                        <h4 class="card-title my-3">{{$user->name}} {{$user->last_name}}</h4>
                                </div>
                            </div>
                        </div>
                        {{-- <hr class="mb-0">  --}}
                        <div class="card-body col-lg-7 col-xs-12"> 
                          <div class="d-flex flex-column h-100 justify-content-center align-items-start">
                            {{-- <strong  class="d-block">Name </strong>   
                            <p class="text-muted">{{$user->name}} {{$user->last_name}}</p>  --}}
                            <strong  class="d-block">Email Address </strong>
                            <p class="text-muted">{{$user->email}}</p> 
                            @if($user->phone)
                            <strong class="d-block pt-10">Phone</strong>
                            <p class="text-muted">{{$user->phone}}</p> 
                            @endif
                            @if($user->country)
                            <strong class="d-block pt-10">Country</strong>
                            <p class="text-muted">{{$user->country}}</p> 
                            @endif
                            @if($user->city)
                            <strong class="d-block pt-10">City</strong>
                            <p class="text-muted">{{$user->city}}</p>
                            @endif
                            @if($user->address)
                            <strong class="d-block pt-10">Address</strong>
                            <p class="text-muted">{{$user->address}}</p> 
                            @endif
                          </div>
                        </div>
                    </div>
                    <div class="py-3 px-4">
                        <a href="{{route('users.index')}}" class="pt-2 card-link float-right">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('child-scripts')
<script src="/backend/plugins/toastr/toastr.min.js"></script>
    {{-- toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.success("{{ session('message') }}");
   --}}
   <script>
        $(document).ready(function(){
            let user = `{{$user->slug}}`
            console.log(user);
            $('.content-wrapper').on('click', '.actions', function(){
                // console.log($(this).attr('id'))
                let action = $(this).attr('id')
                let _token = $('input[name="_token"]').val()
                let data = {
                    action, _token,
                }
                if(action === 'assign'){
                    data.role = $('#roles').val()
                }
                console.log(data)
                fetch_roles(data)
            })

           

            function fetch_roles(data){
                    $.ajax({
                        url: `/roles/${user}/change`,
                        method: "PUT",
                        data: data,
                        success: function(data){
                            $('.append-role').html(data)              
                        },
                        error: function(error){
                            console.log(error)
                        }
                    })
                }

            })
   </script>
@endpush