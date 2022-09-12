<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item"><a class="active">List Products</a></li>
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
                    Listing Products
                      <?php 
                        if($report){
                            ?>
                        <a href="<?php echo site_url('admin/reports') ?>" class="btn btn-warning float-right text-white">Back</a>
                      <?php
                        }else{
                            ?>
                        <a href="<?php echo site_url('admin/product/add-product') ?>" class="btn btn-warning float-right text-white">Add Product</a>
                      <?php
                        }
                      ?>
                  </div>
                  <div class="card-body border-primary">
                    <table id="list-products" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Created at</th>
                <th>Status</th>
                <?php 
                    if(!$report){
                        ?>
                <th>Action</th>
                <?php
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(count($products)>0){
                    $count = 1;
                    foreach($products as $index => $value){
                    ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td>
                    <?php 
                        if(isset($value->image) && !empty($value->image)){
                            ?>
                    <img src="<?php echo $value->image ?>" style="height:80px; width:80px" title="Product Image"/>
                    <?php
                        }else{
                            ?>
                    <img src="<?php echo base_url() ?>/assets/images/no-image.png" style="height:80px; width:80px" title="Product Image"/>
                    <?php
                        }
                    ?>
                    
                </td>
                <td><?php echo $value->name ?></td>
                <td>
                    <?php 
                        $cat_info = $product_controller->get_category_name($value->category_id);
                        echo isset($cat_info->name) ? $cat_info->name : "No Category"
                    ?>
                </td>
                <td>
                    <?php 
                        $brand_info = $product_controller->get_brand_name($value->brand_id);
                        echo isset($brand_info->name) ? $brand_info->name : "No Category" 
                    ?>
                </td>
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
                <?php 
                    if(!$report){
                        ?>
                 <td>
                 <a class="btn btn-warning" href="<?php echo site_url('admin/product/edit-product/'.$value->id) ?>">Edit</a>
                <button class="btn btn-danger btn-delete-product" data-id = "<?php echo $value->id ?>">Delete</button>
                </td>
                <?php
                    }
                        ?>
            </tr>   
            <?php
                        $count++;
                    }
                }
            
            ?>
        </tbody>
        <tfoot>
            <th>Sr No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Created at</th>
            <th>Status</th>
            <?php 
                    if(!$report){
                        ?>
                <th>Action</th>
                <?php
                    }
                ?>
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