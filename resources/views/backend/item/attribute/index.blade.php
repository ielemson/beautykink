@extends('backend.layouts.backend')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Attributes') }}</h1>
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
              <!-- /.card -->
            <div class="card">
              <div class="card-header text-right">
                  <a href="{{ route('backend.item.index') }}" type="button" class="btn btn-info btn-sm"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                  <a href="{{ route('backend.attribute.create', $item->id) }}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> {{ __('Add') }}</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="admin-table" class="table table-bordered">
                  <thead>
                  <tr>
                    <th width="20%">{{ __('Name') }}</th>
                    <th width="20%">{{ __('Type') }}</th>
                    <th width="15%">{{ __('Actions') }}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @include('backend.item.attribute.table', compact('datas'))
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
