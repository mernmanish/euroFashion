<?php include_once('inc-file/head.php'); ?>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<?php if (!isset($_GET['do'])): ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Location List <a href="<?php echo base_url(); ?>cp/Location_master/location?do=new" class="btn btn-success" style="float: right;">Add New Location</a></h1>
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
                      <th>State</th>
                      <th>City</th>
                      <th>Location</th>
                      <th>Pin Code</th>
                      <th>Create Date</th>
                      <th>Update Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php
                  $sqluser=$this->db->select('location.*,state.name as statename,city.name as cityname')->from('location')->join('state','state.id=location.state_id')->join('city','city.id=location.city_id')->order_by('location.id','DESC')->get()->result_array();
                  $i=1;
                  foreach($sqluser as $rows)
                  {
                   ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                    
                      <td><?php echo $rows['statename']; ?></td>
                      <td><?php echo $rows['cityname']; ?></td>
                      <td><?php echo $rows['name']; ?></td>
                      <td><?php echo $rows['pin_code']; ?></td>
                      <td><?php echo $rows['ctime']; ?></td>
                      <td><?php echo $rows['mtime']; ?></td>
                      <td>
		               <a  class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>cp/Location_master/location?do=update&id=<?php echo $rows['id']; ?>"><i class="fa fa-pencil"></i></a>
		              <button class="btn btn-danger btn-sm" id="<?php echo $rows['id']; ?>" onclick="deletelocation(this.id)"><i class="fa fa-trash"></i></button></td>
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
      <h1>Add/Update Location <a href="<?php echo base_url(); ?>cp/Location_master/location" class="btn btn-success pull-right">Location List</a></h1>
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
              $sqledit=$this->db->select('*')->from('location')->where('id',$id)->get()->result_array();
                ?>
                <form role="form" id="locationform" method="post">
                <div class="card-body">
                  <div class="row">
                    <input type="hidden" name="locationid" id="locationid" value="<?php echo $sqledit[0]['id']; ?>">
                  
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
                   <div class="form-group col-md-3">
                    <label for="city_id">City Name</label>
                    <select class="form-control" name="city_id" id="city_id">
                      <option value="">Select State</option>
                      <?php $sqlcount=$this->db->select('*')->from('city')->order_by('name','ASC')->get()->result_array(); 
                       foreach($sqlcount as $rows)
                       {
                      ?>
                      <option value="<?php echo $rows['id']; ?>" <?php if($sqledit[0]['city_id']==$rows['id']){ echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                   <div class="form-group col-md-3">
                    <label for="name">Location Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Location Name" value="<?php echo $sqledit[0]['name']; ?>">
                  </div>
                   <div class="form-group col-md-3">
                    <label for="pin_code">Pin Code</label>
                    <input type="text" class="form-control" id="pin_code" name="pin_code" placeholder="Enter Pin Code" value="<?php echo $sqledit[0]['pin_code']; ?>">
                  </div>
                </div>
          
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="description">Description</label>
                     <textarea class="form-control" name="description" id="description" placeholder="Enter Country description"><?php echo $sqledit[0]['description']; ?></textarea>
                  </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success" id="submitstate">Update Details</button>
                </div>
              </form>
               <?php else: ?>
              <form role="form" id="locationform" method="post">
                <div class="card-body">
                  <div class="row">
                  <input type="hidden" name="locationid" id="locationid">
                  <div class="form-group col-md-3">
                    <label for="state_id">State Name</label>
                    <select class="form-control" name="state_id" id="state_id">
                      <option value="">Select State</option>
                      <?php $sqlcount=$this->db->select('*')->from('state')->order_by('name','ASC')->get()->result_array(); 
                       foreach($sqlcount as $rows)
                       {
                      ?>
                      <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                   <div class="form-group col-md-3">
                    <label for="city_id">City Name</label>
                    <select class="form-control" name="city_id" id="city_id">
                      <option value="">Select City</option>
                      <?php $sqlcount=$this->db->select('*')->from('city')->order_by('name','ASC')->get()->result_array(); 
                       foreach($sqlcount as $rows)
                       {
                      ?>
                      <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                   <div class="form-group col-md-3">
                    <label for="name">Location Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Location Name">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="pin_code">Pin Code</label>
                    <input type="text" class="form-control" id="pin_code" name="pin_code" placeholder="Enter Pin Code">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                  	<label for="description">Description</label>
                  	 <textarea class="form-control" name="description" id="description" placeholder="Enter Country description"></textarea>
                  </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success" id="submitstate">Submit Details</button>
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
	$(document).ready(function(){
		CKEDITOR.replace('description');
      $("#locationform").validate({
    rules: {
        state_id:{
            required:true
        },
        city_id:{
          required:true
        },
        name:{
            required:true
        },
        branch_id:{
          required:true
        },
        pin_code:{
          required:true
        }
    },
    messages: {
        state_id:{
          required:"Please Select State name"
        },
        city_id:{
          required:"Please Select City name"
        },
        name:{
          required:"Please Enter City name"
        },
        branch_id:{
          required:"Please Select Branch"
        },
        pin_code:{
          required:"Please Enter Pin Code"
        }
    },
    errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');

        if (element.parent().hasClass('input-group')) {
            label.insertAfter(element.parent());
        } 
           else if(element.hasClass('select') && element.next('.select2-container').length) {
        	error.insertAfter(element.next().next().next('.select2-container'));
         }
              else {   
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
      var description= CKEDITOR.instances.description.getData();
       var formData = new FormData($('#locationform')[0]);
        formData.append('description',description );
      $.ajax({
                url: '<?php echo base_url(); ?>cp/Location_master/managelocation', 
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
               $('.alert').show().addClass('alert-primary').text("Data Added Successfully");
                $('.alert').fadeOut(6000);
                $('#locationform').trigger('reset');
             }
             else if (data.status=='avail') {
                 $('.alert').show().addClass('alert-warning').text("Data Already Added");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Data Updated Successfully");
                $('.alert').fadeOut(6000);
                 $('#locationform .btn-primary').text("Submit Details");
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
  function deletelocation(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('cp/Location_master/deletelocation'); ?>',
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
<script type="text/javascript">
    $(document).ready(function(){
    $('#state_id').change(function(){
      var state_id = $('#state_id').val();
      if(state_id != '')
      {
       $.ajax({
        url:"<?php echo base_url(); ?>cp/Location_master/changelocation",
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
      }
     });
    $('#branch_id').change(function(){
      var branch_id = $('#branch_id').val();
      if(branch_id != '')
      {
       $.ajax({
        url:"<?php echo base_url(); ?>cp/Location_master/changebranchcity",
        method:"POST",
        data:{branch_id:branch_id},
        success:function(data)
        {
         $('#state_id').html(data);
        }
       });
      }
      else
      {
       $('#state_id').html('<option value="">Select State</option>');
      }
     });
    })
</script>
