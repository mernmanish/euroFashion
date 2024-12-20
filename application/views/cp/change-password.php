<?php include_once('inc-file/head.php'); ?>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-danger">
              <form role="form" id="cpform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-6">
                  	<input type="hidden" name="cpid" id="cpid" value="<?php echo $this->session->userdata('sessionuser')['id'] ?>">
                    <label for="username">Mobile No</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter User name" value="<?php echo $this->session->userdata('sessionuser')['mobile'] ?>" autocomplete="off" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="password">Current Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" autocomplete="off" value="<?php echo md5($this->session->userdata('sessionuser')['password']) ?>" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                  	<label for="newpassword">New Password</label>
                  	<input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="Enter New Password" autocomplete="off">
                  </div>
                  <div class="form-group col-md-6">
                  	<label for="cpassword">Confirm Password</label>
                  	<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Enter Confirm Password" autocomplete="off">
                  </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit Details</button>
                </div>
              </form>
            </div>
        </div>
    </div>
  </div>
</section>
</div>
<?php include_once('inc-file/footer.php'); ?>

<script type="text/javascript">
  $(document).ready(function(){
      $("#cpform").validate({
    rules: {
        newpassword:{
            required:true
        },
        cpassword:{
          required:true,
          equalTo:'#newpassword'
        }
    },
    messages: {
        newpassword:{
          required:"Please Enter New Password"
        },
        cpassword:{
          required:"Please Enter Confirm Password",
          equalTo:"Password Not Matched"
        }
    },
    errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        if (element.parent().hasClass('input-group')) {
            label.insertAfter(element.parent());
        } else if (element.is('select')) {
                label.insertAfter(element);
            }  else {   
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
       var formData = new FormData($('#cpform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>cp/Auth/change_userpassword', 
                type: 'POST',
                dataType: 'json', 
                data: formData,
                contentType: false,
                cache: false,
                processData:false
            })
            .done(function(data) {
                //alert(data);
                if (data.success) {
                $('.alert').show().addClass('alert-success').text("Your Password change Successfully");
                $('.alert').fadeOut(6000);
                return false;
            }
            else
            {
              $('.alert').show().addClass('alert-danger').text("We are faceing Technical Issue");
                $('.alert').fadeOut(6000);
                return false;
            }
            })
            .fail(function(data){
              alert('Failed');
            return false;
            })
        }
  });
  });
</script>
