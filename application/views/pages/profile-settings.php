<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item"><a class="active">Profile Settings</a></li>
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
                    Profile Settings
                  </div>
                  <div class="card-body border-primary">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="validate-custom-form-error" action="<?php echo site_url('admin/settings/profile_submit') ?>" method="post" enctype="multipart/form-data" id="frm-profile-settings">

                              <div class="form-group">
                                <label for="txt_name">Name:</label>
                                <input type="text" value="<?php echo $this->session->userdata('name') ?>" required class="form-control" name="txt_name" id="txt_name" placeholder="Enter Name">
                              </div>
                                
                                <div class="form-group">
                                <label for="txt_email">Email:</label>
                                <input type="email" value="<?php echo $this->session->userdata('email') ?>" required class="form-control" name="txt_email" id="txt_email" placeholder="Enter Email">
                              </div>
                                
                                <div class="form-group">
                                <label for="file_image">Profile Image:</label>
                                <input type="file" class="form-control" name="file_image" id="file_image">
                                    <br/>
                                    <?php 
                                        if($this->session->userdata('image')){
                                            ?>
                                    <img src="<?php echo $this->session->userdata('image'); ?>" style="height:100px;width:100px;"/>
                                    <?php
                                        }
                                    ?>
                              </div>
                                
                                <div class="form-group">
                                <label for="txt_password">Password:</label>
                                <input type="password" required class="form-control" name="txt_password" id="txt_password" placeholder="Enter Password">
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