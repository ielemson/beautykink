@extends('backend.layouts.backend')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Visibility') }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              @include('alerts.alerts')
              <div class="card">
                <div class="card-body">
                  <div class="row">
                   
                    <div class="col-12 col-sm-12">
                     
                        <form action="{{ route('backend.setting.visible.update') }}" method="POST" id="quickForm" enctype="multipart/form-data" class="tab-content" id="vert-tabs-tabContent">

                            @csrf
                                  <div class=" row">

                                  
                                    <div class="form-group  col-md-3 ">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_slider" class="" name="is_slider" value="1" {{ $setting->is_slider == 1 ? 'checked' : '' }}>
                                                <label for="is_slider">{{ __('Slider Section') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                  

                                  
                                    <div class="form-group  col-md-3 ">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_three_c_b_first" class="" name="is_three_c_b_first" value="1" {{ $setting->is_three_c_b_first == 1 ? 'checked' : '' }}>
                                                <label for="is_three_c_b_first">{{ __('3 column banner First') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                  

                                  
                                    <div class="form-group  col-md-3 ">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_popular_category" class="" name="is_popular_category" value="1" {{ $setting->is_popular_category == 1 ? 'checked' : '' }}>
                                                <label for="is_popular_category">{{ __('Popular Categories') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                  
{{-- 
                                  
                                    <div class="form-group  col-md-3 ">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_three_c_b_second" class="" name="is_three_c_b_second" value="1" {{ $setting->is_three_c_b_second == 1 ? 'checked' : '' }}>
                                                <label for="is_three_c_b_second">{{ __('3 column banner Second') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                   --}}

                                  
                                    <div class="form-group  col-md-3 ">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_highlighted" class="" name="is_highlighted" value="1" {{ $setting->is_highlighted == 1 ? 'checked' : '' }}>
                                                <label for="is_highlighted">{{ __('Featured, Best Seller, Top Rated, New Product') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                  
{{-- 
                                  
                                    <div class="form-group  col-md-3 ">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_two_column_category" class="" name="is_two_column_category" value="1" {{ $setting->is_two_column_category == 1 ? 'checked' : '' }}>
                                                <label for="is_two_column_category">{{ __('Two column category') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                   --}}

                                    {{-- <div class="col-md-3"></div>
                                    <div class="form-group  col-md-3 ">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_popular_brand" class="" name="is_popular_brand" value="1" {{ $setting->is_popular_brand == 1 ? 'checked' : '' }}>
                                                <label for="is_popular_brand">{{ __('Popular Brands') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                   --}}
{{-- 
                                  
                                    <div class="form-group  col-md-3 ">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_featured_category" class="" name="is_featured_category" value="1" {{ $setting->is_featured_category == 1 ? 'checked' : '' }}>
                                                <label for="is_featured_category">{{ __('Featured Categories') }}</label>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-3"></div> --}}

                                    {{-- <div class="col-md-3"></div>
                                    <div class="form-group  col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_two_c_b" class="" name="is_two_c_b" value="1" {{ $setting->is_two_c_b == 1 ? 'checked' : '' }}>
                                                <label for="is_two_c_b">{{ __('Two column banner') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                   --}}

                                  
                                    <div class="form-group col-md-3 ">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_blogs" class="" name="is_blogs" value="1" {{ $setting->is_blogs == 1 ? 'checked' : '' }}>
                                                <label for="is_blogs">{{ __('blog Section') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                  

                                  
                                    <div class="form-group  col-md-3 ">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_service" class="" name="is_service" value="1" {{ $setting->is_service == 1 ? 'checked' : '' }}>
                                                <label for="is_service">{{ __('Service Section') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group  col-md-3 ">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="inc_hdr_banner" class="" name="inc_hdr_banner" value="1" {{ $setting->inc_hdr_banner == 1 ? 'checked' : '' }}>
                                                <label for="inc_hdr_banner">{{ __('Header Banner') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group  col-md-3 ">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_pages" class="" name="is_pages" value="1" {{ $setting->is_pages == 1 ? 'checked' : '' }}>
                                                <label for="is_pages">{{ __('Header Pages') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                  

                                </div>
                    
                            <div class="row">
                              
                                <div class="form-group  col-md-3 ">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
