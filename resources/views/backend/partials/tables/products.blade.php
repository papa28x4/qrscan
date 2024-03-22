<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">*</th>
                <th scope="col">Image</th>
                <th scope="col">Model</th>
                <th scope="col">Category</th>
                <th scope="col">Created On</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $loop->iteration + ($products->perPage() * ($products->currentPage() - 1)) }}</td>
                <td>
                    <img src="{{count($product->images) > 0 ? $product->images[0]['temp_url'][0]['src'] : asset('backend/images/dummy/banner_dummy.PNG')}}" alt="">
                </td>
                <td>{{strtoupper($product->name)}}</td>
                <td class="category">
                    <span class="badge badge-pill @if($product->category->slug == 'equipment') badge-danger @else badge-primary @endif">{{$product->category->name ?? ''}}</span>
                </td>
                <td>{{ date('jS M, Y, g:i a', strtotime($product->created_on()))}}</td>
                <td><a href="{{route('products.show', $product->slug)}}"><button class="btn btn-primary mr-2">View</button></a>
                    <a href="{{route('products.edit', $product->slug)}}"><button class="btn btn-warning mr-2">Edit</button></a>
                    <button type="button" data-id={{$product->slug}} class="btn btn-danger remove" data-toggle="modal" data-target="#exampleModal">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> 
<div class="row pt-3 pr-3 align-items-center">
    <span class="col-md result text-muted">{{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} results</span>
    {{ $products->links() }}
</div>