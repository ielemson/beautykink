@if ($extra_settings->is_t2_flashdeal == 1)

  <section class="product-area mb-30">
    <div class="container-fluid pt-65 pt-lg-40">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="section-title text-center">
                    <h2 class="title">Flash Deal</h2>
                    <div class="desc">
                        <p>Add our flash deal to your weekly lineup</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-slider owl-carousel owl-theme">

                    @foreach ($products->orderBy('id', 'DESC')->get() as $flashitem)
                    @if ($flashitem->is_type == 'flash_deal' && $flashitem->date != null)    
                    <div class="item">
                            <!--== Start Shop Item ==-->
                            <div class="product-item">
                                <div class="inner-content">
                                    <div class="product-thumb">
                                        <a href="{{ route('frontend.product', $flashitem->slug) }}">
                                            <img src="{{ asset($flashitem->photo) }}"
                                                alt="{{ asset($flashitem->name) }}" style="width:100%; height:35vh">
                                            <img class="second-image" src="{{ asset($flashitem->photo) }}"
                                                alt="{{ asset($flashitem->name) }}" style="width:100%; height:35vh">
                                        </a>
                                        <div class="product-action">
                                            <div class="addto-wrap">
                                                <a class="add-wishlist" href="javascript:;" data-id="{{$flashitem->id}}" title="Add to wishlist">
                                                    <i class="icon-heart icon"></i>
                                                </a>
                                                <a class="add-compare" href="javascript:;" data-id="{{$flashitem->id}}" title="Add to compare">
                                                    <i class="icon-shuffle icon"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="product-flag">
                                            @if ($flashitem->is_stock())
                                                <li class="{{ strtolower($flashitem->is_type) }}">
                                                    {{ ucfirst(str_replace('_', ' ', $flashitem->is_type)) }}
                                                </li>
                                            @else
                                                <li class="new">{{ __('out of stock') }}</li>
                                            @endif
                                            @if ($flashitem->previous_price && $flashitem->previous_price != 0)
                                                <li class="discount">
                                                    {{ PriceHelper::DiscountPercentage($flashitem) }}
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-info">
                                            <h4 class="title"><a
                                                    href="{{ route('frontend.product', $flashitem->slug) }}">{{ strlen(strip_tags($flashitem->name)) > 35 ? substr(strip_tags($flashitem->name), 0, 35) : strip_tags($flashitem->name) }}</a>
                                            </h4>
                                            <div class="star-content">
                                                {!!renderStarRating($flashitem->reviews->avg('rating'))!!}
                                            </div>
                                            <div class="prices">
                                                @if ($flashitem->previous_price != 0)
                                                    {{-- <del></del> --}}
                                                    <span class="price-old">
                                                        {{ PriceHelper::setPreviousPrice($flashitem->previous_price) }}</span>
                                                @endif
                                                <span class="price text-black">
                                                    {{ PriceHelper::grandCurrencyPrice($flashitem) }}</span>
                                            </div>
                                            @if (date('d-m-y') != \Carbon\Carbon::parse($flashitem->date)->format('d-m-y'))
                                                            <div class="countdown countdown-alt mb-3"
                                                                data-date-time="{{ $flashitem->date }}">
                                                            </div>
                                                        @endif
                                        </div>
                                        <div class="product-footer">
                                            @if ($flashitem->is_stock())
                                            <a class="btn-product-add add_to_cart" data-id="{{ $flashitem->id }}"
                                                href="javascript:;">Add to cart</a>
                                            {{-- <a class="btn-quick-view quick_view" href="javascript:;" quick-view-data-id="{{ $item->id }}" title="view product" onclick="Quickview({{ $item->id }})">Quick View</a> --}}
                                            <a class="btn-quick-view"
                                                href="{{ route('frontend.product', $flashitem->slug) }}"
                                                title="view product">Product details</a>
                                        @else
                                            <a class="btn-quick-view btn-block remind_me_when_restock"
                                                href="javascript:;" title="view product"
                                                data-id="{{ $flashitem->id }}">Remind me when restocked</a>
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
@endif

@section('styleplugins')
<style>
 
.countdown {
    background: #cc0067  !important;
    display: inline-block;
    padding: 2px 10px;
    border-radius: 3px;
    color: #fff;
}
</style>

@endsection

@section('script')
@include('frontend._inc.restock_form')
@endsection