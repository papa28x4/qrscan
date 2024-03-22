<table class="table table-striped table-responsive">
    <thead>
      <tr>
        {{-- <th> Image </th> --}}
        <th> Name </th>
        <th> Created On </th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
          <tr>
              {{-- <td class="py-1">
                  <img src="{{$category->image()}}" alt="image">
              </td> --}}
              <td>{{$category->name}}</td>
              <td>{{ date('jS M, Y, g:i a', strtotime($category->created_at))}}</td>
              <td class="d-flex align-items-center">
                  <a href="{{route('categories.show', $category->slug)}}" >
                    <button class="btn btn-primary mr-2">View</button>
                    {{-- <i class="mdi mdi-eye menu-icon"></i> --}}
                </a>
                    {{-- <i class="fas fa-eye"></i> --}}
                  <a href="{{route('categories.edit', $category->slug)}}">
                    <button class="btn btn-warning mr-2">
                      Edit
                    </button>
                    {{-- <i class="mdi mdi-pencil"></i> --}}
                </a>
                <span>
                  <a class="btn btn-danger" href="{{ route('categories.destroy', $category->slug) }}"
                     onclick="event.preventDefault();
                                   document.getElementById('destroy-category-{{$category->id}}').submit();">
                      {{ __('Delete') }}
                  </a>

                  <form id="destroy-category-{{$category->id}}" action="{{ route('categories.destroy', $category->slug) }}" method="POST" class="d-none">
                      @csrf
                      @method('DELETE')
                  </form>
                </span>
                  {{-- <i class="mdi mdi-delete menu-icon"></i> --}}
              </td>
          </tr>
       @endforeach
    </tbody>
</table>

<div style="margin-right:60px;" class="row pt-4 pl-4 align-items-start justify-content-between">
<span class="result text-muted mt-2">{{ $categories->firstItem() }} - {{ $categories->lastItem() }} of {{ $categories->total() }} results</span>
{{ $categories->links() }}
</div>