@extends('frontend.layouts.app')
@section('title') {{ $post->title }} @endsection
@section('content')
<div class="row justify-content-between">
    <div class="col-lg-10">
        <img class="img-fluid" src="{{ $post->image_url }}" alt="">
        <h1 class="text-white add-letter-space mt-4">{{ $post->title }}</h1>
        <ul class="post-meta mt-3 mb-4">
            <li class="d-inline-block mr-3">
                <span class="fas fa-user text-primary"></span>
                <a class="ml-1" href="{{ route('website.search.post', ['type' => 'author', 'search' => $post->user->name]) }}">{{ $post->user->name }}</a>
            </li>
            <li class="d-inline-block mr-3">
                <span class="fas fa-clock text-primary"></span>
                <a class="ml-1"
                    href="javascript:void()">{{ \Carbon\Carbon::parse($post->created_at)->format('d M, Y') }}</a>
            </li>
            <li class="d-inline-block">
                <span class="fas fa-list-alt text-primary"></span>
                <a class="ml-1" href="{{ route('website.search.post', ['type' => 'category', 'search' => $post->category->slug]) }}">{{ $post->category->title }}</a>
            </li>
        </ul>

        <div class="blockquote bg-dark my-5">
            <p class="blockquote-text pl-2">{{ $post->description }}</p>
            <span class="blockquote-footer text-white h4 mt-3">{{ $post->user->name }}</span>
        </div>

        <div class="widget">
            <p>
                {!! $post->body !!}
            </p>
        </div>
        <div class="widget">
            <h3 class="widget-title text-white d-inline-block mb-4">Tags</h1>
                <div class="d-block">
                    @php
                        $classes = array("btn-primary", "btn-secondary", "btn-success",
                        "btn-danger", "btn-warning", "btn-info",
                        "btn-dark");
                    @endphp
                    @forelse($post->tags as $tag)
                        @php
                            $class = $classes[array_rand($classes)]
                        @endphp
                        <a class="btn {{ $class }} mt-1" href="{{ route('website.search.post', ['type' => 'tag', 'search' => $tag->slug]) }}"><span
                                class="fas fa-tag"></span>{{ $tag->title }}</a>
                    @empty
                        No Tags
                    @endforelse
                </div>
                <!-- end buttons -->
        </div>
        @auth
            @role('admin')
                <div class="widget">
                    <h3 class="widget-title text-white d-inline-block mb-4">Actions</h1>
                        <div class="d-block">
                            @permission('edit.post')
                            <a class="btn btn-success"
                                href="{{ route('admin.posts.edit', $post->slug) }}"><span
                                    class="fas fa-eye-dropper"></span> Edit </a>
                            @endpermission
                        </div>
                        <!-- end buttons -->
                </div>
            @endrole
        @endauth
    </div>
</div>
@endsection

@push('style')

@endpush

@push('script')

@endpush
