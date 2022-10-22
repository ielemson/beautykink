@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Edit Option') }}</h1>
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
              <form action="{{ route('backend.option.update', [$item->id, $option->id]) }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-12">
                    <label for="attribute_id">{{ __('Attribute') }} *</label>
                        <select name="attribute_id" id="tax_id"  class="form-control select2">
                          <option value="" selected disabled>{{ __('Select Attribute') }}</option>
                          @foreach ($attributes as $attribute)
                            <option value="{{ $attribute->id }}" {{ $attribute->id == $option->attribute_id ? 'selected' : '' }}>{{ $attribute->name }}</option>
                          @endforeach
                        </select>
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="attr_name">{{ __('Name') }} *</label>
                    <input type="text" name="name" class="form-control" id="attr_name" placeholder="{{ __('Enter Name') }}" value="{{ $option->name }}">
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="attr_image">{{ __('Image') }} *</label>
                    <input type="file" name="image" class="form-control" id="attr_image" placeholder="{{ __('Select image') }}" value="{{ old('image') }}">
                  </div>
                  
                  <div class="form-group  col-md-12">
                    <label for="price">{{ __('Price') }} *</label>
                    <small>({{ __('Set 0 to make it free') }})</small>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                {{ $curr->sign }}
                            </div>
                        </div>
                        <input type="number" name="price" id="price"  min="0" step="0.1" class="form-control" placeholder="{{ __('Enter Price') }}" value="{{ $option->price }}">
                    </div>
                  </div>

                  <input type="hidden" name="keyword" class="form-control" id="attr_keyword" value="{{ $option->attr_keyword }}">


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.option.index", $item->id) }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
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
