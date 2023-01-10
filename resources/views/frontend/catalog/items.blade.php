
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

            @if ($highlight->name == 'Flash Deal')
                  
            <div class="row">
                <div class="col-xxl-9">
                  <div class="thumb thumb-scale-hover-style">
                    @php
                     $flashImg = DB::table('home_customizes')->first() 
                  @endphp
                    <a href="#"><img src="{{asset($flashImg->flash_deal_img)}}"  class="hover-img"></a>
                  </div>
                </div>
                <div class="col-xxl-3">
                  <div class="discount-product-slider owl-carousel owl-theme mt-xl-15">
     
                    @foreach ($highlight->items as $flashItem)
                   @if ($flashItem->status == 1)
                   @if ($highlight->name == 'Flash Deal' ) 
                   <div class="item">
                       <!--== Start Shop Item ==-->
                       <div class="product-item">
                           <div class="inner-content">
                               <div class="product-thumb">
                                   <a href="{{ route('frontend.product', $flashItem->slug) }}">
                                       <img src="{{ asset($flashItem->photo) }}"
                                           alt="{{ asset($flashItem->name) }}">
                                       <img class="second-image" src="{{ asset($flashItem->photo) }}">
                                   </a>
                                   <div class="product-action">
                                       <div class="addto-wrap">
                                           <a class="add-wishlist" href="javascript:;" data-id="{{$flashItem->id}}" title="Add to wishlist">
                                               <i class="icon-heart icon"></i>
                                           </a>
                                           <a class="add-compare" href="javascript:;" data-id="{{$flashItem->id}}" title="Add to compare">
                                               <i class="icon-shuffle icon"></i>
                                           </a>
                                       </div>
                                   </div>
                                   <ul class="product-flag">
                                       @if ($flashItem->is_stock())
                                           <li class="new">
                                               {{ ucfirst(str_replace('_', ' ', $highlight->name)) }}
                                           </li>
                                       @else
                                           <li class="new">{{ __('out of stock') }}</li>
                                       @endif
                                       @if ($flashItem->previous_price && $flashItem->previous_price != 0)
                                           <li class="discount">
                                               {{ PriceHelper::DiscountPercentage($flashItem) }}
                                           </li>
                                       @endif
                                   </ul>
                               </div>
                               <div class="product-desc">
                                   <div class="product-info">
                                       <h4 class="title"><a
                                               href="{{ route('frontend.product', $flashItem->slug) }}">{{ strlen(strip_tags($flashItem->name)) > 35 ? substr(strip_tags($flashItem->name), 0, 35) : strip_tags($flashItem->name) }}</a>
                                       </h4>
                                       <div class="star-content">
                                           {!!renderStarRating($flashItem->reviews->avg('rating'))!!}
                                       </div>
                                       <div class="prices">
                                           @if ($flashItem->previous_price != 0)
                                               {{-- <del></del> --}}
                                               <span class="price-old">
                                                   @money(PriceHelper::setPreviousPrice($flashItem->previous_price),'NGN')</span>
                                           @endif
                                           <span class="price text-black">
                                               @money(PriceHelper::grandCurrencyPrice($flashItem),'NGN')</span>
                                       </div>
                                   </div>
                                   <div class="product-footer">
                                       @if ($flashItem->is_stock())
                                       
                                       @if (count($flashItem->attributes))
                                       <a class="btn-product-add add_to_cart_without_attribute" data-slug="{{ $flashItem->slug}}"
                                           href="javascript:;">Add to cart
                                       </a>
                                       @else
                                            <a class="btn-product-add add_to_cart" data-id="{{ $flashItem->id }}"
                                           href="javascript:;">Add to cart</a>
                                       @endif
                                       {{-- <a class="btn-quick-view quick_view" href="javascript:;" quick-view-data-id="{{ $flashItem->id }}" title="view product" onclick="Quickview({{ $flashItem->id }})">Quick View</a> --}}
                                       <a class="btn-quick-view"
                                           href="{{ route('frontend.product', $flashItem->slug) }}"
                                           title="view product">Product details</a>
                                   @else
                                       <a class="btn-quick-view btn-block remind_me_when_restock"
                                           href="javascript:;" title="view product"
                                           data-id="{{ $flashItem->id }}">Remind me when restocked</a>
                                   @endif
                                   </div>
                               </div>
                           </div>
                       </div>
                       <!--== End Shop Item ==-->
                   </div>
                   @endif
                   @endif
                    @endforeach
                  </div>
                </div>
              </div>
                       
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-slider owl-carousel owl-theme">

                    @foreach ($highlight->items as $item)
                    @if ($item->status == 1)
                @if ($highlight->name != 'Flash Deal')
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
                @endif
                      
                    @endif
                    @endforeach
                </div>
            </div>
        </div>

</section>
