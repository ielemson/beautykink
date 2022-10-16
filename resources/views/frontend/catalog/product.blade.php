@extends('frontend.layouts.beautykinkLayout')

@section('title')
    {{ __('Product') }}
@endsection

@section('meta')
    <meta name="keywords" content="{{ $item->meta_keywords }}">
    <meta name="description" content="{{ $item->meta_description }}">
@endsection

@section('content')
    @include('frontend._inc.header_single_page',['title_1'=>'Shop','title_2'=>$item->name])

    @php
        function renderStarRating($rating, $maxRating = 5)
        {
            $fullStar = "<i class='ion-md-star'>";
    $halfStar = "<i class ='ion-md-star icon-color-gray'></i>";
    $emptyStar = "<i class ='ion-md-star'></i>";
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

    <!--== Start Product Single Area Wrapper ==-->
    <section class="product-area product-single-area">
        
        <div class="container pt-60 pb-0">
            <div class="row">
                <div class="col-12">
                    <div class="product-single-item" data-margin-bottom="62">
                        <div class="row">
                            <div class="col-md-6">
                                <!--== Start Product Thumbnail Area ==-->
                                <div class="product-thumb">
                                    <div class="swiper-container single-product-thumb-content single-product-thumb-slider2">
                                        <div class="swiper-wrapper">
                                            @foreach ($galleries as $key => $gallery)
                                                {{-- <div class="gallery-item" itemscope data-hash="gallery{{ $key }}"><a href="{{ asset($gallery->photo) }}" data-size="1000x1000"><img src="{{ asset($gallery->photo) }}" alt="Product"></a></div> --}}
                                                <div class="swiper-slide zoom zoom-hover">
                                                    <a class="lightbox-image" data-fancybox="gallery"
                                                        href="{{ asset($gallery->photo) }}">
                                                        <img src="{{ asset($gallery->photo) }}"
                                                            alt="slider-{{ $key }}"
                                                             style=" 
                                                             width: 100%;
                                                            height: auto;
                                                            object-fit: cover;
                                                            object-position: bottom;">
                                                        <span class="product-flag-new">{{$item->is_type}}</span>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="swiper-container single-product-nav-content single-product-nav-slider2">
                                        <div class="swiper-wrapper">
                                            @foreach ($galleries as $key => $gallery)
                                                {{-- <li><a href="#gallery{{ $key }}"><img src="{{ asset($gallery->photo) }}" alt="Product"></a></li> --}}
                                                <div class="swiper-slide">
                                                    <img src="{{ asset($gallery->photo) }}" alt="{{ asset($gallery->name) }}" style="width:100%;height:100px;">
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                                <!--== End Product Thumbnail Area ==-->
                            </div>
                            <div class="col-md-6">
                                <!--== Start Product Info Area ==-->
                                <div class="product-single-info mt-sm-70">
                                    <h1 class="title">{{ $item->name }}</h1>
                                    <div class="product-info">
                                        <div class="star-content">
                                            {{-- <i class="ion-md-star"></i>
<i class="ion-md-star"></i>
<i class="ion-md-star"></i>
<i class="ion-md-star"></i> --}}
                                            {{-- <i class="ion-md-star icon-color-gray"></i> --}}
                                            {!! renderStarRating($item->reviews->avg('rating')) !!}
                                        </div>
                                        <ul class="comments-advices">
                                            <li><a href="#/" class="reviews"><i class="fa fa-commenting-o"></i>Read
                                                    reviews (1)</a></li>
                                                    @if ($item->video)
                                                   
                                                    
                                            <li>
                                                <a class="popup-youtube" href="https://www.youtube.com/watch?v={{$video}}"><i class="fa fa-youtube-play text-danger"></i> Play Video</a><br>
                                
                                                @endif
                                        </ul>
                                    </div>
                                    
                                    <div class="prices">
                                        @if ($item->previous_price != 0)
                                            <span class="price-old">{{ PriceHelper::setPreviousPrice($item->previous_price) }}</span>
                                        @endif
                                      
                                        <span class="price">{{ PriceHelper::grandCurrencyPrice($item) }}</span>
                                        @if ($item->previous_price != 0)
                                        <span class="discount-percentage">Save {{PriceHelper::discountPercentage($item)}}</span>

                                        @endif
                                    
                                        <div class="tax-label">
                                            @if ($item->is_stock())
                                            <span class="text-success  d-inline-block">{{ __('In Stock') }}</span>
                                        @else
                                            <span class="text-danger  d-inline-block">{{ __('Out of stock') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                  
                                    <div class="row margin-top-1x">
                                        @foreach ($attributes as $attribute)
                                            @if ($attribute->options->count() != 0)
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="{{ $attribute->name }}">{{ $attribute->name }}</label>
                                                        <select class="form-control attribute_option"
                                                            id="{{ $attribute->name }}">
                                                            @foreach ($attribute->options as $option)
                                                                <option value="{{ $option->name }}"
                                                                    data-type="{{ $attribute->id }}"
                                                                    data-href="{{ $option->id }}"
                                                                    data-target="{{ PriceHelper::setConvertPrice($option->price) }}">
                                                                    {{ $option->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="product-description">
                                        {!! $item->details !!}
                                    </div>
                                    <div class="product-quick-action">
                                        {{-- <div class="product-quick-qty">

                                            
                                            <div class="pro-qty">
                                                <div class="inc qty-btn"><i class="fa fa-angle-up"></i></div>
                                                <input type="text" id="quantity2" class="qty" title="Quantity"  data-item-id="{{$item->id}}">
                                                <div class= "dec qty-btn"><i class="fa fa-angle-down"></i></div>
                                            </div>
                                        </div> --}}
                                        {{-- <input type="text" id="cartId"> --}}

                                        <a class="btn-product-add btn-product-addTo-cart" data-item-id="{{$item->id}}" href="javascript:;">Add to cart</a>
                                    </div>
                                    <div class="product-wishlist-compare">
                                        <a href="" class="btn-wishlist"><i class="icon-heart"></i>Add to
                                            wishlist</a>
                                        <a href="" class="btn-compare"><i class="icon-shuffle"></i>Add to
                                            compare</a>
                                    </div>
                                    <div class="social-sharing">
                                        <span>Share</span>
                                        <div class="social-icons">
                                            <a href="#/"><i class="la la-facebook"></i></a>
                                            <a href="#/"><i class="la la-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Product Info Area ==-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-review-tabs-content">
                        <ul class="nav product-tab-nav" id="ReviewTab" role="tablist">
                            <li role="presentation">
                                <a class="active" id="description-tab" data-bs-toggle="pill" href="#description"
                                    role="tab" aria-controls="description" aria-selected="true">Description</a>
                            </li>
                          
                            <li role="presentation">
                                <a id="reviews-tab" data-bs-toggle="pill" href="#reviews" role="tab"
                                    aria-controls="reviews" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content product-tab-content" id="ReviewTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="product-description">
                                    {!! $item->details !!}
                                </div>
                            </div>
                           
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="product-comments-content">
                                    <div class="comment clearfix">
                                        <div class="comment-author">
                                            <span class="grade">Grade</span>
                                            <div class="star-content">
                                                <i class="ion-md-star"></i>
                                                <i class="ion-md-star"></i>
                                                <i class="ion-md-star"></i>
                                                <i class="ion-md-star"></i>
                                                <i class="ion-md-star icon-color-gray"></i>
                                            </div>
                                            <div class="comment-author-info">
                                                <span class="title">posthemes</span>
                                                <span class="date">05/19/2021</span>
                                            </div>
                                            <div class="comment-details">
                                                <span class="title">Demo</span>
                                                <p class="desc">0 out of 1 people found this review useful.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#/" class="btn-review">Write your review !</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </section>
    <!--== End Product Single Area Wrapper ==-->
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    // fetch qtymy-cart/single/{pid}
    // $(document).ready(function(){
    //     miniCart()
    //     $.get('/my-cart/single' + '/' + {{$item->id}} , function (data) {
    //        if(data.cart){
    //         $('.qty-btn').parent().find('input').val(data.cart.qty)
    //         $('#cartId').val(data.cart.rowId)
    //        }else{
    //         $('.qty-btn').parent().find('input').val(1)

    //        }
    //         // end message
    //     })
    // })
    $(document).ready(function() {
	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: true,
        fixedContentPos: true,
        focus: '#username',
        //   modal: true
	});
});
</script>


@endsection


@section('styleplugins')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
