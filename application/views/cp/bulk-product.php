<?php include_once('inc-file/head.php'); ?>
<style type="text/css">
  .error{
    color: #cd1000;
  }
</style>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add Product</h1>
          </div>
        </div> 
      </div>
    </section>
    <?php $id=$this->uri->segment(4); ?>
    <?php
    $sql=$this->db->select('*')->from('bulk_order')->where('id',$id)->get()->result_array(); 
    $cust=$this->db->select('*')->from('customer')->where('id',$sql[0]['cust_id'])->get()->result_array();
    ?>
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h5>Add Bulk Order Product</h5>
              </div>
              <form role="form" id="orderform" method="post">
                <div class="card-body">
                  <div class="row">
                    <input type="hidden" name="bulk_id" id="bulk_id">
                
                     <input type="hidden" name="cust_id" id="cust_id" value="<?php echo $sql[0]['cust_id']; ?>">
                    <div class="form-group col-md-4">
                      <label for="cust_name">Customer name</label>
                      <input type="text" class="form-control" name="cust_name" id="cust_name" value="<?php echo $cust[0]['cust_name']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="mob_no">Mobile No</label>
                      <input type="text" class="form-control" name="mob_no" id="mob_no" value="<?php echo $cust[0]['mobile']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="order_no">Order No</label>
                      <input type="text" class="form-control" name="order_no" id="order_no" value="<?php echo $sql[0]['order_no']; ?>">
                    </div>
                     <div class="form-group col-md-4">
                      <label for="order_date">Booking Date</label>
                      <input type="text" class="form-control" name="order_date" id="order_date" value="<?php echo $sql[0]['order_date']; ?>">
                    </div>
                     <div class="form-group col-md-4">
                    <label for="fulladdress">Full Address</label>
                    <input type="text" name="fulladdress" id="fulladdress" class="form-control" placeholder="Enter Full Address" value="<?php echo $sql[0]['fulladdress']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="">Landmark</label>
                    <input type="text" name="landmark" id="landmark" class="form-control" placeholder="Enter Landmark" value="<?php echo $sql[0]['landmark']; ?>">
                    <input type="hidden" name="ip_address" value="<?php echo $sql[0]['ip_address']; ?>">
                    <input type="hidden" name="state_id" value="<?php echo $sql[0]['state_id']; ?>">
                    <input type="hidden" name="city_id" value="<?php echo $sql[0]['city_id']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="pin_code">Pin Code</label>
                    <input type="text" name="pin_code" id="pin_code" class="form-control" placeholder="Enter Pin Code" value="<?php echo $sql[0]['pin_code']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="pro_id">Product</label>
                    <select class="form-control select2" id="pro_id" name="pro_id">
                      <option value="">Select Product</option>
                      <?php
                      $sql=$this->db->select('*')->from('product')->order_by('name','ASC')->get()->result_array();
                      foreach($sql as $rows)
                      { 
                        $size=$this->db->select('*')->from('size')->where('id',$rows['size_id'])->get()->result_array();
                      ?>
                      <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?> - [<?php echo $size[0]['name'] ?> ]</option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label class="qty">Product Qty</label>
                    <input type="text" name="qty" id="qty" class="form-control" placeholder="Enter Qty">
                  </div>
                 
                
                  
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit Order</button>
                </div>
              </form>
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
      $("#orderform").validate({
    rules: {
        pro_id:{
            required:true
        },
        qty:{
          required:true
        }
    },
    messages: {
        pro_id:{
          required:"Please Select Product"
        },
        qty:{
          required:"Please Enter Product Qty"
        }
    },
      highlight: function (element, errorClass, validClass) {
       var elem = $(element);
       if (elem.hasClass("select2-hidden-accessible")) {
           $(".select2-" + elem.attr("id") + "-container").parent().addClass(errorClass); 
       } else {
           elem.next().next().addClass(errorClass);
       }
     },
      unhighlight: function (element, errorClass, validClass) {
         var elem = $(element);
         if (elem.hasClass("select2-hidden-accessible")) {
              $(".select2-" + elem.attr("id") + "-container").parent().removeClass(errorClass);
         } else {
             elem.removeClass(errorClass);
              $(element).next('label').remove()
         }
     },
     success: function(label, element) {
        $(element).removeClass('errorClass');
    },
      errorPlacement: function(error, element) {
       var elem = $(element);
       if (elem.hasClass("select2-hidden-accessible")) {
           element = $("#select2-" + elem.attr("id") + "-container").parent(); 
           error.insertAfter(element);
       } else {
           error.insertAfter(element);
       }
     },
    submitHandler: function() {
       var formData = new FormData($('#orderform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>cp/Order/manageorderproduct',
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
                $('#orderform').trigger('reset');
             }
             else if (data.status=='avail') {
                 $('.alert').show().addClass('alert-warning').text("Data Already Added");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Data Upadated Successfully");
                $('.alert').fadeOut(6000);
                $('#transferid').val('');
                 $('#orderform .btn-primary').text("Submit Details");
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
  function edittransferorder(id)
  {
    var formData={'id': id};
    $.ajax({
      type:'POST',
      url:'<?php echo base_url('cp/Medicine/edittransferorder'); ?>',
      dataType:'json',
      data:formData,
      success:function(data){
        //alert(resp);
        $('#transferid').val(data.data.id);
        $('#store_id').val(data.data.store_id).trigger('change');
        $('#orderform .btn-primary').text("Update Details");
      }
    });
  }
</script>