@extends('admin::home')
@section('app.name', 'Edit Product Category')

@push('meta')
@endpush

@push('Categories')
    {{ Request::is('admin/product_categories/*/edit') ? 'active menu-open' : '' }}
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

                        <form action="{{ route('product_categories.update', $product_categories->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                {{-- Parent Category --}}
                                <div class="form-group">
                                    <label for="parentId">{{ __('Parent Id') }}</label>
                                    <select name="parentId" id="parentId" class="form-control">
                                        <option value="">{{ __('None') }}</option>
                                        @foreach ($categories as $category)
                                            @if ($category->id !== $product_categories->id)
                                                {{-- Prevent self-parenting --}}
                                                <option value="{{ $category->id }}"
                                                    {{ $product_categories->parentId == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Name --}}
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ $product_categories->name }}"
                                        placeholder="Enter category name">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Slug --}}
                                <div class="form-group">
                                    <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="slug" id="slug"
                                        class="form-control @error('slug') is-invalid @enderror"
                                        value="{{ $product_categories->slug }}" placeholder="Enter slug">
                                    @error('slug')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Image --}}
                                <div class="form-group">
                                    <label for="image">{{ __('Image') }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('image') is-invalid @enderror"
                                            id="thumbnail" name="image" value="{{ $product_categories->image }}"
                                            placeholder="Choose file">
                                        <div class="input-group-append">
                                            <span id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="input-group-text">Browse</span>
                                        </div>
                                    </div>
                                    <div id="holder" style="margin-top:15px; max-height:100px;">
                                        @if ($product_categories->image)
                                            <img src="{{ $product_categories->image }}" style="height: 100px;">
                                        @endif
                                    </div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
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

        // Auto-generate slug from name (optional on edit)
        $('#name').on('change', function() {
            $.get('{{ url('Category_slug') }}', {
                name: $(this).val()
            }, function(data) {
                $('#slug').val(data.slug);
            });
        });
    </script>
@endpush
