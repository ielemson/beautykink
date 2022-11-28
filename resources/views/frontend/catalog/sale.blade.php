
<section class="product-area mb-30">
    <div class="container pt-65 pt-lg-40">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="section-title text-center">
                    <h2 class="title">Sale</h2>
                    <div class="desc">
                        {{-- <p>Add our top rated products to your weekly lineup</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-slider owl-carousel owl-theme">

                    @foreach ($products->orderBy('id', 'DESC')->get() as $sale)
                    @if ($sale->is_type == 'sale')
                        <div class="item">
                            <!--== Start Shop Item ==-->
                            <div class="product-item">
                                <div class="inner-content">
                                    <div class="product-thumb">
                                        <a href="{{ route('frontend.product', $sale->slug) }}">
                                            <img src="{{ asset($sale->photo) }}"
                                                alt="{{ asset($sale->name) }}">
                                            <img class="second-image" src="{{ asset($sale->photo) }}"
                                                alt="{{ asset($sale->name) }}">
                                        </a>
                                        <div class="product-action">
                                            <div class="addto-wrap">
                                                <a class="add-wishlist" href="javascript:;" data-id="{{$sale->id}}" title="Add to wishlist">
                                                    <i class="icon-heart icon"></i>
                                                </a>
                                                <a class="add-compare" href="javascript:;" data-id="{{$sale->id}}" title="Add to compare">
                                                    <i class="icon-shuffle icon"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="product-flag">
                                            @if ($sale->is_stock())
                                                <li class="{{ strtolower($sale->is_type) }}">
                                                    {{ ucfirst(str_replace('_', ' ', $sale->is_type)) }}
                                                </li>
                                            @else
                                                <li class="new">{{ __('out of stock') }}</li>
                                            @endif
                                            @if ($sale->previous_price && $sale->previous_price != 0)
                                                <li class="discount">
                                                    {{ PriceHelper::DiscountPercentage($sale) }}
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-info">
                                            <h4 class="title"><a
                                                    href="{{ route('frontend.product', $sale->slug) }}">{{ strlen(strip_tags($sale->name)) > 35 ? substr(strip_tags($sale->name), 0, 35) : strip_tags($sale->name) }}</a>
                                            </h4>
                                            <div class="star-content">
                                                {!!renderStarRating($sale->reviews->avg('rating'))!!}
                                            </div>
                                            <div class="prices">
                                                @if ($sale->previous_price != 0)
                                                    {{-- <del></del> --}}
                                                    <span class="price-old">
                                                        {{ PriceHelper::setPreviousPrice($sale->previous_price) }}</span>
                                                @endif
                                                <span class="price text-black">
                                                    {{ PriceHelper::grandCurrencyPrice($sale) }}</span>
                                            </div>
                                        </div>
                                        <div class="product-footer">
                                            @if ($sale->is_stock())
                                            @if (count($sale->attributes))
                                            <a class="btn-product-add add_to_cart_without_attribute" data-slug="{{ $sale->slug}}"
                                                href="javascript:;">Add to cart
                                            </a>
                                            @else
                                                 <a class="btn-product-add add_to_cart" data-id="{{ $sale->id }}"
                                                href="javascript:;">Add to cart</a>
                                            @endif
                                            {{-- <a class="btn-quick-view quick_view" href="javascript:;" quick-view-data-id="{{ $item->id }}" title="view product" onclick="Quickview({{ $item->id }})">Quick View</a> --}}
                                            <a class="btn-quick-view"
                                                href="{{ route('frontend.product', $sale->slug) }}"
                                                title="view product">Product details</a>
                                        @else
                                            <a class="btn-quick-view btn-block remind_me_when_restock"
                                                href="javascript:;" title="view product"
                                                data-id="{{ $sale->id }}">Remind me when restocked</a>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--== End Shop Item ==-->
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

</section>
