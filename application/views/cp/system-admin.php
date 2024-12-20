<?php include_once('inc-file/head.php'); ?>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<?php if (!isset($_GET['do'])): ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>System admin List <a href="<?php echo base_url(); ?>cp/Auth/System_admin?do=new" class="btn btn-success" style="float: right;">Add New Admin</a></h1>
          </div>
        </div> 
      </div>
    </section>
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="table">
                  <thead class="bg-danger tex-white">                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Image</th>
                      <th>Full name</th>
                      <th>Email Id</th>
                      <th>Mobile Number</th>
                      <th>Emergency No</th>
                      <th style="width: 120px;">Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php
                  $sqluser=$this->db->select('*')->from('users')->where('usertype','superadmin')->order_by('id','DESC')->get()->result_array();
                  $i=1;
                  foreach($sqluser as $rows)
                  {
                   ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <?php if(!empty($rows['image'])){ ?>
                      <th><img src="<?php echo base_url(); ?><?php echo $rows['image']; ?>" style="height: 45px;"></th>
                    <?php } else { ?>
                      <th></th>
                      <?php } ?>
                      <td><?php echo $rows['name']; ?></td>
                      <td><?php echo $rows['email_id']; ?></td>
                      <td><?php echo $rows['mobile']; ?></td>
                      <td><?php echo $rows['emg_no']; ?></td>
                      <td><select class="form-control" name="status" id="status" onchange="changeadminstatus('<?php echo $rows['id']; ?>','<?php echo $rows['status']; ?>')">
                        <option value="1" <?php if($rows['status']=="active"){ echo "selected"; } ?>>Active</option>
                        <option value="0" <?php if($rows['status']=="inactive"){ echo "selected"; } ?>>Inactive</option>
                      </select></td>
                      <td>
		               <a  class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>cp/Auth/System_admin?do=update&id=<?php echo $rows['id']; ?>"><i class="fa fa-pencil"></i></a>
		              <button class="btn btn-danger btn-sm" id="<?php echo $rows['id']; ?>" onclick="deleteuser(this.id)"><i class="fa fa-trash"></i></button></td>
                    </tr>
                  <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
        </div>
     </div>
  </div>
</section>
</div>
<?php else: ?>
	<div class="content-wrapper">
     <section class="content-header">
      <h1>Add/Update System Admin <a href="<?php echo base_url(); ?>cp/Auth/System_admin" class="btn btn-success pull-right">Admin List</a></h1>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-danger">
              <!-- <div class="card-header">
                <h3 class="card-title">Update User</h3>
              </div> -->
		          <?php if (isset($_GET['do']) && isset($_GET['id']) && !empty($_GET['do']) && !empty($_GET['id'])): ?>
		          <?php $id=$_GET['id']; 
              $sqledit=$this->db->select('*')->from('users')->where('id',$id)->get()->result_array();
                ?>
               <form role="form" id="userform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-3">
                    <input type="hidden" name="userid" id="userid" value="<?php echo $sqledit[0]['id']; ?>">
                    <label for="name">Full name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full name" value="<?php echo $sqledit[0]['name']; ?>">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="email_id">Email id</label>
                    <input type="text" class="form-control" id="email_id" name="email_id" placeholder="Enter Email ID" value="<?php echo $sqledit[0]['email_id']; ?>">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" class="form-control numonly" id="mobile" name="mobile" placeholder="Enter Mobile No" autocomplete="off" maxlength="10" value="<?php echo $sqledit[0]['mobile']; ?>">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="emg_no">Emergency No</label>
                    <input type="text" class="form-control numonly" id="emg_no" name="emg_no" placeholder="Enter Emergency Mobile No" autocomplete="off" maxlength="10" value="<?php echo $sqledit[0]['emg_no']; ?>">
                  </div>
                </div>
                <div class="row">
                  
                 <div class="col-md-4 form-group">
                    <label for="image">Profile Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                 <div class="form-group col-md-8">
                    <label for="full_address">Full Address</label>
                    <input type="text" name="full_address" id="full_address" class="form-control" placeholder="Enter Full Address" value="<?php echo $sqledit[0]['full_address']; ?>">
                  </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Details</button>
                </div>
              </form>
               <?php else: ?>
              <form role="form" id="userform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-3">
                  	<input type="hidden" name="userid" id="userid">
                    <label for="name">Full name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full name">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="email_id">Email id</label>
                    <input type="text" class="form-control" id="email_id" name="email_id" placeholder="Enter Email ID">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" class="form-control numonly" id="mobile" name="mobile" placeholder="Enter Mobile No" autocomplete="off" maxlength="10">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="emg_no">Emergency No</label>
                    <input type="text" class="form-control numonly" id="emg_no" name="emg_no" placeholder="Enter Emergency Mobile No" autocomplete="off" maxlength="10">
                  </div>
                </div>
                <div class="row">
                  
                 <div class="col-md-4 form-group">
                    <label for="image">Profile Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                 <div class="form-group col-md-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" autocomplete="off">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Enter Confirm Password">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="full_address">Full Address</label>
                    <input type="text" name="full_address" id="full_address" class="form-control" placeholder="Enter Full Address">
                  </div>
                  
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit Details</button>
                </div>
              </form>
               <?php endif ?>
            </div>
        </div>
    </div>
  </div>
</section>
</div>
<?php endif ?>
<?php include_once('inc-file/footer.php'); ?>
<script type="text/javascript">
  function changeadminstatus(id,status)
  {
     var abc=status;
     if(abc=="inactive")
     {
      var d="Active";
     }
     else
     {
      var d="Inactive";
     }
      if(confirm("Are you Sure to "+d+" this Super Admin Status ?")){
      var formdata={'id':id,'status':status};
       $.ajax({
          url: '<?php echo base_url('cp/Auth/changesuperstatus'); ?>',
          type: 'POST',
          dataType: 'json',
          data: formdata,
          success:function(data){
            //alert(data);
         if(data.success)
         {
          $('.table').load(location.href + " .table");
          $('.alert').show().addClass('alert-success').text("Super Admin status Successfully "+d);
              $('.alert').fadeOut(3000);
         }
        else
        {
           $('.alert').show().addClass('alert-danger').text("We have faceing some issue,Plz contact to developer");
             $('.alert').fadeOut(3000);
        }
         }  
      });
   }
  }
</script>
<script type="text/javascript">
	$(document).ready(function(){
      $("#userform").validate({
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
         username:{
            required: true
        },
         password:{
            required: true,
            minlength:6
        },
        confirmpassword:{
            equalTo: '#password'
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
        username:{
          required:"Please Enter Username"
        },
        password:{
          required:"Please Enter Password",
          minlength: "Please Enter Password Maximum 6 Digit"
        },
        confirmpassword: {
            equalTo: "Confirm Password not matched"
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
       var formData = new FormData($('#userform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>cp/Auth/managesystemuser', 
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
                  if (data.status=="added") {
                  $('.table').load(location.href + " .table");
               $('.alert').show().addClass('alert-danger').text("New Admin Created Successfully");
                $('.alert').fadeOut(6000);
                $('#userform').trigger('reset');
             }
             else if (data.status=='avail') {
                 $('.alert').show().addClass('alert-warning').text("user name Already Added");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Admin Updated Successfully");
                $('.alert').fadeOut(6000);
                 $('#userform .btn-success').text("Submit Details");
              } 
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
  function deleteuser(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('cp/Auth/deleteuser'); ?>',
      type:'POST',
      dataType:'json',
      data: formData,
    success:function(data)
    {
      if(data.success)
      {
      $('.table').load(location.href + " .table");
      $('.alert').show().addClass('alert-danger').text("Data Deleted Successfully");
          $('.alert').fadeOut(3000);
      }
      else
      {
       $('.alert').show().addClass('alert-danger').text("We have faceing some issue,Plz contact to developer");
         $('.alert').fadeOut(3000);
      }
    }
    })
  }
  }
</script>