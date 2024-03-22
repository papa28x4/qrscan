<table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th> Names </th>
        <th> Created On </th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($departments as $department)
          <tr>
              <td>{{$department->name}}</td>
              <td>{{ date('jS M, Y, g:i a', strtotime($department->created_on()))}}</td>
              <td class="d-flex align-items-center">
                  <a href="{{route('departments.edit', $department->slug)}}"><button class="btn btn-warning mr-2">Edit</button></a>
                  <span>
                    <a class="btn btn-danger" href="{{ route('departments.destroy', $department->slug) }}"
                       onclick="event.preventDefault();
                                     document.getElementById('destroy-department-{{$department->id}}').submit();">
                        {{ __('Delete') }}
                    </a>

                    <form id="destroy-department-{{$department->id}}" action="{{ route('departments.destroy', $department->slug) }}" method="POST" class="d-none">
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
<span class="result text-muted mt-2">{{ $departments->firstItem() }} - {{ $departments->lastItem() }} of {{ $departments->total() }} results</span>
{{ $departments->links() }}
</div>