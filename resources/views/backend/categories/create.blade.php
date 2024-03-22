@extends('backend.layout.master')
@section('title', 'Create Category')
@push('child-styles')
    <link href="/backend/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="/backend/plugins/file-input/css/fileinput.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
@endpush
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Add a Category</h5>
                        <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-4">
                                    {{-- <label for="title">Title</label> --}}
                                    <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}" placeholder="Enter a Name">
                                    @error('name')
                                    <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12" style="margin-bottom: 32px">
                                    <div class="custom-file">
                                        <input id="input-b1" name="image" type="file" class="file"  data-show-caption="true"  data-show-upload="false" data-msg-placeholder="Click browse to change image">
                                    </div>
                                    @error('image')
                                    <small id="imageHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        
                            
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-4">
                                    {{-- <label for="description">Description</label> --}}
                                    <textarea class="form-control html-editor" placeholder="Add a Description" name="description" id="description" rows="4">{{old('description')}}</textarea>
                                    @error('description')
                                    <small id="descriptionHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                          
                           
                            <a class="text-white btn btn-warning mt-3" href="{{route('categories.index')}}">Back</a>
                            <button class="btn btn-primary mt-3" type="submit">Create Category</button>
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
    <script src="/backend/plugins/file-input/js/fileinput.min.js"></script>
    <script src="/backend/plugins/file-input/themes/fa/theme.js"></script>
    <script>
       
    </script>
@endpush