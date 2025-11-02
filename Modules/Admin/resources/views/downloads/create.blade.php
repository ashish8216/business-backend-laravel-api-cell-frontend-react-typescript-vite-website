@extends('admin::home')
@section('app.name', 'Download')
@push('meta')
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
                                <i class="nav-icon fas fa-download"></i> @yield('app.name')
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('downloads.store') }}" method="post">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="" placeholder="Enter title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">{{ __('Download of pdf file') }} <span
                                            class="text-danger">*</span></label>
                                    <br>
                                    <div class="input-group">

                                        <div class="custom-file">

                                            <input type="text" class="form-control @error('image') is-invalid @enderror"
                                                id="thumbnail" value="{{ old('pdf') }}" name="pdf"
                                                placeholder="Choose file">

                                        </div>
                                        <div class="input-group-append">
                                            <span id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="input-group-text">Browse</span>
                                        </div>
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                    @error('pdf')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror


                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
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
@endpush
