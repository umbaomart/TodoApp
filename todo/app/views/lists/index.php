    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <h3>TODOS</h3>                
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addtodo">
                    <i class="fa fa-plus"></i>
                </button>
                <!-- <a href="<?php echo URLROOT.'/add'?>" class="btn btn-primary float-right">
                    <i class="fa fa-plus"></i>
                </a> -->
            </div>
        </div>
        <!-- List of todos -->
        <div class="row">
            <div class="col-sm">
                <?php // print_r($data); ?>
                <?php foreach($data['todos'] as $todo) : ?>
                    <div class="container border rounded pt-3 pb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label ml-3" for="inlineCheckbox1"> <?php echo $todo->TODO; ?> </label>
                            <input id="todo_id" type="hidden" value="<?php echo $todo->ID; ?>">
                        </div>
                        <div class="float-right icon mb-1">
                            <!-- <a href="<?php echo URLROOT .'/edit/'.$todo->ID; ?>" class="btn btn-sm btn-primary btn_edit">
                                <i class="fa fa-edit"></i>
                            </a> -->
                            <button class="btn btn-sm btn-primary btn_edit" data-toggle="modal" data-target="#editTodo">
                                <i class="fa fa-edit"></i>
                            </button>
                            <a href="<?php echo URLROOT .'/delete/'.$todo->ID; ?>" class="btn btn-sm btn-primary">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- modal for adding a todo -->
        <div class="modal fade" id="addtodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Todo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_add_todo" action="" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Input your todo</label>
                        <input type="text" class="form-control" id="" placeholder="">
                        <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>">
                        <small id="emailHelp" class="form-text text-muted">Be productive and dont get pressured.</small>
                    </div>
                    
                </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
                </form>
            </div>
        </div>
        </div>

        <!-- modal for editing -->
        <div class="modal fade" id="editTodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Todo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_todo" action="" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Input your todo</label>
                        <input type="text" class="form-control" id="" placeholder="">
                        <small id="emailHelp" class="form-text text-muted">Be productive and dont get pressured.</small>
                    </div>
                    
                </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
                </form>
            </div>
        </div>
        </div>