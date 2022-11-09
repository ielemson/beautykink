@extends('backend.layouts.backend')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Payment') }}</h1>
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
                    <div class="col-5 col-sm-3">
                      <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#cod" role="tab" aria-controls="cod" aria-selected="true">{{ __('Cash On Delivery') }}</a>

                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#flutterwave" role="tab" aria-controls="flutterwave" aria-selected="false">{{ __('FlutterWave') }}</a>

                        <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#bank" role="tab" aria-controls="bank" aria-selected="false">{{ __('Bank Transfer') }}</a>
                      </div>
                    </div>
                    <div class="col-7 col-sm-9">
                      <div class="tab-content" id="vert-tabs-tabContent">

                        <div class="tab-pane text-left fade show active" id="cod" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                            <form action="{{ route('backend.setting.payment.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">
                                    <div class="col-md-3"></div>
                                <div class="form-group  col-md-6">
                                   <div class="form-group clearfix">
                                      <div class="icheck-success d-inline">
                                        <input type="checkbox" id="status" class="" name="status" value="1" {{ $cod->status == 1 ? 'checked' : '' }}>
                                        <label for="status">{{ __('Display Cash On Delivery') }}</label>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>

                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">{{ __('Current Image') }} *</label>
                                        <br>
                                        <img src="{{ $cod->photo ? asset($cod->photo) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                        <br>
                                        <span>{{ __('Image Size Should Be 52 x 35.') }}</span>
                                    </div>
                                    <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input upload-photo" id="photo" aria-label="File browser">
                                        <label class="custom-file-label" for="photo">{{ __('Upload Image...') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>


                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <label for="text">{{ __('Enter Text') }} *</label>
                                    <textarea name="text" class="form-control " id="text" placeholder="{{ __('Enter Text') }}" rows="5">{{ $cod->text }}</textarea>
                                  </div>
                                  <div class="col-md-3"></div>

                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <input type="hidden" name="unique_keyword" value="cod">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                  </div>

                                </div>

                            </form>
                        </div>
                       

                        {{-- Flutter Wave Starts --}}

                        <div class="tab-pane fade" id="flutterwave" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                          <form action="{{ route('backend.setting.payment.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                              @csrf
                              <div class=" row">
                                  <div class="col-md-3"></div>
                              <div class="form-group  col-md-6">
                                 <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                      <input type="checkbox" id="stripe-status" class="" name="status" value="1" {{ $flutterwave->status == 1 ? 'checked' : '' }}>
                                      <label for="stripe-status">{{ __('Display Flutterwave') }}</label>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-3"></div>

                              <div class="col-md-3"></div>
                              <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">{{ __('Current Image') }} *</label>
                                  <br>
                                  <img src="{{ $flutterwave->photo ? asset($flutterwave->photo) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                  <br>
                                  <span>{{ __('Image Size Should Be 52 x 35.') }}</span>
                              </div>
                              <div class="col-md-3"></div>

                              <div class="col-md-3"></div>
                              <div class="form-group col-md-6">
                                  <div class="input-group">
                                      <div class="custom-file">
                                      <input type="file" name="photo" class="custom-file-input upload-photo" id="photo" aria-label="File browser">
                                      <label class="custom-file-label" for="photo">{{ __('Upload Image...') }}</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3"></div>

                              @foreach ($flutterwaveData as $pkey => $pdata)
                              <div class="col-md-3"></div>
                              <div class="form-group  col-md-6">
                                  <label for="inp-{{ __($pkey) }}">{{ __( $flutterwave->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}</label>
                                  <input type="text" name="pkey[{{ __($pkey) }}]" class="form-control item-name" id="inp-{{ __($pkey) }}" placeholder="{{ __( $flutterwave->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}" value="{{ $pdata }}">
                                </div>
                              <div class="col-md-3"></div>
                              @endforeach


                                <div class="col-md-3"></div>
                                <div class="form-group  col-md-6">
                                  <label for="text">{{ __('Enter Text') }} *</label>
                                  <textarea name="text" class="form-control " id="text" placeholder="{{ __('Enter Text') }}" rows="5">{{ $flutterwave->text }}</textarea>
                                </div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>
                                <div class="form-group  col-md-6">
                                  <input type="hidden" name="unique_keyword" value="flutterwave">
                                  <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>

                              </div>

                          </form>
                      </div>

                        {{-- Flutter Wave Ends --}}

                        <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                            <form action="{{ route('backend.setting.payment.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">
                                    <div class="col-md-3"></div>
                                <div class="form-group  col-md-6">
                                   <div class="form-group clearfix">
                                      <div class="icheck-success d-inline">
                                        <input type="checkbox" id="bank-status" class="" name="status" value="1" {{ $bank->status == 1 ? 'checked' : '' }}>
                                        <label for="bank-status">{{ __('Display Bank Transfer') }}</label>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>
                                <div class="form-group col-md-6">
                                    <label for="">{{ __('Current Image') }} *</label>
                                    <br>
                                    <img src="{{ $bank->photo ? asset($bank->photo) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
                                    <br>
                                    <span>{{ __('Image Size Should Be 52 x 35.') }}</span>
                                </div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input upload-photo" id="photo" aria-label="File browser">
                                        <label class="custom-file-label" for="photo">{{ __('Upload Image...') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>

                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <label for="text">{{ __('Enter Text') }} *</label>
                                    <textarea name="text" class="form-control summernote" id="text" placeholder="{{ __('Enter Text') }}" rows="5">{!! $bank->text !!}</textarea>
                                  </div>
                                  <div class="col-md-3"></div>

                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <input type="hidden" name="unique_keyword" value="bank">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                  </div>

                                </div>

                            </form>
                        </div>
                      </div>
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
