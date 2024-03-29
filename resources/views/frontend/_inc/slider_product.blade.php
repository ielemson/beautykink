
  @if ($items->count() > 0)


  <div class="col-lg-12">
    <div class="popular-category-slider  owl-carousel" id="">
        @foreach ($items as $item)
        <div class="slider-item">
            <div class="product-card">
                <a class="product-thumb" href="{{ route('frontend.product',$item->slug) }}">
                    @if (!$item->is_stock())
                        <div class="product-badge bg-secondary border-default text-body">{{ __('out of stock') }}</div>
                    @endif
                    @if($item->previous_price && $item->previous_price !=0)
                        <div class="product-badge product-badge2 bg-info"> -{{ PriceHelper::DiscountPercentage($item) }}</div>
                    @endif
                        <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($item->thumbnail) }}" alt="Product"></a>
                <div class="product-card-body">
                    <div class="product-category"><a href="{{route('frontend.catalog').'?category='.$item->category->slug}}">{{ $item->category->name }}</a></div>
                    <h3 class="product-title"><a href="{{route('frontend.product',$item->slug)}}">
                        {{ strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name) }}
                    </a></h3>
                    <div class="rating-stars">
                    <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i class="far fa-star filled"></i><i class="far fa-star filled"></i><i class="far fa-star filled"></i>
                    </div>
                    <h4 class="product-price">
                        @if ($item->previous_price !=0)
                        <del>{{ PriceHelper::setPreviousPrice($item->previous_price) }}</del>
                        @endif
                        @money($item->discount_price,'NGN')
                        </h4>
                </div>
                <div class="product-button-group"><a class="product-button wishlist_store" href="{{ route('user.wishlist.store',$item->id) }}"><i class="icon-heart"></i><span>{{ __('Wishlist') }}</span></a><a data-target="{{ route('frontend.compare.product',$item->id) }}" class="product-button product_compare" href="javascript:;"><i class="icon-repeat"></i><span>{{ __('Compare') }}</span></a>
                    @if ($item->is_stock())
                    <a class="product-button add_to_single_cart"  data-target="{{ $item->id }}" href="javascript:;"  ><i class="icon-shopping-cart"></i><span>{{ __('To Cart') }}</span>
                    </a>
                    @else
                    <a class="product-button" href="{{ route('frontend.product',$item->slug) }}"><i class="icon-arrow-right"></i><span>{{ __('Details') }}</span></a>
                    @endif
                </div>
            </div>
        </div>
       @endforeach
    </div>
</div>

@else
<div class="card">
    <div class="card-body text-center ">
        {{__('No Product Found')}}
    </div>
</div>
@endif

<script type="text/javascript" src="{{ asset('frontend/js/extraindex.js') }}"></script>
