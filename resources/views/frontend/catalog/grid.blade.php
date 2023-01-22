@foreach ($items as $item)
@if ($item->status == 1)
<div class="col-sm-6 col-md-4">
    <!--== Start Shop Item ==-->
    <div class="product-item">
      <div class="inner-content">
        <div class="product-thumb">
          <a href="{{ route('frontend.product', $item->slug) }}">
            <img src="{{ asset($item->photo) }}" alt="{{ $item->name }}">
            <img class="second-image" src="{{ asset($item->photo) }}" alt="{{ asset($item->name) }}">
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
            
                @if ($item->is_stock())
                {{-- {{   ucfirst(str_replace('_',' ',$item->is_type))   }} --}}
                {{-- {{$item->highlight->name }} --}}
                   
                @else
                <li class="new">
                {{ __('out of stock') }} 
               </li>
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
            <h4 class="title"><a href="{{ route('frontend.product', $item->slug) }}"></a></h4>{{ $item->name }}
            <div class="star-content">
              
              {{-- <i class="ion-md-star"></i>
              <i class="ion-md-star"></i>
              <i class="ion-md-star"></i>
              <i class="ion-md-star"></i>
              <i class="ion-md-star icon-color-gray"></i> --}}

              {!! renderStarRating($item->reviews->avg('rating')) !!}

            </div>
            <div class="prices">
               @if ($item->previous_price != 0)
                                    <span
                                        class="price-old">@money($item->previous_price,'NGN')</span>
                                @endif
                                <span class="price text-black">@money($item->discount_price,'NGN')</span>

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
            <a class="btn-quick-view" href="{{ route('frontend.product', $item->slug) }}" title="view product">Product details</a>
            @else
            <a class="btn-quick-view btn-block remind_me_when_restock" href="javascript:;" title="out of stock" data-id="{{ $item->id }}">Remind me when restocked</a>
            @endif
          </div>
        </div>
      </div>
    </div>
    <!--== End Shop Item ==-->
  </div>
  @endif
  @endforeach