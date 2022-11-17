@extends('frontend.layouts.beautykinkLayout')
@section('title')
    {{ __('Password Reset') }}
@endsection
@section('content')
    <!-- Page Title-->
    @include('frontend._inc.header_single_page', ['title_1' => 'Account', 'title_2' => 'Reset Password'])
    <!-- Page Content-->
   
    <section>
        <div class="container" data-padding-top="62"> 
          <h4 class="fz-24 mb-25">Reset Password</h4>
          <div class="row">
            <div class="col-12">
              <div class="register-form-content">
                <div class="register-form">
                  <span class="login-account">Already have an account? <a href="{{route('user.login')}}"><b>Log in instead!</b></a></span>
                  <form class="card mt-4" method="POST" action="{{ route('user.change.password') }}">
                    @csrf
                    <input type="hidden" name="file_token" value="{{ $token }}">
                    <div class="card-body">
                        <div class="form-group">
                            <h4 class="d-block text-center mb-4">{{ __('Reset Password') }}</h4>
                            <label for="new_password">{{ __('New Password') }}</label>
                            <input class="form-control" type="password" name="new_password" id="new_password" placeholder="{{ __('Enter your email address') }}">
                            @error('new_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="renew_password">{{ __('Re-Type New Password') }}</label>
                            <input class="form-control" type="password" name="renew_password" id="renew_password" placeholder="{{ __('Enter your email address') }}">
                            @error('renew_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">{{ __('Reset Password') }}</button>
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