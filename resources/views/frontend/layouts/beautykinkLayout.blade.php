<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta charset="utf-8">
    <title>{{ $setting->title }} -@yield('title')</title>
    <!-- SEO Meta Tags-->
    @yield('meta')
    <meta name="author" content="{{ $setting->title }}">
    <meta name="distribution" content="web">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Favicon Icons-->
    <link rel="icon" type="image/png" href="{{ asset($setting->favicon) }}">
    <link rel="apple-touch-icon" href="{{ asset($setting->favicon) }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset($setting->favicon) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($setting->favicon) }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset($setting->favicon) }}">

    <style>
      countr */
    </style>

    @yield('styleplugins')

    @if (App\Models\Language::where('is_default', 1)->first()->rtl == 1)
        {{-- <link rel="stylesheet" href="{{ asset('frontend/css/rtl.css') }}"> --}}
    @endif

    {{-- Google AdSense Start --}}
    @if ($setting->is_google_adsense == '1')
        {!! $setting->google_adsense !!}
    @endif
    {{-- Google AdSense End --}}

    {{-- Google AnalyTics Start --}}
    @if ($setting->is_google_analytics == '1')
        {!! $setting->google_analytics !!}
    @endif
    {{-- Google AnalyTics End --}}

    {{-- Facebook pixel  Start --}}
    @if ($setting->is_facebook_pixel == '1')
        {!! $setting->facebook_pixel !!}
    @endif
    {{-- Facebook pixel End --}}

    <!--== Bootstrap CSS ==-->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--== Ionicon CSS ==-->
    <link href="{{ asset('frontend/css/ionicons.min.css') }}" rel="stylesheet" />
    <!--== Simple Line Icon CSS ==-->
    <link href="{{ asset('frontend/css/simple-line-icons.css') }}" rel="stylesheet" />
    <!--== Line Icons CSS ==-->
    <link href="{{ asset('frontend/css/lineIcons.css') }}" rel="stylesheet" />
    <!--== Font Awesome Icon CSS ==-->
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!--== Animate CSS ==-->
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="{{ asset('frontend/css/swiper.min.css') }}" rel="stylesheet" />
    <!--== Range Slider CSS ==-->
    <link href="{{ asset('frontend/css/range-slider.css') }}" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="{{ asset('frontend/css/fancybox.min.css') }}" rel="stylesheet" />
    <!--== Slicknav Min CSS ==-->
    <link href="{{ asset('frontend/css/slicknav.css') }}" rel="stylesheet" />
    <!--== Owl Carousel Min CSS ==-->
    <link href="{{ asset('frontend/css/owlcarousel.min.css') }}" rel="stylesheet" />
    <!--== Owl Theme Min CSS ==-->
    <link href="{{ asset('frontend/css/owltheme.min.css') }}" rel="stylesheet" />
    <!--== Spacing CSS ==-->
    <link href="{{ asset('frontend/css/spacing.css') }}" rel="stylesheet" />

    <!--== Theme Font CSS ==-->
    <link href="{{ asset('frontend/css/theme-font.css') }}" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

            <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body>

    <!--wrapper start-->
    <div class="{{$home_classs ?? ''}}">

        <!--== Start Preloader Content ==-->

        @if ($setting->is_loader == 1)
            <!-- Preloader Start -->
            <div class="preloader-wrap">
                <div class="preloader">
                    <span class="dot"></span>
                    <div class="dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>

            {{-- <div id="preloader">
<img src="{{ asset($setting->loader) }}" alt="">
</div> --}}
            <!-- Preloader endif -->
        @endif
        <!--== End Preloader Content ==-->
        {{-- <div class="container-fluid marqueeslider"> <div class="ticker"> <div class="title"><h5>Breaking News</h5></div> <div class="news"> <marquee class="news-content"> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p> <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto </p> <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam </p> </marquee> </div> </div> </div> --}}
        <!--== Start Header Wrapper ==-->
        <header class="header-area header-default header-style2">
            <!--== Start Header Top  News==-->
            @if ($setting->is_banner)
                <div class="header-top-advert">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12 col-lg-12 text-lg-center text-center">
                                <p> {{ $setting->banner_text }} <a href="{{ $setting->banner_link }}"
                                        style="color:#fff; text-decoration:underline">See Details</a> <i
                                        class="fa fa-close top-close"></i>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
            <!--== End Header Top News==-->


            <!--== Start Header Top ==-->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 hidden-md-down">
                            <div class="contact-email">
                                <span>Email us: <a
                                        href="mailto:{{ $setting->contact_email }}">{{ $setting->contact_email }}</a></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 text-md-start text-lg-center text-center marqueeslider">
                            {{-- <marquee><p> FREE NATIONWIDE DELIVERY FOR ORDERS OVER N20000</p> </marquee> --}}
                        </div>
                        <div class="col-md-6 col-lg-4 text-md-end text-center mt-sm-15">
                            <div class="theme-setting">

                                @if (!Auth::user())
                                    {{-- <a class="track-order-link mr-0" href="{{ route('user.login') }}">
                                    {{ __('Login/Register') }}
                                    </a> --}}
                                    <a class="dropdown-btn" href="#" role="button">
                                        Login/Register
                                        <i class="ion-ios-arrow-down"></i>
                                    </a>
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="{{ route('user.login') }}">Login</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.register') }}">Register</a>
                                        </li>

                                    </ul>
                                @else
                                    <a class="dropdown-btn" href="#" role="button">
                                        {{ Auth::user()->first_name }}
                                        <i class="ion-ios-arrow-down"></i>
                                    </a>
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.logout') }}">{{ __('Logout') }}</a>
                                        </li>

                                    </ul>
                                @endif
                            </div>
                            <div class="theme-currency">
                                <a class="dropdown-btn" href="#" role="button">
                                    Currency
                                    <i class="ion-ios-arrow-down"></i>
                                </a>
                                <ul class="dropdown-content">
                                    <li>
                                        @foreach (App\Models\Currency::get() as $currency)
                                            <a class="{{ Session::get('currency') == $currency->id ? 'active' : ($currency->is_default == 1 && !Session::has('currency') ? 'active' : '') }}"
                                                href="{{ route('frontend.currency.setup', $currency->id) }}">{{ $currency->name }}</a>
                                        @endforeach
                                    </li>

                                </ul>
                            </div>
                            <div class="theme-language">
                                <a class="dropdown-btn" href="#" role="button">
                                    <img src="{{ asset('frontend/img/photos/language-01.jpg') }}"
                                        alt="Has-Image">English
                                    <i class="ion-ios-arrow-down"></i>
                                </a>
                                <ul class="dropdown-content">
                                    <li>
                                        <a href="#/"><img
                                                src="{{ asset('frontend/img/photos/language-01.jpg') }}"
                                                alt="Has-Image">English</a>
                                    </li>
                                    <li>
                                        <a href="#/"><img
                                                src="{{ asset('frontend/img/photos/language-02.jpg') }}"
                                                alt="Has-Image">Italiano</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Header Top ==-->

            <!--== Start Header Middle ==-->
            <div class="header-middle hidden-md-down">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col col-md-4 col-sm-12">
                            <div class="contact-link">
                                <div class="contact-info">
                                    <span class="phone">Call Us: <a
                                            href="tel:{{ $setting->footer_phone }}">{{ $setting->footer_phone }}</a></span>
                                    <div class="time-contact">7 Days a week from 9:00 am to 5:00 pm</div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-4 col-sm-12">
                            <div class="header-logo-area text-center">
                                <a href="{{ route('frontend.index') }}">
                                    <img class="logo-main" src="{{ asset($setting->logo) }}"
                                        alt="{{ $setting->title }}" />
                                    <img class="logo-light d-none" src="{{ asset($setting->logo) }}"
                                        alt="{{ $setting->title }}" />
                                </a>
                            </div>
                        </div>
                        <div class="col col-md-4 col-sm-12">
                            <div class="header-action-area float-end">
                                <div class="search-content-wrap">
                                    <button class="btn-search">
                                        <span class="icon icon-search icon-magnifier"></span>
                                    </button>
                                    <div class="btn-search-content">
                                        <form action="#" method="post">
                                            <div class="form-input-item">
                                                <input type="text" placeholder="Enter your search key ...">
                                                <button type="submit" class="btn-src">
                                                    <i class="icon-magnifier"></i>
                                                </button>
                                                <div class="search-categorie">
                                                    @php
                                                        $categories = App\Models\Category::with('subcategories')
                                                            ->whereStatus(1)
                                                            ->orderby('serial', 'asc')
                                                            ->take(8)
                                                            ->get();
                                                    @endphp
                                                    @if (count($categories) > 0)
                                                        <select class="form-select" name="poscats">
                                                            <option selected>All categories</option>
                                                            @foreach ($categories as $key => $pcategory)
                                                                <option value="{{ $pcategory->name }}">
                                                                    {{ $pcategory->name }}</option>
                                                                @if ($pcategory->subcategories->count() > 0)
                                                                    @foreach ($pcategory->subcategories as $subscategory)
                                                                        <option value="{{ $subscategory->name }}">-
                                                                            -{{ $subscategory->name }}</option>

                                                                        @if ($subscategory->childcategories->count() > 0)
                                                                            @foreach ($subscategory->childcategories as $childcategory)
                                                                                <option
                                                                                    value="{{ $childcategory->name }}">
                                                                                    - - -{{ $childcategory->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="shop-button-group">
                                    <div class="shop-button-item">
                                        <a class="shop-button" href="compare.html">
                                            <i class="icon-shuffle icon"></i>
                                            <sup class="shop-count">0</sup>
                                        </a>
                                    </div>
                                    <div class="shop-button-item">
                                        <a class="shop-button" href="wishlist.html">
                                            <i class="icon-heart icon"></i>
                                            <sup class="shop-count">0</sup>
                                        </a>
                                    </div>
                                    {{-- HEADER CART STARTS --}}
                                    @include('frontend._inc.header_cart')
                                    {{-- HEADER CART ENDS --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Header Middle ==-->

            <!--== Start Header Bottom ==-->
            <div class="header-bottom sticky-header hidden-md-down">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col col-12 position-relative">
                            <div class="header-align align-default justify-content-center">
                                <div class="header-navigation-area hidden-md-down">
                                    <ul class="main-menu nav">
                                        <li><a href="{{ route('frontend.index') }}">Home</a>

                                        </li>
                                        <li><a href="{{route('frontend.aboutus')}}">About Us</a></li>

                                        {{-- Categories drop-down-list --}}
                                        @include('frontend._inc.categories')

                                        {{-- Pages dynamic lists --}}
                                        @php
                                            $pages = DB::table('pages')->wherePos(0)->orwhere('pos', 2)->get();
                                        @endphp
                                            @if ($pages)
                                            <li class="has-submenu"><a href="#">Pages</a>
                                                <ul class="submenu-nav">
                                        @foreach ($pages as $page)
                                                {{-- <a class="{{ request()->url() == route('frontend.page', $page->slug) ? 'active' : '' }} " href="{{ route('frontend.page', $page->slug) }}"><i class="icon-chevron-right pr-2"></i>{{ $page->title }}</a> --}}
                                                <li class="{{ request()->url() == route('frontend.page', $page->slug) ? 'active' : '' }}"><a href="{{ route('frontend.page', $page->slug) }}">{{ $page->title }}</a></li>

                                         @endforeach
                                                </ul> 
                                                 
                                              </li>
                                           
                                            @endif
                                           </li>
                                        @if ($setting->is_shop == 1)
                                            <li class="{{ request()->routeIs('frontend.catalog*') ? 'active' : '' }}">
                                                <a href="{{ route('frontend.catalog') }}">{{ __('Shop') }}</a>
                                            </li>
                                        @endif

                                        @if ($setting->is_contact == 1)
                                            <li class="{{ request()->routeIs('frontend.contact') ? 'active' : '' }}">
                                                <a href="{{ route('frontend.contact') }}">{{ __('Contact') }}</a>
                                            </li>
                                        @endif
                                        
                                         
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Header Bottom ==-->

            <!--== Start Responsive Header ==-->
            <div class="responsive-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <div class="header-item">
                                <button class="btn-menu" type="button"><i class="icon-menu"></i></button>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="header-item justify-content-center">
                                <div class="header-logo-area">
                                    <a href="{{ route('frontend.index') }}">
                                        <img class="logo-main" src="{{ asset($setting->logo) }}"
                                            alt="{{ $setting->title }}" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- mobile- view stats starts --}}
                        <div class="col-4">


                            @if (!Auth::user())
                                <div class="header-item justify-content-end">
                                    <button class="btn-user"
                                        onclick="window.location.href='{{ route('user.login') }}'"><i
                                            class="icon-user"></i></button>
                                    <button class="btn-cart"
                                        onclick="window.location.href='{{ route('frontend.checkout.billing') }}'"><i
                                            class="icon-bag"></i> <span
                                            class="item-count cart-count">0</span></button>
                                </div>
                                
                            @else
                                <a class="dropdown-btn" href="#" role="button">
                                    {{ Auth::user()->first_name }}
                                    <i class="ion-ios-arrow-down"></i>
                                </a>
                                <ul class="dropdown-content">
                                    <li>
                                        <a href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.logout') }}">{{ __('Logout') }}</a>
                                    </li>

                                </ul>
                            @endif
                        </div>
                        {{-- mobile- view stats ends --}}
                        <div class="col-12">
                            <div class="responsive-search-content">
                        <!-- <form action="#">
                        <div class="form-input-item">
                        <input type="text"  placeholder="Enter your search key ...">
                        <button type="submit" class="btn-src">
                        <i class="icon-magnifier"></i>
                        </button>
                        <div class="search-categorie">
                        <select class="form-select" name="poscats">
                        <option selected>All categories</option>
                        <option value="1">Beauty &amp; Health</option>
                        <option value="2">- - Makeup</option>
                        <option value="3">- - - - Eyes</option>
                        <option value="4">- - - - Lips</option>
                        <option value="5">- - - - Face</option>
                        <option value="6">- - - - Makeup Tools</option>
                        <option value="7"> - - Skin Care</option>
                        <option value="8">- - - - Face</option>
                        <option value="9">- - - - Eyes</option>
                        <option value="10">- - - - Body</option>
                        <option value="11">- - - - Skin Care Tools</option>
                        <option value="12">- - Health Care</option>
                        <option value="13">- - - - Massage &amp; Relaxation</option>
                        <option value="14">- - - - Household Health Monitors</option>
                        <option value="15">- - - - Chinese Medicine</option>
                        <option value="16">- - - - Personal Health Care Items</option>
                        <option value="17">- - Nail Art &amp; Tools</option>
                        <option value="18">- - - - Gel Nail Polish</option>
                        <option value="19">- - - - Nail Drills</option>
                        <option value="20">- - - - Nail Dryers</option>
                        <option value="21">- - - - Nail Glitter</option>
                        </select>
                        </div>
                        </div>
                        </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Responsive Header ==-->
        </header>
        <!--== End Header Wrapper ==-->
        <main class="main-content">
            @yield('content')
        </main>

        <!--    announcement banner section start   -->
        {{-- <a class="announcement-banner" href="#announcement-modal"></a>
        <div id="announcement-modal" class="mfp-hide white-popup">
            <a href="{{ $setting->announcement_link }}">
                <img src="{{ asset($setting->announcement) }}" alt="">
            </a>
        </div> --}}

        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Launch static backdrop modal
          </button> --}}

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-body">
                        <img src="{{ asset($setting->announcement) }}" alt="">
                    </div>

                </div>
            </div>
        </div>

        <!--== Start Footer Area Wrapper ==-->
        <footer class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!--== Start Footer Widget Area ==-->
                        <div class="footer-widget-area pb-30">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="widget-item">
                                        <div class="about-widget">
                                            <div class="inner-content">
                                                <div class="footer-logo">
                                                    <a href="{{ route('frontend.index') }}">
                                                        <img class="logo-light"
                                                            src="{{ asset('frontend/img/logo-light.png') }}"
                                                            alt="Logo" />
                                                    </a>
                                                </div>
                                                <p>{{ __('Address') }}: {{ $setting->footer_address }}</p>
                                            </div>
                                            <div class="widget-desc">
                                                <p>
                                                    {{ $setting->about_us }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="widget-item">
                                        <div class="widget-menu-wrap">
                                            <ul class="nav-menu">
                                                <li><a href="#/">Delivery</a></li>
                                                <li><a href="#/">Legal Notice</a></li>
                                                <li><a href="{{route('frontend.aboutus')}}">About us</a></li>
                                                <li><a href="#/">Secure payment</a></li>
                                                <li><a href="{{route('frontend.contact')}}">Contact us</a></li>
                                                <li><a href="#/">Sitemap</a></li>
                                                <li><a href="{{ route('backend.login') }}">Login</a></li>
                                                <li><a href="{{ route('user.login') }}">My account</a></li>
                                                <li><a href="shop.html">Stores</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--== End Footer Widget Area ==-->
                    </div>
                </div>
            </div>
            <!--== Start Footer Bottom Area ==-->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="copyright">{{ $setting->copy_right }} <i class="fa fa-heart-o"></i> by <a
                                    target="_blank" href="https://www.ielemson.com">Hash360</a></p>
                        </div>
                        <div class="col-lg-6">
                            <div class="payment">
                                <img src="{{ asset('frontend/img/photos/payment.png') }}" alt="Payment">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Footer Bottom Area ==-->
        </footer>
        <!--== End Footer Area Wrapper ==-->

        <!--== Scroll Top Button ==-->
        <div id="scroll-to-top" class="scroll-to-top"><span class="ion-md-arrow-up"></span></div>

        <!--== Start Side Menu ==-->
        <aside class="off-canvas-wrapper">
            <div class="off-canvas-inner">
                <div class="off-canvas-overlay"></div>
                <!-- Start Off Canvas Content Wrapper -->
                <div class="off-canvas-content">
                    <!-- Off Canvas Header -->
                    <div class="off-canvas-header">
                        <div class="close-action">
                            <button class="btn-menu-close">menus<i class="icon-arrow-left"></i></button>
                        </div>
                    </div>

                    <div class="off-canvas-item">
                        <!-- Start Mobile Menu Wrapper -->
                        <div class="res-mobile-menu menu-active-one">
                            <!-- Note Content Auto Generate By Jquery From Main Menu -->
                        </div>
                        <!-- End Mobile Menu Wrapper -->
                    </div>
                </div>
                <!-- End Off Canvas Content Wrapper -->
            </div>
        </aside>
        <!--== End Side Menu ==-->

        <!--== End Popup Product  ==-->
    </div>

    <!--=======================Javascript============================-->



    {{-- <script>
var mainbs = {!! $mainbs !!};
</script> --}}
    <!--=== Modernizr Min Js ===-->
    <script src="{{ asset('frontend/js/modernizr.js') }}"></script>
    <!--=== jQuery Min Js ===-->
    <script src="{{ asset('frontend/js/jquery-main.js') }}"></script>
    <!--=== jQuery Migration Min Js ===-->
    <script src="{{ asset('frontend/js/jquery-migrate.js') }}"></script>
    <!--=== Popper Min Js ===-->
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!--=== jQuery Appear Js ===-->
    <script src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
    <!--=== jQuery Swiper Min Js ===-->
    <script src="{{ asset('frontend/js/swiper.min.js') }}"></script>
    <!--=== jQuery Fancy Box Min Js ===-->
    <script src="{{ asset('frontend/js/fancybox.min.js') }}"></script>
    <!--=== jQuery Slick Nav Js ===-->
    <script src="{{ asset('frontend/js/slicknav.js') }}"></script>
    <!--=== jQuery Waypoints Js ===-->
    <script src="{{ asset('frontend/js/waypoints.js') }}"></script>
    <!--=== jQuery Owl Carousel Min Js ===-->
    <script src="{{ asset('frontend/js/owlcarousel.min.js') }}"></script>
    <!--=== jQuery Match Height Min Js ===-->
    <script src="{{ asset('frontend/js/jquery-match-height.min.js') }}"></script>
    <!--=== jQuery Zoom Min Js ===-->
    <script src="{{ asset('frontend/js/jquery-zoom.min.js') }}"></script>
    <!--=== Countdown Js ===-->
    <script src="{{ asset('frontend/js/countdown.js') }}"></script>
   

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous"></script>

  <!--=== Custom Js ===-->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/cart.js') }}"></script>
 
    @yield('script')

    @if ($setting->is_facebook_messenger == '1')
        {!! $setting->facebook_messenger !!}
    @endif

    <script type="text/javascript">
        let mainurl = '{{ route('frontend.index') }}';

        let view_extra_index = 0;
    

                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                })

        function SuccessNotification(title) {
           Toast.fire({
                         icon: 'success',
                        title: `${title}`,
                    })
        }

        function DangerNotification(title) {
            Toast.fire({
                        icon: 'danger',
                        title: `${title}`,
                    })
        }
        // Notifications Ends
    </script>

    @if (Session::has('error'))
        <script>
            $(document).ready(function() {
                DangerNotification('{{ Session::get('error') }}')
            })
        </script>
    @endif
    @if (Session::has('success'))
        <script>
            $(document).ready(function() {
                SuccessNotification('{{ Session::get('success') }}');
            })
        </script>
    @endif


</body>

</html>
