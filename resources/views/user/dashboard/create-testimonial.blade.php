@extends('frontend.layouts.beautykinkLayout')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {{-- <ul class="breadcrumbs">
                    <li><a href="{{ route('frontend.index') }}">{{ __('Home') }}</a> </li>
                    <li class="separator"></li>
                    <li>{{ __('Welcome Back') }}, {{ $user->first_name }}</li>
                </ul> --}}
            </div>
        </div>
    </div>
</div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1">
        <div class="row">
            @include('frontend._inc.user_sidebar')
            <div class="col-lg-8">
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body d-flex flex-row justify-content-between align-items-center">
                            <h5 class="mb-0">{{ __('New Testimonial') }}</h5>
                            <a href="{{ route('user.dashboard') }}"
                                class="btn btn-primary btn-sm m-0">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.testimonial.submit') }}" method="post" enctype="multipart/form-data" class="contact-form">
                            @csrf
                            <div class="row">
                               

                                <div class="col-12">
                                    <label for="inputMessage">{{ __('Testimonial') }} *</label>
                                    <textarea name="testimonial" class="form-control" rows="4" placeholder="please enter your testimonial here, make it as brief as possible."></textarea>
                                    @error('testimonial')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                           
                            <div class="d-flex justify-content-between mt-3">
                                <button class="btn btn-primary btn-sm" type="submit">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styleplugins')
<link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('frontend/css/styles.min.css') }}">
@endsection