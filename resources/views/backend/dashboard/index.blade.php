@extends('backend.layouts.backend')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
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
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalPendingOrders }}</h3>

                                <p>{{ __('Pending Orders') }}</p>
                            </div>
                            <div class="icon">
                                <i class="icon icon-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalProductSale }}</h3>

                                <p>{{ __('Total Sale') }}</p>
                            </div>
                            <div class="icon">
                                <i class="icon icon-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $totalUsers }}</h3>
                                <p>{{ __('Total Customers') }}</p>
                            </div>
                            <div class="icon">
                                <i class="icon icon-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="icon icon-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
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
                                                    <td><a
                                                            href="{{ route('backend.user.show', $data->user_id) }}">{{ $data->user->displayName() }}</a>
                                                    </td>
                                                    <td><a
                                                            href="{{ route('backend.order.index', $data->id) }}">{{ $data->transaction_number }}</a>
                                                    </td>
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

                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">

                        <!-- TO DO List -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="ion ion-clipboard mr-1"></i>
                                    To Do List
                                </h3>

                                {{-- <div class="card-tools">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                    </ul>
                                </div> --}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <ul class="todo-list" data-widget="todo-list">
                                   
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#modal-create-todo"><i class="fas fa-plus"></i> Add item</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </section>

                </div>
                <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        {{-- Todo Modal starts --}}
        <div class="modal fade" id="modal-create-todo">
            <div class="modal-dialog shadow-md modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Write your todo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="todoListForm" method="POST">
                            <div class="form-group">
                          <textarea class="form-control" name="todo" required placeholder="write your todo here..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-edit-todo">
            <div class="modal-dialog shadow-md modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit your todo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="updateTodo" method="POST">
                            <div class="form-group">
                          <textarea class="form-control" name="todo_update" required id="todoEdit"></textarea>
                          <input type="hidden" id="todId" name="todId">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Todo Modal ends --}}
    </div>
@endsection
@section('script')
    <script>
   
//    get all todos function

        function todoList(){
            $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "{{route('backend.todo.index')}}",
            success: function (response) {
                // console.log(response)
                var todoData = ""
                $.each(response.todos, function (key, item) {
                    var done = item.status == 1 ? 'done':''
                    var check = item.status == 1 ? 'checked':''
                    todoData += `
                    <li class="${done}">
                    <div class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="${item.id}" name="todocheck" id="todoCheck${item.id}" class="checkTodo" ${check} data-id="${item.id}">
                        <label for="todoCheck${item.id}"></label>
                    </div>
                    <span class="text">${item.todo}</span>
                    
                    <small class="badge badge-danger"><i class="far fa-clock"></i> ${moment(item.created_at).fromNow()} </small>
                    <div class="tools">
                        <i class="fas fa-edit text-info" data-id="${item.id}"></i>
                        <i class="fa fa-trash" data-id="${item.id}"></i>
                    </div>
                </li>
`;
                });
                $('.todo-list').html(todoData);
                }
        })
        }
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
 
  $('#todoListForm').on('submit',function(e){

      e.preventDefault();
      var todo = $("textarea[name='todo']").val();
      $.ajax({
         type:'POST',
         url:"{{ route('backend.todo.store') }}",
         data:{ todo:todo},
         success:function(data){
            // console.log(data)
          // initialize the toast
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3500
          })
          Toast.fire({
                  icon: 'success',
                  title:'Todo created successfully',
              })
          $("textarea[name='todo']").val('');
          $('#modal-create-todo').modal('hide');
          todoList()

         }
      });

  });

  $('document').ready(function(){
  todoList()
   
  })
  
  $('body').on('click', '.fa-trash', function () {
    var id = $(this).attr("data-id");

    $.ajax({
         type:'GET',
         url:'/admin/todo/remove' + '/' + id,
         success:function(data){
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3500
          })

          Toast.fire({
                  icon: 'success',
                  title:data.success,
              })
       todoList()
         }
      });
});

  $('body').on('click', '.fa-edit', function () {
    var id = $(this).attr("data-id");

    $.ajax({
         type:'GET',
         url:'/admin/todo/show' + '/' + id,
         success:function(data){
            $("textarea[id='todoEdit']").val(data.todo.todo);
            $("#todId").val(data.todo.id);
            $('#modal-edit-todo').modal('show');
        //  console.log(data)
         }
      });
});


$('#updateTodo').on('submit',function(e){

e.preventDefault();
var todo = $("textarea[name='todo_update']").val();
var id = $("input[name='todId']").val();
$.ajax({
   type:'POST',
   url:'/admin/todo/update',
   data:{ todo:todo,id:id},
   success:function(data){
  
    const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3500
          })
          Toast.fire({
                  icon: 'success',
                  title:data.message,
              })
          $("textarea[name='todo_update']").val('');
          $('#modal-edit-todo').modal('hide');
          todoList()

   }
});

});

$('body').on('click', '.checkTodo', function () {
    var id = $(this).attr("data-id");
        $.ajax({
   type:'POST',
   url:'/admin/todo/check',
   data:{ id:id},
   success:function(data){
          todoList()

   }
});
    });
    </script>
@endsection
