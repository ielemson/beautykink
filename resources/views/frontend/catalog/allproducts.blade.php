@if ($extra_settings->is_t2_new_product == 1)
    <section class="product-area mb-5">
        <div class="container-fluid mb-5 pb-80">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="section-title text-center mb-30">
                        <h2 class="title">Our Products</h2>
                        <div class="desc">
                            <p>All Products</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products->orderBy('id', 'DESC')->get() as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <!--== Start Shop Item ==-->
                        <div class="product-item">
                            <div class="inner-content">
                                <div class="product-thumb">
                                    <a href="{{ route('frontend.product', $item->slug) }}">
                                        <img src="{{ asset($item->photo) }}" alt="{{ asset($item->name) }}">
                                        <img class="second-image" src="{{ asset($item->photo) }}"
                                            alt="{{ asset($item->thumbnail) }}">
                                    </a>

                                    <div class="product-action">
                                        <div class="addto-wrap">
                                            <a class="add-wishlist" href="javascript:;" title="Add to wishlist"
                                                data-id="{{ $item->id }}">
                                                <i class="icon-heart icon"></i>
                                            </a>
                                            <a class="add-compare" href="javascript:;" title="Add to compare"
                                                data-id="{{ $item->id }}">
                                                <i class="icon-shuffle icon"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <ul class="product-flag">

                                        @if ($item->is_stock())
                                            <li class="{{ strtolower($item->is_type) }}">
                                                {{ ucfirst(str_replace('_', ' ', $item->is_type)) }}
                                            </li>
                                        @else
                                            <li class="new">{{ __('out of stock') }}</li>
                                        @endif
                                        @if ($item->previous_price && $item->previous_price != 0)
                                            <li class="discount">
                                                {{ PriceHelper::DiscountPercentage($item) }}
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="product-desc">
                                    <div class="product-info">
                                        <h4 class="title"><a href="{{ route('frontend.product', $item->slug) }}">
                                                {{ strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name) }}</a>
                                        </h4>
                                        <div class="star-content">
                                            {!! renderStarRating($item->reviews->avg('rating')) !!}
                                        </div>
                                        <div class="prices">
                                            @if ($item->previous_price != 0)
                                                {{-- <del></del> --}}
                                                <span class="price-old">
                                                    {{ PriceHelper::setPreviousPrice($item->previous_price) }}</span>
                                            @endif
                                            <span class="price text-black">
                                                {{ PriceHelper::grandCurrencyPrice($item) }}</span>
                                        </div>
                                    </div>
                                    <div class="product-footer">
                                        @if ($item->is_stock())
                                        @if (count($item->attributes))
                                        <a class="btn-product-add add_to_cart_without_attribute" data-slug="{{ $item->slug}}"
                                            href="javascript:;">Add to cart
                                        </a>
                                        @else
                                             <a class="btn-product-add add_to_cart" data-id="{{ $item->id }}"
                                            href="javascript:;">Add to cart</a>
                                        @endif

                                            {{-- <a class="btn-quick-view quick_view" href="javascript:;" quick-view-data-id="{{ $item->id }}" title="view product" onclick="Quickview({{ $item->id }})">Quick View</a> --}}
                                            <a class="btn-quick-view"
                                                href="{{ route('frontend.product', $item->slug) }}"
                                                title="view product">Product details</a>
                                        @else
                                            <a class="btn-quick-view btn-block remind_me_when_restock"
                                                href="javascript:;" title="view product"
                                                data-id="{{ $item->id }}">Remind me when restocked</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--== End Shop Item ==-->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

@section('script')
@include('frontend._inc.restock_form')
@endsection
