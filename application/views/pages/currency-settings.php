<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Currency Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item"><a class="active">Currency Settings</a></li>
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
                  
                  <?php 
                    if(get_option_value("site_currency")){
                        ?>
                        <div class="alert alert-info" role="alert">
                        <?php echo "Saved Currency ISO: ".get_option_value("site_currency"); ?> 
                        </div>
                  <?php
                    }
                  ?>
                  
                <div class="card">
                  <div class="card-header text-white bg-primary">
                    Currency Settings
                  </div>
                  <div class="card-body border-primary">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="validate-custom-form-error" action="<?php echo site_url('admin/settings/currency_submit') ?>" method="post" id="frm-currency-settings">
                                
                                <div class="form-group">
                                <label for="dd_currency">Select Currency:</label>
                                <select class="form-control" name="dd_currency">
                                    <option value="">Choose Currency</option>
                                    <?php 
                                        if(count($currencies) > 0){
                                            foreach($currencies as $index => $value){
                                                ?>
                                    <option value="<?php echo $value->iso ?>"><?php echo $value->name." (".$value->iso .")" ?></option>
                                    <?php
                                            }
                                        }
                                    ?>
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