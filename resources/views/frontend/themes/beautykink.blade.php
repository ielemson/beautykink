@extends('frontend.layouts.beautykinkLayout', ['home_classs' => 'wrapper home-default-wrapper'])

@section('meta')
    <meta name="keywords" content="{{ $setting->meta_keywords }}">
    <meta name="description" content="{{ $setting->meta_description }}">
@endsection
@section('title')
    {{ __('Home') }}
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
        <!--== Start Hero Area Wrapper ==-->
        <section class="home-slider-area">
            <div
                class="swiper-container swiper-pagination-style dots-bg-light home-slider-container default-slider-container">
                <div class="swiper-wrapper home-slider-wrapper slider-default">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide">
                            <div class="slider-content-area" data-bg-img="{{ asset($slider->photo) }}">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-10 col-sm-6 col-md-5">
                                            <div class="slider-content slider-content-light animate-pulse">
                                                <h5 class="sub-title transition-slide-0">{{ $slider->title }}</h5>
                                                <h2 class="title transition-slide-1 mb-0"><span
                                                        class="font-weight-400 transition-slide-2">{{ $slider->details }}</span></h2>
                                                {{-- <h2 class="title ">WITH BEAUTYKINK</h2> --}}
                                              @if ($slider->link)
                                              <a class="btn-slide transition-slide-3" href="{{ $slider->link }}">Shop
                                                Now
                                            </a>
                                              @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--== Add Swiper Pagination ==-->
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <!--== End Hero Area Wrapper ==-->
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
    @include('frontend.catalog.flash_deal')
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
 
    
    {{-- Divider starts --}}
    @include('frontend._inc.divider')
    {{-- Divider ends --}}

@endsection
