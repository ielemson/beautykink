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
              <form action="{{ route('backend.geozone.store_zone') }}" method="POST">
                @csrf
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-6">
                    <label for="name">{{ __('Zone') }} *</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="enter zone e.g southeast">
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="name">{{ __('Country') }} *</label>
                    <select class="form-control"  data-placeholder="Select State"
                        style="width: 100%;" name="country_id" required>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach

                    </select>
                  </div>

                  {{-- <div class="form-group  col-md-12">
                    <label for="title">{{ __('Select State') }} </label>
                    <select class="select2bs4" multiple="multiple" data-placeholder="Select State"
                        style="width: 100%;" name="state_id[]" required>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach

                    </select>
                </div> --}}
                 
                  {{-- <div class="form-group  col-md-4">
                    <label for="title">{{ __('Shipping Rate') }} </label>
                    <small>({{ __('Set 0 to make it free') }})</small>
                    <div class="input-group mb-3">
                    <div class="input-group-append">
                      <div class="input-group-text">
                          {{ PriceHelper::adminCurrency() }}
                      </div>
                  </div>
               <input type="number" min="0" name="price" class="form-control" placeholder="shipping cost" required>
                </div>
                </div> --}}
                {{-- <div class="form-group  col-md-12">
                  <label for="title">{{ __('Shipping method') }} </label>
                 <textarea name="method" required class="form-control"  rows="2" required placeholder="e.g STANDARD SHIPPING (3-5 working days)"></textarea>
              </div> --}}
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
        </div>{{-- Create Zone --}}

        {{-- Create Zone --}}

        {{-- Bind Zone To State --}}
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('backend.geozone.store') }}" method="POST">
                @csrf
                <div class="card-body row">
                  
                  <div class="form-group  col-md-6">
                    <label for="name">{{ __('Country') }} *</label>
                    <select class="form-control"  data-placeholder="Select Country"
                        style="width: 100%;" name="country_id" id="country" required>
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach

                    </select>
                  </div>
          <div class="form-group  col-md-6">
                          <label for="title">{{ __('Select Zone') }} </label>
                          <select class="select2bs4"  data-placeholder="Select Zone"
                              style="width: 100%;" name="zone_id" id="zone_id" required>
                              {{-- @foreach ($zones as $zone)
                                  <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                              @endforeach --}}

                          </select>
                      </div>
                  <div class="form-group  col-md-6">
                    <label for="title">{{ __('Select State') }} </label>
                    <select class="select2bs4" multiple="multiple" id="state_id" data-placeholder="Select State"
                        style="width: 100%;" name="state_id[]" required>
                    </select>
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
        {{-- Bind Zone To State --}}
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


@section('script')
  <script>
     $("#country").on("change",function(){
        $('#state_id').html('');
        var country_id = this.value;
        // console.log(idState)
              $.ajax({
                  url: "{{url('/admin/api/fetch-states')}}",
                  type: "POST",
                  data: {
                    country_id: country_id,
                      _token: '{{csrf_token()}}'
                  },
                  dataType: 'json',
                  //         beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                  //     $('.spinner').html(`<i class="fas fa-spinner fa-spin fa-2x mx-auto"></i>`)
                  // },
                  success: function (res) {
                  // console.log(res)
                  // if (res.datas != null) {
                        // $('#state_id').html('<option value="">Available States </option>');
                        $.each(res.states, function (key, value) { $("#state_id").append(`<option value="${value.id}">${value.name}</option>`
                          );
                        // $.each(res.datas, function (key, value) { $("#shipping_method").append(`
                        // <div class="form-check">
                        //     <input class="form-check-input" type="radio" name="shipping_method" value="${value.id}" id="flexCheckDefault${value.id}" class="form-control shipping_method ">
                        //     <label class="form-check-label" for="flexCheckDefault${value.id}">
                        //    ${value.name} - ₦${value.price}
                        //     </label>
                        //   </div>`
                        //   );
                          });
                        }
                    
              });
        })
     $("#country").on("change",function(){
        $('#zone_id').html('');
        var country_id = this.value;
        // console.log(idState)
              $.ajax({
                  url: "{{url('/admin/api/fetch-zones')}}",
                  type: "POST",
                  data: {
                    country_id: country_id,
                      _token: '{{csrf_token()}}'
                  },
                  dataType: 'json',
                  //         beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                  //     $('.spinner').html(`<i class="fas fa-spinner fa-spin fa-2x mx-auto"></i>`)
                  // },
                  success: function (res) {
                  // console.log(res)
                  // if (res.datas != null) {
                        $('#zone_id').html('<option value="">Select Zone </option>');
                        $.each(res.zones, function (key, value) { $("#zone_id").append(`<option value="${value.id}">${value.name}</option>`
                          );
                        // $.each(res.datas, function (key, value) { $("#shipping_method").append(`
                        // <div class="form-check">
                        //     <input class="form-check-input" type="radio" name="shipping_method" value="${value.id}" id="flexCheckDefault${value.id}" class="form-control shipping_method ">
                        //     <label class="form-check-label" for="flexCheckDefault${value.id}">
                        //    ${value.name} - ₦${value.price}
                        //     </label>
                        //   </div>`
                        //   );
                          });
                        }
                    
              });
        })
  </script>
@endsection