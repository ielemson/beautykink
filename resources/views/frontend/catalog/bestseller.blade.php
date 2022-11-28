
<section class="product-area mb-30">
    <div class="container pt-65 pt-lg-40">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="section-title text-center">
                    <h2 class="title">Best Seller</h2>
                    <div class="desc">
                        {{-- <p>Add our best seller products to your weekly lineup</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-slider owl-carousel owl-theme">

                    @foreach ($products->orderBy('id', 'DESC')->get() as $bestItem)
                    @if ($bestItem->is_type == 'best')
                        <div class="item">
                            <!--== Start Shop Item ==-->
                            <div class="product-item">
                                <div class="inner-content">
                                    <div class="product-thumb">
                                        <a href="{{ route('frontend.product', $bestItem->slug) }}">
                                            <img src="{{ asset($bestItem->photo) }}"
                                                alt="{{ asset($bestItem->name) }}">
                                            <img class="second-image" src="{{ asset($bestItem->photo) }}">
                                        </a>
                                        <div class="product-action">
                                            <div class="addto-wrap">
                                                <a class="add-wishlist" href="javascript:;" data-id="{{$bestItem->id}}" title="Add to wishlist">
                                                    <i class="icon-heart icon"></i>
                                                </a>
                                                <a class="add-compare" href="javascript:;" data-id="{{$bestItem->id}}" title="Add to compare">
                                                    <i class="icon-shuffle icon"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="product-flag">
                                            @if ($bestItem->is_stock())
                                                <li class="{{ strtolower($bestItem->is_type) }}">
                                                    {{ ucfirst(str_replace('_', ' ', $bestItem->is_type)) }}
                                                </li>
                                            @else
                                                <li class="new">{{ __('out of stock') }}</li>
                                            @endif
                                            @if ($bestItem->previous_price && $bestItem->previous_price != 0)
                                                <li class="discount">
                                                    {{ PriceHelper::DiscountPercentage($bestItem) }}
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-info">
                                            <h4 class="title"><a
                                                    href="{{ route('frontend.product', $bestItem->slug) }}">{{ strlen(strip_tags($bestItem->name)) > 35 ? substr(strip_tags($bestItem->name), 0, 35) : strip_tags($bestItem->name) }}</a>
                                            </h4>
                                            <div class="star-content">
                                                {!!renderStarRating($bestItem->reviews->avg('rating'))!!}
                                            </div>
                                            <div class="prices">
                                                @if ($bestItem->previous_price != 0)
                                                    {{-- <del></del> --}}
                                                    <span class="price-old">
                                                        {{ PriceHelper::setPreviousPrice($bestItem->previous_price) }}</span>
                                                @endif
                                                <span class="price text-black">
                                                    {{ PriceHelper::grandCurrencyPrice($bestItem) }}</span>
                                            </div>
                                        </div>
                                        <div class="product-footer">
                                            @if ($bestItem->is_stock())
                                            
                                            @if (count($bestItem->attributes))
                                            <a class="btn-product-add add_to_cart_without_attribute" data-slug="{{ $bestItem->slug}}"
                                                href="javascript:;">Add to cart
                                            </a>
                                            @else
                                                 <a class="btn-product-add add_to_cart" data-id="{{ $bestItem->id }}"
                                                href="javascript:;">Add to cart</a>
                                            @endif
                                            {{-- <a class="btn-quick-view quick_view" href="javascript:;" quick-view-data-id="{{ $item->id }}" title="view product" onclick="Quickview({{ $item->id }})">Quick View</a> --}}
                                            <a class="btn-quick-view"
                                                href="{{ route('frontend.product', $bestItem->slug) }}"
                                                title="view product">Product details</a>
                                        @else
                                            <a class="btn-quick-view btn-block remind_me_when_restock"
                                                href="javascript:;" title="view product"
                                                data-id="{{ $bestItem->id }}">Remind me when restocked</a>
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
