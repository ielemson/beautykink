@extends('frontend.layouts.frontend')
@section('meta')
    <meta name="keywords" content="{{ $setting->meta_keywords }}">
    <meta name="description" content="{{ $setting->meta_description }}">
@endsection
@section('title')
    {{ __('Home') }}
@endsection
@section('content')


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

    @if ($extra_settings->is_t2_slider == 1)
        <div class="slider-area-wrapper pt-3 mt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Main Slider-->
                        <div class="hero-slider">
                            <div class="hero-slider-main owl-carousel dots-inside">
                                @foreach ($sliders as $slider)
                                    <div class="item
                                    @if (DB::table('languages')->where('is_default', 1)->first()->rtl == 1) d-flex justify-content-end @endif
                                    "
                                        style="background: url('{{ asset($slider->photo) }}')">
                                        <div class="item-inner">
                                            <div class="from-bottom">
                                                @if ($slider->logo)
                                                    <img class="d-inline-block brand-logo"
                                                        src="{{ asset($slider->logo) }}" alt="logo">
                                                @endif

                                                <div class="title text-body">{{ $slider->title }}</div>
                                                <div class="subtitle text-body mb-4">{{ $slider->details }}</div>
                                            </div>
                                            <a class="btn btn-primary btn-sm scale-up delay-1"
                                                href="{{ $slider->link }}">{{ __('View Offers') }}
                                                <i class="icon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($extra_settings->is_t2_service_section == 1)
        <section class="service-section mt-60 pt-0">
            <div class="container">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-lg-3 col-sm-6 text-center mb-30">
                            <div class="single-service single-service2">
                                <img src="{{ asset($service->photo) }}" alt="Shipping">
                                <div class="content">
                                    <h6 class="mb-2">{{ $service->title }}</h6>
                                    <p class="text-sm text-muted mb-0">{{ $service->details }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($extra_settings->is_t2_3_column_banner_first == 1)
        <div class="bannner-section mt-30">
            <div class="container ">
                <div class="row ">
                    <div class="col-md-4">
                        <a href="{{ $banner_first['firsturl1'] }}" class="genius-banner">
                            <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($banner_first['img1']) }}"
                                alt="">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ $banner_first['firsturl2'] }}" class="genius-banner">
                            <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($banner_first['img2']) }}"
                                alt="">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ $banner_first['firsturl3'] }}" class="genius-banner">
                            <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($banner_first['img3']) }}"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($extra_settings->is_t2_flashdeal == 1)
        <div class="flash-sell-area mt-50 theme2">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="section-title section-title2 section-title3">
                            <h2 class="h3">{{ __('Flash Deal') }}</h2>
                        </div>
                        <div class="main-content">
                            <div class="features-slider  owl-carousel">
                                @foreach ($products->orderBy('id', 'DESC')->get() as $item)
                                    @if ($item->is_type == 'flash_deal' && $item->date != null)
                                        <div class="slider-item">
                                            <div class="product-card ">
                                                <a class="product-thumb" href="{{ route('frontend.product', $item->slug) }}">
                                                    @if (!$item->is_stock())
                                                        <div
                                                            class="product-badge bg-secondary border-default text-body
                                                ">
                                                            {{ __('out of stock') }}</div>
                                                    @endif
                                                    @if ($item->previous_price && $item->previous_price != 0)
                                                        <div class="product-badge product-badge2 bg-info">
                                                            -{{ PriceHelper::DiscountPercentage($item) }}</div>
                                                    @endif
                                                    <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}"
                                                        data-src="{{ asset($item->thumbnail) }}"
                                                        alt="Product">
                                                </a>
                                                <div class="product-card-inner">
                                                    <div class="product-card-body">

                                                        <div class="product-category"><a
                                                                href="{{ route('frontend.catalog') . '?category=' . $item->category->slug }}">{{ $item->category->name }}</a>
                                                        </div>
                                                        <h3 class="product-title"><a
                                                                href="{{ route('frontend.product', $item->slug) }}">
                                                                {{ strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name) }}
                                                            </a></h3>
                                                        <div class="rating-stars">
                                                            {!! renderStarRating($item->reviews->avg('rating')) !!}
                                                        </div>
                                                        <h4 class="product-price">
                                                            @if ($item->previous_price != 0)
                                                                <del>{{ PriceHelper::setPreviousPrice($item->previous_price) }}</del>
                                                            @endif

                                                            {{ PriceHelper::grandCurrencyPrice($item) }}
                                                        </h4>
                                                        @if (date('d-m-y') != \Carbon\Carbon::parse($item->date)->format('d-m-y'))
                                                            <div class="countdown countdown-alt mb-3"
                                                                data-date-time="{{ $item->date }}">
                                                            </div>
                                                        @endif
                                                    </div>


                                                    <div class="product-button-group"><a class="product-button"
                                                            href="{{ route('user.wishlist.store', $item->id) }}"><i
                                                                class="icon-heart"></i><span>{{ __('Wishlist') }}</span></a><a
                                                            data-target="{{ route('frontend.compare.product', $item->id) }}"
                                                            class="product-button product_compare" href="javascript:;"><i
                                                                class="icon-repeat"></i><span>{{ __('Compare') }}</span></a>
                                                        @if ($item->is_stock())
                                                            <a class="product-button add_to_single_cart"
                                                                data-target="{{ $item->id }}" href="javascript:;"><i
                                                                    class="icon-shopping-cart"></i><span>{{ __('To Cart') }}</span>
                                                            </a>
                                                        @else
                                                            <a class="product-button"
                                                                href="{{ route('frontend.product', $item->slug) }}"><i
                                                                    class="icon-arrow-right"></i><span>{{ __('Details') }}</span></a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($extra_settings->is_t2_new_product == 1)
        <section class="selected-product-section mt-50 theme2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title section-title2 section-title3">
                            <h2 class="h3">{{ __('New  Products') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <div class="features-slider  owl-carousel">
                            @foreach ($products->orderBy('id', 'DESC')->get() as $item)
                                <div class="slider-item">
                                    <div class="product-card ">
                                        <a class="product-thumb" href="{{ route('frontend.product', $item->slug) }}">
                                            @if (!$item->is_stock())
                                                <div class="product-badge bg-secondary border-default text-body ">{{ __('out of stock') }}</div>
                                            @endif
                                            @if ($item->previous_price && $item->previous_price != 0)
                                                <div class="product-badge product-badge2 bg-info">
                                                    -{{ PriceHelper::DiscountPercentage($item) }}</div>
                                            @endif
                                            <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($item->thumbnail) }}" alt="Product">
                                        </a>
                                        <div class="product-card-inner">
                                            <div class="product-card-body">
                                                <div class="product-category">
                                                    <a href="{{ route('frontend.catalog') . '?category=' . $item->category->slug }}">{{ $item->category->name }}</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="{{ route('frontend.product', $item->slug) }}">
                                                        {{ strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name) }}
                                                    </a>
                                                </h3>
                                                <div class="rating-stars">
                                                    {!! renderStarRating($item->reviews->avg('rating')) !!}
                                                </div>
                                                <h4 class="product-price">
                                                    @if ($item->previous_price != 0)
                                                        <del>{{ PriceHelper::setPreviousPrice($item->previous_price) }}</del>
                                                    @endif
                                                    {{ PriceHelper::grandCurrencyPrice($item) }}
                                                </h4>
                                            </div>
                                            <div class="product-button-group">
                                                <a class="product-button wishlist_store" href="{{ route('user.wishlist.store', $item->id) }}"><i class="icon-heart"></i><span>{{ __('Wishlist') }}</span></a>
                                                <a data-target="{{ route('frontend.compare.product', $item->id) }}" class="product-button product_compare" href="javascript:;"><i class="icon-repeat"></i><span>{{ __('Compare') }}</span></a>
                                                @if ($item->is_stock())
                                                    <a class="product-button add_to_single_cart" data-target="{{ $item->id }}" href="javascript:;"><i class="icon-shopping-cart"></i><span>{{ __('To Cart') }}</span></a>
                                                @else
                                                    <a class="product-button" href="{{ route('frontend.product', $item->slug) }}"><i class="icon-arrow-right"></i><span>{{ __('Details') }}</span></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    @if ($extra_settings->is_t2_3_column_banner_second == 1)
        <div class="bannner-section mt-50">
            <div class="container ">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ $banner_second['url1'] }}" class="genius-banner">
                            <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($banner_second['img1']) }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ $banner_second['url2'] }}" class="genius-banner">
                            <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($banner_second['img2']) }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ $banner_second['url3'] }}" class="genius-banner">
                            <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($banner_second['img3']) }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($extra_settings->is_t2_featured_product == 1)
        <section class="selected-product-section mt-50 theme2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title section-title2 section-title3">
                            <h2 class="h3">{{ __('Featured Products') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <div class="features-slider  owl-carousel">
                            @foreach ($products->orderBy('id', 'DESC')->get() as $item)
                                @if ($item->is_type == 'feature')
                                    <div class="slider-item">
                                        <div class="product-card ">
                                            <a class="product-thumb" href="{{ route('frontend.product', $item->slug) }}">
                                                @if (!$item->is_stock())
                                                    <div class="product-badge bg-secondary border-default text-body ">{{ __('out of stock') }}</div>
                                                @endif
                                                @if ($item->previous_price && $item->previous_price != 0)
                                                    <div class="product-badge product-badge2 bg-info">-{{ PriceHelper::DiscountPercentage($item) }}</div>
                                                @endif
                                                <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($item->thumbnail) }}" alt="Product">
                                            </a>
                                            <div class="product-card-inner">
                                                <div class="product-card-body">
                                                    <div class="product-category">
                                                        <a href="{{ route('frontend.catalog') . '?category=' . $item->category->slug }}">{{ $item->category->name }}</a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="{{ route('frontend.product', $item->slug) }}">
                                                            {{ strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name) }}
                                                        </a>
                                                    </h3>
                                                    <div class="rating-stars">
                                                        {!! renderStarRating($item->reviews->avg('rating')) !!}
                                                    </div>
                                                    <h4 class="product-price">
                                                        @if ($item->previous_price != 0)
                                                            <del>{{ PriceHelper::setPreviousPrice($item->previous_price) }}</del>
                                                        @endif
                                                        {{ PriceHelper::grandCurrencyPrice($item) }}
                                                    </h4>
                                                </div>
                                                <div class="product-button-group">
                                                    <a class="product-button wishlist_store" href="{{ route('user.wishlist.store', $item->id) }}"><i class="icon-heart"></i><span>{{ __('Wishlist') }}</span></a>
                                                    <a data-target="{{ route('frontend.compare.product', $item->id) }}" class="product-button product_compare" href="javascript:;"><i class="icon-repeat"></i><span>{{ __('Compare') }}</span></a>
                                                    @if ($item->is_stock())
                                                        <a class="product-button add_to_single_cart" data-target="{{ $item->id }}" href="javascript:;"><i class="icon-shopping-cart"></i><span>{{ __('To Cart') }}</span></a>
                                                    @else
                                                        <a class="product-button" href="{{ route('frontend.product', $item->slug) }}"><i class="icon-arrow-right"></i><span>{{ __('Details') }}</span></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    @if ($extra_settings->is_t2_bestseller_product == 1)
        <section class="selected-product-section mt-50  theme2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title section-title2  section-title3">
                            <h2 class="h3">{{ __('Best Seller') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="features-slider  owl-carousel">
                            @foreach ($products->orderBy('id', 'DESC')->get() as $item)
                                @if ($item->is_type == 'best')
                                    <div class="slider-item">
                                        <div class="product-card ">
                                            <a class="product-thumb" href="{{ route('frontend.product', $item->slug) }}">
                                                @if (!$item->is_stock())
                                                    <div class="product-badge bg-secondary border-default text-body ">{{ __('out of stock') }}</div>
                                                @endif
                                                @if ($item->previous_price && $item->previous_price != 0)
                                                    <div class="product-badge product-badge2 bg-info">-{{ PriceHelper::DiscountPercentage($item) }}</div>
                                                @endif
                                                <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($item->thumbnail) }}" alt="Product">
                                            </a>
                                            <div class="product-card-inner">
                                                <div class="product-card-body">
                                                    <div class="product-category">
                                                        <a href="{{ route('frontend.catalog') . '?category=' . $item->category->slug }}">{{ $item->category->name }}</a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="{{ route('frontend.product', $item->slug) }}">
                                                            {{ strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name) }}
                                                        </a>
                                                    </h3>
                                                    <div class="rating-stars">
                                                        {!! renderStarRating($item->reviews->avg('rating')) !!}
                                                    </div>
                                                    <h4 class="product-price">
                                                        @if ($item->previous_price != 0)
                                                            <del>{{ PriceHelper::setPreviousPrice($item->previous_price) }}</del>
                                                        @endif
                                                        {{ PriceHelper::grandCurrencyPrice($item) }}
                                                    </h4>
                                                </div>
                                                <div class="product-button-group">
                                                    <a class="product-button wishlist_store" href="{{ route('user.wishlist.store', $item->id) }}"><i class="icon-heart"></i><span>{{ __('Wishlist') }}</span></a>
                                                    <a data-target="{{ route('frontend.compare.product', $item->id) }}" class="product-button product_compare" href="javascript:;"><i class="icon-repeat"></i><span>{{ __('Compare') }}</span></a>
                                                    @if ($item->is_stock())
                                                        <a class="product-button add_to_single_cart" data-target="{{ $item->id }}" href="javascript:;"><i class="icon-shopping-cart"></i><span>{{ __('To Cart') }}</span></a>
                                                    @else
                                                        <a class="product-button" href="{{ route('frontend.product', $item->slug) }}"><i class="icon-arrow-right"></i><span>{{ __('Details') }}</span></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    @if ($extra_settings->is_t2_toprated_product == 1)
        <section class="selected-product-section mt-50  theme2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title section-title2  section-title3">
                            <h2 class="h3">{{ __('Top Rated') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="features-slider  owl-carousel">
                            @foreach ($products->orderBy('id', 'DESC')->get() as $item)
                                @if ($item->is_type == 'top')
                                    <div class="slider-item">
                                        <div class="product-card ">
                                            <a class="product-thumb" href="{{ route('frontend.product', $item->slug) }}">
                                                @if (!$item->is_stock())
                                                    <div class="product-badge bg-secondary border-default text-body ">{{ __('out of stock') }}</div>
                                                @endif
                                                @if ($item->previous_price && $item->previous_price != 0)
                                                    <div class="product-badge product-badge2 bg-info">-{{ PriceHelper::DiscountPercentage($item) }}</div>
                                                @endif
                                                <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($item->thumbnail) }}" alt="Product">
                                            </a>
                                            <div class="product-card-inner">
                                                <div class="product-card-body">
                                                    <div class="product-category">
                                                        <a href="{{ route('frontend.catalog') . '?category=' . $item->category->slug }}">{{ $item->category->name }}</a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="{{ route('frontend.product', $item->slug) }}">
                                                            {{ strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name) }}
                                                        </a>
                                                    </h3>
                                                    <div class="rating-stars">
                                                        {!! renderStarRating($item->reviews->avg('rating')) !!}
                                                    </div>
                                                    <h4 class="product-price">
                                                        @if ($item->previous_price != 0)
                                                            <del>{{ PriceHelper::setPreviousPrice($item->previous_price) }}</del>
                                                        @endif
                                                        {{ PriceHelper::grandCurrencyPrice($item) }}
                                                    </h4>
                                                </div>
                                                <div class="product-button-group">
                                                    <a class="product-button wishlist_store" href="{{ route('user.wishlist.store', $item->id) }}"><i class="icon-heart"></i><span>{{ __('Wishlist') }}</span></a>
                                                    <a data-target="{{ route('frontend.compare.product', $item->id) }}" class="product-button product_compare" href="javascript:;"><i class="icon-repeat"></i><span>{{ __('Compare') }}</span></a>
                                                    @if ($item->is_stock())
                                                        <a class="product-button add_to_single_cart" data-target="{{ $item->id }}" href="javascript:;"><i class="icon-shopping-cart"></i><span>{{ __('To Cart') }}</span></a>
                                                    @else
                                                        <a class="product-button" href="{{ route('frontend.product', $item->slug) }}"><i class="icon-arrow-right"></i><span>{{ __('Details') }}</span></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    @if ($extra_settings->is_t2_2_column_banner == 1)
        <div class="bannner-section mt-50">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ $banner_third['url1'] }}" class="genius-banner">
                            <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($banner_third['img1']) }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ $banner_third['url2'] }}" class="genius-banner">
                            <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($banner_third['img2']) }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($extra_settings->is_t2_blog_section == 1)
        <div class="blog-section-h page_section mt-50 mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title section-title2  section-title3">
                            <h2 class="h3">{{ __('Our Blog') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="home-blog-slider owl-carousel">
                            @foreach ($posts as $post)
                                <div class="slider-item">
                                    <div class="blog-post">
                                        <a class="post-thumb" href="{{ route('frontend.blog.details', $post->slug) }}">
                                            <img class="lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset(json_decode($post->photo, true)[array_key_first(json_decode($post->photo, true))]) }}" alt="Blog Post"></a>
                                        <div class="post-body">

                                            <h3 class="post-title">
                                                <a href="{{ route('frontend.blog.details', $post->slug) }}">{{ strlen(strip_tags($post->title)) > 55 ? substr(strip_tags($post->title), 0, 55) : strip_tags($post->title) }}</a>
                                            </h3>
                                            <ul class="post-meta">

                                                <li>
                                                    <i class="icon-user"></i><a href="javascript:;}">{{ __('Admin') }}</a>
                                                </li>
                                                <li>
                                                    <i class="icon-tag"></i><a href="{{ route('frontend.blog') . '?category=' . $post->category->slug }}">{{ $post->category->name }}</a>
                                                </li>
                                                <li>
                                                    <i class="icon-clock"></i><a href="javascript:;">{{ date('jS F, Y', strtotime($post->created_at)) }}</a>
                                                </li>
                                            </ul>
                                            <p>{{ strlen(strip_tags($post->details)) > 120 ? substr(strip_tags($post->details), 0, 120) : strip_tags($post->details) }}</p>
                                            <a class="btn btn-outline-primary btn-sm mt-4" href="{{ route('frontend.blog.details', $post->slug) }}">{{ __('Read more') }}<i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($extra_settings->is_t2_brand_section == 1)
        <section class="brand-section mb-60">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="section-title section-title2  section-title3">
                            <h2 class="h3">{{ __('Popular Brands') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brand-slider owl-carousel">
                            @foreach ($brands as $brand)
                                <div class="slider-item">
                                    <a class="text-center" href="{{ route('frontend.catalog') . '?brand=' . $brand->slug }}">
                                        <img class="d-block hi-50 lazy" src="{{ $setting->loader ? asset($setting->loader) : asset('frontend/images/ajax_loader.gif')}}" data-src="{{ asset($brand->photo) }}" alt="{{ $brand->name }}" title="{{ $brand->name }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
