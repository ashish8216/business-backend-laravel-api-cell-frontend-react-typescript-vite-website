<div class="card-body">

    {{-- Name --}}
    <div class="form-group">
        <label for="name">{{ __('Name') }} <span class="text-danger">{{ __('*') }}</span></label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            value="{{ old('name', $project_category->name ?? '') }}" placeholder="Enter category name">
        @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    {{-- Slug --}}
    <div class="form-group">
        <label for="slug">{{ __('Slug') }} <span class="text-danger">{{ __('*') }}</span></label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
            value="{{ old('slug', $project_category->slug ?? '') }}" placeholder="Enter slug">
        @error('slug')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">
        {{ isset($project_category) ? __('Update') : __('Create') }}
    </button>
</div>
