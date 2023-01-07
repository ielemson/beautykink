@extends('frontend.layouts.beautykinkLayout',['home_classs'=>'product-inner-wrapper'])

@section('title')
    {{ __('Checkout') }}
@endsection

@section('content')
    <!-- Page Title-->
    @include('frontend._inc.header_single_page',['title_1'=>'Checkout','title_2'=>'Billing Address'])

       <!--== End Page Header Area Wrapper ==-->
       <section class="product-area">
        <div class="container" data-padding-top="62">
          <div class="shopping-cart-wrap"> 
                {{-- Form Starts --}}
              <form id="checkoutBilling" action="{{ route('frontend.checkout.store') }}" method="POST">
                @csrf
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
                                 <div class="checkout-accordion-body">
                                  <div class="personal-addresses">
                                    {{-- <p class="p-text"><b>Shipping Address</b></p> --}}
                                    <div class="delivery-address-form">
                                    
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="checkout-fn">{{ __('First Name') }}</label>
                                                    <input class="form-control" name="bill_first_name" type="text" required id="checkout-fn" value="{{ $user->first_name }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="checkout-ln">{{ __('Last Name') }}</label>
                                                    <input class="form-control" name="bill_last_name" type="text" required id="checkout-ln" value="{{ $user->last_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="checkout-email">{{ __('E-mail Address') }}</label>
                                                    <input class="form-control" name="bill_email" type="email" required id="checkout-email" value="{{ $user->email }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="checkout-phone">{{ __('Phone Number') }}</label>
                                                    <input class="form-control" name="bill_phone" type="text" id="checkout-phone" required value="{{ $user->phone }}">
                                                </div>
                                            </div>
                                        </div>
                                       
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="checkout-address1">{{ __('Address') }} 1 *</label>
                                                        <input class="form-control" name="bill_address1" required type="text" id="checkout-address1" value="{{ $user->bill_address1 }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="checkout-address2">{{ __('Address') }} 2</label>
                                                        <input class="form-control" name="bill_address2" type="text" id="checkout-address2" value="{{ $user->bill_address2 }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                              <div class="col-sm-4">
                                                  <div class="form-group">
                                                      <label for="checkout-zip">{{ __('Post Code') }} *</label>
                                                      <input class="form-control" name="bill_zip" type="text" id="checkout-zip" required>
                                                  </div>
                                              </div>

                                              @if ((Session::has('free_shipping')))
                                                
                                              @else
                                                 <div class="col-sm-4">
                                                  <div class="form-group">
                                                      <label for="checkout-country">{{ __('Country') }}*</label>
                                                      <select class="form-control" required name="bill_country" id="billing-country" required>
                                                          <option value="" selected>{{ __('Choose Country') }}</option>
                                                          @foreach (DB::table('countries')->get() as $country)
                                                              <option value="{{ $country->id }}" >{{ $country->name }}</option>
                                                          @endforeach
                                                      </select>
                                                  </div>
                                              </div>

                                            <div class="col-sm-4">
                                              <div class="form-group">
                                                <label for="checkout-country">{{ __('Region / State') }}*</label>
                                                <select class="form-control" name="bill_state" id="bill_state" required>
                                                </select>
                                            </div>
                                            </div>
                                            
                                            {{-- <div class="col-sm-12">
                                              <div class="form-group">
                                                <label for="checkout-country">{{ __('Shipping method') }}* <small>Please select the preferred shipping method to use on this order.</small></label>
                                                <select class="form-control" name="bill_state" id="shipping_location" required>
                                                </select>
                                            </div>
                                            </div> --}}
                                            <div class="form-group">
                                              <div class="custom-control custom-checkbox">
                                                  <input class="custom-control-input" type="checkbox" id="terms_and_conditions" name="terms_and_conditions" required>
                                                  <label class="custom-control-label" for="terms_and_conditions">{{ __('I have read and agree to the') }} <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#termsAndConditionModal">Terms & Conditions</a> </label>
                                              </div>
                                              
                                          </div> 

                                           {{-- Here goes shipping method --}}
                                              @endif
                                             
                                             </div>
                       
                                        <div class="d-flex justify-content-between paddin-top-1x mt-4">
                                        
                                          <div class="form-group row">
                                            <div class="col-md-12 text-start">
                                              <a  class="btn-submit" href="{{route('frontend.cart')}}"> <i class="fa fa-arrow-left"></i> <span class="hidden-xs-down">{{ __('Back To Cart') }}</span>  </a>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-md-12 text-end">
                                              <button type="submit" class="btn-submit contiue"><span class="hidden-xs-down btn_text">{{ __('Continue') }}</span> <i class="fa fa-arrow-right"></i> </button>
                                            </div>
                                          </div>
                                        </div>
                                    
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
          </form>
            {{-- Form Ends --}}
          </div>
        </div>
        @include('frontend.checkout.terms_modal')
      </section>
      <!--== End Product Area Wrapper ==-->
  
        <!--== Start Contact Info Area Wrapper ==-->
    @include('frontend._inc.divider',[])
    <!--== End Contact Info Area Wrapper ==-->
    {{-- include the terms and condition modal --}}

