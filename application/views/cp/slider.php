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
            <h1>Slider List <a href="<?php echo base_url(); ?>cp/Website_setting/slider?do=new" class="btn btn-success" style="float: right;">Add New Slider</a></h1>
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
                      <th>Slider</th>
                      <th>Title</th>
                      <th>Subtitle</th>
                      <th>Bottom Title</th>
                      <th style="width: 15%;">Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php
                  $sqlslider=$this->db->select('*')->from('slider')->order_by('id','desc')->get()->result_array();
                  $i=1;
                  foreach($sqlslider as $rows)
                  {
                   ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <?php if($rows['image']==null)
                      {
                      	?>
                      <td></td>
                     <?php } else { ?>
                      <th><img src="<?php echo base_url(); ?><?php echo $rows['image']; ?>" style="height: 45px;"></th>
                      <?php } ?>
                      <td><?php echo $rows['title']; ?></td>
                      <td><?php echo $rows['sub_title']; ?></td>
                      <td><?php echo $rows['bottom_title']; ?></td>
                      <td><select class="form-control" name="adminstatus" id="adminstatus" style="height: 30px;" onchange="changsliderstatus('<?php echo $rows['id']; ?>','<?php echo $rows['status']; ?>')">
                           <option value="1" <?php if($rows['status']==1) { echo "selected"; } ?>>Active</option>
                           <option value="0" <?php if($rows['status']==0) { echo "selected"; } ?>>Inactive</option>
                         </select></td>
                      <td>
		               <a  class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>cp/Website_setting/slider?do=update&id=<?php echo $rows['id']; ?>"><i class="fa fa-pencil"></i></a>
		              <button class="btn btn-danger btn-sm" id="<?php echo $rows['id']; ?>" onclick="deleteslider(this.id)"><i class="fa fa-trash"></i></button></td>
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
      <h1>Add/Update Slider <a href="<?php echo base_url(); ?>cp/Website_setting/slider" class="btn btn-success pull-right">Slider List</a></h1>
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
              $sqledit=$this->db->select('*')->from('slider')->where('id',$id)->get()->result_array();
                ?>
              <form role="form" id="sliderform" method="post">
                <div class="card-body">
                  <div class="row">
                 <div class="form-group col-md-4">
                  <input type="hidden" name="sliderid" id="sliderid" value="<?php echo $sqledit[0]['id']; ?>">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Slider Title" value="<?php echo $sqledit[0]['title']; ?>">
                  </div>
                 <div class="form-group col-md-4">
                    <label for="sub_title">Sub Title</label>
                    <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Enter Sub Title" value="<?php echo $sqledit[0]['sub_title']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bottom_title">Bottom Title</label>
                    <input type="text" class="form-control" id="bottom_title" name="bottom_title" placeholder="Enter Bottom Title" value="<?php echo $sqledit[0]['bottom_title']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="url_link">Url Link</label>
                    <input type="url" class="form-control" id="url_link" name="url_link" placeholder="Enter Url Link" value="<?php echo $sqledit[0]['url_link']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="position">Position</label>
                    <select id="position" class="form-control" name="position">
                        <option value="">Select Postion</option>
                        <option value="top" <?php if($sqledit[0]['position']=="top"){ echo "selected";} ?>>Top</option>
                        <option value="bottom" <?php if($sqledit[0]['position']=="bottom"){ echo "selected";} ?>>Bottom</option>
                    </select>
                  </div>
                  <div class="col-md-4 form-group">
                    <label for="image">Slider Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success" id="submitstate">Submit Details</button>
                </div>
              </form>
               <?php else: ?>
              <form role="form" id="sliderform" method="post">
                <div class="card-body">
                  <div class="row">
                 <div class="form-group col-md-4">
                  <input type="hidden" name="sliderid" id="sliderid">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Slider Title">
                  </div>
                 <div class="form-group col-md-4">
                    <label for="sub_title">Sub Title</label>
                    <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Enter Sub Title">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bottom_title">Bottom Title</label>
                    <input type="text" class="form-control" id="bottom_title" name="bottom_title" placeholder="Enter Bottom Title">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="url_link">Url Link</label>
                    <input type="url" class="form-control" id="url_link" name="url_link" placeholder="Enter Url Link">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="position">Position</label>
                    <select id="position" class="form-control" name="position">
                        <option value="">Select Postion</option>
                        <option value="top">Top</option>
                        <option value="bottom">Bottom</option>
                    </select>
                  </div>
                  <div class="col-md-4 form-group">
                    <label for="image">Slider Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
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
      $("#sliderform").validate({
    rules: {
        title:{
            required:true
        },
        sub_title:{
            required:true
        },
        url_link:{
            required:true
        }
    },
    messages: {
        title:{
          required:"Please Enter Slider Title"
        },
        sub_title:{
          required:"Please Enter Slider Sub Title"
        },
        url_link:{
          required:"Please Enter Url Link"
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
       var formData = new FormData($('#sliderform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>cp/Website_setting/manageslider', 
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
                $('#sliderform').trigger('reset');
             }
             else if (data.status=='avail') {
                 $('.alert').show().addClass('alert-warning').text("Data Already Added");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Data Updated Successfully");
                $('.alert').fadeOut(6000);
                 $('#sliderform .btn-success').text("Submit Details");
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
  function deleteslider(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('cp/Website_setting/deleteslider'); ?>',
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
  function changsliderstatus(id,status)
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
      if(confirm("Are you Sure "+d+" the slider status ?")){
      var formdata={'id':id,'status':status};
       $.ajax({
          url: '<?php echo base_url('cp/Website_setting/changsliderstatus'); ?>',
          type: 'POST',
          dataType: 'json',
          data: formdata,
          success:function(data){
            //alert(data);
         $('.table').load(window.location + ' .table');
          $('.alert').show().addClass('alert-success').text("Slider status change Successfully");
          $('.alert').fadeOut(3000);
         }  
      });
   }
  }
</script>
