<table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th> Names </th>
        <th> Created On </th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($brands as $brand)
          <tr>
              <td>{{$brand->name}}</td>
              <td>{{ date('jS M, Y, g:i a', strtotime($brand->created_on()))}}</td>
              <td class="d-flex align-items-center">
                  <a href="{{route('brands.edit', $brand->slug)}}"><button class="btn btn-warning mr-2">Edit</button></a>
                  <span>
                    <a class="btn btn-danger" href="{{ route('brands.destroy', $brand->slug) }}"
                       onclick="event.preventDefault();
                                     document.getElementById('destroy-brand-{{$brand->id}}').submit();">
                        {{ __('Delete') }}
                    </a>

                    <form id="destroy-brand-{{$brand->id}}" action="{{ route('brands.destroy', $brand->slug) }}" method="POST" class="d-none">
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
<span class="result text-muted mt-2">{{ $brands->firstItem() }} - {{ $brands->lastItem() }} of {{ $brands->total() }} results</span>
{{ $brands->links() }}
</div>