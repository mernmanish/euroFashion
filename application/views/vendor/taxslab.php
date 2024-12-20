<?php include_once('inc-file/head.php'); ?>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add/Update Taxslab</h1>
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
                <h5 class="card-title">Add New Taxsalb</h5>
              </div>
              <form role="form" id="taxslabform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-12">
                    <input type="hidden" name="taxid" id="taxid">
                    <label for="slabname">Slab Name</label>
                    <input type="text" class="form-control" id="slabname" name="slabname" placeholder="Enter Slab Name">
                  </div>
                   <div class="form-group col-md-12">
                    <label for="cgst">C-GST</label>
                    <input type="text" class="form-control" id="cgst" name="cgst" placeholder="Enter C-GST">
                  </div>
                   <div class="form-group col-md-12">
                    <label for="sgst">S-GST</label>
                    <input type="text" class="form-control" id="sgst" name="sgst" placeholder="Enter S-GST">
                  </div>
                   <div class="form-group col-md-12">
                    <label for="igst">I-GST</label>
                    <input type="text" class="form-control" id="igst" name="igst" placeholder="Enter I-GST">
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
                <h5 class="card-title">Taxslab List</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="table">
                  <thead class="bg-danger text-white">                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Slab Name</th>
                      <th>C-GST</th>
                      <th>S-GST</th>
                      <th>I-GST</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php
                  $sqlbrand=$this->db->select('*')->from('Taxslab')->order_by('igst','ASC')->get()->result_array();
                  $i=1;
                  foreach($sqlbrand as $rows)
                  {
                   ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <td><?php echo $rows['slabname']; ?></td>
                      <td><?php echo $rows['cgst']; ?></td>
                      <td><?php echo $rows['sgst']; ?></td>
                      <td><?php echo $rows['igst']; ?></td>
                      <td>
		               <button class="btn btn-warning" id="<?php echo $rows['id']; ?>" onclick="edittaxslab(this.id)"><i class="fa fa-pencil"></i></button>
		              <button class="btn btn-success" id="<?php echo $rows['id']; ?>" onclick="deletetaxslab(this.id)"><i class="fa fa-trash"></i></button></td>
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
      $("#taxslabform").validate({
    rules: {
        slabname:{
            required:true
        }
    },
    messages: {
        slabname:{
          required:"Please Enter Slab name"
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
       var formData = new FormData($('#taxslabform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>branch/Product_Master/manage_taxslab', 
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
                $('#taxslabform').trigger('reset');
             }
             else if (data.status=='avail') {
                 $('.alert').show().addClass('alert-warning').text("Data Already Added");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Data Upadated Successfully");
                $('.alert').fadeOut(6000);
                $('#taxid').val('');
                 $('#taxslabform .btn-success').text("Submit Details");
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
  function deletetaxslab(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('branch/Product_Master/delete_taxsalb'); ?>',
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
  function edittaxslab(id)
  {
    var formData={'id': id};
    $.ajax({
      type:'POST',
      url:'<?php echo base_url('branch/Product_Master/edit_taxslab'); ?>',
      dataType:'json',
      data:formData,
      success:function(data){
        //alert(resp);
        $('#taxid').val(data.data.id);
        $('#slabname').val(data.data.slabname);
        $('#cgst').val(data.data.cgst);
        $('#sgst').val(data.data.sgst);
        $('#igst').val(data.data.igst);
        $('#taxslabform .btn-success').text("Update Details");
      }
    });
  }
</script>
<script type="text/javascript">
   $(document).ready(function(){
       $('#cgst,#sgst').on('keyup',function(){
             var totaltax=(parseInt($('#cgst').val())+ parseInt($('#sgst').val()));
           $('#igst').val(totaltax);
         });
           $('#igst').on('keyup',function(){
            var igst= $('#igst').val()/2;
          $('#cgst').val(igst);
          $('#sgst').val(igst);
         });
   });
</script>