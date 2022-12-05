
<section class="product-area mb-30">
    <div class="container pt-65 pt-lg-40">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="section-title text-center">
                    <h2 class="title">New </h2>
                    <div class="desc">
                        {{-- <p>Add our best seller products to your weekly lineup</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-slider owl-carousel owl-theme">

                    @foreach ($products->orderBy('id', 'DESC')->get() as $newItem)
                    @if ($newItem->is_type == 'new')
                        <div class="item">
                            <!--== Start Shop Item ==-->
                            <div class="product-item">
                                <div class="inner-content">
                                    <div class="product-thumb">
                                        <a href="{{ route('frontend.product', $newItem->slug) }}">
                                            <img src="{{ asset($newItem->thumbnail) }}"
                                                alt="{{ asset($newItem->name) }}">
                                            <img class="second-image" src="{{ asset($newItem->thumbnail) }}">
                                        </a>
                                        <div class="product-action">
                                            <div class="addto-wrap">
                                                <a class="add-wishlist" href="javascript:;" data-id="{{$newItem->id}}" title="Add to wishlist">
                                                    <i class="icon-heart icon"></i>
                                                </a>
                                                <a class="add-compare" href="javascript:;" data-id="{{$newItem->id}}" title="Add to compare">
                                                    <i class="icon-shuffle icon"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="product-flag">
                                            @if ($newItem->is_stock())
                                                <li class="{{ strtolower($newItem->is_type) }}">
                                                    {{ ucfirst(str_replace('_', ' ', $newItem->is_type)) }}
                                                </li>
                                            @else
                                                <li class="new">{{ __('out of stock') }}</li>
                                            @endif
                                            @if ($newItem->previous_price && $newItem->previous_price != 0)
                                                <li class="discount">
                                                    {{ PriceHelper::DiscountPercentage($newItem) }}
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-info">
                                            <h4 class="title"><a
                                                    href="{{ route('frontend.product', $newItem->slug) }}">{{ strlen(strip_tags($newItem->name)) > 35 ? substr(strip_tags($newItem->name), 0, 35) : strip_tags($newItem->name) }}</a>
                                            </h4>
                                            <div class="star-content">
                                                {!!renderStarRating($newItem->reviews->avg('rating'))!!}
                                            </div>
                                            <div class="prices">
                                                @if ($newItem->previous_price != 0)
                                                    {{-- <del></del> --}}
                                                    <span class="price-old">
                                                        {{ PriceHelper::setPreviousPrice($newItem->previous_price) }}</span>
                                                @endif
                                                <span class="price text-black">
                                                    {{ PriceHelper::grandCurrencyPrice($newItem) }}</span>
                                            </div>
                                        </div>
                                        <div class="product-footer">
                                            @if ($newItem->is_stock())

                                            @if (count($newItem->attributes))
                                            <a class="btn-product-add add_to_cart_without_attribute" data-slug="{{ $newItem->slug}}"
                                                href="javascript:;">Add to cart
                                            </a>
                                            @else
                                                 <a class="btn-product-add add_to_cart" data-id="{{ $newItem->id }}"
                                                href="javascript:;">Add to cart</a>
                                            @endif
                                           
                                            {{-- <a class="btn-quick-view quick_view" href="javascript:;" quick-view-data-id="{{ $item->id }}" title="view product" onclick="Quickview({{ $item->id }})">Quick View</a> --}}
                                            <a class="btn-quick-view"
                                                href="{{ route('frontend.product', $newItem->slug) }}"
                                                title="view product">Product details</a>
                                        @else
                                            <a class="btn-quick-view btn-block remind_me_when_restock"
                                                href="javascript:;" title="view product"
                                                data-id="{{ $newItem->id }}">Remind me when restocked</a>
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

@section('script')
@include('frontend._inc.restock_form')
@endsection
