@extends('frontend.layouts.beautykinkLayout', ['home_classs' => 'wrapper home-default-wrapper'])

@section('meta')
    <meta name="keywords" content="{{ $setting->meta_keywords }}">
    <meta name="description" content="{{ $setting->meta_description }}">
@endsection
@section('title')
    {{ __('| Easy To Use Makeup Products In Nigeria') }}
@endsection


@section('content')
    @php
        function renderStarRating($rating, $maxRating = 5)
        {
            $fullStar = "<i class = 'far fa-star filled'></i>";
            $halfStar = "<i class = 'far fa-star-half filled'></i>";
            $emptyStar = "<i class = 'far fa-star'></i>";
            $rating = $rating <= $maxRating ? $rating : $maxRating;
        
            $fullStarCount = (int) $rating;
            $halfStarCount = ceil($rating) - $fullStarCount;
            $emptyStarCount = $maxRating - $fullStarCount - $halfStarCount;
        
            $html = str_repeat($fullStar, $fullStarCount);
            $html .= str_repeat($halfStar, $halfStarCount);
            $html .= str_repeat($emptyStar, $emptyStarCount);
            return $html;
        }
    @endphp

    @if ($extra_settings->is_t2_slider == 1)
        <!--== Start Slider Wrapper ==-->
        @include('frontend._inc.slider')
        <!--== End Slider Wrapper ==-->
    @endif

    {{-- banner first starts --}}
    @if ($extra_settings->is_t2_3_column_banner_first == 1)
        @include('frontend._inc.banner_first')
    @endif


    
    {{-- banner first end --}}
    {{-- service information area --}}
    @include('frontend._inc.service')
    {{-- service  information area --}}

    {{--  New Product Arrivals Starts --}}
    @include('frontend.catalog.latestproducts')
    {{--  New Product Arrivals Ends --}}

    {{--  Top Rated Product Starts --}}
    @include('frontend.catalog.top_product')
    {{--  New Product Arrivals Ends --}}

    {{-- Flash deal products starts --}}
    {{-- @include('frontend.catalog.flash_deal') --}}
    @include('frontend.catalog.flashdeal')
    {{-- Flash deal products ends --}}

    {{-- All Product starts --}}
    @include('frontend.catalog.allproducts')
    {{-- All Product ends --}}
    
    {{-- Best Seller Product Starts --}}
    @include('frontend.catalog.bestseller')
    {{-- Best Seller Product Ends --}}

    @if ($setting->is_testimonial ==1)
           {{-- Testimonial starts --}}
    @include('frontend._inc.testimonial')
    {{-- Testimonial ends --}}
    @endif
 
       {{-- Instafeeds starts --}}
       @include('frontend._inc.instafeeds')
    {{-- Divider starts --}}
    @include('frontend._inc.divider')
    {{-- Divider ends --}}

@endsection
