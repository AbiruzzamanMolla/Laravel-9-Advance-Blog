<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li
                class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-label">Website</li>
            <li
                class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <a href="{{ route('admin.categories.index') }}" aria-expanded="false">
                    <i class="fa fa-th-large"></i><span class="nav-text">Category</span>
                </a>
            </li>
            <li
                class="{{ request()->routeIs('admin.tags.*') ? 'active' : '' }}">
                <a href="{{ route('admin.tags.index') }}" aria-expanded="false">
                    <i class="fa fa-tags"></i><span class="nav-text">Tag</span>
                </a>
            </li>
            <li
                class="{{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <a href="{{ route('admin.posts.index') }}" aria-expanded="false">
                    <i class="fa fa-clipboard"></i><span class="nav-text">Post</span>
                </a>
            </li>
            {{-- <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./index.html">Home 1</a></li>
                    <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                </ul>
            </li> --}}
            <li class="nav-label">Settings</li>
            <li
                class="{{ request()->routeIs('admin.contact.us') ? 'active' : '' }}">
                <a href="{{ route('admin.contact.us') }}" aria-expanded="false">
                    <i class="fa fa-envelope "></i><span class="nav-text">Contact Mails</span>
                </a>
            </li>
            <li
                class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <a href="{{ route('admin.settings.index') }}" aria-expanded="false">
                    <i class="fa fa-cogs"></i><span class="nav-text">Website Settings</span>
                </a>
            </li>
            <li
                class="{{ request()->routeIs('laravelroles::.*') ? 'active' : '' }}">
                <a href="{{ route('laravelroles::roles.index') }}" aria-expanded="false">
                    <i class="fa fa-bolt"></i><span class="nav-text">Role & Permission</span>
                </a>
            </li>
        </ul>
    </div>
</div>
