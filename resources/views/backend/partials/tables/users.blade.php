<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">*</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created On</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration + ($users->perPage() * ($users->currentPage() - 1)) }}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                {{-- <td>{{$user->roles[0]->name}}</td> --}}
                <td>{{ date('jS M, Y, g:i a', strtotime($user->created_on()))}}</td>
                <td class="d-flex align-items-center">
                    <a href="{{route('users.edit', $user->slug)}}"><button class="btn btn-warning mr-2">Edit</button></a>
                    {{-- <span>
                      <a class="btn btn-danger" href="{{ route('users.destroy', $user->slug) }}"
                         onclick="event.preventDefault();
                                       document.getElementById('destroy-user-{{$user->id}}').submit();">
                          {{ __('Delete') }}
                      </a>
  
                      <form id="destroy-user-{{$user->id}}" action="{{ route('users.destroy', $user->slug) }}" method="POST" class="d-none">
                          @csrf
                          @method('DELETE')
                      </form>
                    </span> --}}
                </td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row pt-3 pr-3 align-items-center">
    <span class="col-md result text-muted">{{ $users->firstItem() }} - {{ $users->lastItem() }} of {{ $users->total() }} results</span>
    {{ $users->links() }}
</div>