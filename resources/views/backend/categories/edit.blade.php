@extends('backend.layout.master')
@section('title', 'Edit Category')
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
                        <h5 class="card-title mb-4">Edit Category</h5>
                        <form action="{{route('categories.update', $category->slug)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-4">
                                    {{-- <label for="title">Title</label> --}}
                                    <input name="name" type="text" class="form-control" id="name" value="{{old('name') ?? $category->name}}" placeholder="Enter a Name">
                                    @error('name')
                                    <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="form-row">
                                <div class="form-group image-box col-md-12" style="margin-bottom: 32px">
                                    <div class="custom-file">
                                        <input id="input-b1" name="image" type="file" class="file"  data-show-caption="true"  data-show-upload="false" data-msg-placeholder="Click browse to change image">
                                    </div>
                                    @error('image')
                                    <small id="imageHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> --}}
                        
                            
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-4">
                                    {{-- <label for="description">Description</label> --}}
                                    <textarea class="form-control html-editor" name="description" id="description" rows="4" placeholder="Add a Description">{{old('description') ?? $category->description}}</textarea>
                                    @error('description')
                                    <small id="descriptionHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                          
                           
                            <a class="text-white btn btn-warning mt-3" href="{{route('categories.index')}}">Back</a>
                            <button class="btn btn-primary mt-3" type="submit">Update Category</button>
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
    {{-- <script>
       
        let src = `{{$category->image()}}`
        
        $("#input-b1").fileinput({
        overwriteInitial: true,
        maxFileSize: 1024,
        showClose: false,
        showCaption: false,
        showBrowse: true,
        browseOnZoneClick: true,
        removeLabel: 'Remove',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-2',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: `<img class="initial-image w-100" src="${src}" alt="Featured Image"><h6 class="text-muted">Click to change image</h6>`,
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
    </script> --}}
@endpush