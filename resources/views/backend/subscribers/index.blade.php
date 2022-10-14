@extends('backend.layouts.backend')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Subscribers List') }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              @include('alerts.alerts')
            <div class="card">
              <div class="card-header text-right">
                <a href="{{ route('backend.subscribers.mail') }}" type="button" class="btn btn-primary btn-sm"><i class="far fa-envelope"></i> {{ __('Send Email') }}</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="admin-table" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Actions') }}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger btn-sm delete-record" data-toggle="modal"
                                    data-title="{{ __('Confirm Delete?') }}"
                                    data-text="{{ __('Are you sure!') }} {{ __('Do you want to delete it?') }}"
                                    data-cancel_btn="{{ __('Cancel') }}"
                                    data-ok_btn="{{ __('Delete') }}"
                                    data-href="{{ route('backend.subscribers.delete', $data->id) }}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
