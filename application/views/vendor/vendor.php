<?php include_once('inc-file/head.php'); ?>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<?php if (!isset($_GET['do'])): ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Vendor Details</h1>

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
                      <th>Contact Person</th>
                      <th>Mobile Number</th>
                      <th>Emergency No</th>
                      <th>Full Address</th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php
                  $sqluser=$this->db->select('*')->from('vendor')->where('id',$this->session->userdata('sessionuser')['userid'])->order_by('id','DESC')->get()->result_array();
                  $i=1;
                  foreach($sqluser as $rows)
                  {
                   ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <?php
                      if(!empty($rows['image']))
                      { 
                      ?>
                      <th><img src="<?php echo base_url(); ?><?php echo $rows['image']; ?>" style="height: 45px;"></th>
                    <?php } else { ?>
                      <td></td><?php } ?>
                      <td><?php echo $rows['name']; ?></td>
                  
                      <td><?php echo $rows['mobile']; ?></td>
                      <td><?php echo $rows['emg_no']; ?></td>
                      <td><?php echo $rows['full_address']; ?></td>
                      
                      
                      <td>
		               <a  class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>vendor/Vendor?do=update&id=<?php echo $rows['id']; ?>"><i class="fa fa-pencil"></i></a>
		              </td>
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
      <h1>Add/Update Branch <a href="<?php echo base_url(); ?>branch/Branch" class="btn btn-success pull-right">Branch List</a></h1>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">Update User</h3>
              </div> -->
		            <?php if (isset($_GET['do']) && isset($_GET['id']) && !empty($_GET['do']) && !empty($_GET['id'])): ?>
		          <?php $id=$_GET['id']; 
              $sqledit=$this->db->select('*')->from('vendor')->where('id',$id)->get()->result_array();
                ?>
              <form role="form" id="Vendorform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-3">
                    <input type="hidden" name="vendorid" id="vendorid" value="<?php echo $sqledit[0]['id']; ?>">
                    <label for="name">Vendor Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Vendor name" value="<?php echo $sqledit[0]['name']; ?>">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="email_id">Email id</label>
                    <input type="text" class="form-control" id="email_id" name="email_id" placeholder="Enter Email ID" value="<?php echo $sqledit[0]['email_id']; ?>">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile No" value="<?php echo $sqledit[0]['mobile']; ?>">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="state_id">State Name</label>
                    <select class="form-control" name="state_id" id="state_id">
                      <option value="">Select State</option>
                      <?php $sqlcount=$this->db->select('*')->from('state')->order_by('name','ASC')->get()->result_array(); 
                       foreach($sqlcount as $rows)
                       {
                      ?>
                      <option value="<?php echo $rows['id']; ?>" <?php if($sqledit[0]['state_id']==$rows['id']){ echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  
                   <div class="form-group col-md-3">
                    <label for="city_id">City Name</label>
                    <select class="form-control" name="city_id" id="city_id">
                      <option value="">Select State</option>
                      <?php $sqlcount=$this->db->select('*')->from('city')->where('state_id',$sqledit[0]['state_id'])->order_by('name','ASC')->get()->result_array(); 
                       foreach($sqlcount as $rows)
                       {
                      ?>
                      <option value="<?php echo $rows['id']; ?>" <?php if($sqledit[0]['city_id']==$rows['id']){ echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="pin_code">Pin Code</label>
                    <input type="text" class="form-control" id="pin_code" name="pin_code" placeholder="Enter Pin Code" value="<?php echo $sqledit[0]['pin_code']; ?>">
                  </div>
                  <div class="col-md-3 form-group">
                    <label for="image">Vendor Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 form-group">
                    <label for="aadhar">Aadhar Card</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="aadhar" name="aadhar">
                        <label class="custom-file-label" for="aadhar">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">

                   <div class="col-md-3 form-group">
                    <label for="pancard">Pan Card</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="pancard" name="pancard">
                        <label class="custom-file-label" for="pancard">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="emg_no">Emergency No</label>
                    <input type="text" name="emg_no" id="emg_no" class="form-control numonly" placeholder="Enter Emergency Number" autocomplete="off" maxlength="10" value="<?php echo $sqledit[0]['emg_no']; ?>">
                  </div>
                <div class="col-md-6">
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
	$(document).ready(function(){
      $("#Vendorform").validate({
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
       var formData = new FormData($('#Vendorform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>vendor/Vendor/managevendor', 
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
               $('.alert').show().addClass('alert-primary').text("Branch Created Successfully");
                $('.alert').fadeOut(6000);
                $('#Vendorform').trigger('reset');
             }
             else if (data.success=='avail') {
                 $('.alert').show().addClass('alert-warning').text("Branch Already Added");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Vendor Updated Successfully");
                $('.alert').fadeOut(6000);
                 $('#Vendorform .btn-success').text("Submit Details");
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
 
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $('#state_id').change(function(){
      var state_id = $('#state_id').val();
      if(state_id != '')
      {
       $.ajax({
        url:"<?php echo base_url(); ?>vendor/Location_master/changelocation",
        method:"POST",
        data:{state_id:state_id},
        success:function(data)
        {
         $('#city_id').html(data);
        }
       });
      }
      else
      {
       $('#city_id').html('<option value="">Select City</option>');
       $('#loc_id').html('<option value="">Select Location</option>');
       $('#pin_code').val('');
      }
     });
     $('#city_id').change(function(){
      var city_id = $('#city_id').val();
      if(city_id != '')
      {
       $.ajax({
        url:"<?php echo base_url(); ?>vendor/Location_master/change_location",
        method:"POST",
        data:{city_id:city_id},
        success:function(data)
        {
         $('#loc_id').html(data);
        }
       });
      }
      else
      {
       $('#loc_id').html('<option value="">Select Location</option>');
       $('#pin_code').val('');
      }
     });
    $('#loc_id').change(function(){
      var loc_id = $('#loc_id').val();
      var formData={'loc_id': loc_id};
      if(loc_id != '')
      {
    $.ajax({
      type:'POST',
      url:'<?php echo base_url('branch/Location_master/changepincode'); ?>',
      dataType:'json',
      data:formData,
      success:function(data){
        //alert(data);
        $('#pin_code').val(data.data.pin_code);
      }
    });
    }
    else
    {
      $('#pin_code').val('');
    }
    });
    })
</script>