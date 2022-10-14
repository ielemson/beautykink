@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Edit Currency') }}</h1>
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
              <form action="{{ route('backend.currency.update', $currency->id) }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-12">
                    <label for="name">{{ __('Currency Name') }} *</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('Currency Name') }}" value="{{ $currency->name }}">
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="sign">{{ __('Currency Sign') }} *</label>
                    <input type="text" name="sign" class="form-control " id="sign" placeholder="{{ __('Currency Sign') }}" value="{{ $currency->sign }}">
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="value">{{ __('Currency Value') }} *</label>
                    <input type="number" name="value" class="form-control " min="0" step="0.01" id="value" placeholder="{{ __('Currency Value') }}" value="{{ $currency->value }}">
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.currency.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
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