@endsection

{{-- @section('styleplugins')
<link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('frontend/css/styles.min.css') }}">
@endsection --}}

@section('extra_script')
    <script>
        $(document).ready(function() {
          $('.btn_text').prop("disabled", true);
        //   $("#shipping_method_free").hide();
// Trigger Drop-down on counry change -------- Starts
            $("#shipping_method_list").slideUp("fast")
            $('#billing-country').on('change', function() {
                var idCountry = this.value;
                // Fetch shipping info
                // $("#shipping_location").html('');
                $("#bill_state").html('');
                $.ajax({
                    url: "{{ url('/guest/api/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        // console.log(res)
                        if (res.states.length != 0) {
                            $("#shipping_location").html('');

                            $('#bill_state').html('<option value="">Available Region</option>');
                            $.each(res.states, function(key, value) {
                                // let amount = value.shipping_cost == 0 ? ' - Free': ' - &#8358;'+value.shipping_cost ;
                                $("#bill_state").append('<option value="' + value
                                    .id + '">' + value.name + '</option>');
                            });

                        } else {

                            $('#bill_state').html(
                                '<option value="">No shipping region found.</option>');

                        }

                    }
                });
            });
 // Trigger Drop-down on counry change -------- Ends


 // Trigger Drop-down on state change -------- Starts
            $("#bill_state").on("change", function() {
                $('#shipping_method').html('');
                var idState = this.value;
                // console.log(idState)
                $.ajax({
                    url: "{{ url('/guest/checkout/fetch/shipping/method') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $(".shipingmethod_data").slideUp('fast')
                        $('.spinner').html(
                            `<i class="fas fa-spinner fa-spin fa-2x mx-auto"></i>`)
                        // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                        // $('#shipping_method').append(`<option value="">Loading ...</option>`)
                    },
                    success: function(res) {
                        console.log(res)

                        if (res.datas.length) {
                            console.log(res)
                          // check if cart is greater than
                          if (res.check_free_shipping == true) {
                            $("#embed_free_shipping").html('')
                             $("#shipping_method_free").toggle();
                            // $(".d-none").toggleClass("block");
                            $("#free_shipping_id").val(res.free_shipping_state.id)
                            
                             $("#embed_free_shipping").append(` 
                              <div class="list-group mt-5">
                              <label class="list-group-item">
                              <input class="form-check-input free_shipping_method" type="radio" id="free_shipping_method" value="${res.free_shipping_state.id}" name="free_shipping_method" />
                              ${res.free_shipping_state.title} - Free ₦${0}
                              </label>
                              </div>`);
                          }else{
                            $('#embed_free_shipping').html('');
                            $("#free_shipping_id").val('')
                            $("#shipping_method_free").hide();

                          }

                            $('#embed_shipping_list').html('');
                            $('#No_shipping_method').html('');
                            $.each(res.datas, function(key, value) {
                              $("#embed_shipping_list").append(` 
                              <div class="list-group mt-5">
                              <label class="list-group-item">
                              <input class="form-check-input shipping_method_radio" type="radio" id="${value.id}" value="${value.id}" name="shipping_method" />
                              ${value.name} - ₦${value.price}
                              </label>
                              </div>`);

                            });
                            // $('.btn_text').prop("disabled", false);
                            // $('.btn_text').html('Continue');

                        } else {
                            $('#embed_shipping_list').html('');
                            $('#embed_free_shipping').html('');
                            $("#shipping_method_free").hide();
                            $("#free_shipping_id").val('')
                            $("#No_shipping_method").html(
                                `<h4>No Shipping Method Found</h4>`)
                            // $('.btn_text').prop("disabled", true);
                            // $('.btn_text').html('Disabled');
                        }
                    },
                    complete: function() {
                        // Set our complete callback, adding the .hidden class and hiding the spinner.
                        $('.spinner').html(``)
                        $(".shipingmethod_data").slideDown('slow')
                        $("#shipping_method_list").slideDown("slow")

                        // console.log('completed')
                    },
                });
            })
