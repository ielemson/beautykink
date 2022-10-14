@php
function renderStarRating($rating, $maxRating = 5)
{
    // <i class="ion-md-star"></i>
    //           <i class="ion-md-star"></i>
    //           <i class="ion-md-star"></i>
    //           <i class="ion-md-star"></i>
    //           <i class="ion-md-star icon-color-gray"></i>
    $fullStar = "<i class='ion-md-star'></i>";
    $halfStar = "<i class='ion-md-star icon-color-gray'></i>";
    $emptyStar = "<i class='ion-md-star icon-color-gray'></i>";
    $rating = $rating <= $maxRating ? $rating : $maxRating;

    $fullStarCount = (int) $rating;
    $halfStarCount = ceil($rating) - $fullStarCount;
    $emptyStarCount = $maxRating - $fullStarCount - $halfStarCount;

    $html = str_repeat($fullStar, $fullStarCount);
    $html .= str_repeat($halfStar, $halfStarCount);
    $html .= str_repeat($emptyStar, $emptyStarCount);
    $html = $html;
    return $html;
}
@endphp


@if ($items->count() > 0)
    @foreach ($items as $item)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <!--== Start Shop Item ==-->
            <div class="product-item">
                <div class="inner-content">
                    <div class="product-thumb">
                        <a href="{{ route('frontend.product', $item->slug) }}">
                            <img src="{{ asset($item->photo) }}" alt="{{ asset($item->name) }}">
                            <img class="second-image" src="{{ asset($item->thumbnail) }}" alt="I{{ asset($item->name) }}">
                        </a>
                        <div class="product-action">
                            <div class="addto-wrap">
                                <a class="add-wishlist" href="" title="Add to wishlist">
                                    <i class="icon-heart icon"></i>
                                </a>
                                <a class="add-compare" href="" title="Add to compare">
                                    <i class="icon-shuffle icon"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">
                                @if ($item->is_stock())
                                {{   ucfirst(str_replace('_',' ',$item->is_type))   }}
                                   
                                @else
                                    <div class="product-badge bg-secondary border-default text-body">
                                        {{ __('out of stock') }}</div>
                                @endif
                            </li>
                            <li class="discount">
                                @if ($item->previous_price && $item->previous_price != 0)
                                    {{ PriceHelper::DiscountPercentage($item) }}
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="product-desc">
                        <div class="product-info">
                            <h4 class="title"><a href="{{ route('frontend.product', $item->slug) }}">
                                    {{ strlen(strip_tags($item->name)) > $name_string_count ? substr(strip_tags($item->name), 0, 38) : strip_tags($item->name) }}</a>
                            </h4>
                            <div class="star-content">

                                {!! renderStarRating($item->reviews->avg('rating')) !!}
                            </div>
                            <div class="prices">
                                @if ($item->previous_price != 0)
                                    <span
                                        class="price-old visually-hidden">{{ PriceHelper::setPreviousPrice($item->previous_price) }}</span>
                                @endif
                                <span class="price text-black">{{ PriceHelper::grandCurrencyPrice($item) }}</span>

                            </div>
                        </div>
                        <div class="product-footer">
                            <a class="btn-product-add add_to_cart" data-id="{{ $item->id }}"href="javascript:;">Add
                                to cart</a>
                            <a class="btn-quick-view" href="{{ route('frontend.product', $item->slug) }}"
                                title="Quick view">Product Details</a>
                        </div>
                    </div>
                </div>

            </div>
            <!--== End Shop Item ==-->
        </div>
    @endforeach
@else
<div class="col-lg-8 mx-auto">
  <div class="card">
      <div class="card-body text-center">
          <h4 class="h4 mb-0">{{ __('No Products Found.') }}</h4>
      </div>
  </div>
</div>
@endif

<!-- Pagination-->
<div class="row mt-15" id="item_pagination">
    <div class="col-lg-12 text-center">
        {{ $items->links('frontend._inc.pagination') }}
    </div>
</div>
