@extends('frontend.layouts.beautykinkLayout')
@section('title')
    {{ __('Login/Register') }}
@endsection
@section('content')
@include('frontend._inc.header_single_page',['title_1'=>'User','title_2'=>'Register'])
    <!-- Page Title-->
    
   <!--== Start Account Area Wrapper ==-->
   <section>
    <div class="container" data-padding-top="62"> 
      <h4 class="fz-24 mb-25">Create an account</h4>
      <div class="row">
        <div class="col-12">
          <div class="register-form-content">
            <div class="register-form">
              <span class="login-account">Already have an account? <a href="#/">Log in instead!</a></span>
              <form class="row" action="{{ route('user.register.submit') }}" method="POST">
                @csrf
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="reg-fn">{{ __('First Name') }}</label>
                        <input class="form-control" type="text" name="first_name"
                            placeholder="{{ __('First Name') }}" id="reg-fn"
                            value="{{ old('first_name') }}">
                        @error('first_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="reg-ln">{{ __('Last Name') }}</label>
                        <input class="form-control" type="text" name="last_name"
                            placeholder="{{ __('Last Name') }}" id="reg-ln" value="{{ old('last_name') }}">
                        @error('last_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="reg-email">{{ __('E-mail Address') }}</label>
                        <input class="form-control" type="email" name="email"
                            placeholder="{{ __('E-mail Address') }}" id="reg-email"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="reg-phone">{{ __('Phone Number') }}</label>
                        <input class="form-control" name="phone" type="text"
                            placeholder="{{ __('Phone Number') }}" id="reg-phone" value="{{ old('phone') }}">
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="reg-pass">{{ __('Password') }}</label>
                        <input class="form-control" type="password" name="password"
                            placeholder="{{ __('Password') }}" id="reg-pass">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="reg-pass-confirm">{{ __('Confirm Password') }}</label>
                        <input class="form-control" type="password" name="password_confirmation"
                            placeholder="{{ __('Confirm Password') }}" id="reg-pass-confirm">
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

                {{-- <div class="col-12 text-center">
                    <button class="btn btn-primary margin-bottom-none btn-sm"
                        type="submit">{{ __('Register') }}</button>
                </div> --}}
                 <div class="row">
              <div class="col-12 text-end">
                <button type="submit" class="btn-save" >Save</button>
              </div>
            </div>
            </form>
            </div>
           
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End Account Area Wrapper ==-->

  @include('frontend._inc.divider',[])
@endsection
