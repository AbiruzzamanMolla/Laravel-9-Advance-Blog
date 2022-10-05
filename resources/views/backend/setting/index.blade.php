@extends('backend.layouts.app')
@section('title')
Website Settings
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active"><a href="javascript:void(0)">Settings</a>
</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills mb-3">
                        <li class="nav-item"><a href="#navpills-1" class="nav-link {{ session('website') ? 'active show' : '' }} {{ !session('website') && !session('about') && !session('social')  ? 'active show' : '' }}" data-toggle="tab"
                                aria-expanded="false">Website</a>
                        </li>
                        <li class="nav-item"><a href="#navpills-2" class="nav-link {{ session('about') ? 'active show' : '' }}" data-toggle="tab"
                                aria-expanded="false">About</a>
                        </li>
                        <li class="nav-item"><a href="#navpills-3" class="nav-link {{ session('social') ? 'active show' : '' }}" data-toggle="tab"
                                aria-expanded="true">Social Links</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content br-n pn">
                        <div id="navpills-1" class="tab-pane {{ session('website') ? 'active show' : '' }} {{ !session('website') && !session('about') && !session('social')  ? 'active show' : '' }}">
                            <div class="row align-items-center">
                                <div class="col-sm-12 col-md-8 m-auto">
                                    <form action="{{ route('admin.settings.update.website') }}"
                                        enctype="multipart/form-data" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Site Name <span class="text-danger">*</span></label>
                                                <input type="text" name="site_name"
                                                    class="form-control @error('site_name') is-invalid @enderror"
                                                    placeholder="Enter site name"
                                                    value="{{ old('site_name', $WebsiteSetting->site_name) }}">
                                                @error('site_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Subscribe text <span class="text-danger">*</span></label>
                                                <input type="text" name="site_subscribe_text"
                                                    class="form-control @error('site_subscribe_text') is-invalid @enderror"
                                                    placeholder="Enter your text"
                                                    value="{{ old('site_subscribe_text', $WebsiteSetting->site_subscribe_text) }}">
                                                @error('site_subscribe_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Contact Email <span class="text-danger">*</span></label>
                                                <input type="text" name="site_contact_email"
                                                    class="form-control @error('site_contact_email') is-invalid @enderror"
                                                    placeholder="Enter your email"
                                                    value="{{ old('site_contact_email', $WebsiteSetting->site_contact_email) }}">
                                                @error('site_contact_email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label>Logo <span class="text-danger">*</span></label>
                                                <input type="file"
                                                    class="form-control @error('site_logo') is-invalid @enderror dropify"
                                                    data-default-file="{{ $WebsiteSetting->image_url }}"
                                                    name="site_logo">
                                                @error('site_logo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success"> <i
                                                class="bi bi-arrow-repeat"></i> Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="navpills-2" class="tab-pane {{ session('about') ? 'active show' : '' }}">
                            <div class="row align-items-center">
                                <div class="col-sm-12 col-md-8 m-auto">
                                    <form action="{{ route('admin.settings.update.about') }}"
                                        enctype="multipart/form-data" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>About Me <span class="text-danger" data-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="No more then 255 character">*</span></label>
                                                <input type="text" name="site_short_bio"
                                                    class="form-control @error('site_short_bio') is-invalid @enderror"
                                                    placeholder="Enter about me"
                                                    value="{{ old('site_short_bio', $WebsiteSetting->site_short_bio) }}">
                                                @error('site_short_bio')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Site Description <span class="text-danger">*</span></label>
                                                <textarea class="form-control summernote @error('site_long_bio') is-invalid @enderror" name="site_long_bio"
                                                    id="site_long_bio" cols="30" rows="10">{{ old('site_long_bio', $WebsiteSetting->site_long_bio) }}</textarea>
                                                @error('site_long_bio')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>About Me Image <span class="text-danger">*</span></label>
                                                <input type="file"
                                                    class="form-control @error('site_image_bio') is-invalid @enderror dropify"
                                                    data-default-file="{{ $WebsiteSetting->about_image_url }}"
                                                    name="site_image_bio">
                                                @error('site_image_bio')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success"> <i
                                                class="bi bi-arrow-repeat"></i> Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="navpills-3" class="tab-pane {{ session('social') ? 'active show' : '' }}">
                            <div class="row align-items-center">
                                <div class="col-sm-12 col-md-8 m-auto">
                                    <form action="{{ route('admin.settings.update.social') }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Facebook Link <span class="text-danger" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="No more then 255 character and must be url">*</span></label>
                                            <input type="text" name="site_social_link_facebook"
                                                class="form-control @error('site_social_link_facebook') is-invalid @enderror"
                                                placeholder="Enter about me"
                                                value="{{ old('site_social_link_facebook', $WebsiteSetting->site_social_link_facebook) }}">
                                            @error('site_social_link_facebook')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Twitter Link <span class="text-danger" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="No more then 255 character and must be url">*</span></label>
                                            <input type="text" name="site_social_link_twitter"
                                                class="form-control @error('site_social_link_twitter') is-invalid @enderror"
                                                placeholder="Enter about me"
                                                value="{{ old('site_social_link_twitter', $WebsiteSetting->site_social_link_twitter) }}">
                                            @error('site_social_link_twitter')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Instagram Link <span class="text-danger" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="No more then 255 character and must be url">*</span></label>
                                            <input type="text" name="site_social_link_instagram"
                                                class="form-control @error('site_social_link_instagram') is-invalid @enderror"
                                                placeholder="Enter about me"
                                                value="{{ old('site_social_link_instagram', $WebsiteSetting->site_social_link_instagram) }}">
                                            @error('site_social_link_instagram')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Linkedin Link <span class="text-danger" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="No more then 255 character and must be url">*</span></label>
                                            <input type="text" name="site_social_link_linkedin"
                                                class="form-control @error('site_social_link_linkedin') is-invalid @enderror"
                                                placeholder="Enter about me"
                                                value="{{ old('site_social_link_linkedin', $WebsiteSetting->site_social_link_linkedin) }}">
                                            @error('site_social_link_linkedin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success"> <i
                                            class="bi bi-arrow-repeat"></i> Update</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/plugins/dropify/dropify.css') }}" />
        <link href="{{ asset('backend/plugins/summernote/dist/summernote.css') }}"
        rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('backend/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/summernote/dist/summernote.min.js') }}"></script>
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
    </script>
@endpush
