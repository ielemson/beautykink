
<section class="product-area mb-30">
    <div class="container pt-65 pt-lg-40">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="section-title text-center">
                    <h2 class="title">Featured</h2>
                    <div class="desc">
                        {{-- <p>Add our top rated products to your weekly lineup</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-slider owl-carousel owl-theme">

                    @foreach ($products->orderBy('id', 'DESC')->get() as $featured)
                    @if ($featured->is_type == 'featured')
                        <div class="item">
                            <!--== Start Shop Item ==-->
                            <div class="product-item">
                                <div class="inner-content">
                                    <div class="product-thumb">
                                        <a href="{{ route('frontend.product', $featured->slug) }}">
                                            <img src="{{ asset($featured->photo) }}"
                                                alt="{{ asset($featured->name) }}">
                                            <img class="second-image" src="{{ asset($featured->photo) }}"
                                                alt="{{ asset($featured->name) }}">
                                        </a>
                                        <div class="product-action">
                                            <div class="addto-wrap">
                                                <a class="add-wishlist" href="javascript:;" data-id="{{$featured->id}}" title="Add to wishlist">
                                                    <i class="icon-heart icon"></i>
                                                </a>
                                                <a class="add-compare" href="javascript:;" data-id="{{$featured->id}}" title="Add to compare">
                                                    <i class="icon-shuffle icon"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="product-flag">
                                            @if ($featured->is_stock())
                                                <li class="{{ strtolower($featured->is_type) }}">
                                                    {{ ucfirst(str_replace('_', ' ', $featured->is_type)) }}
                                                </li>
                                            @else
                                                <li class="new">{{ __('out of stock') }}</li>
                                            @endif
                                            @if ($featured->previous_price && $featured->previous_price != 0)
                                                <li class="discount">
                                                    {{ PriceHelper::DiscountPercentage($featured) }}
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-info">
                                            <h4 class="title"><a
                                                    href="{{ route('frontend.product', $featured->slug) }}">{{ strlen(strip_tags($featured->name)) > 35 ? substr(strip_tags($featured->name), 0, 35) : strip_tags($featured->name) }}</a>
                                            </h4>
                                            <div class="star-content">
                                                {!!renderStarRating($featured->reviews->avg('rating'))!!}
                                            </div>
                                            <div class="prices">
                                                @if ($featured->previous_price != 0)
                                                    {{-- <del></del> --}}
                                                    <span class="price-old">
                                                        {{ PriceHelper::setPreviousPrice($featured->previous_price) }}</span>
                                                @endif
                                                <span class="price text-black">
                                                    {{ PriceHelper::grandCurrencyPrice($featured) }}</span>
                                            </div>
                                        </div>
                                        <div class="product-footer">
                                            @if ($featured->is_stock())
                                            <a class="btn-product-add add_to_cart" data-id="{{ $featured->id }}"
                                                href="javascript:;">Add to cart</a>
                                            {{-- <a class="btn-quick-view quick_view" href="javascript:;" quick-view-data-id="{{ $item->id }}" title="view product" onclick="Quickview({{ $item->id }})">Quick View</a> --}}
                                            <a class="btn-quick-view"
                                                href="{{ route('frontend.product', $featured->slug) }}"
                                                title="view product">Product details</a>
                                        @else
                                            <a class="btn-quick-view btn-block remind_me_when_restock"
                                                href="javascript:;" title="view product"
                                                data-id="{{ $featured->id }}">Remind me when restocked</a>
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
