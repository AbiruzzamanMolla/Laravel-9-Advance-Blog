<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <a href="{{ route('website.index') }}">
                        <span class="input-group-text bg-transparent border-0 pt-2" id="basic-addon1"><i
                            class="fa fa-globe"></i></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                {{ auth()->user()->name }}
                </li>
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{ auth()->user()->image_url }}" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="{{ route('admin.profile.index') }}"><i class="icon-user"></i>
                                        <span>Profile</span><span class="text-red"> ({{ auth()->user()->name }})</span></a>
                                </li>
                                <li><a href="{{ route('admin.profile.edit.password') }}"><i class="icon-key"></i> <span>Update Password</span></a>
                                </li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();"><i class="bi bi-power"></i> <span>Logout</span></a>
                                </li>
                                <form method="POST" action="{{ route('logout') }}" id="logout">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>