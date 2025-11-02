@extends('admin::home')
@section('app.name', 'General Settings')
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
                                <i class="nav-icon fas fa-cog"></i> @yield('app.name')
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('settings.update', $setting->id) }}" method="post">
                            <div class="card-body">
                                @method('PATCH')
                                @csrf

                                <div class="form-group">
                                    <label for="name">{{ __('Company Name') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ $setting->content['name'] }}"
                                        placeholder="Enter Company Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputFile">{{ __('logo') }} <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">

                                            <input type="text" class="form-control @error('logo') is-invalid @enderror"
                                                id="thumbnail" value="{{ $setting->content['logo'] }}" name="logo"
                                                placeholder="Choose file">

                                        </div>
                                        <div class="input-group-append">
                                            <span id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="input-group-text">Browse</span>
                                        </div>
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img src="{{ $setting->content['logo'] }}" style="max-height:100px;">

                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="email">{{ __('E-Mail Address') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ $setting->content['email'] }}"
                                                placeholder="Enter E-Mail Address">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="working_hour">{{ __('Working Hour') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('working_hour') is-invalid @enderror"
                                                id="working_hour" name="working_hour"
                                                value="{{ $setting->content['working_hour'] }}"
                                                placeholder="Enter Working hour">
                                            @error('working_hour')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="address">{{ __('Address') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror" id="address"
                                                name="address" value="{{ $setting->content['address'] }}"
                                                placeholder="Enter Address">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <label>{{ __('Mobile Number') }}</label>

                                <div class="form-group">
                                    <label for="mobile_number">{{ __('Contact') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('mobile_number') is-invalid @enderror"
                                        id="mobile_number" name="mobile_number"
                                        value="{{ $setting->content['mobile_number'] }}" placeholder="Enter Mobile Number">
                                    @error('mobile_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="google_maps">{{ __('Google Maps') }} <span
                                            class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <textarea name="google_maps" id="google_maps" class="form-control @error('google_maps') is-invalid @enderror"
                                                rows="10" id="description">{{ $setting->content['google_maps'] }}</textarea>
                                            @error('google_maps')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            {!! $setting->content['google_maps'] !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="facebook">{{ __('Facebook') }}</label>
                                    <input type="url" class="form-control @error('facebook') is-invalid @enderror"
                                        id="facebook" name="facebook" value="{{ $setting->content['facebook'] }}"
                                        placeholder="Enter Facebook">
                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="twitter">{{ __('Tiktok') }}</label>
                                    <input type="url" class="form-control @error('twitter') is-invalid @enderror"
                                        id="twitter" name="twitter" value="{{ $setting->content['twitter'] }}"
                                        placeholder="Enter Twitter">
                                    @error('twitter')
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
@endpush
