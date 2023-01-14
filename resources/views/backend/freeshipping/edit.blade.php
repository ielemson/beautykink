@extends('backend.layouts.backend',['title'=>'Free Shipping'])
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Create Category') }}</h1>
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
              <form action="{{ route('backend.freeshipping.update', $data->id) }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body row">
                  <div class="col-md-12">
                    @include('alerts.alerts')
                  </div>

                  <div class="form-group  col-md-4">
                    <label for="name">{{ __('Reference Name') }} *</label>
                    <input type="text" name="reference_name" class="form-control item-name" id="name" placeholder="{{ __('Enter Reference Name') }}" value="{{$data->reference_name}}" required>
                  </div>
                    <div class="form-group  col-md-4">
                    <label for="text">{{ __('Title') }} *</label>
                    <input type="text" name="title" class="form-control " id="text" placeholder="{{ __('Enter Title') }}" value="{{$data->title}}" required>
                  </div>
                  <div class="form-group  col-md-4">
                    <label for="slug">{{ __('Select Country') }} *</label>
                    <select type="text" name="country_id" class="form-control " id="zone" placeholder="{{ __('Select Country') }}" required>
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}" {{$data->country_id == $country->id ? 'selected':''}}>
                            {{$country->name}}
                       </option>
                    @endforeach
                    
                    </select>
                  </div>
                  <div class="form-group  col-md-4">
                    <label for="slug">{{ __('Select Zone') }} *</label>
                    <select type="text" name="state_id" class="form-control " id="zone" placeholder="{{ __('Select Zone') }}" required>
                    @foreach ($states as $state)
                        <option value="{{$state->id}}" {{$data->state_id == $state->id ? 'selected':''}}>
                            {{$state->name}}
                       </option>
                    @endforeach
                    
                    </select>
                  </div>

     
                  <div class="form-group  col-md-4">
                    <label for="slug">{{ __('Condition') }} *</label>
                    <select type="text" name="condition" class="form-control " id="condition" placeholder="{{ __('Select Condition') }}" value="{{$data->condition}}" required>
                    
                        <option value="is">
                        {{__('is')}}
                       </option>
                        <option value="is not">
                          {{__('is not')}}
                       </option>
                    
                    
                    </select>
                  </div>


                  <div class="form-group  col-md-4">
                    <label for="meta_descriptions">{{ __('Amount') }} &#8358;</label>
                    <input type="number" name='price' min="0" class='form-control' placeholder="{{ __('Enter amount') }}" id="price" value="{{$data->price}}"/>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.freeshipping.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
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
