@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Edit Child Category') }}</h1>
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
              <form action="{{ route('backend.childcategory.update', $childcategory->id) }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body row">
                  <div class="col-md-12">
                        @include('alerts.alerts')
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="category_id">{{ __('Select Category') }} *</label>
                    <select name="category_id" id="category_id" data-href="{{ route('backend.get.subcategories') }}" class="form-control select2">
                        <option value="" selected >{{ __('Select One') }}</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $childcategory->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="subcategory_id">{{ __('Select Subcategory') }} *</label>
                    <select name="subcategory_id" id="subcategory_id" class="form-control select2">
                        @foreach ($subcategories as $subcat)
                            <option value="{{ $subcat->id }}" {{ $childcategory->subcategory_id == $subcat->id ? 'selected' : '' }}>{{ $subcat->name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="name">{{ __('Name') }} *</label>
                    <input type="text" name="name" class="form-control item-name" id="name" placeholder="{{ __('Enter Name') }}" value="{{ $childcategory->slug }}">
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="slug">{{ __('Slug') }} *</label>
                    <input type="text" name="slug" class="form-control " id="slug" placeholder="{{ __('Enter Slug') }}" value="{{ $childcategory->slug }}">
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.childcategory.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                  <button type="submit" class="btn btn-primary"> {{ __('Submit') }}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
