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
              <form action="{{ route('backend.item.highlight.store') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-12">
                    <label for="is_type">{{ __('Select Type') }} *</label>
                    {{-- <select name="is_type" id="is_type"  multiple="multiple" class="form-control select2" data-placeholder="Select Highlight">
                        <option value="" disabled>{{__('Select One')}}</option>
                        @foreach ($higlights as $higlight)
                          <option value="" >{{$higlight->name }}</option>
                        @endforeach
                    </select> --}}
                    <input type="hidden" name="product_id" value="{{$item->id}}">
                    
                    <select class="select2bs4" multiple="multiple" data-placeholder="Select Highlight"
                    style="width: 100%;" name="highlight_id[]" required>
                    <option value="">Select Country</option>
                    @foreach ($higlights as $higlight)
                        <option value="{{ $higlight->id }}" >{{ $higlight->name }}</option>
                    @endforeach

                </select>

                  </div>

                {{-- <div class="form-group col-md-3 show-datepicket {{ $item->is_type =='flash_deal' ? '' : 'd-none'}} ">
                    <label for="date">{{ __('Start Date') }} *</label>
                      <div class="input-group date date-picker" data-target-input="nearest">
                          <input type="text" name="date" class="form-control  flash-deal-datepicker datetimepicker-input" data-target=".date-picker" value="{{ $item->date }}"/>
                          <div class="input-group-append" data-target=".date-picker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 show-datepicket {{ $item->is_type =='flash_deal' ? '' : 'd-none'}} ">
                    <label for="date">{{ __('End Date') }} *</label>
                      <div class="input-group date date-picker2" data-target-input="nearest">
                          <input type="text" name="end_date" class="form-control  flash-deal-datepicker datetimepicker-input" data-target=".date-picker2" value="{{ $item->end_date }}"/>
                          <div class="input-group-append" data-target=".date-picker2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div> --}}

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.item.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                  <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          @if (count($itemhiglights_ids)> 0)
            <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('backend.Itemhighlight.update') }}" method="POST">
                @csrf
                {{-- @method('PUT') --}}
                <div class="card-body row">
                    <div class="col-md-12">
                        @include('alerts.alerts')
                    </div>

                  <div class="form-group  col-md-12">
                    <label for="is_type">{{ __('Dettach From Highlight') }} <small class="text-danger"> Select the highkight to dettach from the product </small>*</label>
                    {{-- <select name="is_type" id="is_type"  multiple="multiple" class="form-control select2" data-placeholder="Select Highlight">
                        <option value="" disabled>{{__('Select One')}}</option>
                        @foreach ($higlights as $higlight)
                          <option value="" >{{$higlight->name }}</option>
                        @endforeach
                    </select> --}}
                    <input type="hidden" name="product_id" value="{{$item->id}}">
                    
                    <select class="select2bs4" multiple="multiple" data-placeholder="Select Highlight"
                    style="width: 100%;" name="highlight_id[]" required>
                    <option value="">Select Country</option>
                   
                    @php
                      
                      $higlights = DB::table('highlights')->whereIn('id',$itemhiglights_ids)->get();
                    @endphp
            @foreach ($higlights as $higlight)
                                    <option value="{{ $higlight->id }}" selected>{{ $higlight->name }}</option>
                                @endforeach
                </select>

                  </div>

             
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route("backend.item.index") }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                  <button type="submit" class="btn btn-primary">{{ __('Dettach') }}</button>
                </div>
              </form>
            </div>
          </div>
          @endif
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

{{-- @section('script')
    <script>
        $('document').ready(function(){
          $('.select2').select2()
           $('.select2bs5').select2({
            theme: 'bootstrap4'
        })
        })

        //Initialize Select2 Elements
       
    </script>
@endsection --}}
