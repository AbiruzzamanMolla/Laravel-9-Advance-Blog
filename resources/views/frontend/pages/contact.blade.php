@extends('frontend.layouts.app')
@section('title') Contact Page @endsection
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="contact-form bg-dark">
            <h1 class="text-white add-letter-space mb-5">Lets Contact Us</h1>
            <form method="POST" class="needs-validation" novalidate
                action="{{ route('website.contact.store') }}">
                @csrf
                <div class="row">
                    @if(Session::has('success'))
                        <div class="col-md-12 p-4">
                            <div class="alert alert-success text-center m-auto">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <div class="form-group mb-5">
                            <label for="firstName" class="text-black-300">Your First Name</label>
                            <input type="text" id="firstName"
                                class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0 @error('first_name') is-invalid @enderror"
                                name="first_name" placeholder="First Name">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-5">
                            <label for="lastName" class="text-black-300">Your Last Name</label>
                            <input type="text" id="lastName"
                                class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0 @error('last_name') is-invalid @enderror"
                                name="last_name" placeholder="Last Name">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-5">
                            <label for="email" class="text-black-300">E-Mail Address</label>
                            <input type="email" id="email" name="email"
                                class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0 @error('email') is-invalid @enderror"
                                placeholder="example@mail.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-5">
                            <label class="text-black-300">What Is This About?</label>
                            <select class="d-block w-100 @error('subject') is-invalid @enderror" name="subject">
                                <option value="Personal Proposal">Personal Proposal</option>
                                <option value="Business Purpose">Business Purpose</option>
                                <option value="Want to say hello">Want to say hello</option>
                            </select>
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="message" class="text-black-300">Your message</label>
                            <textarea name="message"
                                class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0 @error('subject') is-invalid @enderror"
                                placeholder="Write Your Message..." required></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-sm btn-primary">Send Now <img
                                src="{{ asset('frontend/images/arrow-right.png') }}"
                                alt=""></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('style')

@endpush

@push('script')
    <script>
        console.log('i\'m pushed script');

    </script>
@endpush
