@extends('admin::home')
@section('app.name', 'Teams')
@push('meta')
@endpush
@push('team')
    {{ Request::path() == 'admin/teams/*/edit' ? 'active' : '' }}
@endpush
@section('content')



    @include('admin::includes/link')




    <!-- Main content --><!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-users"></i> @yield('app.name')
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('teams.update', $team->id) }}" method="post">
                            <div class="card-body">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label for="title">{{ __('Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="title" name="name" value="{{ $team->name }}" placeholder="Enter name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">{{ __('Update Image') }} <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">

                                            <input type="text" class="form-control @error('image') is-invalid @enderror"
                                                id="thumbnail" value="{{ $team->content['image'] }}" name="image"
                                                placeholder="Choose file">

                                        </div>
                                        <div class="input-group-append">
                                            <span id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="input-group-text">Browse</span>
                                        </div>
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img src="{{ $team->content['image'] }}" style="max-height:100px;">
                                </div>
                                <div class="form-group">
                                    <label for="post">{{ __('Post') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('post') is-invalid @enderror"
                                        id="post" name="post" value="{{ $team->content['post'] }}"
                                        placeholder="Enter Post">
                                    @error('post')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

@endsection
@push('styles')
@endpush
@push('scripts')
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        $('#name').change(function(e) {
            $.get('{{ url('team_slug') }}', {
                    'name': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                }
            );
        });
    </script>
    <script src="https://cdn.tiny.cloud/1/aoagi5z7gzb59qdlm0cs3i28y14os85g1tslmkk8kf604ufy/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description',
            plugins: [
                'lists', 'table'
            ],
            toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        });
    </script>
@endpush
