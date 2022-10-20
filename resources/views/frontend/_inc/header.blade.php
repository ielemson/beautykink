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
                            <img src="{{ asset('frontend/img/photos/language-01.jpg') }}" alt="Has-Image">English
                            <i class="ion-ios-arrow-down"></i>
                        </a>
                        <ul class="dropdown-content">
                            <li>
                                <a href="#/"><img src="{{ asset('frontend/img/photos/language-01.jpg') }}"
                                        alt="Has-Image">English</a>
                            </li>
                            <li>
                                <a href="#/"><img src="{{ asset('frontend/img/photos/language-02.jpg') }}"
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
                            <img class="logo-main" src="{{ asset($setting->logo) }}" alt="{{ $setting->title }}" />
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
                                <form class="input-group" action="{{ route('frontend.catalog') }}" method="get">
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
                                                                        <option value="{{ $childcategory->name }}">
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
                                <li><a href="{{ route('frontend.aboutus') }}">About Us</a></li>

                                {{-- Categories drop-down-list --}}
                                @include('frontend._inc.categories')

                                {{-- Pages dynamic lists --}}
                               @if ($setting->is_pages == 1)
                                    @php
                                    $pages = DB::table('pages')
                                        ->wherePos(0)
                                        ->orwhere('pos', 2)
                                        ->get();
                                @endphp
                                @if ($pages)
                                    <li class="has-submenu"><a href="#">Pages</a>
                                        <ul class="submenu-nav">
                                            @foreach ($pages as $page)
                                                {{-- <a class="{{ request()->url() == route('frontend.page', $page->slug) ? 'active' : '' }} " href="{{ route('frontend.page', $page->slug) }}"><i class="icon-chevron-right pr-2"></i>{{ $page->title }}</a> --}}
                                                <li
                                                    class="{{ request()->url() == route('frontend.page', $page->slug) ? 'active' : '' }}">
                                                    <a
                                                        href="{{ route('frontend.page', $page->slug) }}">{{ $page->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </li>
                                @endif
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
                {{-- <div class="col-4">


@if (!Auth::user())
<div class="header-item justify-content-end">
<button class="btn-user" onclick="window.location.href='{{ route('user.login') }}'"><i
class="icon-user"></i></button>
<button class="btn-cart"
onclick="window.location.href='{{ route('frontend.checkout.billing') }}'"><i
class="icon-bag"></i> <span class="item-count cart-count">0</span></button>
</div>
@else

<div class="header-item justify-content-end">
<button class="btn-user" onclick="window.location.href='{{ route('user.dashboard') }}'"><i
class="icon-speedometer"></i></button>
<button class="btn-cart"
onclick="window.location.href='{{ route('frontend.checkout.billing') }}'"><i
class="icon-bag"></i> <span class="item-count cart-count">0</span></button>
</div>
@endif
</div> --}}
                {{-- mobile- view stats ends --}}
                <div class="col-12 mt-10">
                    <div class="responsive-search-content">
                        <form class="input-group" action="{{ route('frontend.catalog') }}" method="get">
                            <div class="form-input-item">
                                <input type="text" name="search" class="form-control" placeholder="Search by product name ...">
                                <button type="submit" class="btn-src">
                                    <i class="icon-magnifier"></i>
                                </button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Responsive Header ==-->
</header>
