@extends('frontend.layouts.beautykinkLayout',['home_classs'=>'wrapper about-inner-wrapper'])
@section('meta')
    <meta name="keywords" content="{{ $setting->meta_keywords }}">
    <meta name="description" content="{{ $setting->meta_description }}">
@endsection
@section('title')
    {{ __('About Us') }}
@endsection

@section('content')
@include('frontend._inc.header_single_page',['title_1'=>'','title_2'=>'About  Us'])

  <!--== Start About Area Wrapper ==-->
  <section class="about-area about-page-area">
    <div class="container-fluid">
      <div class="row about-page-wrap">
        <div class="col-md-6">
          <div class="about-content">
            <h3 class="title">About Us</h3>
            <p>{{$setting->about_us}}</p>
            
            <a class="btn-theme" href="{{route('frontend.contact')}}">Contact Us</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="about-thumb">
            <img src="{{$setting->about_us_img}}" alt="about us" class="img">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End About Area Wrapper ==-->

  <!--== Start Feature Area Wrapper ==-->
  <div class="feature-area feature-about-area position-relative z-index-1">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="feature-icon-box-style2">
            <div class="inner-content">
              <div class="icon-box">
                <img src="{{asset('frontend/img/icons/f01.png')}}" alt="Image-HasTech" class="icon-img">
              </div>
              <div class="content">
                <h5 class="title">Free Shipping</h5>
                <p>Provide free home delivery <br>for all product over $100</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="feature-icon-box-style2">
            <div class="inner-content">
              <div class="icon-box">
                <img src="{{asset('frontend/img/icons/f02.png')}}" alt="support" class="icon-img">
              </div>
              <div class="content">
                <h5 class="title">Online Support</h5>
                <p>To satisfy our customer we <br>try to give support online</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="feature-icon-box-style2">
            <div class="inner-content">
              <div class="icon-box">
                <img src="{{asset('frontend/img/icons/f03.png')}}" alt="payment" class="icon-img">
              </div>
              <div class="content">
                <h5 class="title">Secure Payment</h5>
                <p>We ensure our product Good <br>quality all times</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="shape-group">
      <div class="shape-img1">
        <img src="{{asset('frontend/img/shape/01.png')}}" alt="Image">
      </div>
      <div class="shape-img2">
        <img src="{{asset('frontend/img/shape/02.png')}}" alt="Image">
      </div>
    </div>
  </div>
  <!--== End Feature Area Wrapper ==-->
@endsection
