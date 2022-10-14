@extends('frontend.layouts.beautykinkLayout',['home_classs'=>'wrapper home-default-wrapper'])

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
        // $fullStar = "<i class='far fa-star filled'></i>";
        // $halfStar = "<i class='far fa-star-half filled'></i>";
        // $emptyStar = "<i class='far fa-star'></i>";
        $fullStar = "<i class='ion-md-star'></i>";
       $halfStar = "<i class='ion-md-star icon-color-gray'></i>";
       $emptyStar = "<i class='ion-md-star icon-color-gray'></i>";
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

    @if ($setting->is_slider == 1)
           <!--== Start Hero Area Wrapper ==-->
   <section class="home-slider-area">
    <div class="swiper-container swiper-pagination-style dots-bg-light home-slider-container default-slider-container">
      <div class="swiper-wrapper home-slider-wrapper slider-default">
        @foreach ($sliders as $slider)
        <div class="swiper-slide">
            <div class="slider-content-area" data-bg-img="{{asset($slider->photo)}}">
              <div class="container">
                <div class="row">
                  <div class="col-10 col-sm-6 col-md-5">
                    <div class="slider-content slider-content-light animate-pulse">
                      <h5 class="sub-title transition-slide-0">{{ $slider->title }}</h5>
                      <h2 class="title transition-slide-1 mb-0"><span class="font-weight-400">{{ $slider->details }}</span></h2>
                      {{-- <h2 class="title transition-slide-2">WITH BEAUTYKINK</h2> --}}
                      <a class="btn-slide transition-slide-3" href="{{ $slider->link }}">Shop Now</a>
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


    {{-- Brands  Starts--}}
     <!--== Start Product Area Wrapper ==-->
       @if ($extra_settings->is_t2_3_column_banner_first == 1)
        <section>
            <div class="container-fluid pt-30 pt-sm-15 pb-15 pb-lg-5">
              <div class="row">
                <div class="col-12">
                  <div class="images-col3-slider owl-carousel owl-theme">
                    
                    <div class="item">
                      <div class="thumb thumb-scale-hover-style">
                        <a href="{{ $banner_first['firsturl1'] }}">
                          <img src="{{ asset($banner_first['img1']) }}" loading="lazy"  class="hover-img lazy">
                        </a>
                      </div>
                    </div>
                    <div class="item">
                      <div class="thumb thumb-scale-hover-style">
                        <a href="{{ $banner_first['firsturl2'] }}">
                          <img src="{{$banner_first['img2'] ? $banner_first['img2'] :  asset($setting->loader)  }}"  class="hover-img lazy" data-src="{{ asset($banner_first['img2']) }}">
                        </a>
                      </div>
                    </div>
                    <div class="item">
                      <div class="thumb thumb-scale-hover-style">
                        <a href="{{ $banner_first['firsturl3'] }}">
                          <img src="{{$banner_first['img2'] ? $banner_first['img2'] :  asset($setting->loader)  }}"  class="hover-img lazy" data-src="{{ asset($banner_first['img3']) }}">
                        </a>
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </section>
       @endif
      <!--== End Product Area Wrapper ==-->
    {{-- Brands  Ends--}}

    
  {{-- All Product starts--}}
@include('frontend.catalog.allproducts')
  {{-- All Product ends--}}

  {{--  New Product Arrivals Starts--}}
  @include('frontend.catalog.latestproducts')
  {{--  New Product Arrivals Ends--}}


   {{-- <div class="popup-product-quickview">
    <div class="product-single-item">
      <div class="row">
        <div class="col-md-6">
        
          <div class="product-thumb">

            <div class="swiper-container single-product-thumb-content single-product-thumb-slider">
              <div class="swiper-wrapper gallery_1">
              </div>
            </div>

            <div class="swiper-container single-product-nav-content single-product-nav-slider">
              <div class="swiper-wrapper gallery_2">
              </div>
            </div>

          </div>
        
        </div>
    
       <div class="col-md-6">
        <!--== Start Product Info Area ==-->
        <div class="product-single-info mt-sm-70">
          <h1 class="title prod_name"></h1>
          <div class="product-info">
       
          </div>
          <div class="prices">
            <span class="price"></span>
            <div class="tax-label">Tax included</div>
          </div>
          <div class="product-description">
            
          </div>
          <div class="product-quick-action">
            <div class="product-quick-qty">
              <div class="pro-qty">
                <input type="text" id="quantity" title="Quantity" value="1">
              </div>
            </div>
            <a class="btn-product-add" href="single-product.html">Add to cart</a>
          </div>
          <div class="product-wishlist-compare">
            <a href="#" class="btn-wishlist"><i class="icon-heart"></i>Add to wishlist</a>
            <a href="#" class="btn-compare"><i class="icon-shuffle"></i>Add to compare</a>
          </div>
          <div class="social-sharing">
            <span>Share</span>
            <div class="social-icons">
              <a href="#/"><i class="la la-facebook"></i></a>
              <a href="#/"><i class="la la-twitter"></i></a>
            </div>
          </div>
        </div>
      
      </div>

      </div>
    </div>
  </div>
  <div class="popup-product-overlay"></div>
  <button class="popup-product-close"><i class="la la-close"></i></button> --}}
  <!--== End Popup Product  ==-->
@endsection

@section('script')
<script>
    
  function Quickview(id){
      // Product Quick View Starsts Here ::::::::::::::::::::::::::::::::::
      $.ajax({
              type: 'GET',
              dataType: 'json',
              url: 'product/quck_view/'+id,
              success: function(response){

                  $('.prod_name').text(response.product.name);
                  $('.product-description').html(response.product.details);
                  $('.price').html('&#8358;'+response.product.discount_price);
                  // console.log(response)
                  var miniGallery = "";
                  var miniGallery_1 = "";
                  $.each(response.galleries, function(key,value){
                    miniGallery += `
                <div class="swiper-slide">
                  <a href="#/">
                    <img src="${value.photo}" alt="${response.product.name}">
                    <span class="product-flag-new">New</span>
                  </a>
                </div>
                      `;
                  });

                  $.each(response.galleries, function(key,value){
                    miniGallery_1 += `
                   <div class="swiper-slide">
                  <img src="${value.photo}" alt="${response.product.name}">
                  </div>
                      `;
                  });

                  $('.gallery_1').html(miniGallery);
                  $('.gallery_2').html(miniGallery_1);
                 
              }
          })

   
  }
     
// $(document).ready(function(){
//   var myModal = new bootstrap.Modal(document.getElementById("exampleModal"));
// myModal.show();
// })

</script>

@endsection

