@extends('backend.layout.master')
@section('title', 'Edit Role')
@push('child-styles')
    <link href="/backend/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="/backend/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
    <style>
        ul{
            list-style: none;
        }
        .separator{
            background: #f2edf3;
            height: 24px;
        }
        .mb-3b{
            margin-bottom: 20px;
        }
        #name{
            font-weight: 600;
        }
    </style>
@endpush
@section('content')
<div class="content-wrapper">
    @include('backend.partials.flash_message')
    <div class="container">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <a href="{{route('roles.index')}}">
                            <button class="btn btn-white text-success px-0"><i class="fas fa-backward mr-2"></i>Back</button>
                            </a>
                            <h5 class="card-title flex-end text-right mb-0">Edit Role</h5>
                        </div>
                     
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-4">
                                    {{-- <label for="name">Name</label> --}}
                                    <input name="name" type="text" class="form-control" id="name" value="{{old('name') ?? $role->name}}" placeholder="Enter a Role" readonly>
                                    @error('name')
                                    <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('roles.update', $role->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <h4 class="mb-4">Permissions</h4>
                                        <label class="select-all-label" for="select-all">
                                            <input id="select-all" value="all" type="checkbox" @if($all) checked @endif class="mr-2">
                                            Select All
                                        </label>
                                    </div>
                                    <ul class="permissions-block">
                                        @foreach($permissions as $permission)
                                        <li class="mb-2">
                                            <label for="{{$permission->slug}}">
                                                <input 
                                                    id="{{$permission->slug}}" 
                                                    name="permissions[]" 
                                                    value="{{$permission->id}}" 
                                                    type="checkbox" 
                                                    class="permissions mr-2"
                                                    @if(count($role->permissions->where('id', $permission->id))) checked @endif
                                                >
                                                {{$permission->name}}
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="ml-3">
                                    <button class="btn btn-success mt-3" type="submit">Update Role</button>
                                </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('child-scripts')
<script src="/backend/plugins/select2/js/select2.min.js"></script>
<script>
    $(document).on('change', '#select-all, .permissions', function (e) {  
        if(e.target.id === 'select-all'){
            $('.permissions').each(function(){
                if($('#select-all')[0].checked === true){
                    $(this)[0].checked = true
                }else{
                    $(this)[0].checked = false
                }
            })
        }
       
        if(e.target.classList.contains('permissions')){
            let count = 0; 
            if($(this)[0].checked === false){
                $('#select-all')[0].checked = false
            }else{
                $('.permissions').each(function(){
                    if($(this)[0].checked === false) {
                        count++
                    }
                })
                if(!count){
                    $('#select-all')[0].checked = true
                }
            }
        }
      
    })

</script>
@endpush