<?php include_once('inc-file/head.php'); ?>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add/Update Coupan</h1>
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
                <h5 class="card-title">Add Coupan</h5>
              </div>
              <form role="form" id="coupanform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-12">
                    <input type="hidden" name="coupanid" id="coupanid">
                    <label for="coupan_code">Coupan Code</label>
                    <input type="text" class="form-control" id="coupan_code" name="coupan_code" placeholder="Enter Coupan Code">
                  </div>
                  <!-- <div class="form-group col-md-12">
                    <label for="per_dic">Percent Discount(%)</label>
                    <input type="text" name="per_dic" id="per_dic" class="form-control" placeholder="Enter Discount in %" readonly>
                  </div> -->
                   <div class="form-group col-md-12">
                    <label for="fix_discount">Fixed Discount</label>
                    <input type="text" name="fix_discount" id="fix_discount" class="form-control" placeholder="Enter Fixed Discount">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="max_value">Max Value</label>
                    <input type="text" name="max_value" id="max_value" class="form-control" placeholder="Enter Max Value">
                  </div>
               
                  <div class="form-group col-md-12">
                    <label for="coup_val">Coupan Validity</label>
                    <input type="text" name="coup_val" id="coup_val" class="form-control" placeholder="Enter Coupan Validity" autocomplete="off">
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
                <h5 class="card-title">Coupan List</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="table">
                  <thead class="bg-danger text-white">                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Coupan Code</th>
                      <th>Discount</th>
                      <th>Max Value</th>
                    
                      <th>Coupan Validity</th>
                      <th style="width: 10%;">Action</th>
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php $sqlcat=$this->db->select('*')->from('coupan')->where('vendor_id',$this->session->userdata('sessionuser')['userid'])->order_by('id','DESC')->get()->result_array();
                  $i=1;
                  foreach($sqlcat as $rows)
                  {
                   ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <td><?php echo $rows['coupan_code']; ?></td>
                      <td>₹ <?php echo $rows['fix_discount']; ?></td>
                      <td><?php echo $rows['max_value']; ?></td>
                      <td><?php echo $rows['coup_val']; ?></td>
                      <td>
		               <button class="btn btn-warning btn-sm" id="<?php echo $rows['id']; ?>" onclick="editcoupan(this.id)"><i class="fa fa-pencil"></i></button>
		              <button class="btn btn-danger btn-sm" id="<?php echo $rows['id']; ?>" onclick="deletecoupan(this.id)"><i class="fa fa-trash"></i></button></td>
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
      $("#coupanform").validate({
    rules: {
        coupan_code:{
            required:true
        },
      
        fix_discount:{
          required:true,
          number:true
        },
      
        coup_val:{
          required:true
        }
    },
    messages: {
        coupan_code:{
          required:"Please Enter Coupan Code"
        },
     
        fix_discount:{
          required:"Please Enter Fixed Amount"
        },
      
        coup_val:{
          required:"Please Select Coupan Validity"
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
       var formData = new FormData($('#coupanform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>vendor/Product_Master/managecoupan', 
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
                $('#coupanform').trigger('reset');
             }
             else if (data.status=='avail') {
                 $('.alert').show().addClass('alert-warning').text("Data Already Added");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Data Upadated Successfully");
                $('.alert').fadeOut(6000);
                $('#coupanid').val('');
                 $('#coupanform .btn-success').text("Submit Details");
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
  function deletecoupan(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('vendor/Product_Master/deletecoupan'); ?>',
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
  function editcoupan(id)
  {
    var formData={'id': id};
    $.ajax({
      type:'POST',
      url:'<?php echo base_url('vendor/Product_Master/editcoupan'); ?>',
      dataType:'json',
      data:formData,
      success:function(data){
        //alert(resp);
        $('#coupanid').val(data.data.id);
        $('#coupan_code').val(data.data.coupan_code);
        $('#max_value').val(data.data.max_value);
        $('#fix_discount').val(data.data.fix_discount);
        $('#coup_val').val(data.data.coup_val);
        $('#coupanform .btn-success').text("Update Details");
      }
    });
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#coup_val").datepicker({ 
    dateFormat: "dd-mm-yy",
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true, 
  });
  });
</script>