<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item"><a class="active">Create Orders</a></li>
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
                    Create Order
                      <a href="<?php echo site_url('admin/orders') ?>" class="btn btn-warning float-right text-white">Back</a>
                  </div>
                  <div class="card-body border-primary">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="validate-custom-form-error" action="<?php echo site_url('admin/order/submit-created-order') ?>" method="post" id="frm-create-order">
                                
                                <h4>Buyer Information</h4>
                                <hr/>
                               <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="txt_name">Name:</label>
                                                <input type="text" required class="form-control" name="txt_name" id="txt_name" placeholder="Enter Name">
                                            </div>
                                       </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="txt_email">Email:</label>
                                                <input type="text" required class="form-control" name="txt_email" id="txt_email" placeholder="Enter email">
                                            </div>
                                       </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="txt_number">Contact Number:</label>
                                                <input type="number" min="1" required class="form-control" name="txt_number" id="txt_number" placeholder="Enter Name">
                                            </div>
                                       </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="txt_address">address:</label>
                                                <textarea class="form-control" name="txt_address" placeholder="Enter Address" required></textarea>
                                            </div>
                                       </div>
                                </div> 
                                
                                <h4>Product Information</h4>
                                <hr/>
                                <button type="button" class="btn btn-warning float-right text-white" id="btn-add-more">Add More</button>
                                <br/>
                                <br/>
                                <div class="container-fluid product-row" id="row-add-more-products">
                                <div class="row"> 
                                    <div class="col-md-2">
                                        <label for="dd_order_category">Category:</label>
                                        <select class="form-control dd_order_category" name="dd_order_category[]">
                                            <option value="">Select Category</option>
                                            <?php 
                                                if(count($categories) > 0){
                                                    foreach($categories as $index => $value){
                                                        ?>
                                            <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="dd_order_brand">Brand:</label>
                                        <select class="form-control dd_order_brand" name="dd_order_brand[]">
                                            <option value="">Select Brand</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="dd_order_product">Product:</label>
                                        <select class="form-control dd_order_product" name="dd_order_product[]">
                                            <option value="">Select Product</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="txt_quantity">Quantity:</label>
                                            <input type="number" min="1" required class="form-control txt_order_quantity" name="txt_quantity[]" value="1" placeholder="Enter Quantity">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="txt_order_amount">Amount (<?php echo get_option_value("site_currency") ?>):</label>
                                            <input type="number" min="0" readonly class="form-control txt_order_amount" name="txt_order_amount[]" value="0">
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                <h4>Product Information</h4>
                                <hr/>
                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="txt_discount">Discount(%):</label>
                                            <input type="number" required class="form-control" name="txt_discount" id="txt_discount" placeholder="Enter Discount">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                        <label for="dd_payment_mode">Payment Mode:</label>
                                        <select class="form-control" name="dd_payment_mode">
                                            <option value="cash">Cash</option>
                                            <option value="pending">Pending</option>
                                            <option value="online">Online Transfer</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                        <label for="dd_status">Status:</label>
                                        <select class="form-control" name="dd_status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                
                              <button type="submit" class="btn btn-primary">Submit Order</button>
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