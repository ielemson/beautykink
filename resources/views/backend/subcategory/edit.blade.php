@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Edit Sub Category') }}</h1>
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
              <form action="{{ route('backend.subcategory.update', $subcategory->id) }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">{{ __('Set Image') }} *</label>
                      <br>
                      <img src="{{ asset('backend/images/placeholder.png') }}" class="admin-image-preview" alt="">
                      <br>
                      <span>{{ __('Image Size Should Be 60 x 60.') }}</span>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="form-group col-md-4">
                      <label for="file">{{ __('Upload Image...') }}</label>
                      <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="photo" class="custom-file-input upload-photo" id="file" aria-label="File browser">
                            <label class="custom-file-label" for="exampleInputFile">{{ __('Upload Image...') }}</label>
                          </div>
                        </div>
                    </div>

                  <div class="form-group  col-md-12">
                    <label for="category_id">{{ __('Select Category') }} *</label>
                    <select name="category_id" id="category_id" class="form-control select2">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $subcategory->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="name">{{ __('Name') }} *</label>
                    <input type="text" name="name" class="form-control item-name" id="name" placeholder="{{ __('Enter Name') }}" value="{{ $subcategory->slug }}">
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="slug">{{ __('Slug') }} *</label>
                    <input type="text" name="slug" class="form-control " id="slug" placeholder="{{ __('Enter Slug') }}" value="{{ $subcategory->slug }}">
                  </div>
                 <div class="form-group  col-md-12">
                    <label for="description">{{ __('Brief Description') }}</label>
                    <textarea name='description' class='form-control' placeholder="{{ __('Enter Brief Description') }}" rows="3">{{ $subcategory->description }}</textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.subcategory.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
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
