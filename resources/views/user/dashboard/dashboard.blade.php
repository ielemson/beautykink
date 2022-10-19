@extends('frontend.layouts.beautykinkLayout')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')
       <!--== Start Account Area Wrapper ==-->
       <section>
        
        <div class="container">
          <div class="row">
              @include('frontend._inc.user_sidebar')
              <div class="col-lg-8">
                  <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                  <div class="row u-d-d">
                      <div class="col-md-6 mb-4">
                          <div class="card round">
                              <div class="card-body text-center">
                                  <i class="icon-shopping-bag"></i>
                                  <p class="mt-3">{{ __('All Order') }}</p>
                                  <h4><b>{{ $all_orders }}</b></h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6 mb-4">
                          <div class="card round">
                              <div class="card-body text-center">
                                  <i class="icon-shopping-bag"></i>
                                  <p class="mt-3">{{ __('Completed Order') }}</p>
                                  <h4><b>{{ $delivered_orders }}</b></h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6 mb-4">
                          <div class="card round">
                              <div class="card-body text-center">
                                  <i class="icon-shopping-bag"></i>
                                  <p class="mt-3">{{ __('Processing Order') }}</p>
                                  <h4><b>{{ $progress_orders }}</b></h4>
                              </div>
                          </div>
                      </div>
  
  
                      <div class="col-md-6 mb-4">
                          <div class="card round">
                              <div class="card-body text-center">
                                  <i class="icon-shopping-bag"></i>
                                  <p class="mt-3">{{ __('Canceled Order') }}</p>
                                  <h4><b>{{ $canceled_orders }}</b></h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6 mb-4">
                          <div class="card round">
                              <div class="card-body text-center">
                                  <i class="icon-shopping-bag"></i>
                                  <p class="mt-3">{{ __('Pending Order') }}</p>
                                  <h4><b>{{ $pending_orders }}</b></h4>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </section>
      <!--== End Account Area Wrapper ==-->
  
   @include('frontend._inc.divider',[])
@endsection

@section('styleplugins')
<link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('frontend/css/styles.min.css') }}">
@endsection