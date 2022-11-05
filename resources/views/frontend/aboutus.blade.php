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

  

 @if ($about)
    <!--== Start About Area Wrapper ==-->
  <section class="about-area about-page-area">
    <div class="container-fluid">
      <div class="row about-page-wrap">
        <div class="col-md-12">
          <div class="about-content">
            <h3 class="title">{{$about->title}}</h3>
            <p>{!!$about->details!!}</p>
            {{-- <a class="btn-theme" href="{{route('frontend.contact')}}">Contact Us</a> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End About Area Wrapper ==-->
  @include('frontend._inc.divider')
  <!--== End Feature Area Wrapper ==-->
 @else
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
 @endif

@endsection
