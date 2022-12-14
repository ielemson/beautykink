@extends('frontend.layouts.beautykinkLayout',['home_classs'=>'product-inner-wrapper'])

@section('title')
    {{ __('Order cancelled') }}
@endsection

@section('content')
    <!-- Page Title-->
    <div class="page-title">
        <div class="container">
            <div class="column">
                <ul class="breadcrumbs">
                    {{-- <li><a href="{{ route('frontend.index') }}">{{ __('Home') }}</a> </li> --}}
                    {{-- <li class="separator"></li> --}}
                    {{-- <li>{{ __('Success') }}</li> --}}
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-4">
        <div class="card text-center">
            <div class="card-body padding-top-2x">
                <h3 class="card-title text-danger">{{ __('Your order has been cancelled') }}!</h3>
                <p class="card-text">{{ __('Your order has been cancled by you.') }}</p>
                <p class="card-text">{{ __('You can report any technical issue with our team.') }}</p>
                {{-- <div class="padding-top-1x padding-bottom-1x">
                    <a class="btn btn-outline-primary m-4" href="{{ route('frontend.catalog') }}"><i class="icon-package pr-2"></i>{{ __('View our products again') }}</a>
                </div> --}}
                <div class="form-group mb-0">
                    <button onclick="window.location.href='{{ route('frontend.catalog') }}'" class="btn-theme" >{{ __('View our products again') }}</button>
                  </div>
            </div>
        </div>
    </div>
@endsection
