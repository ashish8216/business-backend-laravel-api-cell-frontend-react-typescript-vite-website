<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

        <li class="nav-item"><a href="{{ url('/dashboard') }}"
                class="nav-link {{ Request::path() == 'dashboard' ? 'active' : '' }}"><i
                    class="nav-icon fas fa-tachometer-alt"></i>
                <p>{{ __('Dashboard') }}</p>
            </a></li>

        <li class="nav-item"><a href="{{ url('/Manger') }}"
                class="nav-link {{ Request::path() == 'Manger' ? 'active' : '' }}"><i
                    class="nav-icon fas fa-folder"></i>
                <p>{{ __('File Manager') }}</p>
            </a></li>
        <li
            class="nav-item @if (Request::path() == 'products' ||
                    Request::path() == 'product_categories' ||
                    Request::path() == 'product_tags') menu-open @endif @stack('products') @stack('Categories') @stack('Tags')">
            <a href="#"
                class="nav-link @if (Request::path() == 'products' ||
                        Request::path() == 'product_categories' ||
                        Request::path() == 'product_tags') active @endif @stack('products') @stack('Categories') @stack('Tags')"><i
                    class="nav-icon fa fa-shopping-cart"></i>
                <p>{{ __('Products') }}</p><i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item has-treeview"><a href="{{ url('/products') }}"
                        class="nav-link {{ Request::path() == 'products' ? 'active' : '' }} @stack('products')"><i
                            class="nav-icon fa fa-shopping-cart"></i>
                        <p>{{ __('Products') }}</p>
                    </a></li>

                <li class="nav-item has-treeview"><a href="{{ url('/product_categories') }}"
                        class="nav-link {{ Request::path() == 'product_categories' ? 'active' : '' }} @stack('Categories')"><i
                            class="nav-icon fas fa-tag"></i>
                        <p>{{ __('Product Categories') }}</p>
                    </a></li>

                <li class="nav-item has-treeview"><a href="{{ url('/product_tags') }}"
                        class="nav-link {{ Request::path() == 'product_tags' ? 'active' : '' }} @stack('tag')"><i
                            class="nav-icon fas fa-tag"></i>
                        <p>{{ __('Product Tags') }}</p>
                    </a></li>
            </ul>
        </li>

        <li class="nav-item"><a href="{{ url('/slideshows') }}"
                class="nav-link  {{ Request::path() == 'slideshows' ? 'active' : '' }} @stack('sildeshows')"><i
                    class="nav-icon fas fa-image"></i>
                <p>{{ __('Slideshow') }}</p>
            </a></li>





        <li class="nav-item"><a href="{{ url('/testimonials') }}"
                class="nav-link  {{ Request::path() == 'testimonials' ? 'active' : '' }} @stack('Testimonials')"><i
                    class="nav-icon fas fa-users"></i>
                <p>{{ __('Testimonial') }}</p>
            </a></li>



        <li class="nav-item"><a href="{{ url('/services') }}"
                class="nav-link  {{ Request::path() == 'services' ? 'active' : '' }} @stack('servicess')"><i
                    class="nav-icon fa  fa-briefcase"></i>
                <p>{{ __('Services') }}</p>
            </a></li>



        <li class="nav-item"><a href="{{ url('/downloads') }}"
                class="nav-link   @if (Request::path() == 'downloads' || Request::path() == 'downloads/create') active @endif"><i
                    class="nav-icon fas fa-download"></i>
                <p>{{ __('Downloads') }}</p>
            </a></li>

        <li class="nav-item"><a href="{{ url('/teams') }}"
                class="nav-link  {{ Request::path() == 'teams' ? 'active' : '' }} @stack('team')"><i
                    class="nav-icon fas fa-users"></i>
                <p>{{ __('Team') }}</p>
            </a></li>

        <li class="nav-item"><a href="{{ url('/faqs') }}"
                class="nav-link  {{ Request::path() == 'faqs' ? 'active' : '' }} @stack('FAQ')"><i
                    class="nav-icon fas fa-question"></i>
                <p>{{ __('FAQ') }}</p>
            </a></li>

        <li class="nav-item"><a href="{{ url('/videos') }}"
                class="nav-link @if (Request::path() == 'videos' || Request::path() == 'videos/create') active @endif "><i class="nav-icon fa fa-video"></i>
                <p>{{ __('Video') }}</p>
            </a></li>


        <li class="nav-item @if (Request::path() == 'settings/1/edit' || Request::path() == 'menus') menu-open @endif  @stack('menu')"><a
                href="{{ url('/settings/1/edit') }}"
                class="nav-link @if (Request::path() == 'settings/1/edit' || Request::path() == 'menus') active @endif   @stack('menu')"><i
                    class="nav-icon fa  fa-cog"></i>
                <p>{{ __('General Settings') }}</p>
            </a>



        </li><!-- li Ends -->

        <li class="nav-item @if (Request::path() == 'profiles' ||
                (Route::has('login') && Auth::check() && Request::path() == 'profiles/' . Auth::user()->id . '/edit')) menu-open @endif"><a href="#"
                class="nav-link  @if (Route::has('login')) @auth @if (Request::path() == 'profiles' || Request::path() == 'profiles/' . Auth::user()->id . '/edit') active @endif
@else
<script>
    window.open('{{ route('login') }}', '_self')
</script> @endauth @endif"><i
                    class="nav-icon fa fa-users"></i>
                <p>{{ __('Users') }}</p><i class="right fas fa-angle-left"></i>
            </a>

            <ul class="nav nav-treeview">

                <li class="nav-item"><a href="{{ url('/profiles') }}"
                        class="nav-link {{ Request::path() == 'profiles' ? 'active' : '' }}"><i
                            class="nav-icon fa fa-list"></i>
                        <p>{{ __('Users') }}</p>
                    </a></li>
                @if (Route::has('login'))

                    @auth
                        <li class="nav-item"><a href="{{ url('/') . '/profiles/' . Auth::user()->id . '/edit' }}"
                                class="nav-link {{ Request::path() == 'profiles/' . Auth::user()->id . '/edit' ? 'active' : '' }}"><i
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
