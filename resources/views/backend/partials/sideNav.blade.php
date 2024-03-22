<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link" style="cursor:default">
          <div class="nav-profile-image d-flex justify-conent-center align-items-center">
            @if(auth()->user()->avatar)
                <img class="user avatar" src="{{auth()->user()->avatar()}}" alt="profile"/>
            @else
                <div style="width:32px; height:32px;
                font-weight:700; line-height:200%; 
                border: 1px solid #1bcfb4; 
                border-radius: 50%;"
                class="no-avatar mx-auto text-center">
                    {{ucfirst(auth()->user()->name)[0]}}  {{ucfirst(auth()->user()->last_name)[0]}}
                </div>
            @endif
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{ucfirst(auth()->user()->name)}}  {{ucfirst(auth()->user()->last_name)}}</span>
            {{-- <span class="text-secondary text-small">{{auth()->user()->roles[0]->name}}</span> --}}
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      {{-- <li class="nav-item @if (Route::currentRouteName() === 'dashboard.index') active @endif">
        <a class="nav-link" href="{{asset(route('dashboard.index'))}}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>  --}}
    
      <li class="nav-item @if (Route::currentRouteName() == 'users.index') active @endif" >
        <a class="nav-link" href="{{route('users.index')}}">
          <span class="menu-title">Users</span>
          <i class="mdi mdi-human-male-female menu-icon"></i>
        </a>
      </li>

      <li class="nav-item @if (Route::currentRouteName() == 'departments.index') active @endif">
        <a class="nav-link" href="{{route('departments.index')}}">
          <span class="menu-title">Departments</span>
          <i class="mdi mdi-engine menu-icon"></i>
        </a>
      </li>
      
      {{-- <li class="nav-item @if (Route::currentRouteName() == 'admins.index') active @endif ">
        <a class="nav-link" href="{{route('admins.index')}}">
          <span class="menu-title">Admins</span>
          <i class="mdi mdi-account-key menu-icon"></i>
        </a>
      </li> --}}

      <li class="nav-item @if (Route::currentRouteName() == 'items.index') active @endif">
        <a class="nav-link" href="{{asset(route('items.index'))}}">
          <span class="menu-title">Items</span>
          <i class="mdi mdi-laptop menu-icon"></i>
        </a>
      </li>
     
      <li class="nav-item @if (Route::currentRouteName() == 'products.index') active @endif">
        <a class="nav-link" href="{{asset(route('products.index'))}}">
          <span class="menu-title">Products</span>
          <i class="mdi mdi-folder-multiple menu-icon"></i>
        </a>
      </li>

      <li class="nav-item @if (Route::currentRouteName() == 'brands.index') active @endif">
        <a class="nav-link" href="{{route('brands.index')}}">
          <span class="menu-title">Brands</span>
          <i class="mdi mdi-cart menu-icon"></i>
        </a>
      </li>

      <li class="nav-item @if (Route::currentRouteName() == 'categories.index') active @endif">
        <a class="nav-link" href="{{asset(route('categories.index'))}}">
          <span class="menu-title">Categories</span>
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        </a>
      </li>
     
      @can('Security')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#security" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">Security</span>
          <i class="menu-arrow"></i>
          <i class="mdi  mdi-account-key menu-icon"></i>
        </a>
        <div class="collapse" id="security">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{asset(route('admins.index'))}}"> Admins </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{asset(route('roles.index'))}}"> Roles </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{asset(route('permissions.index'))}}"> Permissions </a></li>
          </ul>
        </div>
      </li>
      @endcan
      @can('Browse Subscriptions')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#subscription" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">Subscriptions</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-newspaper menu-icon"></i>
        </a>
        <div class="collapse" id="subscription">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('subscribers.index')}}"> Mailing List </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('messages.index')}}"> Messages </a></li>
          </ul>
        </div>
      </li>
    @endcan
    </ul>
  </nav>