@extends('backend.layouts.app')
@section('title')
Edit Password
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active"><a href="{{ route('admin.profile.index') }}">Profile</a>
</li>
<li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Password</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-xl-6 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.profile.update.password') }}"
                            method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>New Password</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="Enter New Password" name="new_password">
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Confirm New Password</label>
                                    <input type="password" name="new_confirm_password"
                                        class="form-control @error('new_confirm_password') is-invalid @enderror"
                                        placeholder="Repate your new password"
                                        value="{{ old('new_confirm_password') }}">
                                    @error('new_confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" name="current_password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    placeholder="Enter your current password" value="{{ old('current_password') }}">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success"> <i class="bi bi-arrow-repeat"></i> Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
@endpush
@push('scripts')
@endpush
