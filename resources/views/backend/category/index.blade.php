@extends('backend.layouts.app')
@section('title')
Category
@endsection
@section('breadcrumb')
@if(request()->routeIs('admin.categories.edit'))
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Category</a>
    </li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Category</a>
    </li>
@else
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Category</a>
    </li>
@endif
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Category</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover verticle-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            {{ $category->title }}
                                        </td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <span>
                                                @permission('edit.category')
                                                <a href="{{ route('admin.categories.edit', $category->slug) }}"
                                                    class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil color-muted m-r-5"></i>
                                                </a>
                                                @endpermission
                                                @permission('delete.category')
                                                <button class="btn btn-danger deleteButton" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Delete"
                                                    data-url="{{ route('admin.categories.destroy', $category->slug) }}"
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
                        {{ $categories->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                @if(empty($categoryData))
                    <div class="card-body">
                        <h5 class="card-title">Add Category</h5>
                        <form action="{{ route('admin.categories.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" placeholder="Enter Category Title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                @permission('store.category')
                                <button class="btn btn-success" type="submit"><i class="fa fa-plus mr-1"></i>
                                    Create</button> </div>
                                @endpermission
                        </form>
                        <p class="card-text d-inline"><small class="text-muted">Last created
                                {{ $last_created->diffForHumans() }}</small>
                        </p><a href="{{ URL::previous() }}" class="card-link float-right btn btn-secondary"><i
                                class="fa fa-arrow-left mr-1"></i> Back</a>
                    </div>
                @endif
                @if(!empty($categoryData))
                    <div class="card-body">
                        <h5 class="card-title">Edit Category</h5>
                        <form
                            action="{{ route('admin.categories.update', $categoryData->slug) }}"
                            method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" placeholder="Enter Category Title"
                                    value="{{ old('title', $categoryData->title) }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                @permission('update.category')
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-refresh mr-1"></i>
                                    Update
                                </button>
                                @endpermission
                            </div>
                        </form>
                        <p class="card-text d-inline"><small class="text-muted">Last Updated
                                {{ $last_updated->diffForHumans() }}</small>
                        </p><a href="{{ route('admin.categories.index') }}"
                            class="card-link float-right btn btn-secondary"><i class="fa fa-plus mr-1"></i> Create</a>
                    </div>
                @endif
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
