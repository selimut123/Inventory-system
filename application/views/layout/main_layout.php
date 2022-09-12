<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
<?php $this->load->view("include/styles") ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php $this->load->view("include/Navbar") ?>
  <!-- /.navbar -->
    
  <!-- Main Sidebar Container -->
  <?php $this->load->view("include/sidebar") ?>

  <!-- Content Wrapper. Contains page content -->
  <?php $this->load->view($page_content); ?>
    
  <?php $this->load->view("include/footer"); ?>
  
</div>
<!-- ./wrapper -->

<?php $this->load->view("include/scripts"); ?>
</body>
</html>
