<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome To Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>Data-tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>Data-tables/datatables-responsive/css/responsive.bootstrap4.min.css">
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet"  href="<?php echo base_url(); ?>css/font-awesome.css">
<?php if(!isset($this->session->userdata('sessionuser')['id'])){ 
  /*header("location: index.php");*/
 redirect('vendor/Auth');
} ?>
