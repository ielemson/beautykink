<div class="row">
    <!-- col -->
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">{{ __('Recent Orders') }}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                @if ($recentOrders->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('Order ID') }}</th>
                                <th>{{ __('Customer') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Date Addedd') }}</th>
                                <th>{{ __('Payment Method') }}</th>
                                <th>{{ __('Total') }}</th>
                                <th>{{ __('View') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentOrders as $data)
                                <tr>
                                    <td>
                                        {{ $data->id }}
                                    </td>

                                    <td>
                                        <a href="{{ route('backend.user.show', $data->user_id) }}">{{ $data->user->displayName() }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('backend.order.index', $data->id) }}">{{ $data->order_status }}</a>
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($data->created_at)->format('d/m/y')}}
                                    </td>
                                    
                                    <td>{{ $data->payment_method }}</td>
                                    <td>&#8358;{{ PriceHelper::orderTotal($data) }}</td>
                                    <td><a href="{{ route('backend.order.index', $data->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">
                        {{ __('No Order Found.') }}
                    </p>
                @endif

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /. col -->

</div>