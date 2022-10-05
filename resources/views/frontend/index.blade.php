@extends('frontend.layouts.app')
@section('title') Home Page @endsection
@section('content')
    <div class="row justify-content-between">
        <div class="col-lg-7">
            @forelse ($posts as $post)
            <div class="card post-item bg-transparent border-0 mb-5">
                <a href="{{ route('website.post.details', $post->slug) }}">
                    <img class="card-img-top rounded-0" src="{{ $post->image_url }}" alt="">
                </a>
                <div class="card-body px-0">
                    <h2 class="card-title">
                        <a class="text-white opacity-75-onHover" href="{{ route('website.post.details', $post->slug) }}">{{ $post->title }}</a>
                    </h2>
                    <ul class="post-meta mt-3">
                        <li class="d-inline-block mr-3">
                            <span class="fas fa-clock text-primary"></span>
                            <a class="ml-1" href="javascript:void()">{{ \Carbon\Carbon::parse($post->created_at)->format('d M, Y') }}</a>
                        </li>
                        <li class="d-inline-block">
                            <span class="fas fa-list-alt text-primary"></span>
                            <a class="ml-1" href="{{ route('website.search.post', ['type' => 'category', 'search' => $post->category->slug]) }}">{{ $post->category->title }}</a>
                        </li>
                    </ul>
                    <p class="card-text my-4">{{ $post->description }}</p>
                    <a href="{{ route('website.post.details', $post->slug) }}" class="btn btn-primary">Read More <img
                            src="{{ asset('frontend/images/arrow-right.png') }}" alt=""></a>
                </div>
            </div>
            <!-- end of post-item -->
            @empty
            <div class="card post-item bg-transparent border-0 mb-5">
                No post found...
            </div>
            @endforelse
            <div>
                {{ $posts->links() }}
            </div>
        </div>
        @include('frontend.layouts.includes.rightsidenav')
    </div>
@endsection

@push('style')

@endpush

@push('script')
<script>

</script>
@endpush