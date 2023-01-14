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

    @if (count($cart) > 0)
        <!--== Start Product Area Wrapper ==-->
       <section class="product-area">
        <div class="container" data-padding-top="62">
          <div class="shopping-cart-wrap">
            <div class="row">
              <div class="col-lg-8">
                <div class="shopping-cart-content">
                  <h4 class="title">Shopping Cart</h4>
                 @foreach ($cart as $item)
                   <div class="shopping-cart-item">
                    <div class="row">
                      <div class="col-4 col-md-2">
                        <div class="product-thumb">
                          <a href="{{ route('frontend.product', $item->options->slug) }}" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset($item->options->thumbnail) }}" alt="{{ asset($item->name) }}" style="width:125px; height:125px">
                          </a>
                        </div>
                      </div>
                      <div class="col-8 col-md-4">
                        <div class="product-content">
                          @if ($item->qty > $item->options->stock)
                             <h6 class="title"><small class="text-danger"><i class="fa fa-exclamation-circle"></i> {{$item->qty > $item->options->stock ? 'product not available in the desired quantity.' :" "}}</small></h6>
                          @endif
                         
                          <h5 class="title">
                          <a class="{{$item->qty > $item->options->stock ? 'text-danger' :" "}}" href="{{ route('frontend.product', $item->options->slug) }}">{{$item->name}}</a></h5>
                          <h6 class="product-price">@money($item->price,'NGN')</h6>
                          {{$item->options->attribute_name}}
                           @if ($item->options->attribute_image != '')
                          <img class="img-thumbnail" src="/uploads/items/attributes/{{$item->options->attribute_image}}" alt="{{$item->options->attribute_name}}" style="width: 25px; height:25px">
                          @endif
                          </div>
                      </div>
                      <div class="col-6 offset-4 offset-md-0 col-md-5">
                        <div class="product-info">
                          <div class="row">
                            <div class="col-md-10 col-xs-6">
                              <div class="row">
                                <div class="col-md-6 col-xs-6 qty">
                                  <div class="product-quick-qty">
                                    <div class="">
                                      {{-- <div class="inc qty-btn qty-btn-click" data-id="{{$item->rowId}}"></div> --}}
                                      <input type="number" id="quantity2" class="form-control qty_update" title="Quantity" value="{{$item->qty}}" data-rowid="{{$item->rowId}}" min="1" style="width:60px;"/>
                                      {{-- <div class= "dec qty-btn qty-btn-click" data-id="{{$item->rowId}}"></div> --}}
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6 col-xs-2 price">
                                  <h6 class="product-price">@money($item->price*$item->qty,'NGN')</h6>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-2 text-end">
                              <div class="product-close"><a href="javascript:;" data-cart-id="{{$item->rowId}}" class="remove-cart"><i class="ion-md-trash"></i></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 @endforeach
                @include('frontend._inc.coupon',['cart'=>$cart])
                {{-- <a class="btn-primary" href="{{route('frontend.index')}}">Continue shopping</a> --}}
                </div>
              </div>
             
                 {{-- Cart summary --}}
                 {{-- @include('frontend.checkout.payment_cart_summary') --}}
                 @include('frontend.checkout.payment_cart_summary',['cart_count'=>$cart_qty,'cart'=>$cart,'proceed'=>'<h5><small>Checkout to select shipping options</small></h5>'])
                 {{-- Cart summary --}}
                
            </div>
          </div>
        </div>
      </section>
      <!--== End Product Area Wrapper ==-->
  
       <!--== Start Contact Info Area Wrapper ==-->
    @include('frontend._inc.divider',[])
    <!--== End Contact Info Area Wrapper ==-->

     <!-- Page Content-->       
      @else
      <div class="container padding-bottom-2x mt-10">
        <div class=" text-center">
          <div class="padding-top-2x">
            <h3 class="card-title">{{ __('Your shopping cart is empty.') }}</h3>
            <i class="fas fa-shopping-cart-empty" style="font-size: 3rem"></i>
            <img src="{{asset('frontend/img/cart/empty-cart.jpg')}}" alt="empty cart" class="img-fluid thumbnail" style="width:30%; height:auto;"> <br>
          <button class="btn-theme" onclick="window.location.href='{{ route('frontend.catalog') }}'"><i class="icon-package pr-2"></i> {{ __('View more products') }}</button></div>
          </div>
        </div>
      @endif
    
@endsection

@section('styleplugins')
<link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('frontend/css/styles.min.css') }}">
@endsection
