    <!--== Start Product Category Area Wrapper ==-->
    @isset($insta_feeds)
     <section class="product-area product-category-area">
      <div class="container pt-95 pb-35 pt-lg-70 pb-lg-10">
        <div class="row">
          <div class="col-sm-8 m-auto">
            <div class="section-title text-center mb-30">
              <h2 class="title">Our Insta Feeds </h2>
              <div class="desc">
                <p>Get with us on social media</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="product-categorys-slider owl-carousel owl-theme">
              @foreach($insta_feeds as $feed)
            @if($feed['thumbnail_url'])
              <div class="item">
                <div class="team-item">
                  <div class="inner-content">
                    <div class="thumb">
                      <a href="{{$feed['permalink']}}" target="_blank"><img src="{{$feed['thumbnail_url']}}" alt="{{$feed['caption']}}"></a>
                      <div class="member-icons">
                         <div class="content">
                      <p class="product-number text-white" style="cursor:pointer">
                          {{Str::limit($feed['caption'], 100)}}
                       </p>
                      <a href="#/">{<i class="fab fa-facebook-f"></i>}</a>
                      <!--<a href="#/"><i class="fa fa-dribbble"></i></a>-->
                      <a href="#/"><i class="fab fa-pinterest-p"></i></a>
                      <a href="#/"><i class="fab fa-twitter"></i></a>
                    </div>
                    </div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            @endif
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    @endisset
   
    <!--== End Product Category Area Wrapper ==-->