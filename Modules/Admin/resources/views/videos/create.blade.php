@extends('admin::home')
@section('app.name','Videos')
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
                    <i class="nav-icon fas fa-video"></i> @yield('app.name')
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('videos.store') }}" method="post">
                <div class="card-body">
   @csrf
   <div class="form-group">
                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"  value="{{ old('title') }}" placetitleholder="Enter title">
                    @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>


                  <div class="form-group">
                    <label for="video">{{ __('Vidoe Upload') }} <span class="text-danger">*</span></label><br>
                     <p>&lt;iframe width="560" height="315" src="https://www.youtube.com/embed/bHzabRDB7Zc?si=TaQ8vcwZZFrXPHSa" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen&gt;&lt;/iframe&gt;</p>
                   
                    <input type="text" class="form-control @error('video') is-invalid @enderror" id="video" name="video"  value="{{old('vidoe')}}" placeholder="Enter video">

                    @error('video')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
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

<script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endpush
