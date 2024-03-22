<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">*</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Admin Type</th>
                <th scope="col">Created On</th>
                {{-- <th></th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $loop->iteration + ($admins->perPage() * ($admins->currentPage() - 1)) }}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->roles[0]->name}}</td>
                <td>{{ date('jS M, Y, g:i a', strtotime($admin->created_on()))}}</td>
                <td class="d-flex align-items-center">
                    <a href="{{route('admins.edit', $admin->slug)}}"><button class="btn btn-warning mr-2">Edit</button></a>
                    <span>
                      <a class="btn btn-danger" href="{{ route('admins.destroy', $admin->slug) }}"
                         onclick="event.preventDefault();
                                       document.getElementById('destroy-admin-{{$admin->id}}').submit();">
                          {{ __('Delete') }}
                      </a>
  
                      <form id="destroy-admin-{{$admin->id}}" action="{{ route('admins.destroy', $admin->slug) }}" method="POST" class="d-none">
                          @csrf
                          @method('DELETE')
                      </form>
                    </span>
                </td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row pt-3 pr-3 align-items-center">
    <span class="col-md result text-muted">{{ $admins->firstItem() }} - {{ $admins->lastItem() }} of {{ $admins->total() }} results</span>
    {{ $admins->links() }}
</div>