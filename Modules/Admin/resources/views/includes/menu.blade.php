<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

        <li class="nav-item"><a href="{{ url('/admin/dashboard') }}"
                class="nav-link {{ Request::path() == 'admin/dashboard' ? 'active' : '' }}"><i
                    class="nav-icon fas fa-tachometer-alt"></i>
                <p>{{ __('Dashboard') }}</p>
            </a></li>

        <li class="nav-item"><a href="{{ url('/admin/Manger') }}"
                class="nav-link {{ Request::path() == 'admin/Manger' ? 'active' : '' }}"><i
                    class="nav-icon fas fa-folder"></i>
                <p>{{ __('File Manager') }}</p>
            </a></li>
        <li
            class="nav-item @if (Request::path() == 'admin/products' ||
                    Request::path() == 'admin/product_categories' ||
                    Request::path() == 'admin/product_tags') menu-open @endif @stack('products') @stack('Categories') @stack('Tags')">
            <a href="#"
                class="nav-link @if (Request::path() == 'admin/products' ||
                        Request::path() == 'admin/product_categories' ||
                        Request::path() == 'admin/product_tags') active @endif @stack('products') @stack('Categories') @stack('Tags')"><i
                    class="nav-icon fa fa-shopping-cart"></i>
                <p>{{ __('Products') }}</p><i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item has-treeview"><a href="{{ url('/admin/products') }}"
                        class="nav-link {{ Request::path() == 'admin/products' ? 'active' : '' }} @stack('products')"><i
                            class="nav-icon fa fa-shopping-cart"></i>
                        <p>{{ __('Products') }}</p>
                    </a></li>

                <li class="nav-item has-treeview"><a href="{{ url('/admin/product_categories') }}"
                        class="nav-link {{ Request::path() == 'admin/product_categories' ? 'active' : '' }} @stack('Categories')"><i
                            class="nav-icon fas fa-tag"></i>
                        <p>{{ __('Product Categories') }}</p>
                    </a></li>

                <li class="nav-item has-treeview"><a href="{{ url('/admin/product_tags') }}"
                        class="nav-link {{ Request::path() == 'admin/product_tags' ? 'active' : '' }} @stack('tag')"><i
                            class="nav-icon fas fa-tag"></i>
                        <p>{{ __('Product Tags') }}</p>
                    </a></li>
            </ul>
        </li>

        <li class="nav-item"><a href="{{ url('/admin/slideshows') }}"
                class="nav-link  {{ Request::path() == 'admin/slideshows' ? 'active' : '' }} @stack('sildeshows')"><i
                    class="nav-icon fas fa-image"></i>
                <p>{{ __('Slideshow') }}</p>
            </a></li>





        <li class="nav-item"><a href="{{ url('/admin/testimonials') }}"
                class="nav-link  {{ Request::path() == 'admin/testimonials' ? 'active' : '' }} @stack('Testimonials')"><i
                    class="nav-icon fas fa-users"></i>
                <p>{{ __('Testimonial') }}</p>
            </a></li>



        <li class="nav-item"><a href="{{ url('/admin/services') }}"
                class="nav-link  {{ Request::path() == 'admin/services' ? 'active' : '' }} @stack('servicess')"><i
                    class="nav-icon fa  fa-briefcase"></i>
                <p>{{ __('Services') }}</p>
            </a></li>



        <li class="nav-item"><a href="{{ url('/admin/downloads') }}"
                class="nav-link   @if (Request::path() == 'admin/downloads' || Request::path() == 'admin/downloads/create') active @endif"><i
                    class="nav-icon fas fa-download"></i>
                <p>{{ __('Downloads') }}</p>
            </a></li>

        <li class="nav-item"><a href="{{ url('/admin/teams') }}"
                class="nav-link  {{ Request::path() == 'admin/teams' ? 'active' : '' }} @stack('team')"><i
                    class="nav-icon fas fa-users"></i>
                <p>{{ __('Team') }}</p>
            </a></li>

        <li class="nav-item"><a href="{{ url('/admin/faqs') }}"
                class="nav-link  {{ Request::path() == 'admin/faqs' ? 'active' : '' }} @stack('FAQ')"><i
                    class="nav-icon fas fa-question"></i>
                <p>{{ __('FAQ') }}</p>
            </a></li>

        <li class="nav-item"><a href="{{ url('/admin/videos') }}"
                class="nav-link @if (Request::path() == 'admin/videos' || Request::path() == 'admin/videos/create') active @endif "><i class="nav-icon fa fa-video"></i>
                <p>{{ __('Video') }}</p>
            </a></li>


        <li class="nav-item @if (Request::path() == 'admin/settings/1/edit' || Request::path() == 'admin/menus') menu-open @endif  @stack('menu')"><a
                href="{{ url('/admin/settings/1/edit') }}"
                class="nav-link @if (Request::path() == 'admin/settings/1/edit' || Request::path() == 'admin/menus') active @endif   @stack('menu')"><i
                    class="nav-icon fa  fa-cog"></i>
                <p>{{ __('General Settings') }}</p>
            </a>



        </li><!-- li Ends -->

        <li class="nav-item @if (Request::path() == 'admin/profiles' ||
                (Route::has('login') && Auth::check() && Request::path() == 'admin/profiles/' . Auth::user()->id . '/edit')) menu-open @endif"><a href="#"
                class="nav-link  @if (Route::has('login')) @auth @if (Request::path() == 'admin/profiles' || Request::path() == 'admin/profiles/' . Auth::user()->id . '/edit') active @endif
@else
<script>
    window.open('{{ route('login') }}', '_self')
</script> @endauth @endif"><i
                    class="nav-icon fa fa-users"></i>
                <p>{{ __('Users') }}</p><i class="right fas fa-angle-left"></i>
            </a>

            <ul class="nav nav-treeview">

                <li class="nav-item"><a href="{{ url('/admin/profiles') }}"
                        class="nav-link {{ Request::path() == 'admin/profiles' ? 'active' : '' }}"><i
                            class="nav-icon fa fa-list"></i>
                        <p>{{ __('Users') }}</p>
                    </a></li>
                @if (Route::has('login'))

                    @auth
                        <li class="nav-item"><a href="{{ url('/') . '/admin/profiles/' . Auth::user()->id . '/edit' }}"
                                class="nav-link {{ Request::path() == 'admin/profiles/' . Auth::user()->id . '/edit' ? 'active' : '' }}"><i
                                    class="nav-icon fa  fa-user"></i>
                                <p>{{ __('Profiles') }} </p>
                            </a></li>
                    @else
                        <script>
                            window.open('{{ route('login') }}', '_self')
                        </script>
                    @endauth
                @endif

            </ul>

        </li><!-- li Ends -->

        <li class="nav-item has-treeview"><a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link"><i
                    class="nav-icon fa  fa-power-off"></i>
                <p>{{ __('Logout') }}</p>
            </a></li>

    </ul>
</nav>
<!-- /.sidebar-menu -->
