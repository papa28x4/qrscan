@extends('backend.layout.master')
@section('title', 'Items')
@push('child-styles')
  <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
@endpush
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h4 class="card-title">Items</h4>
              <a href="{{route('items.create')}}">
                <button type="button"  class="btn btn-secondary px-4">
                  Add Item
                </button>
              </a>
            </div>
            <div class="insert-table">
              @include('backend.partials.tables.items')
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
            let item;
            let isDeleted = false;
            let page = {{$items->currentPage()}}
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
                    item =  e.target.dataset.id
                    console.log('item: ', item)
                }
            })

            $(document).on("click", ".delete-confirmed", function(event){
                  let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: `/items/${item}`,
                        method: "DELETE",
                        data: {_token, page},
                        success: function(data){
                            console.log(data)
                            const table = document.querySelector('.insert-table');
                            table.innerHTML = data;
                            isDeleted = true
                            msg = notify(isDeleted, item)
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