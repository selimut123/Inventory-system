<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List brands</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item"><a class="active">List Brands</a></li>
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
                    Listing brands
                      <button id="btn-add-brand" class="btn btn-warning float-right text-white" data-toggle="modal" data-target="#brand-modal">Add brands</button>
                  </div>
                  <div class="card-body border-primary">
                    <table id="list-brands" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Category</th>
                <th>Created at</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(count($brands)>0){
                    $count = 1;
                    foreach($brands as $index => $value){
                    ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $value->name ?></td>
                <td><?php 
                        $brand_data = $brand_controller->get_category_name($value->category_id); 
                        echo $brand_data->name;
                    ?></td>
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
                <button class="btn btn-warning btn-edit-brand" data-id = "<?php echo $value->id ?>">Edit</button>
                <button class="btn btn-danger btn-delete-brand" data-id = "<?php echo $value->id ?>">Delete</button>
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
                <th>Category</th>
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
<div class="modal fade" id="brand-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frm-add-brand" class="validate-custom-form-error" method="post">
            
            <input type="hidden" name="opt_type" id="opt_type" value="add"/>
            <input type="hidden" name="edit_id" id="edit_id" value=""/>
            
            <div class="form-group">
            <label for="dd_category">Category:</label>
            <select class="form-control" name="dd_category" id="dd_category">
                <option value="">Choose Category</option>
                <?php
                    if(count($categories) > 0){
                        foreach($categories as $index => $value){
                            ?>
                
                <option value="<?php echo $value->id ?>"><?php echo $value->name?></option>
                <?php
                        }
                    }
                ?>
            </select>
          </div>
            
          <div class="form-group">
            <label for="text_add_name">Name:</label>
            <input type="text" class="form-control" required id="text_add_name" name="text_add_name" placeholder="Brand Name">
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