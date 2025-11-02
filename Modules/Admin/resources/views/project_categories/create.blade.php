@extends('admin::home')
@section('app.name', 'Create Project Category')

@push('Categories')
    {{ Request::is('admin/project_categories/create') ? 'active menu-open' : '' }}
@endpush

@section('content')
    @include('admin::includes.link')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-tag"></i> @yield('app.name')
                            </h3>
                        </div>

                        <form action="{{ route('project_categories.store') }}" method="POST">
                            @csrf
                            @include('admin::project_categories._form')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });

        // Always auto-generate slug on create
        $('#name').on('change', function() {
            $.get('{{ url('Project_Category_slug') }}', {
                name: $(this).val()
            }, function(data) {
                $('#slug').val(data.slug);
            });
        });
    </script>
@endpush
