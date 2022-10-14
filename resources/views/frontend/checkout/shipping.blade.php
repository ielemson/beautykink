@extends('frontend.layouts.beautykinkLayout',['home_classs'=>'product-inner-wrapper'])

@section('title')
    {{ __('Shipping') }}
@endsection
@section('content')
    <!-- Page Title-->
    @include('frontend._inc.header_single_page',['title_1'=>'Checkout','title_2'=>'Shipping Address'])
    <!-- Page Content-->
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
                                    <span class="step-number">1</span>
                                    {{ __('Billing Address') }}
                                </a>
                            </h2>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="checkout-accordion-item">
                            <h2 class="heading" id="headingOne">
                              <button class="heading-button" type="button">
                                <span class="step-number">2</span>
                                <b class="text-danger">{{ __('Shipping Address') }}</b>
                                {{-- <span class="step-edit"><i class="fa fa-pencil"></i> edit</span> --}}
                              </button>
                            </h2>
                            
                          </div>
                        </div>
                        <div class="col-md-4"><div class="checkout-accordion-item">
                            <h2 class="heading" id="headingOne">
                              <button class="heading-button" type="button">
                                <span class="step-number">3</span>
                                {{ __('Review and pay') }}
                              </button>
                            </h2>
                            
                          </div>
                        </div>

                       {{-- Shipping Address Form Starts Here --}}
                       <div class="shopping-checkout-content">
                        <div class="checkout-accordion" >
                          <div class="checkout-accordion-item">
                               <div class="checkout-accordion-body" data-margin-top="14">
                                <div class="personal-addresses">
                                  <p class="p-text"><b>Shipping Address</b> </p>
                                  <div class="delivery-address-form">
                                    <form id="checkoutShipping" action="{{ route('frontend.checkout.shipping.store') }}" method="POST">
                                      @csrf
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="checkout-fn">{{ __('First Name') }}</label>
                                                  <input class="form-control" name="ship_first_name" type="text" id="checkout-fn" value="{{ $user->first_name }}">
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="checkout-ln">{{ __('Last Name') }}</label>
                                                  <input class="form-control" name="ship_last_name" type="text" id="checkout-ln" value="{{ $user->last_name }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="checkout-email">{{ __('E-mail Address') }}</label>
                                                  <input class="form-control" name="ship_email" type="email" id="checkout-email" value="{{ $user->email }}">
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="checkout-phone">{{ __('Phone Number') }}</label>
                                                  <input class="form-control" name="ship_phone" type="text" id="checkout-phone" value="{{ $user->phone }}">
                                              </div>
                                          </div>
                                      </div>
                                      {{-- <div class="row">
                                          <div class="col-sm-12">
                                              <div class="form-group">
                                                  <label for="checkout-company">{{ __('Company') }}</label>
                                                  <input class="form-control" name="ship_company" type="text" id="checkout-company" value="{{ $user->ship_company }}">
                                              </div>
                                          </div>
                                      </div> --}}
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="checkout-address1">{{ __('Address') }} 1</label>
                                                  <input class="form-control" name="ship_address1" required type="text" id="checkout-address1" value="{{ $user->ship_address1 }}">
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="checkout-address2">{{ __('Address') }} 2</label>
                                                  <input class="form-control" name="ship_address2" type="text" id="checkout-address2" value="{{ $user->ship_address2 }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="checkout-zip">{{ __('Zip Code') }}</label>
                                                  <input class="form-control" name="ship_zip" type="text" id="checkout-zip" value="{{ $user->ship_zip }}">
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="checkout-city">{{ __('City') }}</label>
                                                  <input class="form-control" name="ship_city" required type="text" id="checkout-city" value="{{ $user->ship_city }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-sm-12">
                                              <div class="form-group">
                                                  <label for="checkout-country">{{ __('Country') }}</label>
                                                  <select class="form-control" name="ship_country" required id="billing-country">
                                                      <option selected>{{ __('Choose Country') }}</option>
                                                      @foreach (DB::table('countries')->get() as $country)
                                                          <option value="{{ $country->name }}" {{ $user->ship_country == $country->name ? 'selected' : '' }}>{{ $country->name }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                  
                                  
                                      <div class="d-flex justify-content-between paddin-top-1x mt-4">
                                        
                                          <div class="form-group row">
                                            <div class="col-md-12 text-start">
                                              <a  class="btn-submit" href="{{route('frontend.cart')}}"> <i class="fa fa-arrow-left"></i> <span class="hidden-xs-down">{{ __('Back To Cart') }}</span>  </a>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-md-12 text-end">
                                              <button type="submit" class="btn-submit"><span class="hidden-xs-down">{{ __('Continue') }}</span> <i class="fa fa-arrow-right"></i> </button>
                                            </div>
                                          </div>
                                        </div>
                                  </form>
                                  </div>
                                </div>
                              </div>
                           </div>
                        </div>
                       </div>
                       {{-- Shipping Address Form Ends Here --}}
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
@endsection
