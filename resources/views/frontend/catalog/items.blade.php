
<section class="product-area mb-30">
    <div class="container pt-65 pt-lg-40">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="section-title text-center">
                    <h2 class="title">{{$highlight->name}}</h2>
                    <div class="desc">
                        <p>{{$highlight->description}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-slider owl-carousel owl-theme">

                    @foreach ($highlight->items as $item)
                    {{-- @if ($item->is_type == 'best') --}}
                        <div class="item">
                            <!--== Start Shop Item ==-->
                            <div class="product-item">
                                <div class="inner-content">
                                    <div class="product-thumb">
                                        <a href="{{ route('frontend.product', $item->slug) }}">
                                            <img src="{{ asset($item->photo) }}"
                                                alt="{{ asset($item->name) }}">
                                            <img class="second-image" src="{{ asset($item->photo) }}">
                                        </a>
                                        <div class="product-action">
                                            <div class="addto-wrap">
                                                <a class="add-wishlist" href="javascript:;" data-id="{{$item->id}}" title="Add to wishlist">
                                                    <i class="icon-heart icon"></i>
                                                </a>
                                                <a class="add-compare" href="javascript:;" data-id="{{$item->id}}" title="Add to compare">
                                                    <i class="icon-shuffle icon"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="product-flag">
                                            @if ($item->is_stock())
                                                <li class="new">
                                                    {{ ucfirst(str_replace('_', ' ', $highlight->name)) }}
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
                                            <h4 class="title"><a
                                                    href="{{ route('frontend.product', $item->slug) }}">{{ strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name) }}</a>
                                            </h4>
                                            <div class="star-content">
                                                {!!renderStarRating($item->reviews->avg('rating'))!!}
                                            </div>
                                            <div class="prices">
                                                @if ($item->previous_price != 0)
                                                    {{-- <del></del> --}}
                                                    <span class="price-old">
                                                        @money(PriceHelper::setPreviousPrice($item->previous_price),'NGN')</span>
                                                @endif
                                                <span class="price text-black">
                                                    @money(PriceHelper::grandCurrencyPrice($item),'NGN')</span>
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
                        {{-- @endif --}}
                    @endforeach
                </div>
            </div>
        </div>

</section>
