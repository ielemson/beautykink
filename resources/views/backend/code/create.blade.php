@extends('backend.layouts.backend')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Create Coupon') }}</h1>
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
                            <form action="{{ route('backend.code.store') }}" method="POST" id="quickForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body row">
                                    <div class="col-md-12">
                                        @include('alerts.alerts')
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <label for="title">{{ __('Coupon Name') }} *</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="{{ __('Enter Title') }}" value="{{ old('title') }}" required>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="code_name" data-bs-toggle="tooltip" data-bs-placement="bottom" title="The code the customer enters to get the discount">{{ __('Code') }} <i class="fa fa-question-circle fa-1x" aria-hidden="true"></i>
                                            *</label>
                                        <input type="text" name="code_name" class="form-control " id="code_name"
                                            placeholder="{{ __('Enter Code') }}" value="{{ old('code_name') }}" required>
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <label for="title">{{ __('Products') }} </label>
                                        <select class="select2bs4" multiple="multiple" data-placeholder="Select Product"
                                            style="width: 100%;" name="product[]">
                                            @foreach ($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="title">{{ __('Category') }} </label>
                                        <select class="select2bs4" multiple="multiple" data-placeholder="Select Category"
                                            style="width: 100%;" name="category[]">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="title">{{ __('Date Start') }} *</label>
                                        <div class="input-group date date-picker" data-target-input="nearest">
                                            <input type="text" name="start_date"
                                                class="form-control  flash-deal-datepicker datetimepicker-input"
                                                data-target=".date-picker" />
                                            <div class="input-group-append" data-target=".date-picker"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="title">{{ __('Date End') }} *</label>
                                        <div class="input-group date date-picker2" data-target-input="nearest">
                                            <input type="text" name="end_date"
                                                class="form-control  flash-deal-datepicker datetimepicker-input"
                                                data-target=".date-picker2" />
                                            <div class="input-group-append" data-target=".date-picker2"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <label for="no_of_times">{{ __('Uses Per Coupon') }} </label>
                                        <input type="number" name="no_of_times" class="form-control " min="1"
                                            id="no_of_times" placeholder="{{ __('Enter Number of Times') }}"
                                            value="{{ old('no_of_times') }}" required>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="no_of_times">{{ __('Uses Per Customer') }} </label>
                                        <input type="number" name="no_of_times_per_user" class="form-control " min="0"
                                            id="no_of_times" placeholder="{{ __('Enter Number of Times') }}"
                                            value="{{ old('no_of_times_per_user') }}">
                                    </div>

                                    <div class="form-group  col-md-3">
                                        <label for="type">{{ __('Discount Type') }} *</label>
                                        <select name="type" id="type" class="form-control select2" required>
                                            <option value="percentage">{{ __('Percentage') }} (%)</option>
                                            <option value="amount">{{ __('Ammount') }}
                                                ({{ PriceHelper::adminCurrency() }})</option>
                                        </select>
                                    </div>

                                    <div class="form-group  col-md-9">
                                        <label for="discount">{{ __('Discount') }} *</label>
                                        <input type="number" name="discount" class="form-control " min="0"
                                            step="0.1" id="discount" placeholder="{{ __('Enter Discount') }}"
                                            value="{{ old('discount') }}">
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="shipping">{{ __('Free Shipping') }} </label>
                                        <label class="radio-inline ml-4"> 
                                          <input type="radio" name="shipping" value="1">Yes </label>
                                          <label class="radio-inline ml-4">          
                                          <input type="radio" name="shipping" value="0" checked>No </label>
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <label for="shipping">{{ __('Customer Login') }} </label>
                                        <label class="radio-inline ml-4"> 
                                          <input type="radio" name="customer_login" value="1">Yes </label>
                                          <label class="radio-inline ml-4">          
                                          <input type="radio" name="customer_login" value="0" checked>No </label>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="{{ route('backend.code.index') }}" class="btn btn-danger"><i
                                            class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                        
                    </div>
                    <!--/.col (left) -->
                   
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('script')
    <script>
        // $('document').ready(function(){
        //   $('.select2').select2()
        // })

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endsection
