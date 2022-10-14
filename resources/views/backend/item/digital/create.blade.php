@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Create Digital Product') }}</h1>
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
              <!-- form start -->
              <form action="{{ route('backend.digital.item.store') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                <input type="hidden" name="item_type" value="digital">
                @csrf
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">{{ __('Current Featured Image') }} *</label>
                    <br>
                    <img src="{{ asset('backend/images/placeholder.png') }}" class="admin-image-preview" alt="">
                    <br>
                    <span>{{ __('Image Size Should Be 570 x 341.') }}</span>
                  </div>
                  <div class="col-md-8"></div>
                  <div class="form-group col-md-6">
                    <label for="file">{{ __('Upload Image...') }}</label>
                    <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="photo" class="custom-file-input upload-photo" id="file" aria-label="File browser">
                          <label class="custom-file-label" for="exampleInputFile">{{ __('Upload Image...') }}</label>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6"></div>

                  <div class="form-group  col-md-6">
                    <label for="name">{{ __('Name') }} *</label>
                    <input type="text" name="name" class="form-control item-name" id="name" placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}">
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="slug">{{ __('Slug') }} *</label>
                    <input type="text" name="slug" class="form-control " id="slug" placeholder="{{ __('Enter Slug') }}" value="{{ old('slug') }}">
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="category_id">{{ __('Select Category') }} *</label>
                    <select name="category_id" id="category_id" data-href="{{ route('backend.get.subcategories') }}" class="form-control select2">
                        <option value="" selected >{{ __('Select One') }}</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="subcategory_id">{{ __('Select Subcategory') }} </label>
                    <select name="subcategory_id" id="subcategory_id" data-href="{{ route('backend.get.childcategories') }}" class="form-control select2">
                        <option value="" selected disabled>{{ __('Select One') }}</option>
                    </select>
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="childcategory_id">{{ __('Select Child Category') }} </label>
                    <select name="childcategory_id" id="childcategory_id" class="form-control select2">
                        <option value="" selected disabled>{{ __('Select One') }}</option>
                    </select>
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="brand_id">{{ __('Select Brand') }} </label>
                    <select name="brand_id" id="brand_id"  class="form-control select2">
                        <option value="" selected >{{ __('Select One') }}</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="file_type">{{ __('Select Type') }} </label>
                    <select name="file_type" id="file_type"  class="form-control select2">
                        <option value="file" selected >{{ __('File') }}</option>
                        <option value="link" >{{ __('Link') }}</option>
                    </select>
                  </div>

                  <div class="form-group  col-md-6 view_file">
                    <label for="file">{{ __('File') }} * <span class="text-warning">({{__('File type must be zip')}})</span></label>
                    <input type="file" name="file" class="form-control p-1" id="file" required>

                  </div>

                  <div class="form-group  col-md-6 d-none view_link">
                    <label for="link">{{ __('Link') }} *</label>
                    <input type="text" name="link" class="form-control p-1" id="link" placeholder="{{__('Enter Link')}}">
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="discount_price">{{ __('Current Price') }} *</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                {{ PriceHelper::adminCurrency() }}
                            </div>
                        </div>
                        <input type="number" name="discount_price" id="discount_price" min="0" step="0.01" class="form-control" placeholder="{{ __('Enter Current Price') }}" value="{{ old('discount_price') }}">
                    </div>
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="previous_price">{{ __('Previous Price') }}</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                {{ $curr->sign }}
                            </div>
                        </div>
                        <input type="number" name="previous_price" id="previous_price" min="0" step="0.01" class="form-control" placeholder="{{ __('Enter Previous Price') }}" value="{{ old('previous_price') }}">
                    </div>
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="short_details">{{ __('Short Description') }} *</label>
                    <textarea name="short_details" id="short_details" class='form-control' placeholder="{{ __('Short Description') }}" rows="5">{{ old('short_details') }}</textarea>
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="details">{{ __('Description') }} *</label>
                    <textarea name="details" id="details" class='form-control summernote' placeholder="{{ __('Enter Description') }}" rows="5">{!! old('details') !!}</textarea>
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="tax_id">{{ __('Select Tax') }} *</label>
                    <select name="tax_id" id="tax_id"  class="form-control select2">
                        <option value="" selected >{{ __('Select One') }}</option>
                        @foreach ($taxes as $tax)
                            <option value="{{ $tax->id }}">{{ $tax->name }} ({{ $tax->value }}%)</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="tags">{{ __('Tags') }}</label>
                    <input type="text" name='tags' id="tags" class='form-control tags' placeholder="{{ __('Tags') }}">
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="video">{{ __('Video Link') }} </label>
                    <input type="text" name='video' id="video" class='form-control' placeholder="{{ __('Enter Video Link') }}" value="{{ old('video') }}">
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="meta_keywords">{{ __('Meta Keywords') }}</label>
                    <input type="text" name='meta_keywords' id="meta_keywords" class='form-control tags' placeholder="{{ __('Enter Meta Keywords') }}">
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="meta_descriptions">{{ __('Meta Description') }}</label>
                    <textarea name='meta_descriptions' id="meta_descriptions" class='form-control' placeholder="{{ __('Enter Meta Description') }}" rows="5">{{ old('meta_description') }}</textarea>
                  </div>

                  <div class="form-group col-md-12">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="is_specification" class="custom-control-input" id="is_specification" value="1" checked>
                        <label class="custom-control-label" for="is_specification">{{ __('Specifications') }}</label>
                    </div>
                  </div>

                  <div class="col-md-12" id="specifications-section">
                    <div class="row">
                        <div class="form-group  col-md-5">
                            <input type="text" name='specification_name[]' class='form-control' placeholder="{{ __('Specification Name') }}" value="">
                        </div>

                        <!-- /.col-lg-6 -->
                        <div class="form-group  col-md-6">
                            <input type="text" name='specification_description[]' class='form-control' placeholder="{{ __('Specification description') }}" value="">
                        </div>
                        <!-- /.col-lg-6 -->

                        <div class="form-group  col-md-1">
                            <button data-text="{{ __('Specification Name') }}" data-text1="{{ __('Specification Description') }}" type="button" class="btn btn-info btn-md add-specification"><i class="fa fa-plus"></i></button>
                        </div>
                        <!-- /.col-lg-6 -->
                      </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.item.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                  <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
              </form>
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

@section('script')
    <script>
        $(document).on('change','#file_type',function(){
            let type = $(this).val();
            if(type == 'file'){
                $('.view_link').addClass('d-none');
                $('.view_file').removeClass('d-none');
                $('.view_file input').prop('required',true);
                $('.view_link input').prop('required',false);
            }else{
                $('.view_link').removeClass('d-none');
                $('.view_file').addClass('d-none');
                $('.view_file input').prop('required',false);
                $('.view_link input').prop('required',true);
            }
        })
    </script>
@endsection
