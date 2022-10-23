   <!--== Start Contact Info Area Wrapper ==-->
   <section class="bg-black-color">
    <div class="container pt-35 pb-40">
      <div class="row">
        <div class="col-12">
          <div class="contact-info contact-info-static">
            <div class="row">
              <div class="col-border col-12 col-md-4 col-sm-6 border-0">
                <div class="info-item">
                  <div class="icon-box">
                    <i class="icon las la-phone-volume"></i>
                  </div>
                  <p>{{ $setting->footer_phone}} M-F 9AM-6PM</p>
                </div>
              </div>
              <div class="col-border col-12 col-md-4 col-sm-6 mt-xs-35">
                <div class="info-item">
                  <div class="icon-box">
                    <i class="icon las la-envelope"></i>
                  </div>
                  <p>{{ $setting->footer_email}}</p>
                </div>
              </div>
              <div class="col-border col-12 col-md-4 col-sm-12 mt-sm-35">
                <div class="info-item">
                  <div class="icon-box">
                    <i class="icon lab la-facebook-messenger"></i>
                  </div>
                  <p>{{ $setting->footer_email}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End Contact Info Area Wrapper ==-->

  <!--== Start Divider Area Wrapper ==-->
  <section class="divider-area">
    <div class="container pt-90 pt-lg-70 pb-lg-60">
      <div class="row">
        <div class="col-12">
          <div class="divider-style-wrap">
            <div class="row">
              <div class="col-md-6">
                <div class="divider-content text-center">
                  <h4 class="title hidden-sm-down">Let’s Connect On Social</h4>
                  <h4 class="title2 hidden-md-up collapsed" data-bs-toggle="collapse" data-bs-target="#dividerId-1">Let’s Connect On Social</h4>
                  <div id="dividerId-1" class="collapse">
                    <div class="social-icons">
                      @php
                      $links = json_decode($setting->social_link, true)['links'];
                      $icons = json_decode($setting->social_link, true)['icons'];
                     @endphp
                      @foreach ($links as $link_key => $link)
                      <a href="{{ $link }}"><i class="{{ $icons[$link_key] }}"></i></a>
                      
                      {{-- <a class="social-button shape-circle sb-facebook" href="{{ $link }}" data-toggle="tooltip" data-placement="top"><i class="{{ $icons[$link_key] }} fa-2x p-2"></i></a> --}}
                  @endforeach
                      {{-- <a href="#/"><i class="la la-twitter"></i></a>
                      <a href="#/"><i class="la la-youtube"></i></a>
                      <a href="#/"><i class="la la-instagram"></i></a> --}}
                    </div>
                    <p class="mb-sm-25">Follow us on your favorite platforms. Check out new launch teasers, how-to videos, and share your favorite looks.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="divider-content text-center">
                  <h4 class="title hidden-sm-down" data-margin-bottom="32">Sign Up For Newsletter</h4>
                  <h4 class="title2 hidden-md-up collapsed" data-bs-toggle="collapse" data-bs-target="#dividerId-2">Sign Up For Newsletter</h4>
                  <div id="dividerId-2" class="collapse">
                    <div class="newsletter-content-wrap">
                      <div class="newsletter-form">
                        <form method="POST" action="{{ route('frontend.subscriber.submit') }}">
                          @csrf
                          <input type="email" name="email" class="form-control" placeholder="Your email address" required>
                          <button class="btn btn-submit btn-subscriber" type="submit">Sign up</button>
                        </form>
                      </div>
                    </div>
                    <p>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End Divider Area Wrapper ==-->

  @section('script')
  <script>
    
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(".btn-subscriber").click(function(e){
      
        e.preventDefault();
        var email = $("input[name=email]").val();
        $.ajax({
           type:'POST',
           url:"{{ route('frontend.subscriber.submit') }}",
           data:{ email:email},
           success:function(data){
            // initialize the toast
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
            })
            Toast.fire({
                    type: 'success',
                    title: data.success,
                })
             $("input[name=email]").val('')
           }
        });
  
    });
  </script>
  @endsection