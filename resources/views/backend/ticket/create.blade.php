@extends('backend.layouts.backend')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Create Ticket') }}</h1>
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
              <form action="{{ route('backend.ticket.store') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-12">
                    <label for="email">{{ __('User Email') }} *</label>
                    <input type="email" name="email" class="form-control item-name" id="email" placeholder="{{ __('Enter Email') }}" value="{{ old('email') }}">
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="subject">{{ __('Subject') }} *</label>
                    <input type="text" name="subject" class="form-control " id="subject" placeholder="{{ __('Enter Subject') }}" value="{{ old('subject') }}">
                  </div>

                  <div class="form-group  col-md-12">
                    <label for="message">{{ __('Message') }} *</label>
                    <textarea type="text" name='message' id="message" class='form-control' placeholder="{{ __('Enter Message') }}">{{ old('message') }}</textarea>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="file">{{ __('Upload File') }}</label>
                    <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="file" id="file" class="custom-file-input upload-photo" id="file" aria-label="File browser" accept=".zip,.rar,.7zip">
                          <label class="custom-file-label" for="file">{{ __('Upload File') }}</label>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-8"></div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.ticket.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
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
