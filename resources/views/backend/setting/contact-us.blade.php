@extends('backend.layouts.app')
@section('title')
Contact Mails
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active"><a href="javascript:void(0)">Mails</a>
</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title card-text d-inline m-auto text-center">All Mails</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped verticle-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($mails as $mail)
                                    <tr>
                                        <td>
                                            {{ $mail->first_name }} {{ $mail->last_name }}
                                        </td>
                                        <td>
                                            {{ $mail->email }}
                                        </td>
                                        <td>{{ $mail->subject }}</td>
                                        <td>
                                            {{ $mail->message }}
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
                        {{ $mails->links('vendor.pagination.bootstrap-5') }}
                    </div>
                    <p class="card-text d-inline float-right"><small class="text-muted">Last updated {{ $last_updated->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection

