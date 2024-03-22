<table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th> Title </th>
        <th> Body </th>
        <th> Delivered </th>
        <th> Send Date </th>
        <th> Created On </th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
          <tr>
              <td>{{$message->title}}</td>
              <td>{{$message->truncateBody()}}</td>
              <td>{{$message->delivered}}</td>
              <td>{{$message->send_date}}</td>
              <td>{{ date('jS M, Y, g:i a', strtotime($message->created_at))}}</td>
              <td class="d-flex align-items-center">
                  <a href="{{route('messages.show', $message->id)}}"><button class="btn btn-warning mr-2">View</button></a>
                  <span>
                    <a class="btn btn-danger" href="{{ route('messages.destroy', $message->id) }}"
                       onclick="event.preventDefault();
                                     document.getElementById('destroy-message-{{$message->id}}').submit();">
                        {{ __('Delete') }}
                    </a>

                    <form id="destroy-message-{{$message->id}}" action="{{ route('messages.destroy', $message->id) }}" method="POST" class="d-none">
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
<span class="result text-muted mt-2">{{ $messages->firstItem() }} - {{ $messages->lastItem() }} of {{ $messages->total() }} results</span>
{{ $messages->links() }}
</div>