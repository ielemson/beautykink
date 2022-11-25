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