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
            <h1>Testimonial List <a href="<?php echo base_url(); ?>cp/Website_setting/testimonial?do=new" class="btn btn-success" style="float: right;">Add New Testimonial</a></h1>

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
                      <th>Customer name</th>
                      <th>Rating</th>
                      <th>Status</th>
                      <th style="width: 9%;">Action</th>
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php
                  $sqltest=$this->db->select('*')->from('testimonial')->order_by('id','DESC')->get()->result_array();
                  $i=1;
                  foreach($sqltest as $rows)
                  {
                   ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <?php if($rows['image']==null)
                      {
                      	?>
                      <td><img src="<?php echo base_url(); ?>img/no-image.png" style="height: 45px;"></td>
                     <?php } else { ?>
                      <th><img src="<?php echo base_url(); ?><?php echo $rows['image']; ?>" style="height: 45px;"></th>
                      <?php } ?>
                      <td><?php echo $rows['cust_name']; ?></td>
                      <td>
                        <?php $rat=$rows['rating'];
                        for($i=1;$i<=$rat;$i++)
                        {
                          echo '<i class="fa fa-star text-warning"></i>';
                        } 
                        ?>
                        <?php echo $rows['rating']; ?></td>
                 
                      <td><select class="form-control" name="adminstatus" id="adminstatus" style="height: 30px;" onchange="changeteststatus('<?php echo $rows['id']; ?>','<?php echo $rows['status']; ?>')">
                           <option value="1" <?php if($rows['status']==1) { echo "selected"; } ?>>Active</option>
                           <option value="0" <?php if($rows['status']==0) { echo "selected"; } ?>>Inactive</option>
                         </select></td>
                      <td>
		               <a  class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>cp/Website_setting/testimonial?do=update&id=<?php echo $rows['id']; ?>"><i class="fa fa-pencil"></i></a>
		              <button class="btn btn-danger btn-sm" id="<?php echo $rows['id']; ?>" onclick="deletetestimonial(this.id)"><i class="fa fa-trash"></i></button></td>
                    </tr>
                    <tr>
                      <td></td>
                      <th></th>
                      <td colspan="5"><?php echo $rows['message']; ?></td>
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
      <h1>Add/Update Testimonial <a href="<?php echo base_url(); ?>cp/Website_setting/testimonial" class="btn btn-success pull-right">Testimonial List</a></h1>
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
              $sqledit=$this->db->select('*')->from('testimonial')->where('id',$id)->get()->result_array();
                ?>
               <form role="form" id="testimonialform" method="post">
                <div class="card-body">
                  <div class="row">
                    <input type="hidden" name="testid" id="testid" value="<?php echo $sqledit[0]['id'] ?>">
                  <div class="form-group col-md-4">
                    <label for="cust_name">Customer name</label>
                    <input type="text" name="cust_name" id="cust_name" class="form-control" placeholder="Enter Customer name" value="<?php echo $sqledit[0]['cust_name']; ?>">
                  </div>
                   <div class="form-group col-md-4">
                    <label for="rating">Rating</label>
                    <input type="text" class="form-control numonly" id="rating" name="rating" placeholder="Enter Rating in Point" maxlength="1" value="<?php echo $sqledit[0]['rating']; ?>">
                  </div>
                   <div class="col-md-4 form-group">
                    <label for="image">Customer Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="message">Message</label>
                     <textarea class="form-control" name="message" id="message" placeholder="Enter Message"><?php echo $sqledit[0]['message']; ?></textarea>
                  </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success" id="submitstate">Update Details</button>
                </div>
              </form>
               <?php else: ?>
              <form role="form" id="testimonialform" method="post">
                <div class="card-body">
                  <div class="row">
                    <input type="hidden" name="testid" id="testid">
                  <div class="form-group col-md-4">
                    <label for="cust_name">Customer name</label>
                    <input type="text" name="cust_name" id="cust_name" class="form-control" placeholder="Enter Customer name">
                  </div>
                   <div class="form-group col-md-4">
                    <label for="rating">Rating</label>
                    <input type="text" class="form-control numonly" id="rating" name="rating" placeholder="Enter Rating in Point" maxlength="1">
                  </div>
                   <div class="col-md-4 form-group">
                    <label for="image">Customer Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                  	<label for="message">Message</label>
                  	 <textarea class="form-control" name="message" id="message" placeholder="Enter Message"></textarea>
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
      $("#testimonialform").validate({
    rules: {
        cust_name:{
            required:true
        },
        rating:{
            required:true
        },
        message:{
          required:true
        }

    },
    messages: {
        cust_name:{
          required:"Please Enter Customer name"
        },
        rating:{
          required:"Please Enter Rating number"
        },
        message:{
          required:"Please Write Testimonial Message"
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
       var formData = new FormData($('#testimonialform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>cp/Website_setting/managetestimonial', 
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
               $('.alert').show().addClass('alert-danger').text("Data Added Successfully");
                $('.alert').fadeOut(6000);
                $('#testimonialform').trigger('reset');
             }
             else if (data.status=='avail') {
                 $('.alert').show().addClass('alert-warning').text("Data Already Added");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Data Updated Successfully");
                $('.alert').fadeOut(6000);
                 $('#testimonialform .btn-success').text("Submit Details");
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
  function deletetestimonial(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('cp/Website_setting/deletetestimonial'); ?>',
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
  function changeteststatus(id,status)
  {
     var abc=status;
     if(abc==0)
     {
      var d="Active";
     }
     else
     {
      var d="Inactive";
     }
      if(confirm("Are you Sure "+d+" the user status ?")){
      var formdata={'id':id,'status':status};
       $.ajax({
          url: '<?php echo base_url('cp/Website_setting/changeteststatus'); ?>',
          type: 'POST',
          dataType: 'json',
          data: formdata,
          success:function(data){
            //alert(data);
         $('.table').load(window.location + ' .table');
         }  
      });
   }
  }
</script>
