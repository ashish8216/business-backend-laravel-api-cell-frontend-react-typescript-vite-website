@extends('admin::home')
@section('app.name', 'File Manager')

@section('content')



    @include('admin::includes/link')



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card card-primary"><!-- panel panel-primary Starts -->
                        <div class="card-header"><!-- panel-heading Starts -->

                            <h3 class="card-title"><!-- panel-title Starts -->

                                <i class="nav-icon fas fa-folder"></i> @yield('app.name')

                            </h3><!-- panel-title Ends -->



                        </div><!-- panel-heading Ends -->

                        <div class="card-body"><!-- panel-body Starts -->
                            <iframe src="{{ url('laravel-filemanager') }}"
                                style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
