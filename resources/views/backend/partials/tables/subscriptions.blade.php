<table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th> Emails </th>
        <th> Created On </th>
        <th> Verified At</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($subscribers as $subscriber)
          <tr>
              <td>{{$subscriber->email}}</td>
              <td>{{ date('jS M, Y, g:i a', strtotime($subscriber->created_at))}}</td>
              <td>{{$subscriber->email_verified_at ? date('jS M, Y, g:i a', strtotime($subscriber->email_verified_at)) : 'pending' }}</td>
              
              <td class="d-flex align-items-center">
                  {{-- <a href="{{route('subscribers.edit', $subscriber->id)}}"><button class="btn btn-warning mr-2">Edit</button></a> --}}
                  <span>
                    <a class="btn btn-danger" href="{{ route('delete', $subscriber->id) }}"
                       onclick="event.preventDefault();
                                     document.getElementById('destroy-subscriber-{{$subscriber->id}}').submit();">
                        {{ __('Delete') }}
                    </a>

                    <form id="destroy-subscriber-{{$subscriber->id}}" action="{{ route('delete', $subscriber->id) }}" method="POST" class="d-none">
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
<span class="result text-muted mt-2">{{ $subscribers->firstItem() }} - {{ $subscribers->lastItem() }} of {{ $subscribers->total() }} results</span>
{{ $subscribers->links() }}
</div>