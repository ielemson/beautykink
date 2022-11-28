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

<section class="product-area mb-15">
    <div class="container-fluid pb-55">

<div class="row">
    @if ($items->count() > 0)
    @foreach ($items as $item)
        <div class="col-sm-6 col-md-4 col-lg-3 ">
            <!--== Start Shop Item ==-->
            <div class="product-item">
                <div class="inner-content">
                    <div class="product-thumb">
                        <a href="{{ route('frontend.product', $item->slug) }}">
                            <img src="{{ asset($item->photo) }}" alt="{{ asset($item->name) }}">
                            <img class="second-image" src="{{ asset($item->thumbnail) }}" alt="{{ asset($item->name) }}">
                        </a>
                        <div class="product-action">
                            <div class="addto-wrap">
                                <a class="add-wishlist" href="javascript:;" title="Add to wishlist" data-id="{{$item->id}}">
                                    <i class="icon-heart icon"></i>
                                </a>
                                <a class="add-compare" href="javascript:;" title="Add to compare" data-id="{{$item->id}}">
                                    <i class="icon-shuffle icon"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag">
                            <li class="new">
                                @if ($item->is_stock())
                                {{   ucfirst(str_replace('_',' ',$item->is_type))   }}
                                   
                                @else
                                {{ __('out of stock') }}
                                @endif
                            </li>
                           
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
                                    {{-- {{ strlen(strip_tags($item->name)) > $name_string_count ? substr(strip_tags($item->name), 0, 38) : strip_tags($item->name) }}</a> --}}
                            </h4>
                            <div class="star-content">

                                {!! renderStarRating($item->reviews->avg('rating')) !!}
                            </div>
                            <div class="prices">
                                @if ($item->previous_price != 0)
                                    <span
                                        class="price-old">{{ PriceHelper::setPreviousPrice($item->previous_price) }}</span>
                                @endif
                                <span class="price text-black">{{ PriceHelper::grandCurrencyPrice($item) }}</span>

                            </div>
                        </div>
                        <div class="product-footer">
                            {{-- <a class="btn-product-add add_to_cart" data-id="{{ $item->id }}"href="javascript:;">Add
                                to cart</a>
                            <a class="btn-quick-view" href="{{ route('frontend.product', $item->slug) }}"
                                title="Quick view">Product Details</a> --}}
                                @if ($item->is_stock())
                                @if (count($item->attributes))
                                <a class="btn-product-add add_to_cart_without_attribute" data-slug="{{ $newItem->slug}}"
                                    href="javascript:;" title="add to cart">Add to cart
                                </a>
                                @else
                                     <a class="btn-product-add add_to_cart" data-id="{{ $item->id }}"
                                    href="javascript:;" title="add to cart">Add to cart</a>
                                @endif
                                {{-- <a class="btn-product-add add_to_cart" data-id="{{ $item->id }}" href="javascript:;" title="add to cart">Add to cart</a> --}}
                                {{-- <a class="btn-quick-view quick_view" href="javascript:;" quick-view-data-id="{{ $item->id }}" title="view product" onclick="Quickview({{ $item->id }})">Quick View</a> --}}
                                <a class="btn-quick-view" href="{{ route('frontend.product', $item->slug) }}" title="view product">Product details</a>
                                @else
                                <a class="btn-quick-view btn-block remind_me_when_restock" href="javascript:;" title="out of stock">Remind me when restocked</a>
                                @endif
                        </div>
                    </div>
                </div>

            </div>
            <!--== End Shop Item ==-->
        </div>
    @endforeach
</div>
@else
<div class="col-lg-8 mx-auto">
  <div class="card">
      <div class="card-body text-center">
          <h4 class="h4 mb-0">{{ __('No Products Found.') }}</h4>
      </div>
  </div>
</div>
@endif


</section>
</div>
<!-- Pagination-->
<div class="row" id="item_pagination">
    <div class="col-lg-12 text-center">
        {{ $items->links('frontend._inc.pagination') }}
    </div>
</div>
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
        integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@include('frontend._inc.restock_form')

@endsection
