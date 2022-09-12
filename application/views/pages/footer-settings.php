<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Footer Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item"><a class="active">Footer Settings</a></li>
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
                    Footer Settings
                  </div>
                  <div class="card-body border-primary">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="validate-custom-form-error" action="<?php echo site_url('admin/settings/footer_settings_submit') ?>" method="post" id="frm-footer-settings">
                                
                                <?php 
                                    $footer_settings = get_option_value("site_footer_setting");
                                  $link = "";
                                  $name = "";
                                  if(!empty($footer_settings)){
                                      $footer_settings = unserialize($footer_settings);
                                      $name = $footer_settings['name'];
                                      $link = $footer_settings['link'];
                                  }
                                ?>
                                
                                <div class="form-group">
                                <label for="txt_link">Footer Link:</label>
                                <input type="text" value="<?php echo $link; ?>" class="form-control" required name="txt_link" id="txt_link" placeholder="Enter Link" />    
                              </div>
                                <div class="form-group">
                                <label for="txt_name">Footer Organization name:</label>
                                <input type="text" value="<?php echo $name; ?>" class="form-control" required name="txt_name" id="txt_name" placeholder="Enter Organization name" />    
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