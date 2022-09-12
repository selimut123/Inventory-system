<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item"><a class="active">List Orders</a></li>
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
                    Listing Orders
                      <?php 
                        if($report){
                           ?>
                        <a id="btn-add-order" href="<?php echo site_url('admin/reports') ?>" class="btn btn-warning float-right text-white">Back</a>
                      <?php
                        }else{
                           ?>
                        <a id="btn-add-order" href="<?php echo site_url('admin/order/add-order') ?>" class="btn btn-warning float-right text-white">Create Order</a>
                      <?php 
                        }
                      ?>
                  </div>
                  <div class="card-body border-primary">
                    <table id="list-orders" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Customer Information</th>
                <th>Total Products</th>
                <th>Total Amount</th>
                <th>Discount(%)</th>
                <th>Created at</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(count($buyers) > 0){
                    $count = 1;
                    foreach($buyers as $index => $buyer){
                        
                        $order_info = $order_controller->get_buyer_product_info($buyer->id);
                        
                        ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo "Name: ".$buyer->name."<br/>Email: ".$buyer->email."<br/>Phone: ".$buyer->mobile; ?></td>
                <td><?php echo $order_info->total_products; ?></td>
                <td><?php echo $order_info->total_amount; ?></td>
                <td><?php echo $buyer->discount_percentage; ?></td>
                <td><?php echo $buyer->created_at; ?></td>
                <td><?php echo ucfirst($buyer->payment_mode); ?></td>
                <td>
                    <a href="<?php echo site_url('admin/order/invoice-detail/'.$buyer->id) ?>" class="btn btn-success">Invoice Details</a>
                </td>
            </tr>
            <?php
                        $count++;
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <th>Sr No</th>
            <th>Customer Information</th>
            <th>Total Products</th>
            <th>Total Amount</th>
            <th>Discount(%)</th>
            <th>Created at</th>
            <th>Payment Status</th>
            <th>Action</th>
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