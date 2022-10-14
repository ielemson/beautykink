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
                      <div class="col-4 col-md-3">
                        <div class="product-thumb">
                          <img src="{{ asset($item->options->image) }}" alt="{{ asset($item->name) }}">
                        </div>
                      </div>
                      <div class="col-8 col-md-4">
                        <div class="product-content">
                          <h5 class="title"><a href="{{ route('frontend.product', $item->options->slug) }}">{{$item->name}}</a></h5>
                          <h6 class="product-price">&#8358;{{$item->price}}</h6>
                        </div>
                      </div>
                      <div class="col-6 offset-4 offset-md-0 col-md-5">
                        <div class="product-info">
                          <div class="row">
                            <div class="col-md-10 col-xs-6">
                              <div class="row">
                                <div class="col-md-6 col-xs-6 qty">
                                  <div class="product-quick-qty">
                                    <div class="pro-qty">
                                      <div class="inc qty-btn qty-btn-click" data-id="{{$item->rowId}}"><i class="fa fa-angle-up"></i></div>
                                      <input type="text" id="quantity2" class="qty" title="Quantity" value="{{$item->qty}}" data-rowid="{{$item->rowId}}">
                                      <div class= "dec qty-btn qty-btn-click" data-id="{{$item->rowId}}"><i class="fa fa-angle-down"></i></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6 col-xs-2 price">
                                  <h6 class="product-price">&#8358;{{$item->price*$item->qty}}</h6>
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
                <a class="btn-primary" href="{{route('frontend.index')}}">Continue shopping</a>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="shopping-cart-summary mt-md-70">
                  <div class="cart-detailed-totals">
                    <div class="card-block">
                      <div class="card-block-item">
                        <span class="label">{{$cart_qty}} items</span>
                        <span class="value">&#8358;{{$subtotal}}</span>
                      </div>
                      <div class="card-block-item">
                        <span class="label">Shipping</span>
                        <span class="value">Free</span>
                      </div>
                    </div>
                    <div class="separator"></div>
                    <div class="card-block">
                      <div class="card-block-item">
                        <span class="label">Total (Tax Incl.)</span>
                        <span class="value">&#8358;{{$cart_total}}</span>
                      </div>
                    </div>
                    <div class="separator"></div>
                  </div>
                  <div class="checkout-shopping">
                    <a class="btn-checkout" href="{{ route('frontend.checkout.billing') }}">Proceed to checkout</a>
                  </div>
                </div>
                <div class="block-reassurance">
                  <ul>
                    <li>
                      <img src="{{asset('frontend/img/shop/cart/verified-user.png')}}" alt="security policy">
                      <span>Security Policy (Edit With Customer Reassurance Module)</span>
                    </li>
                    <li>
                      <img src="{{asset('frontend/img/shop/cart/local-shipping.png')}}" alt="delivery policy">
                      <span>Delivery Policy (Edit With Customer Reassurance Module)</span>
                    </li>
                    <li>
                      <img src="{{asset('frontend/img/shop/cart/swap-horiz.png')}}" alt="return policy">
                      <span>Return Policy (Edit With Customer Reassurance Module)</span>
                    </li>
                  </ul>
                </div>
              </div>
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
      <div class="container padding-bottom-3x mb-1">
        <div class="card text-center">
          <div class="card-body padding-top-2x">
            <h3 class="card-title">{{ __('Your shopping cart is empty.') }}</h3>
          <a class="btn-theme" href="{{ route('frontend.catalog') }}"><i class="icon-package pr-2"></i> {{ __('View our products') }}</a></div>
          </div>
        </div>
      @endif
    
@endsection
