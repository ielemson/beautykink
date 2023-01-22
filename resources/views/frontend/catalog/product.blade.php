@extends('frontend.layouts.beautykinkLayout', ['ogImg' => env('APP_URL') . '/' . $item->photo])

@section('title')
    {{ __($item->name . ' ' . 'Nigeria') }}
@endsection

@section('meta')
    <meta name="keywords" content="{{ $item->meta_keywords }}">
    <meta name="description" content="{{ $item->meta_description }}">
@endsection

@section('content')
    @include('frontend._inc.header_single_page', ['title_1' => 'Shop', 'title_2' => $item->name])

    @php
        function renderStarRating($rating, $maxRating = 5)
        {
            $fullStar = "<i class = 'far fa-star filled'></i>";
            $halfStar = "<i class = 'far fa-star-half filled'></i>";
            $emptyStar = "<i class = 'far fa-star'></i>";
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
                                                                
                                                        {{-- <span
                                                            class="product-flag-new">{{$item->highlight->name }}
                                                        </span> --}}
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
                                                    <img src="{{ asset($gallery->photo) }}"
                                                        alt="{{ asset($gallery->name) }}" style="width:100%;height:100px;">
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
                                            <li><a href="#description" class="reviews"><i
                                                        class="fa fa-commenting-o"></i>Read
                                                    reviews ({{ count($reviews) }})</a></li>
                                            @auth
                                                <li><a href="javascript:;" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop" class="comment"><i
                                                            class="fa fa-pencil-square-o"></i>Write a review</a></li>
                                            @endauth
                                            @if ($item->video)
                                                <li>
                                                    {{-- <a class="popup-youtube" href="https://www.youtube.com/watch?v={{ $video }}"><i class="fa fa-youtube-play text-danger"></i> Play Video</a><br> --}}
                                                    <a class="popup-youtube" href="{{ $item->video }}"><i
                                                            class="fab fa-youtube fa-2x text-danger"></i> Play Video</a><br>
                                            @endif
                                        </ul>
                                    </div>
                                    {{-- @if ($item->is_type == 'flash_deal')
                                        @if (date('d-m-y') != \Carbon\Carbon::parse($item->date)->format('d-m-y'))
                                            <div class="ht-countdown ht-countdown-style1 mt-5 mb-10"
                                                data-date="{{ $item->date }}"></div>
                                        @endif
                                    @endif --}}
                                    <div class="prices">
                                        @if ($item->previous_price != 0)
                                            <span
                                                class="price-old">@money($item->previous_price,'NGN')</span>
                                        @endif

                                        <span class="price">@money($item->discount_price,'NGN')</span>
                                        @if ($item->previous_price != 0)
                                            <span class="discount-percentage">Save
                                                @money(PriceHelper::discountPercentage($item),'NGN')</span>
                                        @endif

                                        <div class="tax-label">
                                            @if ($item->is_stock())
                                                <span class="text-success  d-inline-block">{{ __('In Stock') }}</span>
                                            @else
                                                <span class="text-danger  d-inline-block">{{ __('Out of stock') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pt-1 mb-1"><span class="text-medium">{{ __('Categories') }}:</span>
                                        <a
                                            href="{{ route('frontend.category.view',$item->category->slug)}}">{{ strtolower($item->category->name )}}</a>
                                        @if ($item->subcategory)
                                            /
                                            <a
                                                href="{{ route('frontend.subcategory.view',$item->subcategory->slug)}}">{{ strtolower($item->subcategory->name )}}</a>
                                        @endif
                                        @if ($item->childcategory)
                                            /
                                            <a
                                                href="{{ route('frontend.childcategory.view',$item->childcategory->slug)}}">{{ strtolower($item->childcategory->name )}}</a>
                                        @endif
                                    </div>
                                    <div class="pt-1 mb-1"><span class="text-medium">{{ __('Tags') }}:</span>
                                        @if ($item->tags)
                                            @foreach (explode(',', $item->tags) as $tag)
                                                @if ($loop->last)
                                                    <a
                                                        href="{{ route('frontend.catalog.tag',$tag)}}">{{ strtolower($tag) }}</a>
                                                @else
                                                    <a
                                                        href="{{ route('frontend.catalog.tag',$tag)}}">{{ strtolower($tag) }}</a>,
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    {{-- <form id="add_to_cart_form" syle="margin-top:5px"> --}}
                                        <form  action="javascript:;" method="POST" id="addToCart" tabindex="-1">
                                            @csrf
                                        <div class="product-variants col-md-12">
                                            @foreach ($attributes as $attribute)
                                                @if ($attribute->options->count() != 0)
                                                    @if (strtolower($attribute->type) == 'image')
                                                        <div class="product-variants-item mt-5">
                                                            <h6 class="title mb-20">{{ strtolower(ucwords($attribute->name ))}}</h6>
                                                            @foreach ($attribute->options as $option)
                                                                <label>
                                                                    <span class="radio-wrapper">
                                                                        <input type="radio" name="attribute_id"
                                                                            value="{{ $option->id }}" id="radioid"
                                                                            required />
                                                                    </span>
                                                                   @if ($option->image != '')
                                                                   <img src="{{ asset("uploads/items/attributes/$option->image") }}"
                                                                   alt="{{ $option->name }}" class="img-thumbnail"
                                                                   data-color="{{ $option->image }}"/>
                                                                   @endif
                                                                   @if ($option->price > 0)
                                                                <small><b>   @money($option->price,'NGN')  </b></small> 
                                                                   @endif
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    @endif

                                                    @if (strtolower($attribute->type) == 'image text')
                                                        <div class="product-variants-item mt-5">
                                                            <h6 class="title mb-20">{{ $attribute->name }}</h6>
                                                            @foreach ($attribute->options as $option)
                                                                <label>
                                                                    <span class="radio-wrapper">
                                                                        <input type="radio" name="attribute_id"
                                                                            value="{{ $option->id }}" id="radioid"
                                                                            required />
                                                                    </span>
                                                                   @if ($option->image != '')
                                                                   <img src="{{ asset("uploads/items/attributes/$option->image") }}"
                                                                   alt="{{ $option->id }}" class="img-thumbnail"
                                                                   data-color="{{ $option->image }}"/>
                                                                   @endif
                                                                    {{ $option->name }}
                                                                    @if ($option->price > 0)
                                                                    <small><b>   @money($option->price,'NGN')  </b></small> 
                                                                       @endif
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    @endif

                                                    @if (strtolower($attribute->type) == 'text')
                                                        <div class="product-variants-item">
                                                            <h6 class="title">{{ $attribute->name }}</h6>
                                                            <select class="form-control-select" name="attribute_id" aria-label="S" required>
                                                                <option value="" selected>Select Options</option>
                                                                @foreach ($attribute->options as $option)
                                                                <option value="{{$option->id}}">
                                                                    {{$option->name}} 
                                                                    @if ($option->price > 0)
                                                                   -  <small><b>   @money($option->price,'NGN')  </b></small> 
                                                                    @endif
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endif

                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="product-description">
                                            {!! $item->short_details !!}
                                        </div>
                                        <div class="product-quick-action">
                                           
                                            <input type="hidden" id="pid" class="pid" 
                                                value="{{ $item->id }}" name="pid">

                                            <input type="hidden" id="qty" class="qty"
                                                value="1" name="qty">

                                            @if ($item->is_stock())
                                                <button type="submit" class="btn-product-add btn-danger" id="addToCartButton">Add to
                                                    cart
                                                </button>
                                            @else
                                                <a class="btn-quick-view btn-block remind_me_when_restock"
                                                    href="javascript:;" title="remind me on restock"
                                                    data-id="{{ $item->id }}">Remind me when restocked</a>
                                            @endif
                                        </div>
                                    </form>

                                    <div class="product-wishlist-compare">
                                        <a href="javascript:;" class="btn-wishlist add-wishlist"
                                            data-id="{{ $item->id }}"><i class="icon-heart"></i>Add to
                                            wishlist</a>
                                        <a href="javascript:;" class="btn-compare add-compare"
                                            data-id="{{ $item->id }}"><i class="icon-shuffle"></i>Add to
                                            compare</a>
                                    </div>
                                    <div class="social-sharing">
                                        <span>Share</span>
                                        <div class="social-icons">
                                            {!! Share::page(url('/product/' . $item->slug))->facebook()->telegram()->twitter()->linkedin()->whatsapp() !!}
                                        </div>

                                    </div>
                                </div>
                                <!--== End Product Info Area ==-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Write Product Review --}}
            @include('frontend._inc.product_review', ['item_id' => $item->id])
            @auth
                @include('frontend._inc.review_modal')
            @endauth

            {{-- Write Product Review --}}
        </div>

    </section>

    {{-- Similar Products --}}
    @include('frontend.catalog.similarproduct')
    {{-- Similar Products --}}
    <!--== End Product Single Area Wrapper ==-->
@endsection
@section('styleplugins')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
        integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .error {
            color: #FF0000;
            font-weight: 600;
        }

        .modal-header {
            background-color: #f5f5f5;
        }
    </style>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
        integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Product Details Page Add to Cart ::::::::::::::::::::::::::
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

    <script>
        if ($("#leaveReview").length > 0) {
            $("#leaveReview").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 50
                    },
                    email: {
                        required: true,
                        maxlength: 50,
                        email: true,
                    },
                    review: {
                        required: true,
                        maxlength: 300
                    },
                    rating: {
                        required: true,
                        maxlength: 300
                    },
                    subject: {
                        required: true,
                        maxlength: 300
                    },
                },
                messages: {
                    name: {
                        required: "Please enter name",
                        maxlength: "Your name maxlength should be 50 characters long."
                    },
                    email: {
                        required: "Please enter valid email",
                        email: "Please enter valid email",
                        maxlength: "The email name should less than or equal to 50 characters",
                    },
                    message: {
                        required: "Please enter message",
                        maxlength: "Your message name maxlength should be 300 characters long."
                    },
                },
                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#submit').html('Please Wait...');
                    $("#submit").attr("disabled", true);
                    $.ajax({
                        url: "{{ route('frontend.review.submit') }}",
                        type: "POST",
                        data: $('#leaveReview').serialize(),
                        success: function(response) {
                            console.log(response)
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            })
                            if (response.errors) {
                                Toast.fire({
                                    icon: 'error',
                                    title: response.errors[0],
                                })
                            } else {
                                Toast.fire({
                                    icon: 'success',
                                    title: response,
                                })
                                $("#staticBackdrop").modal("hide");
                                $('#review-subject').val('')
                                $('#review-message').val('')
                            }
                            $('#submit').html('Submit');
                            $("#submit").attr("disabled", false);
                            // alert('Ajax form has been submitted successfully');
                            // document.getElementById("contactUsForm").reset(); 
                        }
                    });
                }
            })
        }
    </script>
    @include('frontend._inc.restock_form')
@endsection
