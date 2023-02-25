<aside id="sidebar-wrapper">
    <div class="sidebar-brand">

        <a href="{{ url('/') }}">
            <img class="navbar-brand-full app-header-logo" src="{{ asset('images/logo_trans1.jpg') }}" width="65"
            alt="Infyom Logo">
        </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="/" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('images/logo_trans1.jpg') }}" width="45px" alt="Logo"/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
