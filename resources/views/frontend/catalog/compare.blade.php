@extends('frontend.layouts.beautykinkLayout')
@section('title')
    {{ __('Cart') }}
@endsection
@section('meta')
<meta name="keywords" content="{{ $setting->meta_keywords }}">
<meta name="description" content="{{ $setting->meta_description }}">
@endsection
@section('content')
    <!-- Page Title-->
    @include('frontend._inc.header_single_page',['title_1'=>'Cart','title_2'=>'Shopping Cart'])

    @if (count($items) > 0)
    <section class="product-area">
        <div class="container" data-padding-top="62" style="padding-top: 62px;">
          <div class="shopping-compare-wrap">
            <h4 class="title fz-24 mb-0">Products compare</h4>
            <div class="poscompare-table-container">
              <div class="poscompare-product-tr mb-30">
                
                @foreach ($items as $item)
                     <div class="poscompare-product-td">
                  <div class="poscompare-product">
                    <div class="product-thumb">
                      <a href="{{ route('frontend.product', $item->options->slug) }}">
                        <img src="{{asset($item->options->image)}}" alt="{{$item->options->slug}}">
                      </a>
                      <a href="javascript:;" class="poscompare-remove remove_from_compare" data-id="{{$item->rowId}}">Remove</a>
                    </div>
                    <div class="product-info">
                      <h4 class="title"><a href="{{ route('frontend.product', $item->options->slug) }}">{{$item->name}}</a></h4>
                      <div class="star-content">
                        <i class="ion-md-star"></i>
                        <i class="ion-md-star"></i>
                        <i class="ion-md-star"></i>
                        <i class="ion-md-star"></i>
                        <i class="ion-md-star"></i>
                      </div>
                      <div class="prices">
                        {{ PriceHelper::setPreviousPrice($item->price) }}
                      </div>
                      <a class="btn-product-add add_to_cart" data-id="{{ $item->id }}" href="javascript:;">Add to cart</a>
                    </div>
                  </div>
                </div>
                @endforeach
               
                
              </div>
            </div>
          </div>
        </div>
      </section>
  
       <!--== Start Contact Info Area Wrapper ==-->
    @include('frontend._inc.divider',[])
    <!--== End Contact Info Area Wrapper ==-->

     <!-- Page Content-->       
      @else
      <div class="container padding-bottom-3x mb-1">
        <div class="card text-center">
          <div class="card-body padding-top-2x">
            <h3 class="card-title">{{ __('Your compare cart is empty.') }}</h3>
          <button class="btn-theme" onclick="window.location.href='{{ route('frontend.catalog') }}'"><i class="icon-package pr-2"></i> {{ __('View our products') }}</button></div>
          </div>
        </div>
      @endif
    
@endsection
