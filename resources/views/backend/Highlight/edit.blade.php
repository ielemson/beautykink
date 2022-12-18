@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Highlight Product') }}</h1>
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
              <form action="{{ route('backend.highlight.update',$data->id) }}" method="POST" id="quickForm">
                @csrf
                @method('PUT')
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                <div class="form-group col-md-6">
                    <label for="date">{{ __('Create New Highight') }} *</label>
                      <div >
                          <input type="text" name="name" class="form-control" placeholder="Create new highlight" value="{{$data->name}}" required/>
                        
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="date">{{ __('Highight Description') }} *</label>
                      <div>
                          <textarea type="text" name="description" class="form-control" rows="1" placeholder="Higlight description"  required>{{$data->description}}</textarea>
                        
                    </div>
                </div>

                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.highlight.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                  <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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
