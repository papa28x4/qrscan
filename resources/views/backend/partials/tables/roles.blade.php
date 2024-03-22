<table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th> Names </th>
        <th> Created On </th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
          <tr>
              <td>{{$role->name}}</td>
              <td>{{ date('jS M, Y, g:i a', strtotime($role->created_on()))}}</td>
              <td class="d-flex align-items-center">
                  <a href="{{route('roles.edit', $role->id)}}"><button class="btn btn-warning mr-2">Edit</button></a>
                  <span>
                    <a class="btn btn-danger" href="{{ route('roles.destroy', $role->id) }}"
                       onclick="event.preventDefault();
                                     document.getElementById('destroy-role-{{$role->id}}').submit();">
                        {{ __('Delete') }}
                    </a>

                    <form id="destroy-role-{{$role->id}}" action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-none">
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
<span class="result text-muted mt-2">{{ $roles->firstItem() }} - {{ $roles->lastItem() }} of {{ $roles->total() }} results</span>
{{ $roles->links() }}
</div>