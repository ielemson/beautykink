@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Create Shipping') }}</h1>
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
              <form action="{{ route('backend.shipping.store') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                
                  
                  <div class="form-group  col-md-6">
                    <label for="title">{{ __('Select Country') }} *</label>
                    <select name="country_id"  class="form-control select2bs4 select2-hidden-accessible" id="country_id" style="width:100%" required>
                      <option value="">Select Shipping Country</option>
                      @foreach ($countries as $data)
                      <option value="{{$data->id}}">
                          {{$data->name}}
                      </option>
                      @endforeach
                    </select>
                  </div>

                  
                  <div class="form-group  col-md-6">
                    <label for="title">{{ __('State Covered') }} *</label>
                     <select name="state_id" class="select2bs4 select2-hidden-accessible"  data-dropdown-css-class="select2-purple" id="state_data" data-placeholder="Selected States"
                      style="width: 100%;">
                    </select>
                  </div>
                  <div class="form-group  col-md-12">
                    <label for="title">{{ __('Attach Shipping Method') }} *</label>
                    <select name="shipping_method_id[]"  class="form-control select2bs4 select2-hidden-accessible" multiple="multiple" style="width:100%" required data-placeholder="Select Shipping Method">
                      {{-- <option value="">Select Shipping Method</option> --}}
                      @foreach ($methods as $data)
                      <option value="{{$data->id}}">
                          {{$data->name}}
                      </option>
                      @endforeach
                    </select>
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
            $('#country_id').on('change', function () {
                var idCountry = this.value;
                $("#state_data").html('');
                // $("#city-dd").html('');
                $.ajax({
                    url: "{{url('/admin/api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                      // console.log(result)
                        $('#state_data').html('<option value="">Select Zone</option>');
                        $.each(result.states, function (key, value) {
                            $("#state_data").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select Country</option>');
                    }
                });
            });
            // $('#zone-dd').on('change', function () {
            //     var idZone = this.value;
            //     $("#city-dd").html('');
            //     $.ajax({
            //         url: "{{url('/admin/api/fetch-zones')}}",
            //         type: "POST",
            //         data: {
            //             zone_id: idZone,
            //             _token: '{{csrf_token()}}'
            //         },
            //         dataType: 'json',
            //         success: function (res) {
            //           // console.log(res)
            //           $("#shipping_cost").val(res.cost)
            //             $('#city-dd').html('<option value="">Select City</option>');
            //             $.each(res.states, function (key, value) {
            //                 $("#city-dd").append('<option selected value="' + value
            //                     .id + '">' + value.name + '</option>');
            //             });
            //         }
            //     });
            // });
        });
  </script>
@endsection
