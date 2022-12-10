@extends('frontend.layouts.beautykinkLayout', ['home_classs' => 'wrapper product-inner-wrapper'])
@section('meta')
    <meta name="keywords" content="{{ $setting->meta_keywords }}">
    <meta name="description" content="{{ $setting->meta_description }}">
@endsection
@section('title')
    {{ __('Products') }}
@endsection

@section('content')
@php
function renderStarRating($rating, $maxRating = 5)
{
    // <i class="ion-md-star"></i>
    //           <i class="ion-md-star"></i>
    //           <i class="ion-md-star"></i>
    //           <i class="ion-md-star"></i>
    //           <i class="ion-md-star icon-color-gray"></i>
    $fullStar = "<i class='ion-md-star'></i>";
    $halfStar = "<i class='ion-md-star icon-color-gray'></i>";
    $emptyStar = "<i class='ion-md-star icon-color-gray'></i>";
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

@if ($category)
@php
  $catePhoto = $category->photo;
@endphp
@isset($category->photo)
<section class="product-area">
<div class="row">
  <div class="col-md-10 mx-auto mt-10">
     <div class="page-header-area jumbotron-image bg-img" data-bg-img="{{asset($category->photo)}}">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <div class="page-header-content">
           
          </div>
        </div>
      </div>
    </div>
  </div>
  <h6 class="title mt-20 text-center">{{$category->description}}</h6>
  </div>
</div> 

@endisset
@else
@php
  $catePhoto = null
@endphp
@endif

  <div class="container pb-55 {{$catePhoto ? '':'mt-60'}} ">
    <div class="row">
      <div class="col-md-12 text-center">
        
      </div>
      <div class="col-lg-3 order-1 order-lg-1">

        <!--== Start Sidebar Area ==-->
        <div class="shop-sidebar-wrapper">
          <!--== Start Sidebar Item ==-->
          <div class="sidebar-item">
            <h4 class="sidebar-title"><a href="shop-left-sidebar.html">Shop List Sidebar</a></h4>
            <div class="sidebar-body">
              <div class="category-sub-menu">
                <ul>
                  <li>
                    @foreach ($categories as $key => $pcategory)
                    <a href="{{ route('frontend.category.view',$pcategory->slug)}}">{{ Str::ucfirst($pcategory->name )}}</a>
                    <span class="collapse-icons collapsed" data-bs-toggle="collapse" data-bs-target="#sub-menu" role="button" aria-expanded="false">
                      <i></i>
                    </span>
                    @if ($pcategory->subcategories->count() > 0)
                    @foreach ($pcategory->subcategories as $subscategory)
                    <ul class="collapse" id="sub-menu">
                      <li><a href="{{ route('frontend.subcategory.view',$subscategory->slug)}}">{{Str::ucfirst($subscategory->name)}}</a></li>
                    </ul>
                    @endforeach
                    @endif
                    @endforeach
                  </li>
                 
                </ul>
              </div>
            </div>
            <h4 class="sidebar-title mb-45">Filter By</h4>
          </div>
          <!--== End Sidebar Item ==-->

          <!--== Start Sidebar Item ==-->
          <div class="sidebar-item mb-40">
            <h4 class="small-title">Categories</h4>
            <div class="sidebar-body">
              @foreach ($categories as $key => $pcategory)
                <div class="list-item">
                  <input class="form-check-input" type="checkbox" value="1" id="list1">
                  <label class="form-check-label" for="list1">{{ Str::ucfirst($pcategory->name )}} ({{$pcategory->items->count()}})</label>
                </div>
               @endforeach
            </div>
          </div>
          <!--== End Sidebar Item ==-->

        </div>
        <!--== End Sidebar Area ==-->
      </div>
      <div class="col-lg-9 order-0 order-lg-2">
        <!--== Start Shop Area ==-->
        <div class="product-header-wrap">
          <div class="row">
            <div class="col-4 col-sm-4 col-md-6">
              <ul class="nav product-tab-nav" id="pills-tab" role="tablist">
                <li role="presentation">
                  <a id="grid-tab" data-bs-toggle="pill" href="#grid" role="tab" aria-controls="grid" aria-selected="false"><i class="fa fa-th"></i></a>
                </li>
                <li role="presentation">
                  <a class="active"  id="list-care-tab" data-bs-toggle="pill" href="#list-care" role="tab" aria-controls="list-care" aria-selected="true"><i class="fa fa-list"></i></a>
                </li>
              </ul>
              <div class="total-products">
                <p class="hidden-sm-down"> @if ($items->count() > 1)
                  There are {{$items->count()}} products
                  @endif
                  There is {{$items->count()}} product
              </p>
              </div>
            </div>
            <div class="col-8 col-sm-8 col-md-6">
              <div class="row">
                <div class="col-sm-3">
                  <div class="sort-by-text">
                    Sort By:
                  </div>
                </div>
                <div class="col-sm-9">
                  <div class="sort-by-form">
                    <select class="form-select" aria-label="Relevance">
                      <option selected>Relevance</option>
                      <option value="1">Name, A to Z</option>
                      <option value="2">Name, Z to A</option>
                      <option value="3">Price, low to high</option>
                      <option value="4">Price, high to low</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="product-body-wrap">
          <div class="tab-content product-tab-content" id="pills-tabContent">
           @if ($items->count() > 0)
              {{-- GRID TAB STARTS --}}
            <div class="tab-pane fade" id="grid" role="tabpanel" aria-labelledby="grid-tab">
              <div class="row">
                
                @include('frontend.catalog.grid')
              
              </div>
            </div>
            {{-- GRID TAB ENDS --}}
            <div class="tab-pane fade show active" id="list-care" role="tabpanel" aria-labelledby="list-care-tab">
              <div class="row">
               @include('frontend.catalog.list')
               
            </div>
          </div>
           @else
           
           {{-- <a class="btn-theme mx-auto" href="{{route('frontend.catalog')}}">
            No product found for this category
          </a> --}}
          No product found for this category
           @endif
          <div class="row">
            <div class="col-12">
              <div class="pagination-content-wrap">
                <nav class="pagination-nav">
                  {{-- <ul class="pagination justify-content-center">
                    <li><a class="active" href="#/">1</a></li>
                    <li><a href="#/">2</a></li>
                    <li><a href="#/"><i class="icon-arrow-right"></i></a></li>
                  </ul> --}}
                  {{ $items->links() }}
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!--== End Shop Area ==-->
      </div>
    </div>
  </div>
</section>
@endsection


