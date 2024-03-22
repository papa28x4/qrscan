<li class="nav-item dropdown bell">
    <a @if(\Helper::unreadNotificationsCount()) title="You have unread notifications" @endif class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
     
      <i class="mdi mdi-bell-outline"></i>
      @if(\Helper::unreadNotificationsCount())
        <span class="count-symbol" style="background: rgba(2,166,150,255)">
          {{-- {{\Helper::unreadNotificationsCount()}}  --}}
        </span>
      @endif
    </a>
    @if(\Helper::unreadNotificationsCount())
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
      <h6 class="p-3 mb-0">Notifications</h6>
      @if(\Helper::unreadNotificationsCount('job'))
      <div class="dropdown-divider"></div>
      <a class="dropdown-item preview-item" href="{{route('print-jobs.index')}}">
        <div class="preview-thumbnail">
          <div class="preview-icon bg-success">
            <i class="mdi mdi-engine"></i>
          </div>
        </div>
        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
          <h6 class="preview-subject font-weight-normal mb-1 mr-2">
            {{\Helper::unreadNotificationsCount('job') === 1 ? 'New Job' : 'New Jobs'}}<span style="border-radius: 50%; background:#1bcfb4; color: #fff; padding: 2px 4px; font-size:12px; margin-left:5px">{{\Helper::unreadNotificationsCount('job')}}</span></h6>
          {{-- <p class="text-gray ellipsis mb-0"> You have jobs   </p> --}}
        </div>
      </a>
      @endif
      @if(\Helper::unreadNotificationsCount('user'))
      <div class="dropdown-divider"></div>
      <a class="dropdown-item preview-item" href="{{route('users.index')}}">
        <div class="preview-thumbnail">
          <div class="preview-icon bg-warning">
            <i class="mdi mdi-human-male-female"></i>
          </div>
        </div>
        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
          <h6 class="preview-subject font-weight-normal mb-1">{{\Helper::unreadNotificationsCount('user') === 1 ? 'New User' : 'New Users'}}
            <span style="border-radius: 50%; background:#fed713; color: #fff; padding: 2px 4px; font-size:12px; margin-left:5px">{{\Helper::unreadNotificationsCount('user')}}</span>
          </h6>
          {{-- <p class="text-gray ellipsis mb-0"> Update dashboard </p> --}}
        </div>
      </a>
      @endif
      <div class="dropdown-divider"></div>
      <a href="{{route('notification.notifications', auth()->user()->slug)}}">
        <h6 class="p-3 mb-0 text-center">See all notifications</h6>
      </a>
    </div>
    @endif
  </li>