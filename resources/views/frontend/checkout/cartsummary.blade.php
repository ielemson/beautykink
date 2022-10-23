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
        {{-- <tr>
            <td>{{ __('Coupon discount') }}:</td>
            <td class="text-danger">-
                </td>
        </tr> --}}

        <div class="card-block-item">
          <span class="label">Discount</span>
          <span class="value text-danger">-{{ PriceHelper::setCurrencyPrice($discount ? $discount['discount'] : 0) }}</span>
        </div>
      @endif
          
        </div>
        <div class="separator"></div>
        <div class="card-block">
          <div class="card-block-item">
            <span class="label">Order Total</span>
            <span class="value">&#8358;{{ PriceHelper::cartTotal($cart) - Session::has('coupon') ? round(Session::get('coupon')['discount'], 2) : 0}}</span>
            {{-- <span class="value">&#8358;{{$grand_total}}</span> --}}
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