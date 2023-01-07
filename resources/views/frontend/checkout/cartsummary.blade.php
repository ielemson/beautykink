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
            <span class="label">Cart Subtotal</span>
            <span class="value">&#8358;{{$cart_total}}</span>
          </div>
          @if ($discount)
        <div class="card-block-item">
          <span class="label">Discount</span>
          <span class="value text-danger">-{{ PriceHelper::setCurrencyPrice($discount ? $discount['discount'] : 0) }}</span>
        </div>
        @endif
      <div class="card-block-item">
        <span class="label">Shipping</span>
        {{-- {{ PriceHelper::cartTotal($cart) - (Session::has('coupon') ? round(Session::get('coupon')['discount'], 2) : 0)}} --}}
        @if (Session::has('free_shipping'))
          Free Shipping
        @else
        <span class="value shipping_value">&#8358;0</span>
          
        @endif
      </div>
        </div>
        <div class="separator"></div>
        <div class="card-block">
          <div class="card-block-item">
            <span class="label">Order Total</span>
            @php
          // $total = 0;
          // $attribute_price = 0;
          // foreach ($cart as $key => $product) {
          // $total += $product->price * $product->qty;
          // $total += + $attribute_price;
          // }
          // $coupon = Session::has('coupon') ? round(Session::get('coupon')['discount'], 2): 0;
          // $shippingPrice = Session::has('shipping_price') ? Session::get('shipping_price'): 0;
          @endphp
          <span class="value orderTotal">&#8358;0</span>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="block-reassurance">
      <h5>Our Shipping Services</h5>
      {!!$proceed ?? ''!!}
        <ul>
          @php
          $shipping_id = Session::has('shipping_id') ? Session::get('shipping_id'): 0;
        @endphp
          @foreach ($shipping as $ship)
            <li>
              <img src="{{asset('frontend/img/shop/cart/local-shipping.png')}}" alt="security policy">
              <span>{{$ship->title}} - &#8358;{{$ship->price}} {!!$shipping_id ==$ship->id  ? '<i class="icon icon-check text-success"></i>':''!!}</span>
            </li>
            @endforeach
          </ul>
    </div> --}}

    

    <div class="block-reassurance">
    {{-- <input type="hidden" name="free_shipping_id" id="free_shipping_id"> --}}
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <span class="icon">
              <i class="fa fa-truck"></i>
            </span>
            <span class="text">Shipping method </span>
          </h4>
        </div>
        <div class="panel-body">
          
            <p class="description">Please select the preferred shipping method to use on this order.</p>
          
          <div id="shipping_method_free" style="display: none">
            
              <strong class="title">Free Shipping *</strong>
              <div class="spinner mx-auto" style="text-align:center"></div>
             <span id="embed_free_shipping"></span>
              
          </div>
          <div id="shipping_method_list">
            
              <strong class="title">Shipping Rate *</strong>
              <div class="spinner mx-auto" style="text-align:center"></div>
             <span id="embed_shipping_list"></span>
              
          </div>
          <span id="No_shipping_method" class="text"></span>
         
        </div>
      </div>
    </div>
  </div>