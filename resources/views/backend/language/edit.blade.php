@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Language') }}</h1>
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
              <form action="{{ route('backend.language.update', $data->id) }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="language" value="{{ $data->language }}">
                <div class="card-header">
                    <h5>{{ __('Set Language Name') }}</h5>
                </div>
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-12">
                    <label for="language">{{ __('Language Name *') }}</label>
                    <input type="text" name="language" class="form-control" id="language" placeholder="{{ __('Enter Language Name') }}" value="{{ $data->language }}">
                  </div>
                  <div class="col-md-5">
                    <h6 class="m-0 font-weight-bold text-primary">{{__('Key *')}}</h6>
                  </div>
                  <div class="col-md-7">
                    <h6 class="m-0 font-weight-bold text-primary">{{__('Value *')}}</h6>
                  </div>
                  <div class="col-md-12 " id="specifications-section">
                    @foreach ($lang as $key => $val)
                        <div class="row">
                            <div class="form-group  col-md-5">
                                <input type="text" name='keys[]' class='form-control' placeholder="{{ __('Specification Name') }}" value="{{ $key }}">
                            </div>

                            <!-- /.col-lg-6 -->
                            <div class="form-group  col-md-6">
                                <input type="text" name='values[]' class='form-control' placeholder="{{ __('Specification description') }}" value="{{ $val }}">
                            </div>
                            <!-- /.col-lg-6 -->

                            <div class="form-group  col-md-1">
                                <button type="button" class="btn btn-danger btn-md remove-specification"><i class="fa fa-minus"></i></button>
                            </div>
                            <!-- /.col-lg-6 -->
                        </div>
                    @endforeach
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.language.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
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
