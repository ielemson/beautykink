 <!--== Start Page Header Area Wrapper ==-->
 <div class="page-header-area bg-img" data-bg-img="{{asset('uploads/banners/banner.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <div class="page-header-content">
            <nav class="breadcrumb-area">
              <ul class="breadcrumb">
                <li><a href="{{route('frontend.index')}}">Home</a></li>
               @if ($title_1 != '')
               <li class="breadcrumb-sep"><i class="fa fa-angle-right"></i></li>
               <li><a href="#">{{$title_1 ?? ''}}</a></li>
               @endif
                <li class="breadcrumb-sep"><i class="fa fa-angle-right"></i></li>
                <li>{{ $title_2 ??'' }}</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--== End Page Header Area Wrapper ==-->
