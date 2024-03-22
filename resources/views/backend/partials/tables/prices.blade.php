<table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th>*</th>
        <th>Media</th>
        <th>Colour Print</th>
        <th>Mono Print</th>
        <th>Colour Copy</th>
        <th>Mono Copy</th>
        <th>Scan</th>
        <th> Created On </th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($prices as $price)
            <tr>
                <td>{{ $loop->iteration + ($prices->perPage() * ($prices->currentPage() - 1)) }}</td>
                <td>{{$price->media}}</td>
                @if($price->category_id === 21)
                    <td>₦{{number_format($price->fees['color_print'])}}</td>
                    <td>₦{{number_format($price->fees['mono_print'])}}</td>
                    <td>₦{{number_format($price->fees['color_copy'])}}</td>
                    <td>₦{{number_format($price->fees['mono_copy'])}}</td>
                    <td>₦{{number_format($price->fees['scan'])}}</td>
                @else
                <td colspan="5" class="text-center">₦{{number_format($price->fees['square_meter'])}} per square meter</td>
                @endif
                <td>{{ date('jS M, Y, g:i a', strtotime($price->created_at))}}</td>
                <td class="d-flex align-items-center">
                    <a href="{{route('prices.edit', $price->slug)}}"><button class="btn btn-warning mr-2">Edit</button></a>
                    <span>
                      <a class="btn btn-danger" href="{{ route('prices.destroy', $price->slug) }}"
                         onclick="event.preventDefault();
                                       document.getElementById('destroy-price-{{$price->id}}').submit();">
                          {{ __('Delete') }}
                      </a>
  
                      <form id="destroy-price-{{$price->id}}" action="{{ route('prices.destroy', $price->slug) }}" method="POST" class="d-none">
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
<span class="result text-muted mt-2">{{ $prices->firstItem() }} - {{ $prices->lastItem() }} of {{ $prices->total() }} results</span>
{{ $prices->links() }}
</div>