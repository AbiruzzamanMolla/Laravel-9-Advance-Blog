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
                    <h4 class="card-title">All Posts</h4>
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
                                                $classes = array("badge-primary", "badge-secondary", "badge-success", "badge-danger", "badge-warning", "badge-info", "badge-light", "badge-dark");
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
                                            {{ $post->status ? 'Published' : 'Draft' }}
                                        </td>
                                        <td>
                                            <span>
                                                <a href="{{ route('admin.posts.edit', $post->slug) }}"
                                                    class="btn btn-sm btn-success" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil color-muted m-r-5"></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger deleteButton" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Delete"
                                                    data-url="{{ route('admin.posts.destroy', $post->slug) }}"
                                                    data-token="{{ csrf_token() }}">
                                                    <i class="fa fa-close color-danger"></i>
                                                </button>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection

@push('scripts')
    <script type="text/javascript">
        $(".deleteButton").click(function (e) {
            e.preventDefault();
            var URL = $(this).data('url');
            var token = $(this).data('token');
            deleteConfirmation(URL, token);
        });

        function deleteConfirmation(URL, token) {
            swal({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
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

    </script>
@endpush
