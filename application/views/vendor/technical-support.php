<?php include('inc-file/head.php'); ?>
<?php include('inc-file/header.php'); ?>
<?php include('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Write Here for Any Queries & Support</h1>
          </div>
        </div> 
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Support Center</h4>
              </div>
              <form role="form" id="supportform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-3">
                    <label for="name">Full name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full name" autocomplete="off">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="email_id">Email id</label>
                    <input type="text" class="form-control" id="email_id" name="email_id" placeholder="Enter Email ID" autocomplete="off">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" class="form-control numonly" id="mobile" name="mobile" placeholder="Enter Mobile No" autocomplete="off" maxlength="10">
                  </div>
                  <div class="col-md-3 form-group">
                    <label for="file">Upload File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file">
                        <label class="custom-file-label" for="file">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" placeholder="Write Your Message" autocomplete="off"></textarea>
                  </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit Details</button>
                </div>
              </form>
        
            </div>
        </div>
    </div>
  </div>
</section>
</div>
<?php include('inc-file/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
      $("#supportform").validate({
    rules: {
        name:{
            required:true
        },
        email_id:{
            required: true,
            email:true
        },
        mobile:{
            required: true
        },
        message:{
            required: true
        }
    },
    messages: {
        name:{
          required:"Please Enter Full name"
        },
        email_id:{
        required:"Please Enter Email id",
        email:"Please Enter Valid Email id"
        },
        mobile:{
          required:"Please Enter Mobile Number"
        },
        message:{
            required:"Please Write Your Message"
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
       var formData = new FormData($('#supportform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>branch/Home/manageamsupport', 
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
               $('.alert').show().addClass('alert-primary').text("Data has succefully Submited With us");
                $('.alert').fadeOut(6000);
                $('#supportform').trigger('reset');
             }
            else{
                $('.alert').show().addClass('alert-danger').text("Data not Added");
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