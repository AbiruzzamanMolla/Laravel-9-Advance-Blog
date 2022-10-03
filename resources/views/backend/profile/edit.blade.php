@extends('backend.layouts.app')
@section('title')
Edit Profile
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active"><a href="{{ route('admin.profile.index') }}">Profile</a>
</li>
<li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Profile</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-xl-6 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.profile.update') }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter Name"
                                        value="{{ old('name', $admin->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="Enter your number"
                                        value="{{ old('phone', $admin->phone) }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Bio</label>
                                <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" id="bio"
                                    cols="30"
                                    rows="10">{{ old('bio', $admin->bio) }}</textarea>
                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter your email" value="{{ old('email', $admin->email) }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Country</label>
                                    <select id="country" name="country" class="form-control @error('country') is-invalid @enderror">
                                        <option selected="selected" disabled>Choose one..</option>
                                        <option value="Bangladesh" {{ $admin->country == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                        <option value="India" {{ $admin->country == 'India' ? 'selected' : '' }}>India</option>
                                        <option value="Pakistan" {{ $admin->country == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror dropify"
                                    data-default-file="{{ asset($admin->image) }}" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success"> <i class="bi bi-arrow-repeat"></i> Update</button>
                        </form>
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
@endpush
@push('scripts')
    <script src="{{ asset('backend/plugins/dropify/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endpush
