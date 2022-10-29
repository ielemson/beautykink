@if (count($testimonials) > 0)
     <!--== Start Testimonial Area Wrapper ==-->
 <section class="testimonial-area">
    <div class="container pt-95 pb-95 pt-lg-70 pb-lg-70">
      <div class="row">
        <div class="col-sm-8 m-auto">
          <div class="section-title text-center">
            <h2 class="title">Client Testimonials</h2>
            <div class="desc">
              <p>What our happy customers says !</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="testimonials-slider testi-first-active owl-carousel owl-theme">
           
          @foreach ($testimonials as $testimonial)
          <div class="item">
            <!--== Start Testimonial Item ==-->
            <div class="testimonial-item testi-height-style matchHeight">
              <div class="testi-inner-content">
                <div class="testi-author">
                  <div class="testi-thumb">
                    <img src="{{$testimonial->user->photo}}" alt="{{$testimonial->user->first_name}}" class="img">
                  </div>
                  <div class="testi-info">
                    <span class="name">{{$testimonial->user->first_name}}</span>
                    <span class="email">{{$testimonial->user->email}}</span>
                  </div>
                </div>
                <div class="testi-content">
                  <p>
                    {!!$testimonial->testimonial!!}
                  </p>
                  <div class="testi-info">
                    <span class="name">{{$testimonial->user->first_name}}</span>
                    <span class="email">{{$testimonial->user->email}}</span>
                  </div>
                </div>
              </div>
            </div>
            <!--== End Testimonial Item ==-->
          </div>
          @endforeach
           
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End Testimonial Area Wrapper ==-->
@endif