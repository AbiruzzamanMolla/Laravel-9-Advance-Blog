@extends('frontend.layouts.app')
@section('title') About Page @endsection
@section('content')
    <div class="row">
        <div class="col-md-9">
            <img class="img-fluid" src="{{ $WebsiteSetting->about_image_url }}" alt="">
            <h1 class="text-white add-letter-space my-4">{{ $WebsiteSetting->site_short_bio }}</h1>
            <p>
                {!! $WebsiteSetting->site_long_bio !!}
            </p>
        </div>
    </div>
@endsection

@push('style')

@endpush

@push('script')
    <script>

    </script>
@endpush
