<div class="entries mt-5">
    <ul>
        <li class="entry select-all d-flex">
            <label class="checkbox">
                <input type="checkbox" id="select-all">
                <span style="top: -3px" class="checkmark"></span>
            </label>
            <div class="d-flex align-items-center w-100">
                <h4 style="padding-left: 20px" class="mb-0 mr-5">Select all</h4>
                @if(count(auth()->user()->unreadNotifications))
                <button style="padding: 5px 12px" class="btn btn-warning mark-read mr-2">Mark as read</button>
                @endif
                @if(count(auth()->user()->readNotifications))
                <button style="padding: 5px 12px" class="btn btn-danger mark-read unread">Mark as unread</button>
                @endif
            </div>
        </li>
        @foreach($notifications as $notification)
        <li class="entry d-flex @if($notification->read_at) seen @endif notification">
            <label class="checkbox">
                <input type="checkbox" class="checkboxes" id="{{$notification->data['route_param']}}">
                <span class="checkmark"></span>
            </label>
            <a class="d-flex route w-100" data-id="{{$notification->id}}" href="{{route('notification.read', [
                $notification->data['route_param'], 
                $notification->id
                ])
            }}"  
                onclick="event.preventDefault();
                    document.getElementById('notification-{{$notification->id}}').submit();"
            >

                <form id="notification-{{$notification->id}}" 
                      action="{{route('notification.read', [
                                    $notification->data['route_param'], 
                                    $notification->id
                                ])
                            }}" 
                      method="POST" class="d-none"
                >
                    @csrf
                    @method('PUT')
                </form>
                
                <div class="details d-flex w-100">
                    <div class="col-7">
                        <h5 class="code">{{$notification->data['title']}}</h5>
                        <p class="desc">{{$notification->data['description']}}</p>
                    </div>
                    <div class="col-2">
                        <span class="notification-type">{{$notification->data['type']}}</span>
                    </div>
                    <div class="col-3 text-right">
                        <span class="date">{{$notification->created_at->diffForHumans()}}</span>
                    </div>
                </div>          
            </a>
        </li>
        @endforeach
    </ul>
</div>

{{-- <div style="margin-right:60px;" class="row pt-4 pl-4 align-items-start justify-content-between">
    <span class="result text-muted mt-2">{{ $notifications->firstItem() }} - {{ $notifications->lastItem() }} of {{ $notifications->total() }} results</span>
    {{ $notifications->links() }}
    </div> --}}