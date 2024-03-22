<table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th> Names </th>
        <th> Created On </th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($permissions as $permission)
          <tr>
              <td>{{$permission->name}}</td>
              <td>{{ date('jS M, Y, g:i a', strtotime($permission->created_at))}}</td>
              <td class="d-flex align-items-center">
                @can('Update Permissions')
                  <a href="{{route('permissions.edit', $permission->id)}}"><button class="btn btn-warning mr-2">Edit</button></a>
                @endcan
                @can('Destroy Permissions')
                  <span>
                    <a class="btn btn-danger" href="{{ route('permissions.destroy', $permission->id) }}"
                       onclick="event.preventDefault();
                                     document.getElementById('destroy-permission-{{$permission->id}}').submit();">
                        {{ __('Delete') }}
                    </a>

                    <form id="destroy-permission-{{$permission->id}}" action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                  </span>
                @endcan
              </td>
          </tr>
       @endforeach
    </tbody>
</table>

<div style="margin-right:60px;" class="row pt-4 pl-4 align-items-start justify-content-between">
<span class="result text-muted mt-2">{{ $permissions->firstItem() }} - {{ $permissions->lastItem() }} of {{ $permissions->total() }} results</span>
{{ $permissions->links() }}
</div>