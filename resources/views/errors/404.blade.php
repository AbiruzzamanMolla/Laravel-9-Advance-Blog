<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>404 Not Found - You attempts to follow a broken or dead link</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('backend/images/favicon.png') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
</head>

<body class="h-100">
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="error-content">
                        <div class="card mb-0">
                            <div class="card-body text-center pt-5">
                                <h1 class="error-text text-primary">404</h1>
                                <h4 class="mt-4"><i class="fa fa-thumbs-down text-danger"></i> Not Found</h4>
                                <p>Your Requested to follow a broken or dead link.</p>
                                <form class="mt-5 mb-5">
                                    <div class="text-center mb-4 mt-4"><a href="{{ route('website.index') }}" class="btn btn-primary">Go to Homepage</a>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p>Copyright © Designed by <a href="https://github.com/asliabir">asliabir</a>, Developed by <a href="https://asliabir.github.io">Abiruzzaman Molla</a> 2022</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="https://facebook.com/abiruzzaman.molla" class="btn btn-facebook"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="javascript:void()" class="btn btn-twitter"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="https://www.linkedin.com/in/asliabir/" class="btn btn-linkedin"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="javascript:void()" class="btn btn-google-plus"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('backend/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/settings.js') }}"></script>
    <script src="{{ asset('backend/js/gleek.js') }}"></script>
    <script src="{{ asset('backend/s/styleSwitcher.js') }}"></script>
</body>
</html>





