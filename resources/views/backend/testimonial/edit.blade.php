@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Edit Ticket') }}</h1>
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
                <div class="card-header ui-sortable-handle" >
                  
                  Status :
                        @if ($testimonial->status == 1)
                        <span class="badge badge-primary ml-2">
                            Approved
                        </span>
                    @else
                    <span class="badge badge-danger ml-2">
                       Not Approved
                    </span>
                    @endif
                
                  </div>
                <!-- /.card-header -->
           
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                   
                    <h4>By:{{$testimonial->user->email}}</h4>
                        <div class="form-group  col-md-12">
                        <label for="message">{{ __('Message') }} *</label>
                        <textarea type="text" name='message' id="message" class='form-control' placeholder="{{ __('Testimonial') }}">{{ $testimonial->testimonial}}</textarea>
                        </div>
                        
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{ route("backend.testimonial.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                 
                </div>
             
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
