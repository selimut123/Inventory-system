<!-- /.content-wrapper -->
  <footer class="main-footer">
     <?php 
        $link = "#";
        $name = "Sample Organization";
        $footer_data = get_option_value("site_footer_setting");
        if(!empty($footer_data)){
            $footer_data = unserialize($footer_data);
            $link = $footer_data['link'];
            $name = $footer_data['name'];
        }

    ?> 
      
    <strong>Copyright &copy; <?php echo date("Y") ?> <a href="<?php echo $link ?>" target="_blank"><?php echo $name; ?></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>