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
            @include('backend.includes.summarycard')
                <!-- /.row -->
            @include('backend.includes.monthlyreport')
                <!-- Main row -->
              @include('backend.includes.ordertable')

              @include('backend.includes.todo')
                <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

     
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
                </li>`;
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



<script>
    $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var lineChartData1 = {
      labels  : [{!! $order_days !!}],
      datasets: [
        {
          label               : 'Product Sales',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : true,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [{!! $order_sales !!}]
        },
      ]
    }

    var lineChartOptions1 = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }


    //-------------
    //- LINE CHART - 1
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, lineChartOptions1)
    var lineChartData = $.extend(true, {}, lineChartData1)
    lineChartData.datasets[0].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    });

     //-------------
    //- LINE CHART - 2
    //--------------

    var lineChartData2 = {
      labels  : [{!! $earning_days !!}],
      datasets: [
        {
          label               : "Earning" + '{{ PriceHelper::adminCurrency() }}',
          backgroundColor     : 'rgba(215, 44, 38, 1)',
          borderColor         : 'rgba(215, 44, 38, 1)',
          pointRadius          : true,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [{!! $total_incomes !!}]
        }
      ]
    }

    var lineChartOptions2 = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    var lineChartCanvas = $('#lineChart2').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, lineChartOptions2)
    var lineChartData = $.extend(true, {}, lineChartData2)
    lineChartData.datasets[0].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    });


  })
  </script>
@endsection
