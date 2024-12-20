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
            <h1>Price Range List <a href="<?php echo base_url(); ?>cp/Product_Master/price_range?do=new" class="btn btn-success" style="float: right;">Add Price Range</a></h1>

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
               
                      <th>Price Range</th>
                      <th>Price From</th>
                      <th>Price To</th>
                      <th>Create Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php
                  $sqlcat=$this->db->select('*')->from('product_price')->order_by('id','ASC')->get()->result_array();
                  $i=1;
                  foreach($sqlcat as $rows)
                  {
                   ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                 
                      <td><?php echo $rows['pricerange']; ?></td>
                      <td><?php echo $rows['pricefrom']; ?></td>
                      <td><?php echo $rows['priceto']; ?></td>
                      <td><?php echo $rows['ctime']; ?></td>
                      <td>
		               <a  class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>cp/Product_Master/price_range?do=update&id=<?php echo $rows['id']; ?>"><i class="fa fa-pencil"></i></a>
		              <button class="btn btn-danger btn-sm" id="<?php echo $rows['id']; ?>" onclick="deletecollegefee(this.id)"><i class="fa fa-trash"></i></button></td>
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
      <h1>Add/Update Price Range<a href="<?php echo base_url(); ?>cp/Product_Master/price_range" class="btn btn-success pull-right">Price Range List</a></h1>
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
              $sqledit=$this->db->select('*')->from('product_price')->where('id',$id)->get()->result_array();
                ?>
               <form role="form" id="feeform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-4">
                    <input type="hidden" name="feeid" id="feeid" value="<?php echo $sqledit[0]['id']; ?>">
                    <label for="pricerange">Price Range</label>
                    <input type="text" class="form-control" id="pricerange" name="pricerange" placeholder="Enter Price Range" value="<?php echo $sqledit[0]['pricerange']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="pricefrom">Price From</label>
                    <input type="text" class="form-control" id="pricefrom" name="pricefrom" placeholder="Enter Below Price" value="<?php echo $sqledit[0]['pricefrom']; ?>" readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="priceto">Price To</label>
                    <input type="text" class="form-control" id="priceto" name="priceto" placeholder="Enter Maximum Price" value="<?php echo $sqledit[0]['priceto']; ?>">
                  </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Details</button>
                </div>
              </form>
               <?php else: ?>
              <form role="form" id="feeform" method="post">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-4">
                  	<input type="hidden" name="feeid" id="feeid">
                    <label for="pricerange">Price Range</label>
                    <input type="text" class="form-control" id="pricerange" name="pricerange" placeholder="Enter Price Range">
                  </div>
                  <div class="form-group col-md-4">
                    <?php 
                        $sqlfeeto=$this->db->select_max('priceto','contfeeto')->from('product_price')->get()->result_array();
                       if ($sqlfeeto[0]['contfeeto']=="") {
                        $finalfeeno="0"; 
                       }
                       else
                       {
                        $countfee=$sqlfeeto[0]['contfeeto'];
                        $finalfeeno=$countfee+1;
                       }
                    ?>
                    <label for="pricefrom">Price From</label>
                    <input type="text" class="form-control" id="pricefrom" name="pricefrom" placeholder="Enter Below Price" value="<?php echo $finalfeeno; ?>" readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="priceto">Price To</label>
                    <input type="text" class="form-control" id="priceto" name="priceto" placeholder="Enter Maximum Price" >
                  </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit Details</button>
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
     $('#pricefrom').priceFormat({
        prefix: 'Rs ',
        centsSeparator: ','
      });
     $('#priceto').priceFormat({
      prefix: 'Rs ',
      centsSeparator:','
     });
    });
  </script>
<script type="text/javascript">
	$(document).ready(function(){
    $.validator.addMethod('greter', function(value, element, param) {
      return this.optional(element) || parseInt(value) >= parseInt($(param).val());
     }, 'Invalid value');
  $("#feeform").validate({
    rules: {
        priceto:{
            required:true,
            greter:'#pricefrom'
        }
    },
    messages: {
        priceto:{
          required:"Please Enter Price To",
          greter:"Must be Greater Than Price From"
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
       var formData = new FormData($('#feeform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>cp/Product_Master/managepricerange', 
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
                $('#feeform').trigger('reset');
             }
             else if (data.status=='avail') {
                 $('.alert').show().addClass('alert-warning').text("Data Already Added");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Data Updated Successfully");
                $('.alert').fadeOut(6000);
                 $('#feeform .btn-primary').text("Submit Details");
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
  function deletecollegefee(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('cp/Product_Master/deletepricerange'); ?>',
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