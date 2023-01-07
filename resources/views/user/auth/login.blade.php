@extends('frontend.layouts.beautykinkLayout')
@section('title')
    {{ __('Login/Register') }}
@endsection
@section('content')
    @include('frontend._inc.header_single_page', ['title_1' => 'User', 'title_2' => 'Login'])

    <section>
        <div class="container" data-padding-top="62">
            <h4 class="fz-24 mb-25">Log in to your account</h4>
            <div class="row">
                <div class="col-12">
                    <div class="login-form-content">
                        <div class="login-form">
                            <form method="post" action="{{ route('user.login.submit') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3" for="frm_email">Email</label>
                                    <div class="col-md-6">
                                        <input id="frm_email" class="form-control" type="email" name="login_email"
                                            placeholder="{{ __('Email') }}" value="{{ old('login_email') }}"
                                            type="email">
                                        @error('login_email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="frm_pass">Password</label>
                                    <div class="col-md-6">

                                        <input type="password" class="form-control" type="password" name="login_password"
                                            placeholder="{{ __('Password') }}" id="frm_pass">
                                        @error('login_password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        {{-- <span class="show-pass" onclick="myFunction()">show</span> --}}


                                    </div>
                                </div>
                               @if (Cart::count()> 0)
                               <div class="form-group row mb-15">
                                <div class="col-6 text-center">
                                    <a class="btn-forgot" href="{{ route('user.forgot') }}">Forgot your password?</a>
                                    <button class="btn-signin" type="submit">Sign in</button>
                                </div>
                            
                               <div class="col-6 text-center">
                                <a class="btn-forgot" href="javascript:;">Checkout as Guest?</a>
                                <a href="{{route('frontend.guest.checkout')}}" class="btn-signin">Checkout</a>
                            </div>
                             
                            </div>
                               @else
                               <div class="form-group row mb-15">
                                <div class="col-12 text-center">
                                    <a class="btn-forgot" href="{{ route('user.forgot') }}">Forgot your password?</a>
                                    <button class="btn-signin" type="submit">Sign in</button>
                                </div>
                            
                              
                             
                            </div> 
                               @endif
                            </form>
                        </div>
                        <a class="btn-create-account" href="{{ route('user.register') }}">No account? Create one here</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Account Area Wrapper ==-->

    <!--== Start Contact Info Area Wrapper ==-->
    @include('frontend._inc.divider',[])
    <!--== End Contact Info Area Wrapper ==-->
@endsection
