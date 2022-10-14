@if ($extra_settings->is_t2_new_product == 1)
  <section class="product-area mb-5">
    <div class="container-fluid mb-5 pb-80">
        <div class="row">
            <div class="col-sm-8 m-auto">
              <div class="section-title text-center mb-30">
                <h2 class="title">Our Products</h2>
                <div class="desc">
                  <p>All Products</p>
                </div>
              </div>
            </div>
          </div>
          
      <div class="row">
        @foreach ($products->orderBy('id', 'DESC')->get() as $item)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <!--== Start Shop Item ==-->
          <div class="product-item">
            <div class="inner-content">
              <div class="product-thumb">
               <a href="{{ route('frontend.product', $item->slug) }}">
                <img src="{{ asset($item->photo) }}" alt="Image-{{ asset($item->name) }}" style="width:100%; height:35vh">
                  <img class="second-image" src="{{ asset($item->photo) }}" alt="{{ asset($item->thumbnail) }}">
                </a>
                  
                <div class="product-action">
                  <div class="addto-wrap">
                    <a class="add-wishlist" href="#" title="Add to wishlist">
                      <i class="icon-heart icon"></i>
                    </a>
                    <a class="add-compare" href="#" title="Add to compare">
                      <i class="icon-shuffle icon"></i>
                    </a>
                  </div>
                </div>
                <ul class="product-flag">
                  <li class="{{strtolower($item->is_type)}}"> {{   ucfirst(str_replace('_',' ',$item->is_type))   }}</li>
                  {{-- <li class="discount visually-hidden">-20%</li> --}}
                </ul>
              </div>
              <div class="product-desc">
                <div class="product-info">
                  <h4 class="title"><a href="{{ route('frontend.product', $item->slug) }}"> {{ strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name) }}</a></h4>
                  <div class="star-content">
                    {{-- <i class="ion-md-star"></i>
                    <i class="ion-md-star"></i>
                    <i class="ion-md-star"></i>
                    <i class="ion-md-star"></i>
                    <i class="ion-md-star"></i> --}}
                    {!!renderStarRating($item->reviews->avg('rating'))!!}
                  </div>
                  <div class="prices">
                    @if ($item->previous_price != 0)
                    {{-- <del></del> --}}
                    <span class="price-old">
                    {{ PriceHelper::setPreviousPrice($item->previous_price) }}</span>
                    @endif
                  <span class="price text-black"> {{ PriceHelper::grandCurrencyPrice($item) }}</span>
                  </div>
                </div>
                <div class="product-footer">
                  <a class="btn-product-add add_to_cart" data-id="{{ $item->id }}" href="javascript:;">Add to cart</a>
                  {{-- <a class="btn-quick-view quick_view" href="javascript:;" quick-view-data-id="{{ $item->id }}" title="view product" onclick="Quickview({{ $item->id }})">Quick View</a> --}}
                  <a class="btn-quick-view" href="{{ route('frontend.product', $item->slug) }}" title="view product">Product details</a>
                </div>
              </div>
            </div>
          </div>
          <!--== End Shop Item ==-->
        </div>
      @endforeach
      </div>
    </div>
  </section>
@endif