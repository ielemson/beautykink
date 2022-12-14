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
                                <a href="{{route('frontend.guest.checkout')}}" class="heading-button text-success">
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
                                    <form id="checkoutShipping" action="{{ route('frontend.guest.checkout.shipping.store') }}" method="POST">
                                      @csrf
                                     
                                      <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="checkout-fn">{{ __('First Name') }}</label>
                                                <input class="form-control" name="ship_first_name" type="text" required id="checkout-fn">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="checkout-ln">{{ __('Last Name') }}</label>
                                                <input class="form-control" name="ship_last_name" type="text" required id="checkout-ln">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="checkout-email">{{ __('E-mail Address') }}</label>
                                                <input class="form-control" name="ship_email" type="email" required id="checkout-email">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="checkout-phone">{{ __('Phone Number') }}</label>
                                                <input class="form-control" name="ship_phone" type="text" id="checkout-phone" required >
                                            </div>
                                        </div>
                                    </div>
                                   
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="checkout-address1">{{ __('Address') }} 1 *</label>
                                                    <input class="form-control" name="ship_address1" required type="text" id="checkout-address1">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="checkout-address2">{{ __('Address') }} 2</label>
                                                    <input class="form-control" name="ship_address2" type="text" id="checkout-address2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                          <div class="col-sm-2">
                                              <div class="form-group">
                                                  <label for="checkout-zip">{{ __('Zip Code') }}</label>
                                                  <input class="form-control" name="ship_zip" type="text" id="checkout-zip">
                                              </div>
                                          </div>

                                          <div class="col-sm-3">
                                              <div class="form-group">
                                                  <label for="checkout-country">{{ __('Select State') }}</label>
                                                  <select class="form-control" required name="bill_country" id="shipping-state" required>
                                                      <option selected >{{ __('Choose State') }}</option>
                                                      @foreach (DB::table('states')->get() as $state)
                                                          <option value="{{ $state->id }}" >{{ $state->name }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-sm-3">
                                            <div class="form-group">
                                              <label for="checkout-country">{{ __('City') }}*</label>
                                              <select class="form-control" name="ship_city" id="ship_city" required>
                                              </select>
                                          </div>
                                          </div>
                                            <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="checkout-country">{{ __('Shipping Services') }}</label>
                                            <select class="form-control" name="shipping_service" id="shipping_service" required>
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
               {{-- Shoppping Cart Summary Starts --}}
               @include('frontend.checkout.cartsummary')
               {{-- Shoppping Cart Summary Ends --}}
            </div>
          </div>
        </div>
      </section>
      <!--== End Product Area Wrapper ==-->
  
        <!--== Start Contact Info Area Wrapper ==-->
    @include('frontend._inc.divider',[])
    <!--== End Contact Info Area Wrapper ==-->
@endsection

@section('extra_script')
<script>
    $(document).ready(function(){
        $('#shipping-state').on('change', function () {
                var idState = this.value;
                $("#shipping_service").html('');
                $.ajax({
                    url: "{{url('/guest/api/fetch-shipping')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        // console.log(res.locations.length)
                        if(res.locations.length != 0){
                            $('#shipping_service').html('<option value="">Select Shipping Service</option>');
                            $.each(res.locations, function (key, value) { $("#shipping_service").append('<option value="' + value
                            .id + '">' + value.title + ' - &#8358;' + value.price + '</option>');
                            });
                           
                        }else{
                            
                            $('#shipping_service').html('<option value="">No Shipping Service for this location</option>');
                        
                        }
                       
                    }
                });

                // Fetch city info
          $("#ship_city").html('');
                $.ajax({
                    url: "{{url('/guest/api/fetch-city')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        // console.log(res.locations.length)
                       
                            $('#ship_city').html('<option value="">Select City</option>');
                            $.each(res.cities, function (key, value) { $("#ship_city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                            });
                           
                       
                       
                    }
                });
                
            });
    })
</script>
@endsection