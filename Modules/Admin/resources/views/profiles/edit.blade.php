@extends('admin::home')
@section('app.name','Profile')
@push('meta')

@endpush
@section('content')



    @include("admin::includes/link")


<!-- Main content --><!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="row">
          <!-- left column -->
          <div class="col-md-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                    <i class="nav-icon fas fa-user"></i> @yield('app.name')
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('profiles.update', $user->id) }}" method="post">
                <div class="card-body">
                     @method('PATCH')
   @csrf
                  <div class="form-group">
                    <label for="title">{{ __('Name')}} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name="name"   value="{{$user->name}}" placeholder="Enter Name">
                    @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">{{ __('Email') }} <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" placeholder="Enter Email">
                    @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                    <div class="form-group">
                    <label for="password">{{ __('Password') }} <span class="text-danger">*</span></label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Enter Password">
                    @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation">{{ __('Password Confirmation') }} <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter Password Confirmation">
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

<script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endpush
