@extends('backend.layout.master')
@section('title', 'Create Role')
@push('child-styles')
    <link href="/backend/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="/backend/plugins/file-input/css/fileinput.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/backend/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
@endpush
@section('content')
<div class="content-wrapper">
    <div class="container">
        @include('backend.partials.flash_message')
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4 flex-end text-right mb-5">New Department</h5>
                        <form action="{{route('departments.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-4">
                                    {{-- <label for="name">Name</label> --}}
                                    <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}" placeholder="Enter a Department">
                                    @error('name')
                                    <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                
                            <button class="btn btn-success mt-3" type="submit">Create Department</button>
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
    <script src="/backend/summernote/summernote-bs4.min.js"></script>
    <script>
        $('#category').select2()
        $('#designation').select2()
        $('.html-editor').summernote({
            height: 300,
            tabsize: 2
        });
    </script>
@endpush