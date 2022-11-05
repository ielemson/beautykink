@extends('frontend.layouts.beautykinkLayout')
@section('meta')
    <meta name="keywords" content="{{ $setting->meta_keywords }}">
    <meta name="description" content="{{ $setting->meta_description }}">
@endsection
@section('title')
    {{ __('Products') }}
@endsection

@section('content')

   <!-- Page Title-->
   @include('frontend._inc.header_single_page',['title_1'=>'','title_2'=>'Shop'])
   <!-- Page Content-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
       <div class="container-fluid pb-80">
         <div class="row">
           @include('frontend.catalog.catalog')
          </div>
       </div>
     </section>
     <!--== End Product Area Wrapper ==-->
      


@endsection

