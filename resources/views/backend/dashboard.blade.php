@extends('backend.layouts.app')
@section('title')
Dashboard
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a>
</li>
@endsection

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Category</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $total_categories }}</h2>
                        {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-th-large"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Post</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $total_posts }}</h2>
                        {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa fa-clipboard"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Tags</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $total_tags }}</h2>
                        {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-tag"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Total User</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $total_users }}</h2>
                        {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recent Posts</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover verticle-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">Cover</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Tags</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($posts as $post)
                                            <tr>
                                                <td>
                                                    <img src="{{ $post->image_url }}" alt="" width="100px"
                                                        height="100px">
                                                </td>
                                                <td>
                                                    {{ $post->title }}
                                                </td>
                                                <td>{{ $post->user->name }}</td>
                                                <td>
                                                    {{ $post->description }}
                                                </td>
                                                <td>
                                                    {{ $post->category->title }}
                                                </td>
                                                <td>
                                                    @php
                                                        $classes = array("badge-primary", "badge-secondary",
                                                        "badge-success",
                                                        "badge-danger", "badge-warning", "badge-info", "badge-light",
                                                        "badge-dark");
                                                    @endphp
                                                    @forelse($post->tags as $tag)
                                                        @php
                                                            $class = $classes[array_rand($classes)]
                                                        @endphp
                                                        <span class="badge badge-pill {{ $class }}">
                                                            {{ $tag->title }}
                                                        </span>
                                                    @empty
                                                        No Tags
                                                    @endforelse
                                                </td>
                                                <td>
                                                    <input class="status" type="checkbox"
                                                        {{ $post->status ? 'checked' : '' }}
                                                        data-toggle="toggle" data-on="Published" data-off="Hidded"
                                                        data-onstyle="success" data-offstyle="danger" id="status"
                                                        data-token="{{ csrf_token() }}"
                                                        data-status="{{ $post->status }}"
                                                        data-slug="{{ $post->slug }}">
                                                </td>
                                                <td>
                                                    <span>
                                                        @permission('edit.post')
                                                            <a href="{{ route('admin.posts.edit', $post->slug) }}"
                                                                class="btn btn-sm btn-success" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Edit">
                                                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                                            </a>
                                                        @endpermission
                                                        @permission('delete.post')
                                                            <button class="btn btn-sm btn-danger deleteButton"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Delete"
                                                                data-url="{{ route('admin.posts.destroy', $post->slug) }}"
                                                                data-token="{{ csrf_token() }}">
                                                                <i class="fa fa-close color-danger"></i>
                                                            </button>
                                                        @endpermission
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3"><b>Nothing Founds...</b></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <p class="card-text d-inline float-right"><small class="text-muted">Last updated
                                    {{ $last_updated->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <a href="{{ $WebsiteSetting->site_social_link_facebook }}">
                    <div class="social-graph-wrapper widget-facebook">
                        <span class="s-icon"><i class="fa fa-facebook"></i></span>
                    </div>
                </a>
                <div class="row">
                    <div class="col-6 border-right">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">89k</h4>
                            <p class="m-0">Friends</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">119k</h4>
                            <p class="m-0">Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <a href="{{ $WebsiteSetting->site_social_link_linkedin }}">
                    <div class="social-graph-wrapper widget-linkedin">
                        <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                    </div>
                </a>
                <div class="row">
                    <div class="col-6 border-right">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">89k</h4>
                            <p class="m-0">Friends</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">119k</h4>
                            <p class="m-0">Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <a href="{{ $WebsiteSetting->site_social_link_instagram }}">
                <div class="social-graph-wrapper widget-googleplus">
                    <span class="s-icon"><i class="fa fa-instagram"></i></span>
                </div>
                </a>
                <div class="row">
                    <div class="col-6 border-right">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">89k</h4>
                            <p class="m-0">Friends</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">119k</h4>
                            <p class="m-0">Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <a href="{{ $WebsiteSetting->site_social_link_twitter }}">
                <div class="social-graph-wrapper widget-twitter">
                    <span class="s-icon"><i class="fa fa-twitter"></i></span>
                </div>
                </a>
                <div class="row">
                    <div class="col-6 border-right">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">89k</h4>
                            <p class="m-0">Friends</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">119k</h4>
                            <p class="m-0">Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('style')
    <link
        href="{{ asset('backend/plugins/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('backend/plugins/sweetalert2/dist/dist/sweetalert2.min.css') }}"
        rel="stylesheet">
@endpush

@push('scripts')
    <script
        src="{{ asset('backend/plugins/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.js') }}">
    </script>
    <script src="{{ asset('backend/plugins/sweetalert2/dist/dist/sweetalert2.min.js') }}">
    </script>
    <script type="text/javascript">
        $(".deleteButton").click(function (e) {
            e.preventDefault();
            var URL = $(this).data('url');
            var token = $(this).data('token');
            deleteConfirmation(URL, token);
        });

        function deleteConfirmation(URL, token) {
            Swal.fire({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'DELETE',
                        url: URL,
                        data: {
                            _token: token
                        },
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal("Done!", results.message, "success");
                                location.reload();
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
        }
        // change status
        $(".status").change(function (e) {
            e.preventDefault();
            var status = $(this).data('status') ? 0 : 1;
            var token = $(this).data('token');
            var slug = $(this).data('slug');
            console.log(status, token, slug);
            $.ajax({
                type: 'POST',
                url: '{{ route("admin.posts.status") }}',
                data: {
                    '_token': token,
                    'slug': slug,
                    'status': status,
                },
                dataType: 'JSON',
                success: function (results) {
                    if (results.success === true) {
                        toastr.success(results.message, 'Success!')
                    } else {
                        swoltimer(results.message)
                    }
                }
            });
        });

        function swoltimer(msg) {
            let timerInterval
            Swal.fire({
                title: 'Error!',
                html: msg,
                type: "error",
                icon: 'error',
                timer: 3000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log(msg)
                }
            });
        }

    </script>
@endpush
