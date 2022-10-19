@extends('frontend.layouts.beautykinkLayout',['home_classs'=>'product-inner-wrapper'])

@section('title')
    {{ __('Order Success') }}
@endsection

@section('content')
    <!-- Page Title-->
    <div class="page-title">
        <div class="container">
            <div class="column">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('frontend.index') }}">{{ __('Home') }}</a> </li>
                    <li class="separator"></li>
                    <li>{{ __('Success') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-4">
        <div class="card text-center">
            <div class="card-body padding-top-2x">
                <h3 class="card-title text-success">{{ __('Thank you for your order') }}!</h3>
                <p class="card-text">{{ __('Your order has been placed and will be processed as soon as possible.') }}</p>
                <p class="card-text">{{ __('Make sure you make note of your order number, which is') }} <span class="text-medium">{{ $order->transaction_number }}</span></p>
                <p class="card-text">{{ __('You will be receiving an email shortly with confirmation of your order.') }}</p>
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
