<section class="home-slider-area">
    <div
        class="swiper-container swiper-pagination-style dots-bg-light home-slider-container default-slider-container">
        <div class="swiper-wrapper home-slider-wrapper slider-default">
            @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    <div class="slider-content-area" data-bg-img="{{ asset($slider->photo) }}">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-10 col-sm-6 col-md-5">
                                    <div class="slider-content slider-content-light animate-pulse">
                                        <h5 class="sub-title transition-slide-0">{{ $slider->title }}</h5>
                                        <h2 class="title transition-slide-1 mb-0"><span
                                                class="font-weight-400 transition-slide-2">{{ $slider->details }}</span></h2>
                                        {{-- <h2 class="title ">WITH BEAUTYKINK</h2> --}}
                                      @if ($slider->link)
                                      <a class="btn-slide transition-slide-3" href="{{ $slider->link }}">Shop
                                        Now
                                    </a>
                                      @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!--== Add Swiper Pagination ==-->
        <div class="swiper-pagination"></div>
    </div>
</section>