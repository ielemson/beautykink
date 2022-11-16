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
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon Icons-->
    <link rel="icon" type="image/png" href="{{ asset($setting->favicon) }}">
    <link rel="apple-touch-icon" href="{{ asset($setting->favicon) }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset($setting->favicon) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($setting->favicon) }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset($setting->favicon) }}">

    <style>
/* Custom Mobile menu :::::::::::::::::::::::::::: */
.mobile-nav {
  /* background: #fff; */
  background: #f5f6f9;
  /* background: hsl(0, 0%, 98%); */
  position: fixed;
  bottom: 0;
  height: 55px;
  width: 100%;
  display: flex;
  justify-content: space-around;
  z-index: 999;
}
.bloc-icon {
  display: flex;
  justify-content: center;
  align-items: center;
}
.bloc-icon img {
  width: 30px;
}
@media screen and (min-width: 600px) {
  .mobile-nav {
  display: none;
  }
}
.mobile-nav a i {
    color: #232323;
    font-size: 35px;
    font-weight: 600;
    /* margin-bottom: 18px; */
    /* transition: all 0.3s ease-out;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out; */
}
/* Custom Mobile menu :::::::::::::::::::::::::::: */

.social-btn #social-links {
        margin: 0 auto;
        max-width: 40%;
    }

    #social-links ul {
        margin-bottom: 0px;
    }

    .social-btn #social-links ul li {
        display: inline-block;
    }

    

     #social-links {
        display: inline-table;
    }

     #social-links ul li {
        display: inline;
    }

     #social-links ul li a {
        /* padding: 5px; */
        /* border: 1px solid #8b8484; */
        margin: 1px;
        /* font-size: 1rem; */
        /* color: #000; */
        /* margin-right: 10px; */
    }
</style>


@if ($setting->is_announcement == 1)
<style>  .modal-header{
    background:transparent !important;
    border-bottom:0 !important;
    }
    .modal-content{
    background:transparent !important;
    border:0 !important;
    }
    .modal-header .btn-close{
    background-color: #cc0066 !important;
    color: #f5f6f9;
    }
</style>
@endif
    @yield('styleplugins')

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
    <link href="{{ asset('backend/css/plugins/fontawesome/css/all.min.css') }}" rel="stylesheet" />
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
    <!--== JQUERY ALERT THEME CSS ==-->
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-confirm.min.css') }}">


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
    <div class="{{ $home_classs ?? '' }}">

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
        @endif
        
        @include('frontend._inc.header')
        <!--== End Header Wrapper ==-->
        <main class="main-content">
            @yield('content')

            @if ($setting->is_announcement == 1)
            <div class="modal fade" id="announcementModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="announcementModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <a href="{{$setting->announcement_link}}" target="_blank" rel="noopener noreferrer">
                            <img class="img-fluid" src="{{asset($setting->announcement)}}">
                        </a>
                    </div>
                  
                  </div>
                </div>
              </div>
            @endif
        </main>

        <!--== Start Footer Area Wrapper ==-->
        @include('frontend._inc.footer')
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
    @php
        $mainbs = [];
        $mainbs['is_announcement'] = $setting->is_announcement;
        $mainbs['announcement_delay'] = $setting->announcement_delay;
        $mainbs['overlay'] = $setting->overlay;
        $mainbs = json_encode($mainbs);
    @endphp

    <script>
        var mainbs = {!! $mainbs !!};
        console.log(mainbs['announcement_delay'])
    </script>
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
    <script src="{{ asset('frontend/js/cart.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="{{ asset('js/share.js') }}"></script>
   @yield('extra_script')
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

        @if ($setting->is_announcement == 1)
            <script>
            $(document).ready(function(){
            setTimeout(function() {
            $('#announcementModal').modal('show');
            },mainbs['announcement_delay']);
            })
            </script>
        @endif
</body>

</html>
