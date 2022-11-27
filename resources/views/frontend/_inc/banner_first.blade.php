<section>
    <div class="container-fluid pt-30 pt-sm-15 pb-15 pb-lg-5">
        <div class="row">
            <div class="col-12">
                <div class="images-col3-slider owl-carousel owl-theme">

                    <div class="item">
                        <div class="thumb thumb-scale-hover-style">
                            <a href="{{ $banner_first['firsturl1'] }}">
                                <img src="{{ asset($banner_first['img1']) }}" loading="lazy" class="hover-img lazy">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb thumb-scale-hover-style">
                            <a href="{{ $banner_first['firsturl2'] }}">
                                <img src="{{ $banner_first['img2'] ? $banner_first['img2'] : asset($setting->loader) }}"
                                    class="hover-img lazy" data-src="{{ asset($banner_first['img2']) }}">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb thumb-scale-hover-style">
                            <a href="{{ $banner_first['firsturl3'] }}">
                                <img src="{{ $banner_first['img3'] ? $banner_first['img3'] : asset($setting->loader) }}"
                                    class="hover-img lazy" data-src="{{ asset($banner_first['img3']) }}">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>