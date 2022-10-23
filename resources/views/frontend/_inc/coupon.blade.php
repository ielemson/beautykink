<div class="card mt-4">
    <div class="card-body">
        <div class="shopping-cart-footer">
            <div class="column">
                <form class="coupon-form" method="post" id="coupon_form" action="{{ route('frontend.promo.submit') }}">
                    @csrf
                    <input class="form-control form-control-sm" name="code" type="text" placeholder="{{ __('Coupon code') }}" required>
                    <button class="btn btn-outline-primary btn-sm" type="submit">{{ __('Apply Coupon') }}</button>
                </form>
            </div>

            <div class="text-right text-lg column {{ Session::has('coupon') ? '' : 'd-none' }}">
                <span class="text-muted">{{ __('Discount') }} ({{ Session::has('coupon') ? Session::get('coupon')['code']['title'] : '' }}) : </span>
                <span class="text-gray-dark">{{ PriceHelper::setCurrencyPrice(Session::has('coupon') ? round(Session::get('coupon')['discount'], 2) : 0) }}</span>
            </div>

            <div class="text-right column text-lg">
                <span class="text-muted">{{ __('Subtotal') }}: </span>
                <span class="text-gray-dark">₦{{ PriceHelper::cartTotal($cart) - (Session::has('coupon') ? round(Session::get('coupon')['discount'], 2) : 0)}}</span>
            </div>

        </div>
        <div class="shopping-cart-footer">
            <div class="column">
                <a class="btn-primary" href="{{ route('frontend.catalog') }}">
                   {{ __('Back to Shopping') }}
                </a>
            </div>
            <div class="column">
                <a class="btn btn-primary btn-sm" href="{{ route('frontend.checkout.billing') }}">{{ __('Checkout') }}</a>
            </div>
        </div>
    </div>
</div>