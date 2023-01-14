@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Create Attribute') }}</h1>
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
              <form action="{{ route('backend.attribute.store', $item->id) }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-6">
                    <label for="name">{{ __('Name') }} *</label>
                    <input type="text" name="name" class="form-control" id="attr_name" placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}" >
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="attribute_id">{{ __('Attribute Type') }} *</label>
                        <select name="type" id="type"  class="form-control select2">
                          <option value="" selected disabled>{{ __('Select Attribute Type') }}</option>
                           <option value="{{__('Image')}}">{{__('Image')}}</option>
                           <option value="{{__('Image Text')}}">{{__('Image & Text')}}</option>
                           <option value="{{__('Text')}}">{{__('Text')}}</option>
                        </select>
                  </div>
                </div>

                <input type="hidden" name="keyword" class="form-control" id="attr_keyword" value="{{ old('attr_keyword') }}">
                <input type="hidden" name="item_id" class="form-control"  value="{{ $item->id }}">

                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.attribute.index", $item->id) }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
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
