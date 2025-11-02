<nav class="main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
    <!-- SEARCH FORM -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                @if (Route::has('login'))
                    @auth
                        {{ Auth::user()->name }}
                    @else
                        <script>
                            window.open('{{ route('login') }}', '_self')
                        </script>
                    @endauth
                @endif
                <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/') . '/admin/profiles/' . Auth::user()->id . '/edit' }}" class="dropdown-item">
                            <i class="fa fa-fw fa-user mr-2"> </i>
                            {{ __('Profiles') }}
                        </a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"
                            class="dropdown-item">
                            <i class="fa fa-fw fa-power-off mr-2"> </i>
                            {{ __('Logout') }}
                        </a>
                    @else
                        <script>
                            window.open('{{ route('login') }}', '_self')
                        </script>
                    @endauth
                @endif
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <!-- Authentication -->
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') . '/admin/dashboard' }}" class="brand-link" style="padding-left: 20px;">
        <i class="fa fa-fw fa-cogs"> </i>
        <span class="brand-text font-weight-light">
            {{ __('Admin DashBoard') }}
        </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        @php
            $settings = Modules\Admin\Models\Setting::all();
        @endphp
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="@foreach ($settings as $setting) {{ $setting->content['logo'] }} @endforeach"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ config('app.name', 'Laravel') }}</a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        @include('admin::includes/menu')
    </div>
    <!-- /.sidebar -->
</aside>
