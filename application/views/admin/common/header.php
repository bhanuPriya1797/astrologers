<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <title>Lekha Jokhha | <?php echo ucfirst($this->uri->segment(2));?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?> ">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jqvmap/jqvmap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css');?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css');?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.css');?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css');?>">
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCd0U-dY13CLZW2EB_By2_dIgqCJFyPMJ8&libraries=places&callback=initialize"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/select2/css/select2.min.css">
      <link rel="stylesheet" href="<?= base_url(); ?>assets/select2/css/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <script type="text/javascript" src="<?php  echo base_url('assets/plugins/ckeditor/ckeditor.js')?>"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <style>
    span.font-normal {
    font-weight: 400;
}
    .nav-icon.fas.fa-map-marker {
        font-family: 'FontAwesome';
    }
    .placeholder_image {
    width: 30px;
    height: 30px;
    overflow: hidden;
    border-radius: 50%;
    margin-right: 10px;
}

.placeholder_image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.placeholder p {
    margin: 0;
}

.placeholder {
    display: flex;
    align-items: center;
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php // echo base_url('assets/dist/img/AdminLTELogo.png');?>" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo $in_active;?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo $in_active;?> Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('admin/vendors');?>" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?php echo $in_active;?> Vendor added or Status Inactive
          </a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <div class="placeholder">
            <div class="placeholder_image">
              <?php if($current_user_data['profile_pic']!==""){ ?>
                <img src="<?php echo base_url('assets/admin/image/'.$current_user_data['profile_pic']);?>">
                <?php  }else{ ?>
                <img src="<?php echo base_url('assets/admin/image/user-icon.png');?>">
                <?php } ?>
            </div>
<p><?php echo $current_user_data['first_name']." ".$current_user_data['last_name']; ?></p>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?php echo base_url(ADMIN_PATH.'/profile') ?>" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>
          <a href="<?php echo base_url('admin/change_password') ?>" class="dropdown-item">
            <i class="fas fa-gear mr-2"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url(ADMIN_PATH.'/logout') ?>" class="dropdown-item">
            <i class="fa fa-sign-out mr-2"></i> Sign Out
          </a>
          
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->