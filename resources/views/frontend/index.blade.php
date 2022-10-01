@extends('frontend.layouts.app')
@section('title') Home Page @endsection
@section('content')
    <div class="row justify-content-between">
        <div class="col-lg-7">
            <div class="card post-item bg-transparent border-0 mb-5">
                <a href="post-details.html">
                    <img class="card-img-top rounded-0" src="images/post/post-lg/01.png" alt="">
                </a>
                <div class="card-body px-0">
                    <h2 class="card-title">
                        <a class="text-white opacity-75-onHover" href="post-details.html">Id reprehrenderit
                            mollit in tempor naid incididunt cupidatat consectetura</a>
                    </h2>
                    <ul class="post-meta mt-3">
                        <li class="d-inline-block mr-3">
                            <span class="fas fa-clock text-primary"></span>
                            <a class="ml-1" href="#">24 April, 2016</a>
                        </li>
                        <li class="d-inline-block">
                            <span class="fas fa-list-alt text-primary"></span>
                            <a class="ml-1" href="#">Photography</a>
                        </li>
                    </ul>
                    <p class="card-text my-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Tincidunt leo mi, viverra urna. Arcu velit risus, condimentum ut vulputate cursus
                        porttitor turpis in. Diam egestas nec massa, habitasse. Tincidt dui.</p>
                    <a href="post-details.html" class="btn btn-primary">Read More <img
                            src="images/arrow-right.png" alt=""></a>
                </div>
            </div>
            <!-- end of post-item -->

            <div class="card post-item bg-transparent border-0 mb-5">
                <a href="post-details.html">
                    <img class="card-img-top rounded-0" src="images/post/post-lg/02.png" alt="">
                </a>
                <div class="card-body px-0">
                    <h2 class="card-title">
                        <a class="text-white opacity-75-onHover" href="post-details.html">Excepteur ado Do
                            minim duis laborum Fugiat ea labore qui veniam labore</a>
                    </h2>
                    <ul class="post-meta mt-3">
                        <li class="d-inline-block mr-3">
                            <span class="fas fa-clock text-primary"></span>
                            <a class="ml-1" href="#">24 April, 2016</a>
                        </li>
                        <li class="d-inline-block">
                            <span class="fas fa-list-alt text-primary"></span>
                            <a class="ml-1" href="#">Photography</a>
                        </li>
                    </ul>
                    <p class="card-text my-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Tincidunt leo mi, viverra urna. Arcu velit risus, condimentum ut vulputate cursus
                        porttitor turpis in. Diam egestas nec massa, habitasse. Tincidt dui.</p>
                    <a href="post-details.html" class="btn btn-primary">Read More <img
                            src="images/arrow-right.png" alt=""></a>
                </div>
            </div>
            <!-- end of post-item -->

            <div class="card post-item bg-transparent border-0 mb-5">
                <a href="post-details.html">
                    <img class="card-img-top rounded-0" src="images/post/post-lg/03.png" alt="">
                </a>
                <div class="card-body px-0">
                    <h2 class="card-title">
                        <a class="text-white opacity-75-onHover" href="post-details.html">Aliquip excepteur
                            cilludm irure laboris sint ea qui ex amet id. Ex nulla etno</a>
                    </h2>
                    <ul class="post-meta mt-3">
                        <li class="d-inline-block mr-3">
                            <span class="fas fa-clock text-primary"></span>
                            <a class="ml-1" href="#">24 April, 2016</a>
                        </li>
                        <li class="d-inline-block">
                            <span class="fas fa-list-alt text-primary"></span>
                            <a class="ml-1" href="#">Photography</a>
                        </li>
                    </ul>
                    <p class="card-text my-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Tincidunt leo mi, viverra urna. Arcu velit risus, condimentum ut vulputate cursus
                        porttitor turpis in. Diam egestas nec massa, habitasse. Tincidt dui.</p>
                    <a href="post-details.html" class="btn btn-primary">Read More <img
                            src="images/arrow-right.png" alt=""></a>
                </div>
            </div>
            <!-- end of post-item -->
        </div>
        @include('frontend.layouts.includes.rightsidenav')
    </div>
@endsection

@push('style')

@endpush

@push('script')
<script>
    console.log('i\'m pushed script');
</script>
@endpush