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
 
    <section class="product-area product-category-area">
        <div class="container pt-95 pb-35 pt-lg-70 pb-lg-10">
          <div class="row">
            <div class="col-sm-8 m-auto">
              <div class="section-title text-center mb-30">
                <h2 class="title">Popular Categories</h2>
                <div class="desc">
                  <p>Some of our popular categories include cosmetic</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="product-categorys-slider owl-carousel owl-theme">
                <div class="item">
                  <div class="product-category-item">
                    <div class="inner-content-style2">
                      <div class="thumb">
                        <a href="shop.html"><img src="{{$setting->about_us_img}}" alt="Image-HasTech" class="img"></a>
                      </div>
                      <div class="content">
                        <!-- <h4 class="title"><a href="shop.html">Skin Care</a></h4> -->
                        <p class="product-number">13 products</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-category-item">
                    <div class="inner-content-style2">
                      <div class="thumb">
                        <a href="shop.html"><img src="{{$setting->about_us_img}}" alt="Image-HasTech" class="img"></a>
                      </div>
                      <div class="content">
                        <!-- <h4 class="title"><a href="shop.html">Makeupe</a></h4> -->
                        <p class="product-number">13 products</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-category-item">
                    <div class="inner-content-style2">
                      <div class="thumb">
                        <a href="shop.html"><img src="assets/img/shop/category/09.jpg" alt="Image-HasTech" class="img"></a>
                      </div>
                      <div class="content">
                        <!-- <h4 class="title"><a href="shop.html">Health Care</a></h4> -->
                        <p class="product-number">13 products</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-category-item">
                    <div class="inner-content-style2">
                      <div class="thumb">
                        <a href="shop.html"><img src="assets/img/shop/category/10.jpg" alt="Image-HasTech" class="img"></a>
                      </div>
                      <div class="content">
                        <!-- <h4 class="title"><a href="shop.html">Makeup Tools</a></h4> -->
                        <p class="product-number">13 products</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-category-item">
                    <div class="inner-content-style2">
                      <div class="thumb">
                        <a href="shop.html"><img src="assets/img/shop/category/11.jpg" alt="Image-HasTech" class="img"></a>
                      </div>
                      <div class="content">
                        <!-- <h4 class="title"><a href="shop.html">Skin Care Tools</a></h4> -->
                        <p class="product-number">13 products</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    {{-- Divider starts --}}
    @include('frontend._inc.divider')
    {{-- Divider ends --}}

@endsection
