@extends('backend.layouts.backend')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Currency') }}</h1>
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
                <a href="{{ route('backend.currency.create') }}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ __('Add') }}</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="admin-table" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Sign') }}</th>
                    <th>{{ __('Value') }}</th>
                    <th>{{ __('Default') }}</th>
                    <th>{{ __('Actions') }}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @include('backend.currency.table', compact('datas'))
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
