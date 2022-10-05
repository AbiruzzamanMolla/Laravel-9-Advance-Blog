<div class="col-lg-4 col-md-5">
    <div class="widget text-center">
        <img class="author-thumb-sm rounded-circle d-block mx-auto" src="images/author-sm.png"
            alt="">
        <h2 class="widget-title text-white d-inline-block mt-4">About Me</h2>
        <p class="mt-4">{{ $WebsiteSetting->site_short_bio }}</p>
            <ul class="list-inline nml-2">
                <li class="list-inline-item">
                    <a href="{{ $WebsiteSetting->site_social_link_twitter }}" class="text-white text-red-onHover pr-2">
                        <span class="fab fa-twitter"></span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ $WebsiteSetting->site_social_link_facebook }}" class="text-white text-red-onHover p-2">
                        <span class="fab fa-facebook-f"></span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ $WebsiteSetting->site_social_link_instagram }}" class="text-white text-red-onHover p-2">
                        <span class="fab fa-instagram"></span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ $WebsiteSetting->site_social_link_linkedin }}" class="text-white text-red-onHover p-2">
                        <span class="fab fa-linkedin-in"></span>
                    </a>
                </li>
            </ul>
    </div>
    <!-- end of author-widget -->

    <div class="widget bg-dark p-4 text-center">
        <h2 class="widget-title text-white d-inline-block mt-4">Subscribe Blog</h2>
        <p class="mt-4">{{ $WebsiteSetting->site_subscribe_text }}</p>
        <form action="#">
            <div class="form-group">
                <input type="email" class="form-control bg-transparent rounded-0 my-4"
                    placeholder="Your Email Address">
                <button class="btn btn-primary">Subscribe Now <img src="images/arrow-right.png"
                        alt=""></button>
            </div>
        </form>
    </div>
    <!-- end of subscription-widget -->

    <div class="widget">
        <div class="mb-5 text-center">
            <h2 class="widget-title text-white d-inline-block">Featured Posts</h2>
        </div>
        @foreach ($latest_posts as $latest_post)
        <div class="card post-item bg-transparent border-0 mb-5">
            <a href="{{ route('website.post.details', $latest_post->slug) }}">
                <img class="card-img-top rounded-0" src="{{ $latest_post->image_url }}" alt="">
            </a>
            <div class="card-body px-0">
                <h2 class="card-title">
                    <a class="text-white opacity-75-onHover" href="{{ route('website.post.details', $latest_post->slug) }}">{{ $latest_post->title }}</a>
                </h2>
                <ul class="post-meta mt-3 mb-4">
                    <li class="d-inline-block mr-3">
                        <span class="fas fa-clock text-primary"></span>
                        <a class="ml-1" href="#">{{ \Carbon\Carbon::parse($latest_post->created_at)->format('d M, Y') }}</a>
                    </li>
                    <li class="d-inline-block">
                        <span class="fas fa-list-alt text-primary"></span>
                        <a class="ml-1" href="{{ route('website.search.post', ['type' => 'category', 'search' => $latest_post->category->slug]) }}">{{ $latest_post->category->title }}</a>
                    </li>
                </ul>
                <a href="{{ route('website.post.details', $latest_post->slug) }}" class="btn btn-primary">Read More <img
                        src="{{ asset('frontend/images/arrow-right.png') }}" alt=""></a>
            </div>
        </div>
        <!-- end of widget-post-item -->
        @endforeach
    </div>
    <!-- end of post-items widget -->
</div>