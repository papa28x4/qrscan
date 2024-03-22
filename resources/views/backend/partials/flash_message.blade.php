@if (session('sub-success'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success m-b-lg sub-success" role="alert">
                {!! session('sub-success') !!}. See <a href="{{route('vendor.subscription')}}">Subscription</a> for more details
            </div>
        </div>
    </div>
@endif

@if (session('admin-created'))
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="alert alert-success m-b-lg notification" role="alert">
                {!! session('admin-created') !!}
            </div>
        </div>
    </div>
@endif

@if (session('admin-creation-failed'))
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="alert alert-warning m-b-lg notification" role="alert">
                {!! session('admin-creation-failed') !!}
            </div>
        </div>
    </div>
@endif

@if (session('admin-updated'))
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="alert alert-success m-b-lg notification" role="alert">
                {!! session('admin-updated') !!}
            </div>
        </div>
    </div>
@endif

@if (session('admin-update-failed'))
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="alert alert-warning m-b-lg notification" role="alert">
                {!! session('admin-update-failed') !!}
            </div>
        </div>
    </div>
@endif

@if (session('product-updated'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success m-b-lg notification" role="alert">
                {!! session('product-updated') !!}
            </div>
        </div>
    </div>
@endif

@if (session('product-update-failed'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning m-b-lg notification" role="alert">
                {!! session('product-update-failed') !!}
            </div>
        </div>
    </div>
@endif

@if (session('signup'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success m-b-lg sub-success" role="alert">
                {!! session('signup') !!}
            </div>
        </div>
    </div>
@endif

@if (session('password-updated'))
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="alert alert-success m-b-lg notification" role="alert">
                {!! session('password-updated') !!}
            </div>
        </div>
    </div>
@endif

@if (session('profile-updated'))
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="alert alert-success m-b-lg notification" role="alert">
                {!! session('profile-updated') !!}
            </div>
        </div>
    </div>
@endif
{{-- 
@if (session('message'))
    <div class="row mb-2 mx-1">
        <div class="col-md-12">
            <div class="alert alert-success m-b-lg notification" role="alert">
                {!! session('message') !!}
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="row mb-2 mx-1">
        <div class="col-md-12">
            <div class="alert alert-success m-b-lg notification" role="alert">
                {!! session('error') !!}
            </div>
        </div>
    </div>
@endif --}}

@if (session('message'))
    <div class="">
        <div class="col-md-12">
            <div class="alert alert-success m-b-lg notification" role="alert">
                {!! session('message') !!}
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="">
        <div class="col-md-12">
            <div class="alert alert-warning m-b-lg notification" role="alert">
                {!! session('error') !!}
            </div>
        </div>
    </div>
@endif


{{-- <p class="alert {{ Session::get('type', 'alert-info') }}"> --}}