<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item"><a class="active">List Categories</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                  
                <?php if($this->session->flashdata("success")){
                    ?>
                        <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata("success"); ?> 
                        </div>
                    <?php
                    }?>
                  
                <div class="card">
                  <div class="card-header text-white bg-primary">
                    Listing Categories
                      <button id="btn-add-category" class="btn btn-warning float-right text-white" data-toggle="modal" data-target="#exampleModal">Add Category</button>
                  </div>
                  <div class="card-body border-primary">
                    <table id="list-categories" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(count($categories)>0){
                    $count = 1;
                    foreach($categories as $index => $value){
                    ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $value->name ?></td>
                <td><?php echo $value->created_at ?></td>
                <td><?php 
                        if($value->status){
                            ?>
                            <button class="btn btn-success">Active</button>
                            <?php
                        }else{
                            ?>
                            <button class="btn btn-danger">Inactive</button>
                            <?php
                        }
                    ?></td>
                <td>
                <button class="btn btn-warning btn-edit-category" data-id = "<?php echo $value->id ?>">Edit</button>
                <button class="btn btn-danger btn-delete-category" data-id = "<?php echo $value->id ?>">Delete</button>
                </td>
            </tr>   
            <?php
                        $count++;
                    }
                }
            
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
                  </div>
                </div>
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

<!--box modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frm-add-category" class="validate-custom-form-error" method="post">
            
            <input type="hidden" name="opt_type" id="opt_type" value="add"/>
            <input type="hidden" name="edit_id" id="edit_id" value=""/>
            
          <div class="form-group">
            <label for="text_add_name">Name:</label>
            <input type="text" class="form-control" required id="text_add_name" name="text_add_name" placeholder="Enter Name">
          </div>
            
            <div class="form-group">
            <label for="dd_status">Status:</label>
            <select class="form-control" name="dd_status" id="dd_status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>