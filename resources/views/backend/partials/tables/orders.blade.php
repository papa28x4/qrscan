@foreach ($orders as $order)
<div class="card pull-up">
    <div class="card-header list">
        <div class="float-left">
            <a href="{{route('orders.show', $order->id)}}" class="btn btn-success">Details</a>
        </div>
        <div class="float-right">
            {{-- <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a> --}}
            <a href="#" class="btn btn-outline-success"><i class="la la-map-marker"></i> {{ucfirst($order->status)}}</a>
        </div>
    </div>
    <div class="card-content">
        <div class="card-body py-0 mb-2">
            <div class="d-flex justify-content-between lh-condensed">
                <div class="order-details text-center">
                    <div class="product-img d-flex align-items-top">
                        <img class="img-fluid" src="\backend\images\products\1.jpg" alt="Card image cap">
                    </div>
                </div>
                <div class="order-details d-flex flex-column justify-content-center meta">
                    <h6 class="my-0">{{$order->order_number}}</h6>
                    <small class="text-muted">Order Number</small>
                </div>
                <div class="order-details d-flex flex-column justify-content-center meta">
                    <div class="order-info">₦{{number_format($order->grand_total)}}</div>
                </div>
                <div class="order-details d-flex flex-column justify-content-center meta">
                    <h6 class="my-0">Delivered on {{ date('D, jS M Y', strtotime($order->delivered_at))}}</h6>
                    <small class="text-muted">Delivery Date</small>
                </div>
            </div>
        </div>
    </div>
    {{-- Tue, Jan 5th 2021 --}}
    <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
        <span class="float-left">
            <span class="text-muted">Ordered On</span>
            <strong>{{ date('D, jS M Y', strtotime($order->created_on()))}}</strong>
        </span>
        <span class="float-right">
            {{-- <span class="text-muted">Ordered Amount</span> --}}
            <strong>{{$order->is_paid ? 'Paid': 'Cash On Delivery'}}</strong>
        </span>
    </div>
</div>
@endforeach

@if(count($orders))
<div class="card">
    <div class="card-body py-3">
        <div style="margin-right:10px;" class="row py-2 pl-4 align-items-center justify-content-between">
            <span class="result text-muted mt-0">{{ $orders->firstItem() }} - {{ $orders->lastItem() }} of {{ $orders->total() }} results</span>
            {{ $orders->links() }}
        </div>
    </div>
</div>
@else
<div class="card">
    <div class="card-body py-3">
        <div style="margin-right:10px;" class="row py-2 pl-4 align-items-center justify-content-between text-center">
          <p class="text-danger mb-0 w-100">You have no orders yet</p>
        </div>
    </div>
</div>
@endif