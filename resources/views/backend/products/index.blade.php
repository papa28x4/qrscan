@extends('backend.layout.master')
@section('title', 'Products')
@section('content')
@push('child-styles')
<style>
    a>button.btn,
    button.btn.remove{
        padding-left: 20px;
        padding-right: 20px;
    }
</style>
@endpush
<div class="content-wrapper">
    <div class="col-lg-12">
        <div class="insert-alert"></div>
        <div class="card stores">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Products</h5>
                    <div>
                        <a href="{{route('products.create')}}">
                            <button class="btn btn-secondary">Add Product</button>
                        </a>
                    </div>
                </div>
                <div class="insert-table">
                    @include('backend.partials.tables.products') 
                </div>      
            </div>
        </div>
    </div>
</div>

@include('backend.partials.modals.delete_confirmation')
@endsection

@push('child-scripts')
    <script>
        $(document).ready(function() {
            let product;
            let isDeleted = false;
            let page = {{$products->currentPage()}}
            console.log('page', page)
            const wrapper = document.querySelector('.content-wrapper')
            console.log(wrapper)
            function notify(isDeleted, item){
                    return  `<div class="row notify">
                                <div class="col-md-12">
                                    <div class="alert m-b-lg ${isDeleted? 'alert-success' : 'alert-warning'}" role="alert">
                                    ${isDeleted? `${item} successfully deleted` : `Something went wrong. Check your network and try again` }
                                    </div>
                                </div>
                            </div>`
            }
            
            wrapper.addEventListener('click', function(e){
                console.log(e.target)
                if(e.target.classList.contains('remove')){
                    product =  e.target.dataset.id
                    console.log('product: ', product)
                }
            })

            $(document).on("click", ".delete-confirmed", function(event){
                  let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: `/products/${product}`,
                        method: "DELETE",
                        data: {_token, page},
                        success: function(data){
                            console.log(data)
                            const table = document.querySelector('.insert-table');
                            table.innerHTML = data;
                            isDeleted = true
                            msg = notify(isDeleted, product)
                            $('.insert-alert').html(msg)
                            setTimeout(function(){
                                $(".notify").remove();
                            }, 5000 ); 
                        },
                        error: function(error){
                            console.log(error)
                        }
                    })
            });
        })
    </script>
@endpush