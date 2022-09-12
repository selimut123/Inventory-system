<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item"><a class="active">Invoice Detail</a></li>
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
                  
                <div class="card">
                  <div class="card-header text-white bg-primary">
                    Invoice Detail Page
                      <a id="btn-add-order" href="<?php echo site_url('admin/orders') ?>" class="btn btn-warning float-right text-white">Back</a>
                  </div>
                  <div class="card-body border-primary">
                    <div class="row">
        <div class="col-sm-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="text-right">Order # <?php echo $buyer->id ?></h3>
    		</div>
    		<div class="row">
    			<div class="col-sm-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					<?php echo $buyer->name ?><br>
    					<?php echo $buyer->address ?><br>
                        <?php echo $buyer->mobile ?>
    				</address>
    			</div>
    			<div class="col-sm-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					<?php echo $buyer->name ?><br>
    					<?php echo $buyer->address ?><br>
                        <?php echo $buyer->mobile ?>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-sm-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					<?php echo ucfirst($buyer->payment_mode) ?><br>
    					<?php echo $buyer->email ?>
    				</address>
    			</div>
    			<div class="col-sm-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					<?php echo $buyer->created_at ?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
                    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <?php
                                    $amount = 0;
                                    if(count($products)){
                                        foreach($products as $index =>$value){
                                            $amount += $value->total_amount;
                                            ?>
                                
                                <tr>
    								<td><?php echo $value->name ?></td>
    								<td class="text-center"><?php echo $value->amount ?></td>
    								<td class="text-center"><?php echo $value->quantity ?></td>
    								<td class="text-right"><?php echo $value->total_amount ?></td>
                                </tr>
                                    
                                <?php
                                        }
                                    }
                                ?>

    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal (<?php echo get_option_value("site_currency") ?>)</strong></td>
    								<td class="thick-line text-right"><?php echo $amount ?></td>
    							</tr>
                                <tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Discount(%)</strong></td>
    								<td class="no-line text-right"><?php echo $buyer->discount_percentage ?>%</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping</strong></td>
    								<td class="no-line text-right">0</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total (<?php echo get_option_value("site_currency") ?>)</strong></td>
    								<td class="no-line text-right">
                                        <?php 
                                            $amount = $amount - round($amount * ($buyer->discount_percentage/100),2);
                                        echo $amount;
                                        ?>
                                    </td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
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