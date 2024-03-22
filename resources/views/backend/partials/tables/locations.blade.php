<table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th>*</th>
        <th>Locations</th>
        <th>Fees</th>
        <th> Created On </th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($states as $state)
            <tr>
                <td>{{ $loop->iteration + ($states->perPage() * ($states->currentPage() - 1)) }}</td>
                <td>{{$state->name}}</td>
                <td class="text-center">₦{{number_format($state->fee)}}</td>
                <td>{{ date('jS M, Y, g:i a', strtotime($state->created_at))}}</td>
                <td class="d-flex align-items-center">
                    <a href="{{route('delivery-fees.edit', $state->slug)}}"><button class="btn btn-warning mr-2">Edit</button></a>
                    <span>
                      <a class="btn btn-danger" href="{{ route('delivery-fees.destroy', $state->slug) }}"
                         onclick="event.preventDefault();
                                       document.getElementById('destroy-price-{{$state->id}}').submit();">
                          {{ __('Delete') }}
                      </a>
  
                      <form id="destroy-price-{{$state->id}}" action="{{ route('delivery-fees.destroy', $state->slug) }}" method="POST" class="d-none">
                          @csrf
                          @method('DELETE')
                      </form>
                    </span>
                </td>
            </tr>
            @endforeach
    </tbody>
</table>

<div style="margin-right:60px;" class="row pt-4 pl-4 align-items-start justify-content-between">
<span class="result text-muted mt-2">{{ $states->firstItem() }} - {{ $states->lastItem() }} of {{ $states->total() }} results</span>
{{ $states->links() }}
</div>