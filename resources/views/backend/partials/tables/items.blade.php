<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">*</th>
                <th scope="col">Model</th>
                <th scope="col">Serial No</th>
                <th scope="col">User</th>
                <th scope="col">Created On</th>
                {{-- <th></th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration + ($items->perPage() * ($items->currentPage() - 1)) }}</td>
                 <td>{{$item->product->name}}</td>
                <td>{{$item->serial_no}}</td>
                <td>{{$item->user->fullname()}}</td>
                <td>{{ date('jS M, Y, g:i a', strtotime($item->created_on()))}}</td>
                <td class="d-flex align-items-center">
                    <a href="{{route('items.show', $item->serial_no)}}"><button class="btn btn-success mr-2">View</button></a>
                    <a href="{{route('items.edit', $item->serial_no)}}"><button class="btn btn-warning mr-2">Edit</button></a>
                    <button type="button" data-id="{{$item->serial_no}}" class="btn btn-danger remove" data-toggle="modal" data-target="#exampleModal">
                        Delete
                    </button>
                </td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row pt-3 pr-3 align-items-center">
    <span class="col-md result text-muted">{{ $items->firstItem() }} - {{ $items->lastItem() }} of {{ $items->total() }} results</span>
    {{ $items->links() }}
</div>