// Trigger Drop-down on state change -------- Ends

// Trigger shipping method for customer starts
$(document).on("change", "input[name='shipping_method']", function () {

                     $( "#free_shipping_method" ).prop( "checked", false );
     
                var shipping_method = $("input[name='shipping_method']:checked").val();
                // if (shipping_method) {
                var shipping_method_state_id = $("#bill_state option:selected").val();
                // }else{
                //   shipping_method_state_id=''
                // }
                
                // var free_shipping_id =   $("#free_shipping_id").val()
                // console.log(free_shipping_id)
                shipping_method !=null ?  $('.btn_text').prop("disabled", false) :  $('.btn_text').prop("disabled", true);

              
                $.ajax({
                    url: "{{ url('/checkout/add_shipping') }}",
                    type: "POST",
                    data: {
                        shipping_method_id: shipping_method,
                        shipping_method_state_id: shipping_method_state_id,
                        // free_shipping_id: free_shipping_id,
                        _token: '{{ csrf_token() }}'
                    },
                    beforeSend: function() { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                        $('.orderTotal').html(`<i class="fas fa-spinner fa-spinner"></i>`)
                        $('.shipping_value').html(`<i class="fas fa-spinner fa-spinner"></i>`)
                    },
      

                    success: function(data) {
                        console.log(data)
                        let amount = '&#8358;' + data.shippPrice
                        // let amount = '&#8358;' + data.shippPrice
                        // let amount = data.shippPrice == 0 ? "Free": '&#8358;' + data.shippPrice

                        $('.shipping_value').html(amount.toLocaleString("en-US")+'.'+'00')
                        $('.orderTotal').html('&#8358;' + data.cartTotal.toLocaleString("en-US")+'.'+'00')
                        $('.flutterPayTotal').val(data.cartTotal)

                    }
                });
});
})
   

// Trigger shipping method for customer starts
$(document).on("change", "input[name='free_shipping_method']", function () {

                $(".shipping_method_radio").prop( "checked", false );

                var free_shipping_method_id = $("input[name='free_shipping_method']:checked").val();
                var shipping_method_state_id = $("#bill_state option:selected").val();
                free_shipping_method_id !=null ?  $('.btn_text').prop("disabled", false) :  $('.btn_text').prop("disabled", true);
                $.ajax({
                    url: "{{ url('/checkout/add_free_shipping') }}",
                    type: "POST",
                    data: {
                        free_shipping_method_id: free_shipping_method_id,
                        shipping_method_state_id: shipping_method_state_id,
                        // free_shipping_id: free_shipping_id,
                        _token: '{{ csrf_token() }}'
                    },
                    beforeSend: function() {
                         // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                         $('.orderTotal').html(`<i class="fas fa-spinner fa-spinner"></i>`)
                        $('.shipping_value').html(`<i class="fas fa-spinner fa-spinner"></i>`)
                    },
                   

                    success: function(data) {
                      //  console.log(data)
                       let amount = '&#8358;' + data.shippPrice
                        // let amount = '&#8358;' + data.shippPrice
                        // let amount = data.shippPrice == 0 ? "Free": '&#8358;' + data.shippPrice

                        $('.shipping_value').html(`<small><b>(${data.free_shipping.name})</b></small>`+' '+amount.toLocaleString("en-US")+'.'+'00')
                        $('.orderTotal').html('&#8358;' + data.cartTotal.toLocaleString("en-US")+'.'+'00')
                        $('.flutterPayTotal').val(data.cartTotal)
                    }
                });


});
// Trigger shipping method for customer ends
    </script> 
@endsection
