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
                         
                            <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                <div class=" row">
                                    <div class="form-group  col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_t2_slider" class="" name="is_t2_slider" value="1" {{ $extra_settings->is_t2_slider == 1 ? 'checked' : '' }}>
                                                <label for="is_t2_slider">{{ __('Slider Section') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group  col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_t2_service_section" class="" name="is_t2_service_section" value="1" {{ $extra_settings->is_t2_service_section == 1 ? 'checked' : '' }}>
                                                <label for="is_t2_service_section">{{ __('Service Section') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group  col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_t2_3_column_banner_first" class="" name="is_t2_3_column_banner_first" value="1" {{ $extra_settings->is_t2_3_column_banner_first == 1 ? 'checked' : '' }}>
                                                <label for="is_t2_3_column_banner_first">{{ __('3 column banner First') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group  col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_t2_flashdeal" class="" name="is_t2_flashdeal" value="1" {{ $extra_settings->is_t2_flashdeal == 1 ? 'checked' : '' }}>
                                                <label for="is_t2_flashdeal">{{ __('Flash Deal') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group  col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_t2_new_product" class="" name="is_t2_new_product" value="1" {{ $extra_settings->is_t2_new_product == 1 ? 'checked' : '' }}>
                                                <label for="is_t2_new_product">{{ __('New Product Section') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group  col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_t2_3_column_banner_second" class="" name="is_t2_3_column_banner_second" value="1" {{ $extra_settings->is_t2_3_column_banner_second == 1 ? 'checked' : '' }}>
                                                <label for="is_t2_3_column_banner_second">{{ __('3 column banner Second') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group  col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_t2_featured_product" class="" name="is_t2_featured_product" value="1" {{ $extra_settings->is_t2_featured_product == 1 ? 'checked' : '' }}>
                                                <label for="is_t2_featured_product">{{ __('Featured Product Section') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group  col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_t2_bestseller_product" class="" name="is_t2_bestseller_product" value="1" {{ $extra_settings->is_t2_bestseller_product == 1 ? 'checked' : '' }}>
                                                <label for="is_t2_bestseller_product">{{ __('Bestseller Product Section') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group  col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_t2_toprated_product" class="" name="is_t2_toprated_product" value="1" {{ $extra_settings->is_t2_toprated_product == 1 ? 'checked' : '' }}>
                                                <label for="is_t2_toprated_product">{{ __('Top Rated Product Section') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group  col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_t2_2_column_banner" class="" name="is_t2_2_column_banner" value="1" {{ $extra_settings->is_t2_2_column_banner == 1 ? 'checked' : '' }}>
                                                <label for="is_t2_2_column_banner">{{ __('2 Column Banner') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group  col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_t2_blog_section" class="" name="is_t2_blog_section" value="1" {{ $extra_settings->is_t2_blog_section == 1 ? 'checked' : '' }}>
                                                <label for="is_t2_blog_section">{{ __('Blog Section') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group  col-md-3">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_t2_brand_section" class="" name="is_t2_brand_section" value="1" {{ $extra_settings->is_t2_brand_section == 1 ? 'checked' : '' }}>
                                                <label for="is_t2_brand_section">{{ __('Brand Section') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                  

                                </div>
                            </div>

                            <div class="row">
                             
                                <div class="form-group  col-md-3">
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
