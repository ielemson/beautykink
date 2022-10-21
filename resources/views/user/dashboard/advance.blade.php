<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        @include('alerts.alerts')
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fa fa-shopping-cart"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Orders') }}</span>
                    <span class="info-box-number">{{ $totalOrders }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fa fa-shopping-cart"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Pending Orders') }}</span>
                    <span class="info-box-number">{{ $totalPendingOrders }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fa fa-shopping-cart"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Delivered Orders') }}</span>
                    <span class="info-box-number">{{ $totalDeliveredOrders }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fa fa-shopping-cart"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Canceld Orders') }}</span>
                    <span class="info-box-number">{{ $totalCanceledOrders }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-primary"><i class="fa fa-chart-bar"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Product Sale') }}</span>
                    <span class="info-box-number">{{ $totalProductSale }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-primary"><i class="fa fa-chart-bar"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Today Product Order') }}</span>
                    <span class="info-box-number">{{ $totalTodayProductSale }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-primary"><i class="fa fa-chart-bar"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('This Month Sale') }}</span>
                    <span class="info-box-number">{{ $totalCurrentMonthProductSale }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-primary"><i class="fa fa-chart-bar"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('This Year Product Sale') }}</span>
                    <span class="info-box-number">{{ $totalLastYearProductSale }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fa fa-money-bill-wave"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Earning') }}</span>
                    <span class="info-box-number">{{ $totalEarning }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fa fa-money-bill-wave"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Pending Earning') }}</span>
                    <span class="info-box-number">{{ $totalTodayEarning }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fa fa-money-bill-wave"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('This Month Earning') }}</span>
                    <span class="info-box-number">{{ $totalMonthEarning }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fa fa-money-bill-wave"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('This Year Earning') }}</span>
                    <span class="info-box-number">{{ $totalYearEarning }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fa fa-check-circle"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Products') }}</span>
                    <span class="info-box-number">{{ $totalItems }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fa fa-check-circle"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Customers') }}</span>
                    <span class="info-box-number">{{ $totalUsers }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fa fa-check-circle"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Categories') }}</span>
                    <span class="info-box-number">{{ $totalCategories }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fa fa-check-circle"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Brands') }}</span>
                    <span class="info-box-number">{{ $totalBrands }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fa fa-check-circle"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Reviews') }}</span>
                    <span class="info-box-number">{{ $totalReviews }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fa fa-check-circle"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Transactions') }}</span>
                    <span class="info-box-number">{{ $totalTransactions }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fa fa-check-circle"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Tickets') }}</span>
                    <span class="info-box-number">{{ $totalTickets }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fa fa-check-circle"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Pending Tickets') }}</span>
                    <span class="info-box-number">{{ $totalPendingTickets }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fa fa-check-circle"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Open Tickets') }}</span>
                    <span class="info-box-number">{{ $totalTickets }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fa fa-check-circle"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Blogs') }}</span>
                    <span class="info-box-number">{{ $totalBlogs }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fa fa-check-circle"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Subscribers') }}</span>
                    <span class="info-box-number">{{ $totalSubscribers }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fa fa-check-circle"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total System Users') }}</span>
                    <span class="info-box-number">{{ $totalSystemUsers }}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
  
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-6">
            <!-- Line chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  {{ __('Monthly Product Sales Report') }}
                </h3>
  
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->
  
          </div>
          <!-- /.Left col -->
  
          <!-- Right col -->
          <div class="col-md-6">
            <!-- Line chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  {{ __('Monthly Earnings Report') }}
                </h3>
  
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                    <canvas id="lineChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.Right col -->
        </div>
        <!-- /.row (main row) -->
  
        <!-- Main row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                    <h3 class="card-title">{{__('Recent Orders')}}</h3>
  
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
                    <div class="card-body">
                    @if ($recentOrders->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>{{ __('Customer') }}</th>
                                <th>{{ __('Order ID') }}</th>
                                <th>{{ __('Payment Method') }}</th>
                                <th>{{ __('Total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentOrders as $data)
                                    <tr>
                                        <td><a href="{{ route('backend.user.show', $data->user_id) }}">{{ $data->user->displayName() }}</a></td>
                                        <td><a href="{{ route('backend.order.index', $data->id) }}">{{ $data->transaction_number }}</a></td>
                                        <td>{{ $data->payment_method }}</td>
                                        <td>{{ PriceHelper::orderTotal($data) }}</td>
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
        <!-- /.row (main row) -->
  
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->