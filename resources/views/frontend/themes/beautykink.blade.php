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
    @if ($extra_settings->is_t2_bestseller_product == 1)
    {{-- Best Seller Product Starts --}}
    @include('frontend.catalog.bestseller')
    {{-- Best Seller Product Ends --}}
    @endif

    @if ($extra_settings->is_t2_new_product == 1)
    {{--  New Product Arrivals Starts --}}
    @include('frontend.catalog.latest')
    {{--  New Product Arrivals Ends --}}
    @endif

    @if ($extra_settings->is_t2_featured_product == 1)
    {{--  Top Rated Product Starts --}}
    @include('frontend.catalog.featured')
    {{--  New Product Arrivals Ends --}}
    @endif
    @if ($extra_settings->is_t2_sale_product == 1)
    {{-- Flash deal products starts --}}
    @include('frontend.catalog.sale')
    {{-- Flash deal products ends --}}
    @endif

    @if ($extra_settings->is_t2_flashdeal == 1)
    {{-- Flash deal products starts --}}
    @include('frontend.catalog.flashdeal')
    {{-- Flash deal products ends --}}
    @endif
    {{-- All Product starts --}}
    {{-- @include('frontend.catalog.allproducts') --}}
    {{-- All Product ends --}}
    
 

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


    {{-- Announcement Modal Starts Here --}}
    @include('frontend._inc.announcement')
    {{-- Announcement Modal Ends Here  --}}
@endsection
