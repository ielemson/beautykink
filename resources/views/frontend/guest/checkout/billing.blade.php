@extends('frontend.layouts.beautykinkLayout',['home_classs'=>'product-inner-wrapper'])

@section('title')
    {{ __('Billing') }}
@endsection

@section('content')
    <!-- Page Title-->
    @include('frontend._inc.header_single_page',['title_1'=>'Checkout','title_2'=>'Shipping Address'])

       <!--== End Page Header Area Wrapper ==-->
       <section class="product-area">
        <div class="container" data-padding-top="62">
          <div class="shopping-cart-wrap">
            <div class="row">
              <div class="col-lg-8">
                <div class="shopping-checkout-content">
                  <div class="checkout-accordion" id="accordionExample">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkout-accordion-item">
                            <h2 class="heading" id="headingOne">
                                <button class="heading-button">
                                    <span class="step-number">1.</span>
                                    <b class="text-danger">{{ __('Shipping Address') }}</b>
                              </button>
                            </h2>
                            
                          </div>
                        </div>
                        {{-- <div class="col-md-4"><div class="checkout-accordion-item">
                            <h2 class="heading" id="headingOne">
                              <button class="heading-button" type="button">
                                <span class="step-number">2.</span>
                                {{ __('Shipping Address') }}
                               
                              </button>
                            </h2>
                            
                          </div>
                        </div> --}}
                        <div class="col-md-6"><div class="checkout-accordion-item">
                            <h2 class="heading" id="headingOne">
                              <button class="heading-button" type="button">
                                <span class="step-number">3.</span>
                                {{ __('Review and pay') }}
                              </button>
                            </h2>
                            
                          </div>
                        </div>

                        {{-- Billing Form Starts Here--}}
                        <div class="shopping-checkout-content">
                          <div class="checkout-accordion" >
                            
                            <div class="checkout-accordion-item">
                                 <div class="checkout-accordion-body" data-margin-top="14">
                                  <div class="personal-addresses">
                                    <p class="p-text"><b>Shipping Address</b></p>
                                    <div class="delivery-address-form">
                                      <form id="checkoutBilling" action="{{ route('frontend.guest.checkout.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="checkout-fn">{{ __('First Name') }}</label>
                                                    <input class="form-control" name="bill_first_name" type="text" required id="checkout-fn">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="checkout-ln">{{ __('Last Name') }}</label>
                                                    <input class="form-control" name="bill_last_name" type="text" required id="checkout-ln" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="checkout-email">{{ __('E-mail Address') }}</label>
                                                    <input class="form-control" name="bill_email" type="email" required id="checkout-email" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="checkout-phone">{{ __('Phone Number') }}</label>
                                                    <input class="form-control" name="bill_phone" type="text" id="checkout-phone" required >
                                                </div>
                                            </div>
                                        </div>
                                       
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="checkout-address1">{{ __('Address') }} 1 *</label>
                                                        <input class="form-control" name="bill_address1" required type="text" id="checkout-address1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="checkout-address2">{{ __('Address') }} 2</label>
                                                        <input class="form-control" name="bill_address2" type="text" id="checkout-address2" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                               
                                             {{-- <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="checkout-country">{{ __('Select State') }}</label>
                                                        <select class="form-control" required name="bill_country" id="billing-country" required>
                                                            <option selected >{{ __('Choose State') }}</option>
                                                            @foreach (DB::table('states')->get() as $state)
                                                                <option value="{{ $state->id }}" >{{ $state->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div> --}}
                                            </div>

                                            <div class="row">

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label for="checkout-zip">{{ __('Zip Code') }}</label>
                                                        <input class="form-control" name="bill_zip" type="text" id="checkout-zip">
                                                    </div>
                                                </div>

                                                @if ((Session::has('free_shipping')))
                                                  
                                                @else
                                                   <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="checkout-country">{{ __('Select Country') }}*</label>
                                                        <select class="form-control" required name="bill_country" id="billing-country" required>
                                                            <option value="" >{{ __('Choose Country') }}</option>
                                                            @foreach (DB::table('countries')->get() as $country)
                                                                <option value="{{ $country->id }}" >{{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                              <div class="col-sm-3">
                                                <div class="form-group">
                                                  <label for="checkout-country">{{ __('Shipping Zone') }}*</label>
                                                  <select class="form-control" name="bill_city" id="bill_zone" required>
                                                  </select>
                                              </div>
                                              </div>
                                              
                                              <div class="col-sm-4">
                                                <div class="form-group">
                                                  <label for="checkout-country">{{ __('Select State') }}*</label>
                                                  <select class="form-control" name="shipping_service" id="shipping_location" required>
                                                  </select>
                                              </div>
                                              </div>
                                                @endif
                                               
                                               </div>
                                        {{-- <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="same_address" name="same_ship_address" {{ Session::has('shipping_address') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="same_address">{{ __('Same as billing address') }}</label>
                                            </div>
                                        </div> --}}
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
                        {{-- Billing Form Ends Here--}}
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
        $('#billing-country').on('change', function () {
                var idCountry = this.value;
          // Fetch shipping info
          $("#shipping_location").html('');
          $("#bill_zone").html('');
                $.ajax({
                    url: "{{url('/guest/api/fetch-zones')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        // console.log(res.locations.length)
                        if(res.zones.length != 0){
                       $("#shipping_location").html('');
                            // $('#bill_zone').html('<option value="">Select Shipping Zone</option>');
                            // $.each(res.zones, function (key, value) { $("#bill_zone").append('<option value="' + value
                            // .id + '">' + value.zone +'</option>');
                            // });
                            $('#bill_zone').html('<option value="">Available Zone(s)</option>');
                            $.each(res.zones, function (key, value) { $("#bill_zone").append('<option value="' + value
                            .id + '">' + value.zone + ' - &#8358;' + value.shipping_cost + '</option>');
                            });
                           
                        }else{
                            
                            $('#shipping_service').html('<option value="">No Shipping Service for this zone</option>');
                        
                        }
                       
                    }
                });
         });

         $("#bill_zone").on("change",function(){
          // Fetch city info 
          // $("#bill_city").html('');
          var idZone = this.value;
          // console.log(idState)
                $.ajax({
                    url: "{{url('/guest/api/fetch-zone')}}",
                    type: "POST",
                    data: {
                        zone_id: idZone,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        // console.log(res)
                       
                            $('#shipping_location').html('<option value="">Available State(s)</option>');
                            $.each(res.states, function (key, value) { $("#shipping_location").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                            });
                           
                       
                       
                    }
                });
         })
    })
</script>
@endsection