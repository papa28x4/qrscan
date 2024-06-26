<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="#"><img src="{{asset('assets/logo.svg')}}" alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="#"><img src="/backend/images/favicon.PNG" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      {{-- <div class="search-field d-none d-md-block">
        <form class="d-flex align-items-center h-100" action="#">
          <div class="input-group">
            <div class="input-group-prepend bg-transparent">
              <i class="input-group-text border-0 mdi mdi-magnify"></i>
            </div>
            <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
          </div>
        </form>
      </div> --}}
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <div class="nav-profile-img">
              @if(auth()->user()->avatar)
              <img class="user avatar" src="{{auth()->user()->avatar()}}" alt="profile"/>
              @else
                  <div style="width:32px; height:32px;
                  font-weight:700; line-height:200%; 
                  border: 1px solid #1bcfb4; 
                  border-radius: 50%" class="no-avatar mx-auto text-center">
                      {{ucfirst(auth()->user()->name)[0]}}  {{ucfirst(auth()->user()->last_name)[0]}}
                  </div>
              @endif
              <span class="availability-status online"></span>
            </div>
            <div class="nav-profile-text">
              <p class="mb-1 text-black">{{ucfirst(auth()->user()->name)}}  {{ucfirst(auth()->user()->last_name)}}</p>
            </div>
          </a>
          <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{route('user.profile.edit')}}">
              <i class="mdi mdi-pencil mr-2 text-success"></i> 
              Edit Profile 
            </a>
            <a class="dropdown-item" href="{{route('user.password.edit')}}">
                <i class="mdi mdi-pencil mr-2 text-success"></i> 
              Change Password 
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout mr-2 text-success"></i> 
                Signout 
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>   
          </div>
        </li>
        <li class="nav-item d-none d-lg-block full-screen-link">
          <a class="nav-link">
            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
          </a>
        </li>
        {{-- @include('backend.partials.bell') --}}
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>