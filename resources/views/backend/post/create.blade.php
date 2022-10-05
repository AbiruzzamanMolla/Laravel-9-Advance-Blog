@extends('backend.layouts.app')
@section('title')
Add Post
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Post</a>
<li class="breadcrumb-item active"><a href="javascript:void(0)">Add Post</a>
</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title card-text d-inline">Add Post</h5>
                    <a href="{{ route('admin.posts.index') }}"
                        class="card-link float-right btn btn-success"><small><i class="fa fa-arrow-left mr-1"></i>
                            Back</small></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" placeholder="Enter Post Title" value="{{ old('title') }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" id="description" placeholder="Enter Post description"
                                value="{{ old('description') }}">
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category <span class="text-danger">*</span></label>
                            <select class="form-control @error('category_id') is-invalid @enderror" id="category"
                                name="category_id">
                                <option value="">Please select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control @error('cover') is-invalid @enderror dropify"
                                data-default-file="{{ old('cover') }}" name="cover">
                            @error('cover')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Post Body</label>
                            <textarea class="form-control summernote @error('body') is-invalid @enderror" name="body"
                                id="body" placeholder="Please Write Post...">{{ old('body') }}</textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tags">Select Tags</label>
                            <select
                            class=""
                            multiple name="tags[]" id="tags" autocomplete="off">
                            <option value="" disabled>Select Tags</option>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            @permission('store.post')
                            <button class="btn btn-success" type="submit"><i class="fa fa-plus mr-1"></i>
                                Create</button>
                            @endpermission
                        </div>
                    </form>
                    <p class="card-text d-inline float-right"><small class="text-muted">Last created {{ $last_created->diffForHumans() }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection

@push('style')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/plugins/dropify/dropify.css') }}" />
    <link href="{{ asset('backend/plugins/summernote/dist/summernote.css') }}"
        rel="stylesheet">
    <link href="{{ asset('backend/plugins/tom-select/css/tom-select.css') }}"
        rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('backend/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/summernote/dist/summernote.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/tom-select/js/tom-select.js') }}"></script>
    <script>
        $('.dropify').dropify();
        jQuery(document).ready(function () {
            $(".summernote").summernote({
                height: 250,
                minHeight: null,
                maxHeight: null,
                focus: !1
            })
        });
        new TomSelect('#tags', {
            maxItems: 5,
        });

    </script>
@endpush
