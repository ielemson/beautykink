@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Create Slider') }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <!-- /.card-header -->

                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>
                    <div class="form-group col-md-12">
                        <div class="tab-pane fade active show" id="hom1" role="tabpanel" aria-labelledby="hom1-tab">
                            <form action="{{ route('backend.slider.store') }}" method="POST" enctype="multipart/form-data" class="row">
                                @csrf
                                <input type="hidden" name="home_page" value="theme1">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">{{ __('Brand Logo') }} </label>
                                    <br>
                                    <img src="{{ asset('backend/images/placeholder.png') }}" class="admin-image-preview" alt="">
                                    <br>
                                    <span>{{ __('Image Size Should Be 130 x 40.') }}</span>
                                </div>
                                <div class="col-md-8"></div>
                                <div class="form-group col-md-4">
                                    <label for="logo">{{ __('Upload Image...') }}</label>
                                    <div class="input-group file">
                                        <div class="custom-file">
                                          <input type="file" name="logo" accept="image/*" class="custom-file-input upload-photo" id="file" aria-label="File browser">
                                          <label class="custom-file-label" for="exampleInputFile">{{ __('Upload Image...') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8"></div>
                                <div class="form-group  col-md-12">
                                    <label for="title">{{ __('Slider Title') }} *</label>
                                    <input type="text" name="title" class="form-control " id="title" placeholder="{{ __('Enter Title') }}" value="{{ old('title') }}">
                                </div>
                            
                                <div class="form-group  col-md-6">
                                    <label for="slider-link">{{ __('Slider Link') }} </label>
                                    <input type="text" name="link" class="form-control " id="slider-link" placeholder="{{ __('Enter Link') }}" value="{{ old('link') }}">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="slider-link">{{ __('Slider Position') }} *</label>
                                    <input type="number" min="1" max="5" name="pos" class="form-control " id="slider-link" placeholder="{{ __('Select Position. max: 5') }}" value="{{ old('pos') }}">
                                </div>
                              
                                <div class="form-group  col-md-12">
                                    <label for="details">{{ __('Details') }}</label>
                                    <textarea name='details' id="details" class='form-control' placeholder="{{ __('Enter Meta Description') }}" rows="5"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">{{ __('Set Slider Image') }} *</label>
                                    <br>
                                    <img src="{{ asset('backend/images/placeholder.png') }}" class="admin-image-preview2" alt="">
                                    <br>
                                    <span>{{ __('Image Size Should Be 1000 x 530.') }}</span>
                                </div>
                                <div class="col-md-8"></div>
                                <div class="form-group col-md-4">
                                    <label for="photo">{{ __('Upload Image...') }}</label>
                                    <div class="input-group">
                                        <div class="custom-file file">
                                          <input type="file" name="photo" accept="image/*" class="custom-file-input upload-photo2" id="file" aria-label="File browser">
                                          <label class="custom-file-label" for="exampleInputFile">{{ __('Upload Image...') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a href="{{ route("backend.slider.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@push('scripts')
    {{-- <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        jQuery(document).ready(function(){
            jQuery('#uploadFile').filemanager('file');
        })
    </script> --}}
@endpush