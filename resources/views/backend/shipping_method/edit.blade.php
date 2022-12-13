@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Create New Shipping Method') }}</h1>
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
              <form action="{{ route('backend.shippingmethod.update', $data->id) }}" method="POST" id="quickForm">
                @csrf
                @method('PUT')
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>
                            
                  <div class="form-group  col-md-4">
                    <label for="title">{{ __('Shipping Rate') }} </label>
                    <small>({{ __('Set 0 to make it free') }})</small>
                    <div class="input-group mb-3">
                    <div class="input-group-append">
                      <div class="input-group-text">
                          {{ PriceHelper::adminCurrency() }}
                      </div>
                  </div>
               <input type="number" min="0" name="price" class="form-control" placeholder="shipping cost" value="{{$data->price}}" required>
                </div>
                </div>
                <div class="form-group  col-md-6">
                  <label for="title">{{ __('Shipping method') }} </label>
                 <textarea name="name" required class="form-control"  required placeholder="e.g STANDARD SHIPPING (3-5 working days)">{{$data->name}}</textarea>
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
