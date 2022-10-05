@extends('backend.layouts.app')
@section('title')
Post
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active"><a href="javascript:void(0)">Post</a>
</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title card-text d-inline">All Posts</h5>
                    @permission('create.post')
                        <a href="{{ route('admin.posts.create') }}"
                            class="card-link float-right btn btn-success"><i class="fa fa-plus mr-1"></i> Create</a>
                    @endpermission
                </div>
                <div class="card-body">
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
                                            <img src="{{ $post->image_url }}" alt="" width="100px" height="100px">
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
                                                $classes = array("badge-primary", "badge-secondary", "badge-success",
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
                                                data-token="{{ csrf_token() }}" data-status="{{ $post->status }}"
                                                data-slug="{{ $post->slug }}">
                                        </td>
                                        <td>
                                            <span>
                                                @permission('edit.post')
                                                    <a href="{{ route('admin.posts.edit', $post->slug) }}"
                                                        class="btn btn-sm btn-success" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Edit">
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
                    <div class="bootstrap-pagination">
                        {{ $posts->links('vendor.pagination.bootstrap-5') }}
                    </div>
                    <p class="card-text d-inline float-right"><small class="text-muted">Last updated
                            {{ $last_updated->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
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
