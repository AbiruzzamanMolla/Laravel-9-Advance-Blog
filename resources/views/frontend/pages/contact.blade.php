@extends('frontend.layouts.app')
@section('title') Contact Page @endsection
@section('content')
<div class="container py-4 my-5">
    <div class="row">
      <div class="col-lg-5 col-md-8">
        <form class="search-form" action="#">
          <div class="input-group">
            <input type="search" class="form-control bg-transparent shadow-none rounded-0"
              placeholder="Search here">
            <div class="input-group-append">
              <button class="btn" type="submit">
                <span class="fas fa-search"></span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10">
        <div class="contact-form bg-dark">
          <h1 class="text-white add-letter-space mb-5">Lets Contact Us</h1>
          <form method="POST" class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-5">
                  <label for="firstName" class="text-black-300">Your First Name</label>
                  <input type="text" id="firstName"
                    class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                    placeholder="Robert Lee" required>
                  <p class="invalid-feedback">Your first-name is required!</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-5">
                  <label for="lastName" class="text-black-300">Your Last Name</label>
                  <input type="text" id="lastName"
                    class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                    placeholder="Anderson" required>
                  <p class="invalid-feedback">Your last-name is required!</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-5">
                  <label for="email" class="text-black-300">E-Mail Address</label>
                  <input type="email" id="email"
                    class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                    placeholder="kevin.jones@mail.com" required>
                  <p class="invalid-feedback">Your email is required!</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-5">
                  <label class="text-black-300">What Is This About?</label>
                  <select class="d-block w-100">
                    <option value="1">Personal Proposal</option>
                    <option value="2">Business Purpose</option>
                    <option value="3">Want to say hello</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group mb-5">
                  <label for="message" class="text-black-300">Your message</label>
                  <textarea name="message"
                    class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                    placeholder="Lorem Ipsum is simply dummy text of the printing and..." required></textarea>
                  <p class="invalid-feedback">Message is required!</p>
                </div>
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-primary">Send Now <img src="images/arrow-right.png"
                    alt=""></button>
              </div>
            </div>
          </form>
        </div>
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
