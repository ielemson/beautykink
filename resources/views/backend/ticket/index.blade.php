@extends('backend.layouts.backend')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Manage Tickets') }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <input type="hidden" name="" id="tickets_url" value="{{ route('backend.ticket.index') }}">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              @include('alerts.alerts')
              <div class="card">
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('backend.ticket.index') }}" id="quickForm">
                  <div class="card-header">
                    <h3 class="card-title">
                      {{ __('Filter by type :') }}
                    </h3>
                  </div>
                  <div class="card-body row">

                    <div class="form-group  col-md-3">
                        <select name="type"  class="form-control select2">
                            <option value="" {{ request()->input('type') == '' ? 'selected' : '' }}>{{ __('All Tickets') }}</option>
                            <option value="Pending" {{ request()->input('type') == 'Pending' ? 'selected' : '' }}>{{__('Pending Tickets')}}</option>
                            <option value="Open" {{ request()->input('type') == 'Open' ? 'selected' : '' }}>{{__('Open Tickets')}}</option>
                            <option value="Closed" {{ request()->input('type') == 'Closed' ? 'selected' : '' }}>{{__('Closed Tickets')}}</option>
                        </select>
                    </div>

                    <div class="form-group  col-md-3">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> {{ __('Filter Tickets') }}</button>
                    </div>

                  </div>

                </form>
              </div>
              <!-- /.card -->
            <div class="card">
              <div class="card-header text-right">
                <a href="{{ route('backend.ticket.create') }}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ __('Add') }}</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="admin-table" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('User Name') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Last Reply') }}</th>
                    <th>{{ __('Actions') }}</th>
                  </tr>
                  </thead>
                  <tbody>
                      @include('backend.ticket.table', compact('datas'))
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
