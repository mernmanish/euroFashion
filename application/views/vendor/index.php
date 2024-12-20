<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome To Vendor Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/all.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>css/ionicons.min.css"> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-duallistbox.min.css">
 <link rel="stylesheet"  href="<?php echo base_url(); ?>css/font-awesome.css">
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url('<?php echo base_url(); ?>img/loginbanner.jpg'); background-size: 100% 100%; background-repeat: no-repeat; min-height: 310.8px;">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <div class="text-center">
       
         <img src="<?php echo base_url(); ?>img/vx-logo.png" class="text-center" style="height: 110px;">
     </div>
      <h5 class="login-box-msg">Welcome to Agriculture Protect</h5>
      <div class="alert" style="display: none;"></div>
      <form method="post" id="loginform">
        <div class="input-group mb-3">
          <input type="text" name="loginname" id="loginname" class="form-control" placeholder="Enter Mobile Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="loginpassword" id="loginpassword" class="form-control" placeholder="Enter Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Submit Now</button>
          </div>
        </div>
      </form>
    </div>
   
  </div>
</div>
<!-- <div style="position: fixed;bottom: 50px;left: 10px;"><img src="<?php echo base_url(); ?>img/logo.png" style="height: 250px;"></div> -->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>js/adminlte.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script >
  $(document).ready(function(){
    $("#loginform").validate({
    rules: {
        loginname: {
            required: true
        },
        loginpassword: {
            required: true
        }
    },
    messages: {
        loginname: {
            required: "Please Enter Registred Mobile No"
        },
        loginpassword: {
            required: "Please Enter Your Password"
        }
    },
    errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        if (element.parent().hasClass('input-group')) {
            label.insertAfter(element.parent());
        } else {
            label.insertAfter(element);
        }
    },
    highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
        $(element).next('label').remove()        
    },
    unhighlight: function(element) {
        $(element).parent().removeClass('has-danger')
        $(element).addClass('form-control-danger')
        $(element).next('label').remove()
    },
    success: function(label, element) {
        $(element).removeClass('text-danger');
    },
    submitHandler: function() {

        $.ajax({
                url: '<?php echo base_url(); ?>vendor/Auth/Login_user',
                type: 'POST',
                dataType: 'json',
                data: $("#loginform").serialize()
            })

            .done(function(data) {
              if(data.success){
                    $("#loginform").trigger('reset');
                    window.location="<?php echo base_url(); ?>vendor/Home";
                    return false;
              }
              else
              {
                $('.alert').show().addClass('alert-danger').text("Invalid username and password");
                    $('.alert').fadeOut(6000);
                    $('#loginform').trigger('reset');
                return false;
              }
                
            })
            .fail(function(data){
            return false;
            })
    }
  });
  });
</script>
</body>
</html>
