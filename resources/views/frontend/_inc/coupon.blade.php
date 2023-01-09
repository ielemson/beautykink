<div class="card mt-4">
    <div class="card-body">
        <div class="shopping-cart-footer">
            <div class="column">
                <form class="coupon-form" method="post" id="applyCoupon">
                    @csrf
                    <input class="form-control form-control-sm" name="code" type="text" placeholder="{{ __('Coupon code') }}" required>
                    {{-- <input type="hidden" name="prod_id" value="{{$cart}}"> --}}
                    <button class="btn btn-outline-primary btn-sm applyCoupon" type="submit">{{ __('Apply Coupon') }}</button>
                </form>
            </div>

            <div class="text-right text-lg column {{ Session::has('coupon') ? '' : 'd-none' }}">
                <span class="text-muted">{{ __('Discount') }} ({{ Session::has('coupon') ? Session::get('coupon')['code']['title'] : '' }}) : </span>
                <span class="text-gray-dark">{{ PriceHelper::setCurrencyPrice(Session::has('coupon') ? round(Session::get('coupon')['discount'], 2) : 0) }}</span>
            </div>

            <div class="text-right column text-lg">
                <span class="text-muted">{{ __('Subtotal') }}: </span>
                <span class="text-gray-dark">@money(PriceHelper::cartTotal($cart) - (Session::has('coupon') ? round(Session::get('coupon')['discount'], 2) : 0),'NGN')</span>
            </div>
         </div>

        <div class="shopping-cart-footer">
            <div class="column">
                <a class="btn-primary" href="{{ route('frontend.catalog') }}">
                   {{ __('Back to Shopping') }}
                </a>
            </div>
            <div class="column">
                <a class="btn btn-primary btn-sm" href="{{ route('frontend.checkout.billing') }}">{{ __('Proceed to Checkout') }}</a>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
  
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
 
  $("#applyCoupon").submit(function(e){
      e.preventDefault();
      var code = $("input[name=code]").val();
      $.ajax({
         type:'POST',
         url:"{{ route('frontend.promo.submit') }}",
         data:{ code:code},
         success:function(data){
            console.log(data)
          // initialize the toast
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3500
          })
        // console.log(data)
       
        if(data.status == false){
            Toast.fire({
                  icon: 'error',
                  title: data.message,
              })
        }else{
            Toast.fire({
                  icon: 'success',
                  title: data.message,
              }) 
            // Reload Page
            // location.reload()
        }
         }
      });

  });
</script>
@endsection