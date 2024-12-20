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
            <h1>Offers List <a href="<?php echo base_url(); ?>cp/Offer/offer_details?do=new" class="btn btn-success" style="float: right;">Add New Offers</a></h1>

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
                  <thead class="bg-success tex-white">                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Image</th>
                      <th>Offer Title</th>
                      <th>Product</th>
                      <th>Discount</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php
                  $sqluser=$this->db->select('offers.*,product.name as prouctname')->from('offers')->join('product','product.id=offers.pro_id')->order_by('id','DESC')->get()->result_array();
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
                       <td><img src="<?php echo base_url(); ?><?php echo $rows['image']; ?>" style="height: 45px;"></td>
                     <?php } else { ?>
                      <td></td>
                     <?php } ?>
                      <td><?php echo $rows['offer_title']; ?></td>
                      <td><?php echo $rows['prouctname']; ?></td>
                      <td><?php echo $rows['discount']; ?> %</td>
                      <td><?php echo date('d-m-Y',strtotime($rows['start_date'])); ?></td>
                      <td><?php echo date('d-m-Y',strtotime($rows['end_date'])); ?> </td>
                      <td>
		               <a  class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>cp/Offer/offer_details?do=update&id=<?php echo $rows['id']; ?>"><i class="fa fa-pencil"></i></a>
		              <button class="btn btn-danger btn-sm" id="<?php echo $rows['id']; ?>" onclick="deleteoffer(this.id)"><i class="fa fa-trash"></i></button></td>
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
      <h1>Add/Update Offers <a href="<?php echo base_url(); ?>cp/Offer/offer_details" class="btn btn-success pull-right">Offers List</a></h1>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-success">
              <!-- <div class="card-header">
                <h3 class="card-title">Update User</h3>
              </div> -->
		            <?php if (isset($_GET['do']) && isset($_GET['id']) && !empty($_GET['do']) && !empty($_GET['id'])): ?>
		          <?php $id=$_GET['id']; 
              $sqledit=$this->db->select('*')->from('offers')->where('id',$id)->get()->result_array();
                ?>
               <form role="form" id="offerform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-4">
                    <input type="hidden" name="offer_id" id="offer_id" value="<?php echo $sqledit[0]['id']; ?>">
                    <label for="offer_title">Offer Title</label>
                    <input type="text" class="form-control" id="offer_title" name="offer_title" placeholder="Enter Offer Title" value="<?php echo $sqledit[0]['offer_title']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="pro_id">Product</label><br>
                    <select class="form-control select2" name="pro_id" id="pro_id">
                      <option value="">Select Product</option>
                      <?php 
                      $sql=$this->db->select('*')->from('product')->order_by('id','DESC')->get()->result_array(); 
                       foreach($sql as $rows)
                       {
                      ?>
                      <option value="<?php echo $rows['id']; ?>" <?php if($sqledit[0]['pro_id']==$rows['id']) { echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="discount">Discount (in %)</label>
                    <input type="text" class="form-control numonly" id="discount" name="discount" placeholder="Enter Discount (in %)" value="<?php echo $sqledit[0]['discount']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Enter Start Date" value="<?php echo $sqledit[0]['start_date']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Enter End Date" value="<?php echo $sqledit[0]['end_date']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="details">Offer Details</label>
                     <textarea class="form-control" name="details" id="details" placeholder="Enter Offer Details"><?php echo $sqledit[0]['details']; ?></textarea>
                  </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success" id="submitstate">Update Details</button>
                </div>
              </form>
               <?php else: ?>
              <form role="form" id="offerform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-4">
                    <input type="hidden" name="offer_id" id="offer_id">
                    <label for="offer_title">Offer Title</label>
                    <input type="text" class="form-control" id="offer_title" name="offer_title" placeholder="Enter Offer Title">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="pro_id">Product</label><br>
                    <select class="form-control select2" name="pro_id[]" id="pro_id" multiple="">
                      <option value="">Select Product</option>
                      <?php 
                      $sql=$this->db->select('*')->from('product')->order_by('id','DESC')->get()->result_array(); 
                       foreach($sql as $rows)
                       {
                      ?>
                      <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="discount">Discount (in %)</label>
                    <input type="text" class="form-control numonly" id="discount" name="discount" placeholder="Enter Discount (in %)">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Enter Start Date">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Enter End Date">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                  	<label for="details">Description</label>
                  	 <textarea class="form-control" name="details" id="details" placeholder="Enter Description"></textarea>
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
      $("#offerform").validate({
    rules: {
        offer_title:{
            required:true
        }
    },
    messages: {
        offer_title:{
          required:"Please Enter Offer Title"
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
       var formData = new FormData($('#offerform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>cp/Offer/manageoffers', 
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
                $('#offerform').trigger('reset');
             }
             else if (data.status=='avail') {
                 $('.alert').show().addClass('alert-warning').text("Data Already Added");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Data Updated Successfully");
                $('.alert').fadeOut(6000);
                 $('#offerform .btn-primary').text("Submit Details");
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
  function deleteoffer(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('cp/Offer/deleteoffer'); ?>',
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