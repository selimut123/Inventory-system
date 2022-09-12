<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Image Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item"><a class="active">Product Image Settings</a></li>
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
                    Product Image Settings
                  </div>
                  <div class="card-body border-primary">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="validate-custom-form-error" action="<?php echo site_url('admin/settings/save_product_image_settings') ?>" method="post" id="frm-product-image-settings">
                                <?php 
                                    $product_image_attributes = get_option_value("product_image_settings");
                                  $width = "";
                                  $height = "";
                                  $max_size = "";
                                  $valid_extensions = array();
                                  if(!empty($product_image_attributes)){
                                    $product_image_attributes = unserialize($product_image_attributes);
                                      $width = $product_image_attributes['width'];
                                      $height = $product_image_attributes['height'];
                                      $max_size = $product_image_attributes['size'];
                                      $valid_extensions = $product_image_attributes['extensions'];
                                  }
                                ?>

                              <div class="form-group">
                                <label for="txt_width">Image Width (Px):</label>
                                <input type="number" value="<?php echo $width; ?>" min="1" required class="form-control" name="txt_width" id="txt_width" placeholder="Enter Width">
                              </div>
                                
                                <div class="form-group">
                                <label for="txt_height">Image Height (Px):</label>
                                <input type="number" value="<?php echo $height; ?>" min="1" required class="form-control" name="txt_height" id="txt_height" placeholder="Enter Height">
                              </div>
                                
                                <div class="form-group">
                                <label for="txt_max_size">Image Size (KB):</label>
                                <input type="number" value="<?php echo $max_size; ?>" min="1" required class="form-control" name="txt_max_size" id="txt_max_size" placeholder="Enter Image Size">
                              </div>
                                
                                <div class="form-group">
                                <label for="txt_image_extensions">Select Image Extensions:</label>
                                    
                                <?php 
                                    if(count($valid_extensions) > 0){
                                            ?>
                                <?php 
                                    if(in_array("png",$valid_extensions)){
                                        echo '<input type="checkbox" name="chk_ext[]" value="png" checked /> PNG';
                                    }else{
                                         echo '<input type="checkbox" name="chk_ext[]" value="png" /> PNG';
                                    }  
                                ?>
                                    
                                <?php 
                                    if(in_array("jpg",$valid_extensions)){
                                        echo '<input type="checkbox" name="chk_ext[]" value="jpg" checked /> JPG';
                                    }else{
                                         echo '<input type="checkbox" name="chk_ext[]" value="jpg" /> JPG';
                                    }  
                                ?>
                                    
                                <?php 
                                    if(in_array("jpeg",$valid_extensions)){
                                        echo '<input type="checkbox" name="chk_ext[]" value="jpeg" checked /> JPEG';
                                    }else{
                                         echo '<input type="checkbox" name="chk_ext[]" value="jpeg" /> JPEG';
                                    }  
                                ?>
                                <?php
                                    }
                                ?>
                                    
                                
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