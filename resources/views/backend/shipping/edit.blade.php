@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Update Shipping') }}</h1>
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
              <form action="{{ route('backend.shipping.update', $shipping->id) }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-12">
                    <label for="title">{{ __('Title') }} *</label>
                    <input type="text" name="title" class="form-control" id="shipping_title" placeholder="{{ __('Enter Title') }}" value="{{ $shipping->title }}" data-id="{{$shipping->id}}">
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="title">{{ __('Select State') }} *</label>
                    <select name="state_id"  class="form-control" id="state-dd" required>
                      <option value="">Select State</option>
                      @foreach (DB::table('states')->get() as $data)
                      <option value="{{$data->id}}" {{ $data->id == $shipping->state_id ? 'selected' : '' }}>
                          {{$data->name}}
                      </option>
                      @endforeach
                    </select>
                  </div>
                  {{-- <div class="form-group  col-md-4">
                    <label for="title">{{ __('Select State') }} *</label>
                    <select id="state-dd" class="form-control" name="state_id" required>
                    </select>
                  </div> --}}
                  <div class="form-group  col-md-6">
                    <label for="title">{{ __('Select City') }} *</label>
                    <select id="city-dd" class="form-control" name="city_id" required>
                    </select>
                  </div>

                  <div class="form-group  col-md-12">
                      <label for="no_of_times">{{ __('Price') }} *</label>
                      <small>({{ __('Set 0 to make it free') }})</small>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                {{ PriceHelper::adminCurrency() }}
                            </div>
                        </div>
                        <input type="number" name="price"  min="0" step="0.1" class="form-control" placeholder="{{ __('Enter Price') }}" value="{{ $shipping->price }}">
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.shipping.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
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
     $(document).ready(function () {

              var idState = $('#state-dd').val()
              $("#city-dd").html('');
                $.ajax({
                    url: "{{url('/admin/api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            
        });
  </script>
@endsection

