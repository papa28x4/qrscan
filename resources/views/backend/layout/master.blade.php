@php
    $exceptions = ['login', 'register', 'password.request', 'password.reset', 'verification.notice', 'item.showOwner'];

    $sideNav = !in_array(\Route::current()->getName(), $exceptions ) ? true : false;

    $topbar =  !in_array(\Route::current()->getName(), $exceptions ) ? true : false;
@endphp
<!DOCTYPE html>
<html lang="en">
    @include('backend.partials.head')
    @stack('child-styles')
    <body id="app">       
       
        @include('backend.partials.loader')
        <div class="container-scroller">
           
            @if($topbar)
                @include('backend.partials.topNav')
            @endif
          
            <div class="container-fluid page-body-wrapper full-page-wrapper">
             
                @if($sideNav)
                    @include('backend.partials.sideNav')
                    <div class="{{$sideNav ? 'main-panel' : 'verify-notification'}}">
                    
                        @yield('content')

                        @include('backend.partials.footer')
                    
                    </div>
                @else
                    @yield('content')
                @endif                   
                
            </div>
            
        </div>
        
        @include('backend.partials.scripts')
        @stack('child-scripts')
    </body>
</html>