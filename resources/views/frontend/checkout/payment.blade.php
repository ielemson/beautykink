@extends('frontend.layouts.beautykinkLayout',['home_classs'=>'product-inner-wrapper'])
@section('title')
    {{ __('Payment') }}
@endsection
@section('content')
    <!-- Page Title-->
    @include('frontend._inc.header_single_page',['title_1'=>'Checkout','title_2'=>'Review and Pay'])''
      <!--== End Page Header Area Wrapper ==-->
      <section class="product-area">
        <div class="container" data-padding-top="62">
          <div class="shopping-cart-wrap">
            <div class="row">
              <div class="col-lg-8">
                <div class="shopping-checkout-content">
                  <div class="checkout-accordion" id="accordionExample">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="checkout-accordion-item">
                            <h2 class="heading" id="headingOne">
                                <a href="{{route('frontend.checkout.billing')}}" class="heading-button text-success">
                                    <span class="step-number"><i class="fa fa-check"></i></span>
                                    {{ __('Billing Address') }}
                                </a>
                            </h2>
                            
                          </div>
                        </div>
                        <div class="col-md-4"><div class="checkout-accordion-item">
                            <h2 class="heading" id="headingOne">
                              <a class="heading-button text-success" href="{{route('frontend.checkout.shipping')}}">
                                <span class="step-number"><i class="fa fa-check"></i></span>
                                {{ __('Shipping Address') }}
                                {{-- <span class="step-edit"><i class="fa fa-pencil"></i> edit</span> --}}
                              </a>
                            </h2>
                            
                          </div>
                        </div>
                        <div class="col-md-4"><div class="checkout-accordion-item">
                            <h2 class="heading" id="headingOne">
                              <button class="heading-button" type="button">
                                <span class="step-number">3</span>
                               <b class="text-danger">{{ __('Review and pay') }}</b> 
                              </button>
                            </h2>
                            
                          </div>
                        </div>

                        <div  class="accordion-collapse collapse show">
                            <div class="checkout-accordion-body" data-margin-top="14">
                              <div class="personal-addresses">
                                    <div class="card">
                                    <div class="card-body">
                                        <h6 class="pb-2">{{ __('Review Your Order') }} :</h6>
                                        <hr>
                                        <div class="row padding-top-1x  mb-4">
                                            <div class="col-sm-6">
                                                <h6>{{ __('Invoice address') }} :</h6>
                                                @php
                                                    $ship = Session::get('shipping_address');
                                                    $bill = Session::get('billing_address');
                                                @endphp
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <span class="text-muted">{{ __('Name') }}: </span>{{ $ship['ship_first_name'] }} {{ $ship['ship_last_name'] }}
                                                    </li>
                                                    {{-- @if (PriceHelper::CheckDigital()) --}}
                                                        <li>
                                                            <span class="text-muted">{{ __('Address') }}: </span>{{ $ship['ship_address1'] }} {{ $ship['ship_address2'] }}
                                                        </li>
                                                    {{-- @endif  --}}
                                                    <li>
                                                        <span class="text-muted">{{ __('Phone') }}: </span>{{ $ship['ship_phone'] }}
                                                    </li> 
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6>{{ __('Shipping address') }} :</h6>
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <span class="text-muted">{{ __('Name') }}: </span>{{ $bill['bill_first_name'] }} {{ $bill['bill_last_name'] }}
                                                    </li>
                                                     {{-- @if (PriceHelper::CheckDigital()) --}}
                                                        <li>
                                                            <span class="text-muted">{{ __('Address') }}: </span>{{ $ship['ship_address1'] }} {{ $ship['ship_address2'] }}
                                                        </li>
                                                    {{-- @endif  --}}
                                                    <li>
                                                        <span class="text-muted">{{ __('Phone') }}: </span>{{ $bill['bill_phone'] }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                    
                                        <h6>{{ __('Pay with') }} :</h6>
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="payment-methods">
                                                    @php
                                                        $gateways = \App\Models\PaymentSetting::whereStatus(1)->get();
                                                    @endphp
                                                    @foreach ($gateways as $gateway)
                                                        {{-- @if (PriceHelper::CheckDigitalPaymentGateway())
                                                            @if ($gateway->unique_keyword != 'cod')
                                                                <div class="single-payment-method">
                                                                    <a class="text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#{{ $gateway->unique_keyword }}">
                                                                        <img class="" src="{{ asset($gateway->photo) }}" alt="{{ $gateway->name }}" title="{{ $gateway->name }}">
                                                                        <p>{{ $gateway->name }}</p>
                                                                    </a>
                                                                </div>
                                                            @endif --}}
                                                        {{-- @else --}}
                                                            <div class="single-payment-method">
                                                                <a class="text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#{{ $gateway->unique_keyword }}">
                                                                    <img class="" src="{{ asset($gateway->photo) }}" alt="{{ $gateway->name }}" title="{{ $gateway->name }}">
                                                                    <p>{{ $gateway->name }}</p>
                                                                </a>
                                                            </div>
                                                        {{-- @endif --}}
                                                    @endforeach
                    
                                                </div>
                                            </div>
                                        </div>
                    
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                  </div>
                 
                </div>
              </div>
              <div class="col-lg-4">
                <div class="shopping-cart-summary mt-md-70">
                  <div class="cart-detailed-totals">
                    <div class="card-block">
                      <div class="card-block-item">
                        <span class="label">{{$cart_count}} items</span>
                      </div>
                      <div class="card-block-item">
                        <a href="{{route('frontend.cart')}}"><span class="label">show details</span></a>
                      </div>
                      <div class="card-block-item">
                        <span class="label">Subtotal</span>
                        <span class="value">&#8358;{{$cart_total}}</span>
                      </div>
                      {{-- <div class="card-block-item">
                        <span class="label">Shipping</span>
                        <span class="value">Free</span>
                      </div> --}}
                    </div>
                    <div class="separator"></div>
                    <div class="card-block">
                      <div class="card-block-item">
                        <span class="label">Total (Tax Incl.)</span>
                        <span class="value">&#8358;{{$grand_total}}</span>
                      </div>
                    </div>
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
      @include('frontend._inc.checkout_modal')
@endsection
@section('styleplugins')
<link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('frontend/css/styles.min.css') }}">
@endsection