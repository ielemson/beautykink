@foreach ($items as $list)
@if ($list->status == 1)
<div class="col-lg-12">
    <!--== Start Shop Item ==-->
    <div class="product-item">
      <div class="inner-content product-list-item">
        <div class="row m-0">
          <div class="col-sm-4 p-0">
            <div class="product-thumb">
              <a href="{{ route('frontend.product', $list->slug) }}">
                <img src="{{ asset($list->photo) }}" alt="{{$list->name}}">
                <img class="second-image" src="{{ asset($list->photo) }}" alt="{{$list->name}}">
              </a>
              <div class="product-action">
                <div class="addto-wrap">
                    <a class="add-wishlist" href="javascript:;" title="Add to wishlist" data-id="{{$list->id}}">
                        <i class="icon-heart icon"></i>
                    </a>
                    <a class="add-compare" href="javascript:;" title="Add to compare" data-id="{{$list->id}}">
                        <i class="icon-shuffle icon"></i>
                    </a>
                </div>
              </div>
              <ul class="product-flag">
              
                    @if ($list->is_stock())
                    {{-- {{   ucfirst(str_replace('_',' ',$list->is_type))   }} --}}
                       
                    @else  
                    <li class="new">
                    {{ __('out of stock') }}
                    </li>
                    @endif
                
               
                    @if ($list->previous_price && $list->previous_price != 0)
                    <li class="discount">
                        {{ PriceHelper::DiscountPercentage($list) }}
                    </li>
                    @endif
            
            </ul>
            </div>
          </div>
          <div class="col-sm-8 p-0">
            <div class="product-desc">
              <div class="product-info">
                <h4 class="title"><a href="{{ route('frontend.product', $list->slug) }}">{{$list->name}}</a></h4>
                <div class="star-content">
                    {!! renderStarRating($list->reviews->avg('rating')) !!}
                </div>
                <div class="prices">
                    @if ($list->previous_price != 0)
                    <span
                        class="price-old">@money($list->previous_price,'NGN')</span>
                @endif
                <span class="price text-black">@money($list->discount_price,'NGN')</span>

                </div>
                <ul class="product-desc-list">
                  {{$list->short_details}}
                </ul>
                <div class="availability-list">Availability: <span>
                    @if ($list->is_stock())
                     In Stock
                    @endif
                </span>
              </div>
              </div>
              <div class="product-footer">
                @if ($list->is_stock())
                @if (count($list->attributes))
                <a class="btn-product-add add_to_cart_without_attribute" data-slug="{{ $list->slug}}"
                    href="javascript:;">Add to cart
                </a>
                @else
                     <a class="btn-product-add add_to_cart" data-id="{{ $list->id }}"
                    href="javascript:;">Add to cart</a>
                @endif
                {{-- <a class="btn-quick-view quick_view" href="javascript:;" quick-view-data-id="{{ $list->id }}" title="view product" onclick="Quickview({{ $list->id }})">Quick View</a> --}}
                <a class="btn-quick-view" href="{{ route('frontend.product', $list->slug) }}" title="view product">Product details</a>
                @else
                <a class="btn-quick-view btn-block remind_me_when_restock" href="javascript:;" title="out of stock" data-id="{{ $list->id }}">Remind me when restocked</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Shop Item ==-->
  </div>
  @endif
  @endforeach