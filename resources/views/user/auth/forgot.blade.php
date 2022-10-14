@extends('frontend.layouts.beautykinkLayout')
@section('title')
    {{ __('Password Reset') }}
@endsection
@section('content')
    <!-- Page Title-->
    @include('frontend._inc.header_single_page', ['title_1' => 'Account', 'title_2' => 'Forgot Password'])
    <!-- Page Content-->
   
    <section>
        <div class="container" data-padding-top="62"> 
          <h4 class="fz-24 mb-25">Forgot Password</h4>
          <div class="row">
            <div class="col-12">
              <div class="register-form-content">
                <div class="register-form">
                  <span class="login-account">Already have an account? <a href="{{route('user.login')}}"><b>Log in instead!</b></a></span>
                  <form  method="POST" action="{{ route('user.forgot.submit') }}">
                    @csrf
                    <div class="form-group row">
                      <label class="col-md-3" for="frm_email">Email</label>
                      <div class="col-md-6">
                        <input id="frm_email" class="form-control" type="email" name="email" placeholder="{{ __('Enter your email address') }}" required>
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                       @enderror
                    <small
                        class="text-muted">{{ __('Type in the email address you used when you registered with our website') }}</small>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                          <button class="btn-save" type="submit">{{ __('Send Password Reset Link') }}</button>
                        </div>
                      </div>
                  </form>
                </div>
                </div>
            </div>
          </div>
        </div>
      </section>
@include('frontend._inc.divider')

@endsection

{{-- @section('styleplugins')
    <link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('frontend/css/styles.min.css') }}">
@endsection --}}