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

                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#stripe" role="tab" aria-controls="stripe" aria-selected="false">{{ __('Stripe') }}</a>

                        <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#paypal" role="tab" aria-controls="paypal" aria-selected="false">{{ __('Paypal') }}</a>

                        <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#molly" role="tab" aria-controls="molly" aria-selected="false">{{ __('Mollie') }}</a>

                        <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#paytm" role="tab" aria-controls="paytm" aria-selected="false">{{ __('Paytm') }}</a>

                        <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#sslcommerz" role="tab" aria-controls="sslcommerz" aria-selected="false">{{ __('SSL Commez') }}</a>

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

                        <div class="tab-pane fade" id="stripe" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                            <form action="{{ route('backend.setting.payment.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">
                                    <div class="col-md-3"></div>
                                <div class="form-group  col-md-6">
                                   <div class="form-group clearfix">
                                      <div class="icheck-success d-inline">
                                        <input type="checkbox" id="stripe-status" class="" name="status" value="1" {{ $stripe->status == 1 ? 'checked' : '' }}>
                                        <label for="stripe-status">{{ __('Display Stripe') }}</label>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">{{ __('Current Image') }} *</label>
                                    <br>
                                    <img src="{{ $stripe->photo ? asset($stripe->photo) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
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

                                @foreach ($stripeData as $pkey => $pdata)
                                <div class="col-md-3"></div>
                                <div class="form-group  col-md-6">
                                    <label for="inp-{{ __($pkey) }}">{{ __( $stripe->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}</label>
                                    <input type="text" name="pkey[{{ __($pkey) }}]" class="form-control item-name" id="inp-{{ __($pkey) }}" placeholder="{{ __( $stripe->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}" value="{{ $pdata }}">
                                  </div>
                                <div class="col-md-3"></div>
                                @endforeach


                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <label for="text">{{ __('Enter Text') }} *</label>
                                    <textarea name="text" class="form-control " id="text" placeholder="{{ __('Enter Text') }}" rows="5">{{ $stripe->text }}</textarea>
                                  </div>
                                  <div class="col-md-3"></div>

                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <input type="hidden" name="unique_keyword" value="stripe">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                  </div>

                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                            <form action="{{ route('backend.setting.payment.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">
                                <div class="col-md-3"></div>
                                <div class="form-group  col-md-6">
                                   <div class="form-group clearfix">
                                      <div class="icheck-success d-inline">
                                        <input type="checkbox" id="stripe-paypal" class="" name="status" value="1" {{ $stripe->status == 1 ? 'checked' : '' }}>
                                        <label for="stripe-paypal">{{ __('Display Paypal') }}</label>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">{{ __('Current Image') }} *</label>
                                    <br>
                                    <img src="{{ $paypal->photo ? asset($paypal->photo) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
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

                                @foreach ($paypalData as $pkey => $pdata)
                                    @if ($pkey == 'check_sandbox')
                                        <div class="col-md-3"></div>
                                        <div class="form-group  col-md-6">
                                        <div class="form-group clearfix">
                                            <div class="icheck-info d-inline">
                                                <input type="checkbox" id="{{ __($pkey) }}" class="" name="pkey[{{ __($pkey) }}]" value="1" {{ $pdata == 1 ? 'checked' : '' }}>
                                                <label for="{{ __($pkey) }}">{{ __( $paypal->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}</label>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3"></div>
                                    @else
                                        <div class="col-md-3"></div>
                                        <div class="form-group  col-md-6">
                                            <label for="inp-{{ __($pkey) }}">{{ __( $paypal->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}</label>
                                            <input type="text" name="pkey[{{ __($pkey) }}]" class="form-control item-name" id="inp-{{ __($pkey) }}" placeholder="{{ __( $paypal->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}" value="{{ $pdata }}">
                                        </div>
                                        <div class="col-md-3"></div>
                                    @endif
                                @endforeach


                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <label for="text">{{ __('Enter Text') }} *</label>
                                    <textarea name="text" class="form-control " id="text" placeholder="{{ __('Enter Text') }}" rows="5">{{ $paypal->text }}</textarea>
                                  </div>
                                  <div class="col-md-3"></div>

                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <input type="hidden" name="unique_keyword" value="paypal">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                  </div>

                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="molly" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                            <form action="{{ route('backend.setting.payment.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">
                                    <div class="col-md-3"></div>
                                <div class="form-group  col-md-6">
                                   <div class="form-group clearfix">
                                      <div class="icheck-success d-inline">
                                        <input type="checkbox" id="molly-status" class="" name="status" value="1" {{ $molly->status == 1 ? 'checked' : '' }}>
                                        <label for="molly-status">{{ __('Display Mollie') }}</label>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">{{ __('Current Image') }} *</label>
                                    <br>
                                    <img src="{{ $molly->photo ? asset($molly->photo) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
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

                                @foreach ($mollyData as $pkey => $pdata)
                                <div class="col-md-3"></div>
                                <div class="form-group  col-md-6">
                                    <label for="inp-{{ __($pkey) }}">{{ __( $molly->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}</label>
                                    <input type="text" name="pkey[{{ __($pkey) }}]" class="form-control item-name" id="inp-{{ __($pkey) }}" placeholder="{{ __( $molly->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}" value="{{ $pdata }}">
                                  </div>
                                <div class="col-md-3"></div>
                                @endforeach


                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <label for="text">{{ __('Enter Text') }} *</label>
                                    <textarea name="text" class="form-control " id="text" placeholder="{{ __('Enter Text') }}" rows="5">{{ $molly->text }}</textarea>
                                  </div>
                                  <div class="col-md-3"></div>

                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <input type="hidden" name="unique_keyword" value="mollie">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                  </div>

                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="paytm" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                            <form action="{{ route('backend.setting.payment.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">
                                    <div class="col-md-3"></div>
                                <div class="form-group  col-md-6">
                                   <div class="form-group clearfix">
                                      <div class="icheck-success d-inline">
                                        <input type="checkbox" id="paytm-status" class="" name="status" value="1" {{ $paytm->status == 1 ? 'checked' : '' }}>
                                        <label for="paytm-status">{{ __('Display Paytm') }}</label>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">{{ __('Current Image') }} *</label>
                                    <br>
                                    <img src="{{ $paytm->photo ? asset($paytm->photo) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
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
                                @foreach ($paytmData as $pkey => $paytmData)
                                <div class="col-md-3"></div>
                                <div class="form-group  col-md-6">
                                    <label for="inp-{{ __($pkey) }}">{{ __( $paytm->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}</label>
                                    <input type="text" name="pkey[{{ __($pkey) }}]" class="form-control item-name" id="inp-{{ __($pkey) }}" placeholder="{{ __( $paytm->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}" value="{{ $paytmData }}">
                                  </div>
                                <div class="col-md-3"></div>
                                @endforeach


                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <label for="text">{{ __('Enter Text') }} *</label>
                                    <textarea name="text" class="form-control " id="text" placeholder="{{ __('Enter Text') }}" rows="5">{{ $paytm->text }}</textarea>
                                  </div>
                                  <div class="col-md-3"></div>

                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <input type="hidden" name="unique_keyword" value="paytm">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                  </div>

                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="sslcommerz" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                            <form action="{{ route('backend.setting.payment.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                                <div class=" row">
                                    <div class="col-md-3"></div>
                                <div class="form-group  col-md-6">
                                   <div class="form-group clearfix">
                                      <div class="icheck-success d-inline">
                                        <input type="checkbox" id="sslcommerz-status" class="" name="status" value="1" {{ $sslcommerz->status == 1 ? 'checked' : '' }}>
                                        <label for="sslcommerz-status">{{ __('Display sslcommerz') }}</label>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">{{ __('Current Image') }} *</label>
                                    <br>
                                    <img src="{{ $sslcommerz->photo ? asset($sslcommerz->photo) : asset('backend/images/placeholder.png') }}" class="admin-setting-img" alt="No Image Found">
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
                                @foreach ($sslcommerzData as $pkey => $sslcommerzData)
                                @if ($pkey == 'check_sandbox')
                                    <div class="col-md-3"></div>
                                    <div class="form-group  col-md-6">
                                        <div class="form-group clearfix">
                                            <div class="icheck-info d-inline">
                                                <input type="checkbox" id="ssl{{ __($pkey) }}" class="" name="pkey[{{ __($pkey) }}]" value="1" {{ $sslcommerzData == 1 ? 'checked' : '' }}>
                                                <label for="ssl{{ __($pkey) }}">{{ __( $sslcommerz->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                @else
                                    <div class="col-md-3"></div>
                                    <div class="form-group  col-md-6">
                                        <label for="inp-{{ __($pkey) }}">{{ __( $sslcommerz->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}</label>
                                        <input type="text" name="pkey[{{ __($pkey) }}]" class="form-control item-name" id="inp-{{ __($pkey) }}" placeholder="{{ __( $sslcommerz->name . ' ' . ucwords(str_replace('_', ' ', $pkey)) ) }}" value="{{ $sslcommerzData }}">
                                    </div>
                                    <div class="col-md-3"></div>
                                @endif
                                @endforeach


                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <label for="text">{{ __('Enter Text') }} *</label>
                                    <textarea name="text" class="form-control " id="text" placeholder="{{ __('Enter Text') }}" rows="5">{{ $sslcommerz->text }}</textarea>
                                  </div>
                                  <div class="col-md-3"></div>

                                  <div class="col-md-3"></div>
                                  <div class="form-group  col-md-6">
                                    <input type="hidden" name="unique_keyword" value="sslcommerz">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                  </div>

                                </div>

                            </form>
                        </div>

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
