<aside>
    <div class="sidenav position-sticky d-flex flex-column justify-content-between">
        <a class="navbar-brand" href="{{ route('website.index') }}" class="logo">
            <img src="{{ asset($WebsiteSetting->site_logo) }}" alt="">
        </a>
        <!-- end of navbar-brand -->
        <div class="navbar navbar-dark my-4 p-0 font-primary">
            <ul class="navbar-nav w-100">
                <li class="nav-item {{ request()->routeIs('website.index') ? 'active' : '' }}">
                    <a class="nav-link text-white px-0 pt-0" href="{{ route('website.index') }}">Home</a>
                </li>
                <li class="nav-item {{ request()->routeIs('website.about') ? 'active' : '' }}">
                    <a class="nav-link text-white px-0" href="{{ route('website.about') }}">About</a>
                </li>
                <li class="nav-item {{ request()->routeIs('website.contact') ? 'active' : '' }}">
                    <a class="nav-link text-white px-0" href="{{ route('website.contact') }}">Contact</a>
                </li>
                <li class="nav-item  accordion">
                    <div id="drop-menu" class="drop-menu collapse">
                        @foreach ($categories as $category)
                        <a class="d-block " href="{{ route('website.search.post', ['type' => 'category', 'search' => $category->slug]) }}">{{ $category->title }}</a>
                        @endforeach
                    </div>
                    <a class="nav-link text-white" href="#!" role="button" data-toggle="collapse"
                        data-target="#drop-menu" aria-expanded="false" aria-controls="drop-menu">Category</a>
                </li>
                <li class="nav-item mt-3">
                    <select class="custom-select bg-transparent rounded-0 text-white shadow-none"
                        id="pick-lang">
                        <option selected value="en">English</option>
                        <option value="fr">French</option>
                    </select>
                </li>
            </ul>
        </div>
        <!-- end of navbar -->

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
        <!-- end of social-links -->
    </div>
</aside>