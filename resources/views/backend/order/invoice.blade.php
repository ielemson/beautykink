@extends('backend.layouts.backend')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Order Invoice') }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4 class="text-center">
                    <img src="{{ asset($setting->logo) }}" class="img-fluid mb-5 mh-70" width="90" alt="">
                    <small class="float-right">{{ __('Order Date : ') }} {{ $order->created_at->format('M d, Y') }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
               <!-- info row -->
               <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5><b>{{__('Order Details :')}}</b></h5>
                  <span><b>{{ __('Transaction Id : ') }}</b></span>{{ $order->txnid }} <br>
                  <span>{{ __('Order Id : ') }}</span>{{ $order->transaction_number }} <br>
                  <span>{{ __('Order Date : ') }}</span>{{ $order->created_at->format('M d, Y') }} <br>
                  <span>{{ __('Payment Status : ') }}</span>
                  @if ($order->payment_status == 'Paid')
                    <div class="badge badge-success">{{ __('Paid') }}</div>
                  @else
                    <div class="badge badge-danger">{{ __('Unpaid') }}</div>
                  @endif
                  <br>
                  <span>{{ __('Payment Method : ') }}</span>{{ $order->payment_method }} <br><br><br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                    <h5>{{__('Billing Address :')}}</h5>
                    @php
                        $bill = json_decode($order->billing_info, true);
                    @endphp
                    <b>{{ __('Name : ') }}</b>{{ $bill['bill_first_name'] }} {{ $bill['bill_last_name'] }} <br>
                    <b>{{ __('Email : ') }}</b>{{ $bill['bill_email'] }}<br>
                    <b>{{ __('Phone : ') }}</b>{{ $bill['bill_phone'] }}<br>
                    @if (isset($bill['bill_address1']))
                        <b>{{ __('Address : ') }}</b>{{ $bill['bill_address1'] }}<br>
                    @endif
                    @if (isset($bill['bill_country']))
                        <b>{{ __('Country : ') }}</b>
                        @php
                          $country = DB::table('countries')->where('id',$bill['bill_country'])->first();
                        @endphp
                        {{ $country->name}}
                        <br>
                    @endif
                    @if (isset($bill['bill_city']))
                        <b>{{ __('City : ') }}</b>{{ $bill['bill_city'] }}<br>
                    @endif
                    @if (isset($bill['bill_zip']))
                        <b>{{ __('Zip : ') }}</b>{{ $bill['bill_zip'] }}<br>
                    @endif
                    @if (isset($bill['bill_company']))
                        <b>{{ __('Company : ') }}</b>{{ $bill['bill_company'] }}<br>
                    @endif
                </div>
                <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                    <h5>{{__('Shipping Address :')}}</h5>
                    @php
                        $ship = json_decode($order->shipping_info, true);
                    @endphp
                    <b>{{ __('Name : ') }}</b>{{ $ship['ship_first_name'] }} {{ $ship['ship_last_name'] }} <br>
                    <b>{{ __('Email : ') }}</b>{{ $ship['ship_email'] }}<br>
                    <b>{{ __('Phone : ') }}</b>{{ $ship['ship_phone'] }}<br>
                    @if (isset($ship['ship_address1']))
                        <b>{{ __('Address : ') }}</b>{{ $ship['ship_address1'] }}<br>
                    @endif
                    @if (isset($ship['ship_country']))
                        <b>{{ __('Country : ') }}</b>
                        @php
                        $country = DB::table('countries')->where('id',$ship['ship_country'])->first();
                      @endphp
                      {{ $country->name}}
                        {{-- {{ $ship['ship_country'] }} --}}
                        <br>
                    @endif
                    @if (isset($ship['ship_city']))
                        <b>{{ __('City : ') }}</b>{{ $ship['ship_state'] }}<br>
                    @endif
                    @if (isset($ship['ship_zip']))
                        <b>{{ __('Zip : ') }}</b>{{ $ship['ship_zip'] }}<br>
                    @endif
                    @if (isset($ship['ship_company']))
                        <b>{{ __('Company : ') }}</b>{{ $ship['ship_company'] }}<br>
                    @endif
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <br>
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>{{__('Products')}}</th>
                      <th>{{__('Attribute')}}</th>
                      <th>{{__('Quantity')}}</th>
                      <th>{{__('Price')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $option_price = 0;
                            $total = 0;
                        @endphp
                        @foreach (json_decode($order->cart, true) as $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>
                                    {{-- @if ($item['attribute']['option_name'])
                                        @foreach ($item['attribute']['option_name'] as $optionKey => $option_name)
                                            <span>
                                                <b>{{ $option_name }}</b> :
                                                <b>{{ $option_name }}</b> :
                                                @if ($setting->currency_direction == 1)
                                                    {{ $order->currency_sign }}{{ round($item['attribute']['option_price'][$optionKey] * $order->currency_value, 2) }}
                                                @else
                                                    {{ round($item['attribute']['option_price'][$optionKey] * $order->currency_value, 2) }}{{ $order->currency_sign }}
                                                @endif
                                            </span>
                                        @endforeach
                                    @else
                                        --
                                    @endif --}}
                                    @if ($item['attribute_name'])
                                        {{$item['attribute_name']}}
                                       @if ($item['attribute_price'] > 0)
                                           - <small><b>@money($item['attribute_price'],'NGN')</b></small>
                                       @endif
                                        @else
                                          --
                                       @endif
                                    
                                </td>
                                <td>{{ $item['qty'] }}</td>
                                <td>
                                  @money(round($item['main_price'] * $order->currency_value, 2),'NGN')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6"></div>
                <!-- /.col -->
                <div class="col-6">
                  <div class="table-responsive">
                    <table class="table">
                        @if ($order->tax != 0)
                            <tr>
                            <th>{{__('Tax')}}</th>
                            <td>
                                @if ($setting->currency_direction == 1)
                                    {{ $order->currency_sign }}{{ $order->tax }}
                                @else
                                    {{ $order->tax }}{{ $order->currency_sign }}
                                @endif
                            </td>
                            </tr>
                        @endif
                        @if (json_decode($order->discount, true))
                            @php
                                $discount = json_decode($order->discount, true);
                            @endphp
                            <tr>
                                <th>{{ __('Coupon discount') }} ({{ $discount['code']['code_name'] }})</th>
                                <td>
                                    @if ($setting->currency_direction == 1)
                                        -{{ $order->currency_sign }}{{ round($discount['discount'] * $order->currency_value, 2) }}
                                    @else
                                        -{{ round($discount['discount'] * $order->currency_value, 2) }}{{ $order->currency_sign }}
                                    @endif
                                </td>
                            </tr>
                        @endif
                        @if (json_decode($order->shipping, true))
                            @php
                                $shipping = json_decode($order->shipping, true);
                                $shipping_info = json_decode($order->shipping_info, true);
                              //  $zone = DB::table("states")->where('id',$shipping['id'])->first();
                              //  $state = DB::table("states")->where('id',$shipping['shipping_state_id'])->first();
                                
                            @endphp
                            <tr>
                                <th style="width:50%">{{__('Shipping')}} <small>{{$shipping['name']}}</small></th>
                                <td>
                                
                                    @if ($setting->currency_direction == 1)
                                        {{ $order->currency_sign }}{{ round($shipping['price'] * $order->currency_value, 2) }}
                                    @else
                                        {{ round($shipping['price'] * $order->currency_value, 2) }}{{ $order->currency_sign }}
                                    @endif
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <th>
                                @if ($order->payment_method == 'Cash On Delivery')
                                    {{__('Total amount')}}
                                @else
                                    {{__('Total amount due')}}
                                @endif
                            </th>
                            <td>
                                @if ($setting->currency_direction == 1)
                                    {{ $order->currency_sign }}{{ PriceHelper::orderTotal($order) }}
                                @else
                                    {{ PriceHelper::orderTotal($order) }}{{ $order->currency_sign }}
                                @endif
                            </td>
                        </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="{{ route('backend.order.print', $order->id) }}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> {{ __('Print') }}</a>

                  <a href="{{ route('backend.order.index') }}" class="btn btn-danger float-right" style="margin-right: 5px;">
                    <i class="fas fa-chevron-left"></i> {{ __('Back') }}
                  </a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
