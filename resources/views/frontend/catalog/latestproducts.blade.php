@if ($new_products)
    <section class="product-area mb-30">
        <div class="container pt-65 pt-lg-40">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="section-title text-center">
                        <h2 class="title">New Arrivals</h2>
                        <div class="desc">
                            <p>Add our new arrivals to your weekly lineup</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-slider owl-carousel owl-theme">

                        @foreach ($new_products->orderBy('id', 'DESC')->get() as $newitem)
                            <div class="item">
                                <!--== Start Shop Item ==-->
                                <div class="product-item">
                                    <div class="inner-content">
                                        <div class="product-thumb">
                                            <a href="{{ route('frontend.product', $newitem->slug) }}">
                                                <img src="{{ asset($newitem->photo) }}"
                                                    alt="{{ asset($newitem->name) }}" style="width:100%; height:35vh">
                                                <img class="second-image" src="{{ asset($newitem->photo) }}"
                                                    alt="{{ asset($newitem->name) }}" style="width:100%; height:35vh">
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
                                                    {{   ucfirst(str_replace('_',' ',$newitem->is_type))   }}
                                                </li>
                                                
                                                    @if ($newitem->previous_price && $newitem->previous_price != 0)
                                                    <li class="discount">
                                                    - {{ PriceHelper::DiscountPercentage($newitem) }} 
                                                   </li>
                                                @endif
                                               
                                            </ul>
                                        </div>
                                        <div class="product-desc">
                                            <div class="product-info">
                                                <h4 class="title"><a
                                                        href="{{ route('frontend.product', $newitem->slug) }}">{{ strlen(strip_tags($newitem->name)) > 35 ? substr(strip_tags($newitem->name), 0, 35) : strip_tags($newitem->name) }}</a>
                                                </h4>
                                                <div class="star-content">
                                                    <i class="ion-md-star"></i>
                                                    <i class="ion-md-star"></i>
                                                    <i class="ion-md-star"></i>
                                                    <i class="ion-md-star"></i>
                                                    <i class="ion-md-star"></i>
                                                </div>
                                                <div class="prices">
                                                    @if ($newitem->previous_price != 0)
                                                        {{-- <del></del> --}}
                                                        <span
                                                            class="price-old">
                                                    {{ PriceHelper::setPreviousPrice($newitem->previous_price) }}</span>
                                                    @endif
                                                    <span class="price text-black">
                                                        {{ PriceHelper::grandCurrencyPrice($newitem) }}</span>
                                                </div>
                                            </div>
                                            <div class="product-footer">
                                                <a class="btn-product-add add_to_cart" data-id="{{ $newitem->id }}" href="javascript:;">Add to cart</a>
                                                <a class="btn-quick-view"
                                                    href="{{ route('frontend.product', $newitem->slug) }}"
                                                    title="Quick view">Product Details</a>
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

    </section>
@endif
