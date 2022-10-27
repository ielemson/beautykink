@if (count($related_items) > 0)
<section class="product-area mb-20">
    <div class="container-fluid pt-60">
      <div class="row">
        <div class="col-sm-8 m-auto">
          <div class="section-title text-center">
            <h2 class="title">You Might Also Like</h2>
            <div class="desc">
              <p>Add Related products to weekly line up</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="product-slider owl-carousel owl-theme">
            @foreach ($related_items as $related)
            <div class="item">
                <!--== Start Shop Item ==-->
                <div class="product-item">
                    <div class="inner-content">
                        <div class="product-thumb">
                            <a href="{{ route('frontend.product', $related->slug) }}">
                                <img src="{{ asset($related->photo) }}"
                                    alt="{{ asset($related->name) }}" style="width:100%; height:35vh">
                                <img class="second-image" src="{{ asset($related->photo) }}"
                                    alt="{{ asset($related->name) }}" style="width:100%; height:35vh">
                            </a>
                            <div class="product-action">
                                <div class="addto-wrap">
                                    <a class="add-wishlist" href="javascript:;" data-id="{{$related->id}}" title="Add to wishlist">
                                        <i class="icon-heart icon"></i>
                                    </a>
                                    <a class="add-compare" href="javascript:;" data-id="{{$related->id}}" title="Add to compare">
                                        <i class="icon-shuffle icon"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                @if ($related->is_stock())
                                    <li class="{{ strtolower($related->is_type) }}">
                                        {{ ucfirst(str_replace('_', ' ', $related->is_type)) }}
                                    </li>
                                @else
                                    <li class="new">{{ __('out of stock') }}</li>
                                @endif
                                @if ($related->previous_price && $related->previous_price != 0)
                                    <li class="discount">
                                        {{ PriceHelper::DiscountPercentage($related) }}
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="product-desc">
                            <div class="product-info">
                                <h4 class="title"><a
                                        href="{{ route('frontend.product', $related->slug) }}">{{ strlen(strip_tags($related->name)) > 35 ? substr(strip_tags($related->name), 0, 35) : strip_tags($related->name) }}</a>
                                </h4>
                                <div class="star-content">
                                    {!!renderStarRating($related->reviews->avg('rating'))!!}
                                </div>
                                <div class="prices">
                                    @if ($related->previous_price != 0)
                                        {{-- <del></del> --}}
                                        <span class="price-old">
                                            {{ PriceHelper::setPreviousPrice($related->previous_price) }}</span>
                                    @endif
                                    <span class="price text-black">
                                        {{ PriceHelper::grandCurrencyPrice($related) }}</span>
                                </div>
                            </div>
                            <div class="product-footer">
                                @if ($related->is_stock())
                                <a class="btn-product-add add_to_cart" data-id="{{ $related->id }}"
                                    href="javascript:;">Add to cart</a>
                                {{-- <a class="btn-quick-view quick_view" href="javascript:;" quick-view-data-id="{{ $item->id }}" title="view product" onclick="Quickview({{ $item->id }})">Quick View</a> --}}
                                <a class="btn-quick-view"
                                    href="{{ route('frontend.product', $related->slug) }}"
                                    title="view product">Product details</a>
                            @else
                                <a class="btn-quick-view btn-block remind_me_when_restock"
                                    href="javascript:;" title="view product"
                                    data-id="{{ $related->id }}">Remind me when restocked</a>
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
      </div>
    </div>
  </section>
  @endif