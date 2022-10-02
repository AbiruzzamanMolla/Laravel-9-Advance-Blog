@extends('backend.layouts.app')
@section('title')
Profile
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-xl-6 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center mb-4">
                        <img class="mr-3" src="{{ $admin->image_url }}" width="80" height="80" alt="">
                        <div class="media-body">
                            <h3 class="mb-0">{{ $admin->name }}</h3>
                            <p class="text-muted mb-0">{{ $admin->country }}</p>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-6 col-sm-12">
                            <div class="card card-profile text-center">
                                <span class="mb-1 text-primary"><i class="bi bi-plus-circle"></i></span>
                                <h3 class="mb-0">{{ $admin->created_at->diffForHumans() }}</h3>
                                <p class="text-muted px-4">Joined</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card card-profile text-center">
                                <span class="mb-1 text-warning"><i class="bi bi-arrow-repeat"></i></span>
                                <h3 class="mb-0">{{ $admin->updated_at->diffForHumans() }}</h3>
                                <p class="text-muted">Last Updated</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 text-center">
                            @permission('edit.admin')
                                <a href="{{ route('admin.profile.edit') }}">
                                    <button class="btn btn-success px-5 text-white">Edit Profile</button>
                                </a>
                            @endpermission
                        </div>
                        <div class="col-md-6 col-sm-12 text-center">
                            @permission('update.admin.pass')
                            <a href="{{ route('admin.profile.edit.password') }}">
                                <button class="btn btn-warning px-5 text-white">Edit Password</button>
                            </a>
                            @endpermission
                        </div>
                    </div>

                    <h4>About Me</h4>
                    <p class="text-muted">{{ $admin->bio }}</p>
                    <ul class="card-profile__info">
                        <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong>
                            <span>{{ $admin->phone }}</span></li>
                        <li><strong class="text-dark mr-4">Email</strong> <span>{{ $admin->email }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
