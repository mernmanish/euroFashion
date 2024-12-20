<?php include_once('inc-file/head.php'); ?>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add/Update Product Brand</h1>
          </div>
        </div> 
      </div>
    </section>
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-danger">
              <div class="card-header bg-danger">
                <h5 class="card-title">Add New Brand</h5>
              </div>
              <form role="form" id="brandform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-12">
                    <input type="hidden" name="brandid" id="brandid" id="table">
                    <label for="name">Brand Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Brand Name">
                  </div>
                   <div class="form-group col-md-12">
                    <label for="">Image</label>
                    <img src="<?php echo base_url();?>img/no-image.jpg"  style="width: 100%;max-height: 150px;">
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
                  <button type="submit" class="btn btn-success">Submit Details</button>
                </div>
              </form>
            </div>
        </div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-header bg-danger">
                <h5 class="card-title">Brand List</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="table">
                  <thead class="bg-danger text-white">                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Brand Name</th>
                      <th>Image</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php
                  $sqlbrand=$this->db->select('*')->from('brand')->order_by('name','ASC')->get()->result_array();
                  $i=1;
                  foreach($sqlbrand as $rows)
                  {
                   ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <td><?php echo $rows['name']; ?></td>
                      <td><img src="<?php echo base_url(); ?><?php echo $rows['image']; ?>" style="height: 45px;"></td>
                      <td>
		               <button class="btn btn-warning btn-sm" id="<?php echo $rows['id']; ?>" onclick="editbrand(this.id)"><i class="fa fa-pencil"></i></button>
		              <button class="btn btn-danger btn-sm" id="<?php echo $rows['id']; ?>" onclick="deletebrand(this.id)"><i class="fa fa-trash"></i></button></td>
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
</div>
<?php include_once('inc-file/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
      $("#brandform").validate({
    rules: {
        name:{
            required:true
        }
    },
    messages: {
        name:{
          required:"Please Enter Brand Name"
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
       var formData = new FormData($('#brandform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>cp/Product_Master/Manage_Brand', 
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
                $('#brandform').trigger('reset');
             }
             else if (data.status=='avail') {
                 $('.alert').show().addClass('alert-warning').text("Data Already Added");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Data Upadated Successfully");
                $('.alert').fadeOut(6000);
                $('#brandid').val('');
                 $('#brandform .btn-success').text("Submit Details");
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
  function deletebrand(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('cp/Product_Master/Delete_brand'); ?>',
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
  function editbrand(id)
  {
    var formData={'id': id};
    $.ajax({
      type:'POST',
      url:'<?php echo base_url('cp/Product_Master/Edit_brand'); ?>',
      dataType:'json',
      data:formData,
      success:function(data){
        //alert(resp);
        $('#brandid').val(data.data.id);
        $('#name').val(data.data.name);
        if(data.data.image!=""){
        $('#image').parent('.custom-file').parent('div').prev('img').attr('src',"../"+data.data.image);
        }else{
        $('#image').parent('.custom-file').parent('div').prev('img').attr('src',"../img/no-image.jpg");
        }
        $('#brandform .btn-success').text("Update Details");
      }
    });
  }
</script>