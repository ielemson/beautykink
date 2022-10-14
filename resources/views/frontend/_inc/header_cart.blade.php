@php
$total = 0;
$qty = 0;
$option_price = 0;
@endphp

<div class="shop-button-item">
    <a class="shop-button" href="{{route('frontend.cart')}}">
        <i class="icon-bag icon"></i>
        <sup class="shop-count cart-count"></sup>
        <span class="cart-total sub_total"></span>
    </a>
    <div class="popup-cart-content">
        {{-- mini cart product drop-down list  starts--}}
                <ul class="popup-product-list">
                </ul>
        {{-- mini cart product drop-down list ends--}}
          
            <div class="price-content">
                <div class="cart-subtotals">
                    <div class="products">
                        <span class="label">Subtotal</span>
                        <span class="value cart_total">0</span>
                    </div>
                    {{-- <div class="products">
                        <span class="label">Shipping</span>
                        <span class="value">Free</span>
                    </div> --}}
                </div>
                <div class="cart-total">
                    <span class="label">Total</span>
                    <span class="value cart_total">0</span>
                </div>
            </div>
            <div class="checkout">
                <a href="{{route('frontend.checkout.billing')}}" class="btn-Checkout">Checkout</a>
            </div>
        {{-- @else
            <div class="price-content">

                <div class="checkout">
                    <a href="#" class="btn-Checkout">{{ __('Cart Is Empty.') }}</a>
                </div>
            </div>
        @endif --}}

    </div>
</div>
