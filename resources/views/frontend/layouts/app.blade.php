<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Galaxy - Personal Blog Template') - Laravel Blog</title>

    {{-- <!-- mobile responsive meta --> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    {{-- <!-- ** Plugins Needed for the Project ** --> --}}
    {{-- <!-- Bootstrap --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome/css/all.css') }}">

    {{-- <!-- Main Stylesheet --> --}}
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    {{-- Include Style --}}
    @stack('style')
    {{-- <!--Favicon--> --}}
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/x-icon">

</head>

<body>
    {{-- <!-- START preloader-wrapper --> --}}
    <div class="preloader-wrapper">
        <div class="preloader-inner">
            <div class="spinner-border text-red"></div>
        </div>
    </div>
    {{-- <!-- END preloader-wrapper --> --}}

    {{-- <!-- START main-wrapper --> --}}
    <section class="d-flex">
        {{-- <!-- start of sidenav --> --}}
        @include('frontend.layouts.includes.sidenev')
        {{-- <!-- end of sidenav --> --}}
        <div class="main-content">
            {{-- <!-- start of mobile-nav --> --}}
            @include('frontend.layouts.includes.mobilenav')
            {{-- <!-- end of mobile-nav --> --}}
            @yield('content')
            {{-- <!-- start of footer --> --}}
            @include('frontend.layouts.includes.footer')
            {{-- <!-- end of footer --> --}}
        </div>
    </section>
    {{-- <!-- END main-wrapper --> --}}

    {{-- <!-- All JS Files --> --}}
    <script src="{{ asset('frontend/plugins/jQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/bootstrap/bootstrap.min.js') }}"></script>

    {{-- <!-- Main Script --> --}}
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    {{-- include script --}}
    @stack('script')
</body>

</html>
