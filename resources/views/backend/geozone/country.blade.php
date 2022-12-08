@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Country Menu') }}:: <small>{{__('Create & Manage Country')}}</small></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- jquery validation -->
            <div class="card">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('backend.country.store') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-12">
                    <label for="name">{{ __('Country') }} *</label>
                    <input type="text" name="country" class="form-control" id="country" placeholder="{{ __('Enter Country Name') }}" value="{{ old('name') }}" required>
                  </div>

                  {{-- <div class="form-group  col-md-6">
                    <label for="title">{{ __('Select State') }} </label>
                    <input type="text" name='states' id="tags" class='form-control tags' placeholder="{{ __('Enter States') }}" required>
                 </div> --}}

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{-- <a href="{{ route("backend.geozone.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a> --}}
                  <button type="submit" class="btn btn-primary">{{ __('Create Country') }}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!-- left column -->
          {{-- EDIT COUNTRY FORM ::::::::::::::::::::::::::::: --}}
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('backend.country.update') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @method('PUT')
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
                    <label for="title">{{ __('Enter New Country') }} </label>
                    <input type="text" name='name' class='form-control' placeholder="{{ __('Enter New Country') }}" required>
                 </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{-- <a href="{{ route("backend.geozone.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a> --}}
                  <button type="submit" class="btn btn-primary">{{ __('Update Country') }}</button>
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
                    <select type="text" name="country_id" class="form-control" id="country" placeholder="{{ __('Enter Country Name') }}" required>
                      @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                      @endforeach
                      </select>
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="title">{{ __('Select State') }} </label>
                    <select class="select2bs4" multiple="multiple" data-placeholder="Select State"
                        style="width: 100%;" name="state_id[]" required>
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

    {{-- DELETE COUNTRY STARTS HERE:::::::::::::::::::::::::::::::::::::;; --}}
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('DELETE COUNTRY') }}</h1>
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
              <form action="{{ route('backend.geozone.country.destroy')}}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-6">
                    <label for="name">{{ __('Country List') }} *</label>
                    <select type="text" name="country_id" class="form-control" id="country" placeholder="{{ __('Enter Country Name') }}" required>
                      @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                      @endforeach
                      </select>
                  </div>

                 

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.geozone.index") }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                  <button type="submit" class="btn btn-danger">{{ __('Delete Country') }}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    {{-- DELETE COUNTRY ENDS HERE:::::::::::::::::::::::::::::::::::::;; --}}
  </div>
  <!-- /.content-wrapper -->
@endsection
