@extends('frontend.layouts.beautykinkLayout')

@section('title')
    {{__('Page')}}
@endsection

@section('content')
    <!-- Page Title-->
    @include('frontend._inc.header_single_page',['title_1'=>'Pages','title_2'=>$page->title])
<!-- Page Content-->

 <!--== Start Blog Area Wrapper ==-->
 {{-- <section class="blog-area blog-single-area">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-12 order-1">
          <div class="row">
            <div class="col-12">
              <!--== Start Blog Item ==-->
              <div class="post-single-item">
               
                <div class="content">
                  
                  <h2 class="title">{{$page->title}}</h2>
                  {!! $page->details !!}
                </div>
                
              </div>
              <!--== End Blog Item ==-->
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </section> --}}
  <section class="blog-area blog-single-area">
    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col-lg-4 order-1 order-lg-1">
                <!--== Start Sidebar Area ==-->
                <div class="sidebar-area inner-left-padding">
                    <div class="widget-item">
                        <div class="widget-title">
                            <h3 class="title">More Pages</h3>
                        </div>
                        <div class="widget-body">
                            <div class="widget-categories">
                                <ul>
                              @foreach (DB::table('pages')
                              ->wherePos(0)
                              ->orwhere('pos', 2)
                              ->get() as $customPage)
                                <li class="{{ request()->url() == route('frontend.page', $customPage->slug) ? 'active' : '' }}"><a href="{{ route('frontend.page', $customPage->slug) }}">
                                    {{ $customPage->title }}
                                <span class="fa fa-angle-double-right"></span></a></li>
                              @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!--== End Sidebar Area ==-->
            </div> --}}
            <div class="col-lg-8 mx-auto order-0 order-lg-2">
                <div class="row">
                    <div class="col-12">
                        <!--== Start Blog Item ==-->
                        <div class="post-single-item">
                            <div class="content">
                                <h2 class="title">{{$page->title}}</h2>
                                {!! $page->details !!}
                            </div>
                        </div>
                        <!--== End Blog Item ==-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <!--== End Blog Area Wrapper ==-->

    <!--== Start Contact Info Area Wrapper ==-->
    @include('frontend._inc.divider',[])
    <!--== End Contact Info Area Wrapper ==-->
@endsection
