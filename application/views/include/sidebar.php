<?php 
    $active_menu = $this->uri->segment(2);
echo $active_menu;
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('admin') ?>" class="brand-link">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <?php 
                if($this->session->userdata("image")){
                    ?>
            <img src="<?php echo $this->session->userdata("image") ?>" class="img-circle elevation-2" alt="User Image">
            <?php
                }else{
                    ?>
            <img src="<?php echo base_url() ?>/assets/images/no-user.png" class="img-circle elevation-2" alt="User Image">
            <?php
                }
            ?>
        </div>
        <div class="info">
          <a href="<?php echo site_url('admin/profile-settings') ?>" class="d-block"><?php echo $this->session->userdata("name")?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">MAIN NAVIGATION</li>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo site_url('admin') ?>" class="nav-link <?php if(empty($active_menu)){ ?>menu-active<?php }?>">
                <i class="nav-icon fas fa-file"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
            
            <li class="nav-item">
            <a href="<?php echo site_url('admin/categories') ?>" class="nav-link <?php if(!empty($active_menu) && $active_menu == "categories"){ ?>menu-active<?php }?>">
                <i class="nav-icon fas fa-file"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
            
            <li class="nav-item">
            <a href="<?php echo site_url('admin/brands') ?>" class="nav-link <?php if(!empty($active_menu) && $active_menu == "brands"){ ?>menu-active<?php }?>">
                <i class="nav-icon fas fa-file"></i>
              <p>
                Brands
              </p>
            </a>
          </li>
            
            <li class="nav-item">
            <a href="<?php echo site_url('admin/products') ?>" class="nav-link <?php if(!empty($active_menu) && $active_menu == "products"){ ?>menu-active<?php }?>">
                <i class="nav-icon fas fa-file"></i>
              <p>
                Products
              </p>
            </a>
          </li>
            
            <li class="nav-item">
            <a href="<?php echo site_url('admin/orders') ?>" class="nav-link <?php if(!empty($active_menu) && $active_menu == "orders"){ ?>menu-active<?php }?>">
                <i class="nav-icon fas fa-file"></i>
              <p>
                Orders
              </p>
            </a>
          </li>
            
            <li class="nav-item">
            <a href="<?php echo site_url('admin/reports') ?>" class="nav-link <?php if(!empty($active_menu) && $active_menu == "reports"){ ?>menu-active<?php }?>">
                <i class="nav-icon fas fa-file"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
            
          <li class="nav-item has-treeview">
            <a href="javascript:void(0)" class="nav-link <?php if(!empty($active_menu) && ($active_menu == "profile-settings" || $active_menu == "currency-settings" || $active_menu == "product-image-settings" || $active_menu == "footer-settings")){ ?>menu-active<?php }?>">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                 Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('admin/profile-settings') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/currency-settings') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Currency setting
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/product-image-settings') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Image Setting</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="<?php echo site_url('admin/footer-settings') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Footer Setting</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>