0<?php include_once('inc-file/head.php'); ?>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add/Update Product Size</h1>
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
                <h5 class="card-title">Add New Product Size</h5>
              </div>
              <form role="form" id="sizeform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="name">Unit</label>
                    <input type="hidden" name="sizeid" id="sizeid">
                    <select class="form-control select2" name="unitid" id="unitid">
                      <option value="">Select Unit</option>
                      <?php
                      $sqlunit=$this->db->select('*')->from('unit')->order_by('name','ASC')->get()->result_array();
                      foreach($sqlunit as $rows)
                      {
                       ?>
                      <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="name">Size</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Size">
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
                <h5 class="card-title">Product Size List</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="table">
                  <thead class="bg-danger text-white">                  
                    <tr>
                      <th style="width: 25px">#</th>
                    
                      <th>Unit</th>
                      <th>Size</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php
                  $sqlsize=$this->db->select('size.name as sizename,size.id,unit.name as unitname')->from('size')->join('unit','unit.id=size.unitid')->get()->result_array();
                  $i=1;
                  foreach($sqlsize as $rows)
                  {
                   ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <td><?php echo $rows['unitname']; ?></td>
                      <td><?php echo $rows['sizename']; ?></td>
                      <td>
		               <button class="btn btn-warning" id="<?php echo $rows['id']; ?>" onclick="editsize(this.id)"><i class="fa fa-pencil"></i></button>
		              <button class="btn btn-success" id="<?php echo $rows['id']; ?>" onclick="deletesize(this.id)"><i class="fa fa-trash"></i></button></td>
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
      $("#sizeform").validate({
    rules: {
        name:{
            required:true
        },
         brandid:{
            required:true
        },
        unitid:{
          required:true
        }
    },
    messages: {
        name:{
          required:"Please Enter Product Size"
        },
        brandid:{
          required:"Please Select Product Brand"
        },
        unitid:{
          required: "Please Select Product Unit"
        }
    },
    errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        if (element.hasClass('form-control')) {
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
       var formData = new FormData($('#sizeform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>branch/Product_Master/Manage_size',
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
                $('#sizeform').trigger('reset');
             }
             else if (data.status=='avail') {
                 $('.alert').show().addClass('alert-warning').text("Data Already Added");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Data Upadated Successfully");
                $('.alert').fadeOut(6000);
                $('#unitid').val('');
                 $('#sizeform .btn-success').text("Submit Details");
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
  function deletesize(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('branch/Product_Master/Delete_size'); ?>',
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
  function editsize(id)
  {
    var formData={'id': id};
    $.ajax({
      type:'POST',
      url:'<?php echo base_url('branch/Product_Master/edit_size'); ?>',
      dataType:'json',
      data:formData,
      success:function(data){
        //alert(resp);
        $('#sizeid').val(data.data.id);
        $('#unitid').val(data.data.unitid).trigger('change');
        $('#name').val(data.data.name);
        $('#sizeform .btn-success').text("Update Details");
      }
    });
  }
</script>