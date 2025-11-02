@extends('admin::home')
@section('app.name', 'Frequently Asked Questions (FAQ)')
@push('meta')
@endpush
@push('FAQ')
    {{ Request::path() == 'admin/faqs/' . $faq->id . '/edit' ? 'active' : '' }}
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
                                <i class="nav-icon fas fa-question"></i> @yield('app.name')
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('faqs.update', $faq->id) }}" method="post">
                            <div class="card-body">
                                @method('PATCH')
                                @csrf


                                <div class="form-group">
                                    <label for="Questions">{{ __('Questions') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('questions') is-invalid @enderror"
                                        id="Questions" name="questions" value="{{ $faq->content['questions'] }}"
                                        placeholder="Enter Questions">
                                    @error('questions')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Answers">{{ __('Answers') }} <span class="text-danger">*</span></label><br>
                                    <textarea name="answers" id="Answers" class="form-control @error('answers') is-invalid @enderror" rows="5"
                                        placeholder="Enter Answers">{{ $faq->content['answers'] }}</textarea>
                                    @error('answers')
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
