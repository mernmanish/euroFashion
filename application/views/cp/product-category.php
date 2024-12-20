<?php include_once('inc-file/head.php'); ?>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add/Update Product Category</h1>
          </div>
        </div> 
      </div>
    </section>
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header bg-danger">
                <h5 class="card-title">Add Product Category</h5>
              </div>
              <form role="form" id="categoryform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-12">
                    <input type="hidden" name="categoryid" id="categoryid">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name">
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
                  <div class="form-group col-md-12">
                    <label for="">Banner</label>
                    <img src="<?php echo base_url();?>img/no-image.jpg"  style="width: 100%;max-height: 150px;">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="banner" name="banner">
                        <label class="custom-file-label" for="banner">Choose file</label>
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
                <h5 class="card-title">Category List</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="table">
                  <thead class="bg-danger text-white">                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Category Name</th>
                      <th>Image</th>
                      <th>Banner</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php
                  $sqlbrand=$this->db->select('*')->from('category')->order_by('name','ASC')->get()->result_array();
                  $i=1;
                  foreach($sqlbrand as $rows)
                  {
                   ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <td><?php echo $rows['name']; ?></td>
                      <?php
                      if(!empty($rows['image']))
                      { 
                      ?>
                      <td><img src="<?php echo base_url(); ?><?php echo $rows['image']; ?>" style="height: 45px;"></td>
                    <?php } else { ?>
                      <td></td>
                    <?php } ?>
                    <?php
                      if(!empty($rows['banner']))
                      { 
                      ?>
                      <td><img src="<?php echo base_url(); ?><?php echo $rows['banner']; ?>" style="height: 45px;"></td>
                    <?php }else { ?>
                      <td></td>
                    <?php } ?>
                      <td>
		               <button class="btn btn-warning btn-sm" id="<?php echo $rows['id']; ?>" onclick="editcategory(this.id)"><i class="fa fa-pencil"></i></button>
		              <button class="btn btn-danger btn-sm" id="<?php echo $rows['id']; ?>" onclick="deletecategory(this.id)"><i class="fa fa-trash"></i></button></td>
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
      $("#categoryform").validate({
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
       var formData = new FormData($('#categoryform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>cp/Product_Master/add_category', 
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
                $('#categoryform').trigger('reset');
             }
             else if (data.status=='avail') {
                 $('.alert').show().addClass('alert-warning').text("Data Already Added");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Data Upadated Successfully");
                $('.alert').fadeOut(6000);
                $('#categoryid').val('');
                 $('#categoryform .btn-success').text("Submit Details");
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
  function deletecategory(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('cp/Product_Master/Delete_category'); ?>',
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
  function editcategory(id)
  {
    var formData={'id': id};
    $.ajax({
      type:'POST',
      url:'<?php echo base_url('cp/Product_Master/Edit_category'); ?>',
      dataType:'json',
      data:formData,
      success:function(data){
        //alert(resp);
        $('#categoryid').val(data.data.id);
        $('#name').val(data.data.name);
        if(data.data.banner!=""){
        $('#banner').parent('.custom-file').parent('div').prev('img').attr('src',"../../"+data.data.banner);
        }else{
        $('#banner').parent('.custom-file').parent('div').prev('img').attr('src',"../../img/no-image.jpg");
        }
        if(data.data.image!=""){
        $('#image').parent('.custom-file').parent('div').prev('img').attr('src',"../../"+data.data.image);
        }else{
        $('#image').parent('.custom-file').parent('div').prev('img').attr('src',"../../img/no-image.jpg");
        }
        $('#categoryform .btn-success').text("Update Details");
      }
    });
  }
</script>