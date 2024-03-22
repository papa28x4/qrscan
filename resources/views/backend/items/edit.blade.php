@extends('backend.layout.master')
@section('title', 'Edit Item')
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
                        <h5 class="card-title mb-4">Edit Item</h5>
                        <form action="{{route('items.update', $item->serial_no)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        
                            <div class="form-group row mb-4">
                                <label for="serial_no" class="col-sm-2 col-form-label">Serial Number</label>
                                <div class="col-sm-10">
                                    <input name="serial_no" type="text" class="form-control" id="serial_no" value="{{old('serial_no') ?? $item->serial_no}}" placeholder="Enter the Serial Number">
                                    @error('serial_no')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="product" class="col-sm-2 col-form-label">Product</label>
                                <div class="col-sm-10">
                                    <select id="product" name="product" class="form-control" >
                                        <option value="">Choose a laptop</option>
                                        @foreach($products as $product)
                                        <option  
                                            @if(old('product') == $product->id || $item->product->id == $product->id) selected  @endif value="{{$product->id}}">
                                            {{$product->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="color" class="col-sm-2 col-form-label">Color</label>
                                <div class="col-sm-10">
                                <input name="color" type="text" class="form-control" id="color" value="{{old('color') ?? $item->color}}" placeholder="Enter the color">
                                @error('color')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="user" class="col-sm-2 col-form-label">Employee</label>
                                <div class="col-sm-10">
                                    <select id="user" name="user" class="form-control" >
                                        <option value="">Assign to a User</option>
                                        @foreach($users as $user)
                                        <option  
                                            @if(old('user') == $user->id || $item->user->id == $user->id) selected  @endif value="{{$user->id}}">
                                            {{$user->fullname()}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('user')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                          <div class="d-flex justify-content-center mt-4">
                            <a class="text-white btn btn-warning mt-3 mr-3" href="{{route('items.index')}}">Back</a>
                            <button class="btn btn-primary mt-3" type="submit">Update Item</button>
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
    <script src="/backend/plugins/file-input/js/fileinput.min.js"></script>
    <script src="/backend/plugins/file-input/themes/fa/theme.js"></script>
    <script>
       
    </script>
@endpush