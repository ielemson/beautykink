<div class="feature-area feature-about-area position-relative z-index-1 mt-20">
    <div class="container-fluid p-5">
      <div class="row">
        @foreach ($services as $service)
        <div class="col-md-6 col-lg-3">
          <div class="feature-icon-box-style2">
            <a href="{{ $service->link}}"> <div class="inner-content">
              <div class="icon-box">
                <img src="{{ asset($service->photo) }}" alt="{{ $service->title }}" class="icon-img">
              </div>
              <div class="content">
                <h5 class="title">{{ $service->title }}</h5>
                <p>{{ $service->details }}</p>
              </div>
            </div></a>
           
          </div>
        </div>
       @endforeach
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
