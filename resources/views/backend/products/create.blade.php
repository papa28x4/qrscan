@extends('backend.layout.master')
@section('title', 'Add Product')
@section('content')
@push('child-styles')
    <link href="/backend/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="/backend/plugins/image-uploader/image-uploader.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
    <style>
      .image-uploader {
          min-height: 16rem;
          border-radius: 2px;
      }
      .mt-4b{
        margin-top: 38px;
      }
    </style>
@endpush
<div class="content-wrapper">
    <div class="container">
        <div class="card">
          @include('backend.partials.flash_message')
            <div class="card-body">
                    <div class="row">
                      <div class="col-lg-11 col-md-12 col-sm-12 mx-auto">
                        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                          <div class="row">
                            <div class="col-12">
                              <h2 class="tm-block-title d-inline-block px-1 mb-4">Add Product</h2>
                            </div>
                          </div>
                          <form action="{{route('products.store')}}" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row tm-edit-product-row">
                                <div class="col-xl-6 col-lg-6 col-md-12 px-4 order-2 order-lg-1">
                                  
                                    <div class="form-group mb-3">
                                      <label
                                        for="name"
                                        >Model
                                      </label>
                                      <input
                                        id="name"
                                        name="name"
                                        type="text"
                                        class="form-control validate"
                                        value="{{old('name')}}"
                                      />
                                      @error('name')
                                      <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                                      @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                      <label
                                        for="description"
                                        >Description</label
                                      >
                                      <textarea                    
                                        class="form-control validate tm-small"
                                        rows="5"
                                        name="description"
                                        required
                                      >{{old('description')}}</textarea>
                                      @error('description')
                                      <small id="descHelp" class="form-text text-danger">{{ $message }}</small>
                                      @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                      <label
                                        for="category"
                                        >Category</label
                                      >
                                      <select
                                        class="custom-select tm-select-accounts"
                                        id="category"
                                        name="category"
                                      >
                                        <option disabled value="" selected>Select category</option>
                                        @foreach ($categories as $category)
                                          <option @if(old('category') == $category->id) selected @endif value="{{$category->id}}" >{{$category->name}}</option>
                                        @endforeach
                                      </select>
                                      @error('category')
                                      <small id="categoryHelp" class="form-text text-danger">{{ $message }}</small>
                                      @enderror
                                    </div>
          
                                    <div class="row">
                                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label
                                          for="category"
                                          >Brand</label
                                        >
                                        <select
                                          class="custom-select tm-select-accounts"
                                          id="brand"
                                          name="brand"
                                          style="height: 2.875rem;"
                                        >
                                          <option disabled value="" selected>Select brand</option>
                                          @foreach ($brands as $brand)
                                            <option @if(old('brand') == $brand->id) selected @endif value="{{$brand->id}}" >{{$brand->name}}</option>
                                          @endforeach
                                        </select>
                                        @error('brand')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                      </div>
                                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label
                                          for="price"
                                          >Cost
                                        </label>
                                        <input
                                        id="cost"
                                        name="cost"
                                        type="number"
                                        min="0.01" 
                                        step="0.01"
                                        value="{{old('cost')}}"
                                        class="form-control validate" />
                                        
                                        @error('cost')
                                        <small id="priceHelp" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                      </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 order-1 order-lg-2 px-4 mx-auto mb-4">
                                  <div class="form-group mb-3">
                                    <label
                                      for="code"
                                      >Product Code
                                    </label>
                                    <input
                                      id="code"
                                      name="code"
                                      type="text"
                                      class="form-control validate"
                                      value="{{old('code')}}"
                                    />
                                    @error('code')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label style="visibility: hidden" for="images">Images</label>
                                    <div class="input-images"></div>
                                    @error('images.*')
                                            <small id="imageHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                  </div>
                                </div>
                            </div>
                            
                            <div class="basic-details">
                              @include('backend.partials.product-basic-details')
                            </div>
                            
                            <div class="px-1">
                              <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div> 
            </div>
        </div>
    </div>
</div>

@endsection

@push('child-scripts')
    <script src="/backend/plugins/select2/js/select2.min.js"></script>
    <script src="/backend/plugins/image-uploader/image-uploader.min.js"></script>
    <script>
        $(document).ready(function() {
            const container = document.querySelector('.content-wrapper')
            
            $('.input-images').imageUploader({
                maxSize: 1 * 1024 * 1024,
                maxFiles: 4
            });
        
            function notify(isDeleted, item){
                    return  `<div class="row notify">
                                <div class="col-md-12">
                                    <div class="alert m-b-lg ${isDeleted? 'alert-success' : 'alert-warning'}" role="alert">
                                    ${isDeleted? `${item} successfully deleted` : `Something went wrong. Check your network and try again` }
                                    </div>
                                </div>
                            </div>`
            }

       

            $('#category').on('change', getPrice)
      
            function getPrice(e){
                category = e.target.value

                $.ajax({
                        url: `/backend/products/categories/${category}`,
                        method: "GET",
                        success: function(data){
                          console.log(data)
                          $('.basic-details').html(data)
                        },
                        error: function(error){
                          console.log(error)
                        }
                    })
            }
                  
        })
    </script>
@endpush