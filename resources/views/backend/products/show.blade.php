@extends('backend.layout.master')
@section('title', 'View Product')
@section('content')

@push('child-styles')
<style>
    #mainImg{
    width: 100%;
    height: 300px;
    text-align: center;
}
.prod-images{
    flex: 0 0 25%;
    max-width: 25%;
}
.prod-images:nth-child(1){
    margin-left: 0!important;
}
.prod-images:last-child{
    margin-right: 0!important;
}
.balletImg{
    width: 100%;
    cursor: pointer;
    transition: padding 0.3s;
    height: 120px;
}
.balletImg.active{
    border: 2px solid #037afb;
    padding: 5px;
}
.image-uploader{
    height: 240px;
    cursor: pointer;
}
</style>
@endpush

<div class="content-wrapper">
    <div class="container">
        @include('backend.partials.flash_message')
        <div class="col-12 px-0">
            <div class="card">
                <div class="card-content col-xl-11 col-md-12 col-sm-12 mx-auto">
                    <div class="card-body view-category">
                        <h2 class="mb-0">View Product</h2>
                    </div>
                   <div class="row">
                        <div class="col-lg-6 col-sm-12 order-2 order-lg-1">
                            <ul class="list-group list-group-flush category-details mt-3">
                                <li class="list-group-item">
                                    <h6>Model</h6>
                                    <p>{{$product->name}}</p> 
                                </li>
                                @if($product->description)
                                <li class="list-group-item">
                                    <h6>Description</h6>
                                    <p>{{$product->description}}</p> 
                                </li>
                                @endif
                                <li class="list-group-item">
                                    <h6>Category</h6>
                                    <p>
                                        {{$product->category->name}}
                                    </p>
                                </li>
                                <li class="list-group-item">
                                    <h6>Cost</h6>
                                    <p>{{$product->cost()}}</p>
                                </li>
                                <li class="list-group-item">
                                    <h6>Brand</h6>
                                    <p>{{$product->brand->name}}</p>
                                </li>
                                <li class="list-group-item">
                                    <h6>Spec</h6>
                                    <ul>
                                        <li>{{$product->basic_details['processor']}}</li>
                                        <li>{{$product->basic_details['memory']}}</li>
                                        <li>{{$product->basic_details['storage']}}</li>
                                        <li>{{$product->basic_details['os']}}</li>
                                        <li>{{$product->basic_details['screen']}}</li>
                                        <li>{{$product->basic_details['wireless']}}</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-sm-12 order-1 order-lg-2 d-flex align-items-center">
                            <div id="wrapper">
                                <div style="text-align: center">
                                    @if(count($product->images) > 0)
                                    <img id="mainImg" src="{{$product->images[0]['temp_url'][0]['src'] ?? asset('backend/images/dummy/banner_dummy.PNG')}}" />
                                    @endif
                                </div>
                              
                                
                                <div class="d-flex justify-content-center mt-2">
                                    @if(count($product->images) > 0)
                                        @foreach ($product->images[0]['temp_url'] as $image)
                                        <div class="m-1 prod-images"><img class="balletImg @if($loop->iteration == 1) active @endif" src="{{$image['src'] ?? asset('backend/images/dummy/banner_dummy.PNG')}}" /></div>
                                        @endforeach
                                    @endif
                                </div> 
                            </div>
                        </div>
                   </div>
                   
                    <div class="card-body pl-3 float-right">
                        <a href="{{route('products.edit', $product->slug)}}" class="card-link">Edit</a>
                        <a href="{{route('products.index')}}" class="card-link">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('child-scripts')
<script>
     $('#wrapper').on('click', '.balletImg', function(){
        let source = $(this).attr('src');
        let mainImg = $("#mainImg");
        $('.balletImg.active').removeClass('active')
        $(this).addClass('active');

        mainImg.fadeOut(500, function(){
            $(this).attr('src', source).fadeIn(500);
        })
    })
</script>
@endpush