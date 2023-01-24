@extends('backend.layouts.backend')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Restock Products') }}</h1>
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
                <div class="spinner"></div>     
                <a href="javascript:;" class="btn btn-primary btn-sm set_stock_limit">
                  <span class="badge badge-danger">{{$setting->item_stock_limit}}</span> 
                 {{ __('Set Stock Limit') }}</a>
                {{-- <a href="{{route('backend.customer.restock.message')}}" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> {{ __('Create Restock Message') }}</a> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="admin-table" class="table table-bordered">
                  <thead>
                  <tr>
                    {{-- <th><input type="checkbox" name="" data-target="product-bulk-delete" class=" bulk_all_delete" id=""></th> --}}
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Current Stock') }}</th>
                    {{-- <th>{{ __('Status') }}</th> --}}
                    {{-- <th>{{ __('Type') }}</th> --}}
                    <th>{{ __('Customer Email') }}</th>
                    <th>{{ __('Action') }}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @include('backend.item.stockTable', compact('datas'))
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


@section('script')
    @include('backend.includes.restockmodal')
@endsection