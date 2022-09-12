<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item"><a class="active">Edit Products</a></li>
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
                    Edit Products
                      <a id="btn-add-category" href="<?php echo site_url('admin/products') ?>" class="btn btn-warning float-right text-white">Back</a>
                  </div>    
                  <div class="card-body border-primary">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="validate-custom-form-error" action="<?php echo site_url('admin/product/submit-add-product') ?>" method="post" enctype="multipart/form-data" id="frm-add-product">
                                
                            <input type="hidden" value="edit" name="opt_type"/>
                            <input type="hidden" value="<?php echo $product->id; ?>" name="edit_id"/>
                                
                              <div class="form-group">
                                <label for="dd_category">Category:</label>
                                  <select class="form-control" required name="dd_add_product_category" id="dd_add_product_category">
                                    <option value="">Select Category</option>
                                      <?php 
                                        if(count($categories) >0){
                                            foreach($categories as $index => $category){
                                                $selectecd = "";
                                                if($category->id == $product->category_id){
                                                    $selectecd = "selected='selected'";
                                                }
                                                ?>
                                        <option value="<?php echo $category->id; ?>" <?php echo $selectecd ?> ><?php echo $category->name; ?></option>
                                      <?php
                                            }
                                        }
                                      ?>
                                  </select>
                              </div>
                                
                                <div class="form-group">
                                <label for="dd_brand">Brand:</label>
                                  <select class="form-control" required name="dd_add_product_brand" id="dd_add_product_brand">
                                    <option value="">Select Brand</option>
                                      <?php 
                                        if(count($brands) >0){
                                            foreach($brands as $index => $brand){
                                                $selectecd = "";
                                                if($brand->id == $product->brand_id){
                                                    $selectecd = "selected='selected'";
                                                }
                                                ?>
                                        <option value="<?php echo $brand->id; ?>" <?php echo $selectecd ?> ><?php echo $brand->name; ?></option>
                                      <?php
                                            }
                                        }
                                      ?>
                                  </select>
                              </div>
                                
                              <div class="form-group">
                                <label for="txt_name">Name:</label>
                                <input type="text" value="<?php echo $product->name; ?>" required class="form-control" name="txt_name" id="txt_name" placeholder="Enter Name">
                              </div>
                                
                                <div class="form-group">
                                <label for="txt_description">Description:</label>
                                <textarea class="form-control" required name="txt_description" id="txt_description" placeholder="Enter Description"><?php echo $product->description; ?></textarea>
                              </div>
                                
                                <div class="form-group">
                                <label for="file_image">Product Image:</label>
                                <input type="file" class="form-control" name="file_image" id="file_image">
                                    <br/>
                                    <?php 
                                    if(isset($product->image) && !empty($product->image)){
                                            ?>
                                        <img src="<?php echo $product->image ?>" style="height:80px; width:80px" title="Product Image"/>
                                        <?php
                                        }else{
                                            ?>
                                        <img src="<?php echo base_url() ?>/assets/images/no-image.png" style="height:80px; width:80px" title="Product Image"/>
                                        <?php
                                    }
                                ?>
                                    <br/>
                                    <?php 
                                    $image_attributes = get_option_value("product_image_settings");
                                    if(!empty($image_attributes)){
                                        $image_attributes = unserialize($image_attributes);
                                        echo "<b><i>Note: Width: ".$image_attributes['width'].", Height: ".$image_attributes['height'].", Upload size: ".$image_attributes['size']."kb </i></b>";
                                    }
                                
                                ?>
                                </div>
                                <div class="form-group">
                                <label for="txt_amount">Amount (<?php echo get_option_value("site_currency") ?>):</label>
                                <input type="number" min="1" value="<?php echo $product->amount; ?>" required class="form-control" name="txt_amount" id="txt_amount" placeholder="Enter Amount">
                              </div>
                                
                                <div class="form-group">
                                    <label for="dd_status">Status:</label>
                                    <select class="form-control" name="dd_status" id="dd_status">
                                        <option value="1" <?php 
                                                if($product->status == 1){
                                                    echo "selected = 'selected'";
                                                }
                                            ?> >Active</option>
                                        <option value="0" <?php 
                                                if($product->status == 0){
                                                    echo "selected = 'selected'";
                                                }
                                            ?>>Inactive</option>
                                    </select>
                                </div>
                                
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>  
                    </div>
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