@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Create New Shipping Zones') }}</h1>
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
              <form action="{{ route('backend.geozone.store') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-4">
                    <label for="name">{{ __('Zone') }} *</label>
                    <input type="text" name="zone" id="" class="form-control" placeholder="enter zone e.g southeast">
                  </div>
                  <div class="form-group  col-md-4">
                    <label for="name">{{ __('Country') }} *</label>
                    <select class="form-control"  data-placeholder="Select State"
                        style="width: 100%;" name="country_id">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach

                    </select>
                  </div>

                  <div class="form-group  col-md-4">
                    <label for="title">{{ __('Select State') }} </label>
                    <select class="select2bs4" multiple="multiple" data-placeholder="Select State"
                        style="width: 100%;" name="state_ids[]">
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach

                    </select>
                </div>
                  <div class="form-group  col-md-4">
                    <label for="title">{{ __('Shipping Status') }} </label>
                    <select class="form-control"
                        style="width: 100%;" name="shipping_status" required>
                      
                            <option value=" ">{{ __('Select Shipping Status') }}</option>
                            <option value="free">{{ __('Free') }}</option>
                            <option value="paid">{{ __('Paid') }}</option>
                       
                    </select>
                </div>
                  <div class="form-group  col-md-4">
                    <label for="title">{{ __('Shipping Cost') }} </label>
                    <small>({{ __('Set 0 to make it free') }})</small>
                    <div class="input-group mb-3">
                    <div class="input-group-append">
                      <div class="input-group-text">
                          {{ PriceHelper::adminCurrency() }}
                      </div>
                  </div>
                    <input type="number" min="0" name="shipping_cost" class="form-control" placeholder="shipping cost">
                </div>
                </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.geozone.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
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
