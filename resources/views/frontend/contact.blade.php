@extends('frontend.layouts.beautykinkLayout',['home_classs'=>'wrapper contact-inner-wrapper'])
@section('meta')
    <meta name="keywords" content="{{ $setting->meta_keywords }}">
    <meta name="description" content="{{ $setting->meta_description }}">
@endsection
@section('title')
    {{ __('Contact') }}
@endsection

@section('content')
@include('frontend._inc.header_single_page',['title_1'=>'Contact','title_2'=>'Contact Us'])

  <!--== Start Contact Area Wrapper ==-->
  <section class="contact-area contact-page-area">
    <div class="container-fluid">
      <div class="row contact-page-wrapper">
        <div class="col-lg-6">
          <div class="contact-form-wrap">
            <div class="contact-form-title">
              <h5 class="sub-title">Don’t worry!</h5>
              <h2 class="title">If you have any query? Contact with us.</h2>
            </div>
            <!--== Start Contact Form ==-->
            <div class="contact-form">
                <form  method="Post" action="{{ route('frontend.contact.submit') }}">
                    @csrf
                    <div class="row row-gutter-20">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first-name">{{ __('First Name') }}</label>
                            <input class="form-control " name="first_name" type="text" id="first-name" placeholder="{{ __('First Name') }}">
                            @error('first_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last-name">{{ __('Last Name') }}</label>
                            <input class="form-control " name="last_name" type="text" id="last-name" placeholder="{{ __('Last Name') }}">
                            @error('last_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact-email">{{ __('E-mail') }}</label>
                            <input class="form-control " type="email" name="email" id="contact-email" placeholder="{{ __('E-mail') }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact-tel">{{ __('Phone') }}</label>
                            <input class="form-control " type="text" name="phone" id="contact-tel" placeholder="{{ __('Phone') }}">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12  ">
                        <div class="form-group">
                            <label for="message-text">{{ __('Message') }}</label>
                            <textarea class="form-control " rows="9" name="message" id="message-text" placeholder="{{ __('Write your message here...') }}"></textarea>
                            @error('message')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @if ($setting->recaptcha == 1)
                        <div class="col-lg-12 mb-4">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                @php
                                    $errmsg = $errors->first('g-recaptcha-response');
                                @endphp
                                <p class="text-danger mb-0">{{ __("$errmsg") }}</p>
                            @endif
                        </div>
                    @endif
                    </div>

                    <div class="col-12 text-right">
                        <!-- Show toastr after succesfull submit -->
                        <button class="btn-theme" type="submit">{{ __('Send message') }}</button>
                    </div>
                </form>
            </div>
            <!--== End Contact Form ==-->

            <!--== Message Notification ==-->
            <div class="form-message"></div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-info-list">
            <div class="contact-info">
              <div class="info-item">
                <div class="info">
                  <h5 class="title">Phone:</h5>
                  <p>
                    <a href="tel:{{ $setting->footer_phone }}">{{ $setting->footer_phone }}</a>
                  
                  </p>
                </div>
              </div>
              <div class="info-item">
                <div class="info">
                  <h5 class="title">Email:</h5>
                  <p>
                    <a href="mailto:{{ $setting->footer_email}}">{{ $setting->footer_email }}</a>
                  </p>
                </div>
              </div>
              <div class="info-item">
                <div class="info">
                  <h5 class="title">Address:</h5>
                  <p>{{ $setting->footer_address }}</p>
                </div>
              </div>
              <div class="info-item">
                <div class="info">
                  <h5 class="title">Social Links:</h5>
                  @php
                  $links = json_decode($setting->social_link, true)['links'];
                  $icons = json_decode($setting->social_link, true)['icons'];
              @endphp
                  @foreach ($links as $link_key => $link)
                  <a class="social-button shape-circle sb-facebook" href="{{ $link }}" data-toggle="tooltip" data-placement="top"><i class="{{ $icons[$link_key] }} fa-2x p-2"></i></a>
              @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End Contact Area Wrapper ==-->
@endsection
