@extends('admin::home')
@section('app.name', 'Project')
@push('meta')
@endpush
@push('Pro')
    {{ Request::path() == 'admin/projects/create' ? 'active' : '' }}
    {{ Request::path() == 'admin/projects/create' ? 'menu-open' : '' }}
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
                                <i class="nav-icon fas fa-briefcase"></i> @yield('app.name')
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('projects.store') }}" method="post">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}" placeholder="Enter title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group"><!-- 1 form-group Starts -->
                                    <label for="slug"> {{ __('Slug') }} <span class="text-danger">*</span></label>


                                    <input type="text" name="slug" id="slug"
                                        class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}"
                                        placeholder="Enter slug">

                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- 1 form-group Ends -->
                                <div class="form-group"><!-- 4 form-group Starts -->
                                    <label for="category"> {{ __('Category') }} <span class="text-danger">*</span></label>

                                    <select name="category" class="form-control @error('category') is-invalid @enderror"
                                        id="category">
                                        <option value=" "> Select </option>
                                        @foreach ($categories as $productscategory)
                                            <option value="{{ $productscategory->slug }}">
                                                {{ $productscategory->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Description">{{ __('Description') }} <span
                                            class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="Description"
                                        rows="5" placeholder="Enter Description"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">{{ __('Upload Image') }} <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">

                                            <input type="text" class="form-control @error('image') is-invalid @enderror"
                                                id="thumbnail" value="{{ old('image') }}" name="image"
                                                placeholder="Choose file">

                                        </div>
                                        <div class="input-group-append">
                                            <span id="lfm" data-input="thumbnail" data-prevyw="holder"
                                                class="input-group-text">Browse</span>
                                        </div>
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror


                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">{{ __('Upload Image 1') }} </label>
                                    <div class="input-group">
                                        <div class="custom-file">

                                            <input type="text" class="form-control @error('image1') is-invalid @enderror"
                                                id="thumbnail1" value="{{ old('image1') }}" name="image1"
                                                placeholder="Choose file">

                                        </div>
                                        <div class="input-group-append">
                                            <span id="lf" data-input="thumbnail1" data-preview="holder1"
                                                class="input-group-text">Browse</span>
                                        </div>
                                    </div>
                                    <div id="holder1" style="margin-top:15px;max-height:100px;"></div>
                                    @error('image1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">{{ __('Upload Image 2') }} </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="text" class="form-control @error('image2') is-invalid @enderror"
                                                id="thumbnail2" value="{{ old('image2') }}" name="image2"
                                                placeholder="Choose file">

                                        </div>
                                        <div class="input-group-append">
                                            <span id="l" data-input="thumbnail2" data-preview="holder2"
                                                class="input-group-text">Browse</span>
                                        </div>
                                    </div>
                                    <div id="holder2" style="margin-top:15px;max-height:100px;"></div>
                                    @error('image2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">{{ __('Upload Image 3') }} </label>
                                    <div class="input-group">
                                        <div class="custom-file">

                                            <input type="text"
                                                class="form-control @error('image3') is-invalid @enderror" id="thumbnail3"
                                                value="{{ old('image3') }}" name="image3" placeholder="Choose file">

                                        </div>
                                        <div class="input-group-append">
                                            <span id="f" data-input="thumbnail3" data-preview="holder3"
                                                class="input-group-text">Browse</span>
                                        </div>
                                    </div>
                                    <div id="holder3" style="margin-top:15px;max-height:100px;"></div>
                                    @error('image3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
        $('#title').change(function(e) {
            $.get('{{ url('Project_slug') }}', {
                    'title': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                }
            );
        });
    </script>
@endpush
