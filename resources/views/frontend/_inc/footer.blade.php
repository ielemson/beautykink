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
                                                <img class="logo-light" src="{{ $setting->footer_img ? asset($setting->footer_img) : asset('backend/images/placeholder.png') }}"
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

                                        {{-- <li><a href="#/">Privacy Policy</a></li>
                                        <li><a href="#/">Legal Notice</a></li>
                                        <li><a href="{{ route('frontend.aboutus') }}">About us</a></li>
                                        <li><a href="#/">Secure payment</a></li>
                                        <li><a href="{{ route('frontend.contact') }}">Contact us</a></li>
                                        <li><a href="#/">Sitemap</a></li>
                                        <li><a href="{{ route('backend.login') }}">Login</a></li>
                                        <li><a href="{{ route('user.login') }}">My account</a></li>
                                        <li><a href="shop.html">Stores</a></li> --}}
                                        {{-- <a  href="{{ route('frontend.page', $page->slug) }}">{{ $page->title }}</a> --}}
                                        @foreach(DB::table('pages')
                                        ->wherePos(1)->get() as $page)
                                        <li><a href="{{ route('frontend.page', $page->slug) }}">{{ $page->title }}</a></li>
                                        @endforeach
                                        {{-- <li><a href="{{ route('backend.login') }}">Login</a></li> --}}
                                        {{-- <li><a href="{{ route('user.login') }}">My account</a></li> --}}
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
                    <p class="copyright"> {{ $setting->copy_right }} <i class="fa fa-heart-o"></i> by <a target="_blank"
                            href="https://www.ielemson.com">Hash360</a></p>
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

{{-- Mobile Menu Bottom --}}
<nav class="mobile-nav">
    <a href="{{ route('frontend.index') }}" class="bloc-icon">
        <i class="icon-home icon"></i>
    </a>
    @if (!Auth::user())
        {{-- <a href="{{ route('frontend.checkout.billing') }}" class="btn-cart bloc-icon"><b><i
                    class="icon-user"></i></b> </a> --}}
                    <a href="{{ route('user.login') }}" class="btn-cart bloc-icon"><i class="icon-user icon"></i>
                        <span class=""></span></a>
    @else
        <a href="{{ route('user.dashboard') }}" class="btn-cart bloc-icon"><b><i class="icon-speedometer"></i></b>
        </a>
    @endif

    <a href="{{ route('frontend.checkout.billing') }}" class="btn-cart bloc-icon"><i class="icon-bag icon"></i>
        <span class="item-count cart-count">0</span></a>

    <a href="{{ route('frontend.checkout.billing') }}" class="btn-cart bloc-icon"><i class="icon-heart icon"></i>
        <span class="wishlist_count">0</span></a>

    <a href="{{ route('frontend.compare') }}" class="btn-cart bloc-icon"><i
            class="icon-shuffle icon"></i> <span class="compare_count">0</span></a>
</nav>
