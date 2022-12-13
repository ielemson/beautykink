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
              <form action="{{ route('backend.shipping.update', $shipping->id) }}" method="POST" id="quickForm">
                @csrf
                @method('PUT')
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                
                  
                  <div class="form-group  col-md-6">
                    <label for="title">{{ __('Select Country') }} *</label>
                    <select name="country_id"  class="form-control select2bs4 select2-hidden-accessible" id="country_id" style="width:100%" required>
                      <option value="">Select Shipping Country</option>
                      @foreach ($countries as $data)
                      <option value="{{$data->id}}" {{$data->id == $shipping->country_id ? 'selected':''}}>
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
                      @foreach ($methods as $method)
                      <option value="{{$method->id}}" @if (in_array($method->id,json_decode($shipping->shipping_method_id,true)))
                        {{'selected'}} @endif>
                          {{$method->name}}
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

      // setTimeout(() => {
        var  idCountry = $( "#country_id option:selected" ).val();
        var page_data = {{ Js::from($shipping) }}
        // console.log(page_data.country_id)
        // var Selected;
      $.ajax({
                    url: "{{url('/admin/api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {

                      
                      console.log(result)
                        $('#state_data').html('<option value="">Select Zone</option>');
                        $.each(result.states, function (key, value) {
                        
                          // let Check = idCountry == value.country_id ? 'selected':''
                          if (page_data.state_id == value.id) {
                            Selected = 'selected';
                          }else{
                            var Selected  = "";
                          }
                            $("#state_data").append('<option '+Selected+' value="' + value
                                .id +'">' + value.name + '</option>');
                        });
                        // $('#city-dd').html('<option value="">Select Country</option>');
                    }
                });
      // }, 300);
            
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
            
        });
  </script>
@endsection
