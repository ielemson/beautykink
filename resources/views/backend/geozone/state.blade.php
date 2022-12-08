@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('State Menu') }} :: <small>Create & Manage  State</small></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          
          <!-- left column -->
          {{-- EDIT COUNTRY FORM ::::::::::::::::::::::::::::: --}}
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('backend.state.store') }}" method="POST" id="quickForm" enctype="multipart/form-data">
           
                @csrf
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-6">
                    <label for="name">{{ __('Select Country') }} *</label>
                    <select type="text" name="country_id" class="form-control" id="country" placeholder="{{ __('Enter Country Name') }}" value="{{ old('country_id') }}">
                    @foreach ($countries as $country)
                      <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                    </select>
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="title">{{ __('Enter New State') }} </label>
                    <input type="text" name='name' class='form-control' placeholder="{{ __('Enter New State') }}" required>
                 </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.geozone.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                  <button type="submit" class="btn btn-primary">{{ __('Create State') }}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          {{-- EDIT COUNTRY FORM ::::::::::::::::::::::::::::: --}}

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    {{-- BIND COUNTRY WITH A STATE ---------------------------------STARTS ::::::::::::::::::::::: --}}
       <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('BIND A COUNTRY TO STATE') }}</h1>
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
              <form action="{{ route('backend.country.state.bind') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-6">
                    <label for="name">{{ __('Country List') }} *</label>
                    <select type="text" name="country_id" class="form-control" id="country" placeholder="{{ __('Enter Country Name') }}" >
                      @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                      @endforeach
                      </select>
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="title">{{ __('Select State') }} </label>
                    <select class="select2bs4" multiple="multiple" data-placeholder="Select State"
                        style="width: 100%;" name="state_id[]">
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach

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
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    {{-- BIND COUNTRY WITH A STATE ---------------------------------ENDS ::::::::::::::::::::::: --}}
  </div>
  <!-- /.content-wrapper -->
@endsection
