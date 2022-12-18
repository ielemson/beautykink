@extends('frontend.layouts.beautykinkLayout', ['home_classs' => 'wrapper home-default-wrapper'])

@section('meta')
    <meta name="keywords" content="{{ $setting->meta_keywords }}">
    <meta name="description" content="{{ $setting->meta_description }}">
@endsection
@section('title')
    {{ __('| Easy To Use Makeup Products In Nigeria') }}
@endsection


@section('content')
{{-- @include('frontend._inc.socialicons') --}}
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
    @if ($extra_settings->is_t2_service_section == 1)
    {{-- service information area --}}
    @include('frontend._inc.service')
    {{-- service  information area --}}  
    @endif
    
    {{-- @if ($extra_settings->is_t2_bestseller_product == 1) --}}
    {{-- Best Seller Product Starts --}}
    @foreach ($highlights as $highlight)
         @include('frontend.catalog.items')
    @endforeach
   
    {{-- Best Seller Product Ends --}}
    {{-- @endif --}}

 
       {{-- Instafeeds starts --}}
       @include('frontend._inc.instafeeds')
       {{-- @include('frontend._inc.insta_widgets') --}}
    {{-- Divider starts --}}
    
    @include('frontend._inc.divider')
    {{-- Divider ends --}}


    {{-- Announcement Modal Starts Here --}}
    @include('frontend._inc.announcement')
    {{-- Announcement Modal Ends Here  --}}
@endsection
