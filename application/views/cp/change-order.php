<?php include_once('inc-file/head.php'); ?>
<style type="text/css">
  fieldset.scheduler-border {
    border: 1px groove #007bff !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }
</style>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<?php if (!isset($_GET['do'])): ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add/Update Orders<a href="<?php echo base_url(); ?>cp/Order/change_order?do=new" class="btn btn-success" style="float: right;">Add New Orders</a></h1>
           
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
                      <th>Branch</th>
                      <th>Order No</th>
                      <th>Customer name</th>
                      <th>Mobile No</th>
                      <th>Order Date</th>
                      <th>Full Address</th>
                      <th>Landmark</th>
                      <th>Time Slot</th>
                      <th>Status</th>
                    
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="filterappointment">
                 <?php
                 $sql=$this->db->select('*')->from('orders')->order_by('id','desc')->get()->result_array();
                 $i=1;
                 foreach($sql as $rows)
                 { 
                  $pro=$this->db->select('*')->from('product')->where('id',$rows['pro_id'])->get()->result_array();
                  $cust=$this->db->select('*')->from('customer')->where('id',$rows['cust_id'])->get()->result_array();
                  $branch=$this->db->select('*')->from('branch')->where('id',$rows['branch_id'])->get()->result_array();
                 ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <td><?php echo $branch[0]['name']; ?></td>
                      <td><?php echo $rows['order_no']; ?></td>
                      <td><?php echo $cust[0]['cust_name']; ?></td>
                      <td><?php echo $cust[0]['mobile']; ?></td>
                      <td><?php echo $rows['order_date']; ?></td>
                      <td><?php echo $rows['fulladdress']; ?></td>
                      <td><?php echo $rows['landmark']; ?></td>
                      <td><?php echo $rows['time_slot']; ?></td>
                      <td><?php
                      if($rows['status']=="0")
                      { ?>
                        <span class="badge badge-dark">Pending</span>
                      <?php }  else if($rows['status']==1){ ?>
                        <span class="badge badge-warning">Accepted</span>
                      <?php } else if($rows['status']==2){ ?>
                        <span class="badge badge-success">Completed</span>
                      <?php } else if($rows['status']==4){ ?>
                        <span class="badge badge-info">Refunded</span>
                      <?php } else { ?>
                    <span class="badge badge-danger">Cancelled</span>
                        <?php } ?>
                      </td>
                     
                    <td>
                      <a  class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>cp/Order/change_order?do=update&id=<?php echo $rows['id']; ?>"><i class="fa fa-pencil"></i></a>
                  <button type="button" class="btn btn-success btn-sm" id="<?php echo $rows['id']; ?>" onclick="deleteproduct(this.id)"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                 <?php $i++; }  ?>
                   
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
      <h1>Add/Update Orders <a href="<?php echo base_url(); ?>cp/Order/change_order" class="btn btn-primary pull-right">Orders List</a></h1>
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
              $sqledit=$this->db->select('*')->from('orders')->where('id',$id)->get()->result_array();
                ?>
               <form role="form" id="orderform" method="post">
                <div class="card-body">
                <div class="row">
                 <div class="form-group col-md-4">
                      <label for="branch_id">Branch</label>
                      <select class="form-control" name="branch_id" id="branch_id">
                      <option value="">Select Branch</option>
                      <?php
                      $sql=$this->db->select('*')->from('branch')->order_by('name','asc')->get()->result_array();
                      foreach($sql as $rows)
                      {
                      ?>
                      <option value="<?php echo $rows['id']; ?>" <?php if($sqledit[0]['branch_id']==$rows['id']){ echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="hidden" name="ordid" id="ordid" value="<?php echo $sqledit[0]['id']; ?>">
                    <label for="order_no">Order No</label>
                    <input type="text" class="form-control" id="order_no" name="order_no" placeholder="Enter Order No" autocomplete="off" value="<?php echo $sqledit[0]['order_no']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="order_date">Order Date</label>
                    <input type="text" class="form-control" id="order_date" name="order_date" placeholder="Enter Order Date" autocomplete="off" value="<?php echo $sqledit[0]['order_date']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="cust_id">Customer Name</label>
                    <select class="form-control select2" name="cust_id" id="cust_id" onchange="changecustomer();">
                      <option value="">Select Customer</option>
                      <?php
                      $sql=$this->db->select('*')->from('customer')->order_by('cust_name','asc')->get()->result_array();
                      foreach($sql as $rows)
                      {
                      ?>
                      <option value="<?php echo $rows['id']; ?>" <?php if($sqledit[0]['cust_id']==$rows['id']){ echo "selected"; } ?>><?php echo $rows['cust_name']; ?> - <?php echo $rows['mobile']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                    <div class="form-group col-md-4">
                    <label for="mob_no">Mobile No</label>
                    <input type="text" name="mob_no" id="mob_no" class="form-control numonly" placeholder="Enter Mobile No" value="<?php echo $sqledit[0]['mob_no']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="state_id">State</label>
                    <select class="form-control" id="state_id" name="state_id">
                      <option value="">Select State</option>
                      <?php
                      $sql=$this->db->select('*')->from('state')->order_by('name','asc')->get()->result_array();
                      foreach($sql as $rows)
                      { 
                      ?>
                      <option value="<?php echo $rows['id']; ?>" <?php if($sqledit[0]['state_id']==$rows['id']){ echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  
                  <div class="form-group col-md-4">
                    <label for="city_id">City</label>
                    <select class="form-control" id="city_id" name="city_id">
                      <option value="">Select City</option>
                      <?php
                      $sql=$this->db->select('*')->from('city')->order_by('name','asc')->get()->result_array();
                      foreach($sql as $rows)
                      { 
                      ?>
                      <option value="<?php echo $rows['id']; ?>" <?php if($sqledit[0]['city_id']==$rows['id']){ echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
         
                  <div class="col-md-4 form-group">
                    <label for="pin_code">Pin Code</label>
                    <input type="text" name="pin_code" id="pin_code" class="form-control" placeholder="Enter Pin Code" value="<?php echo $sqledit[0]['pin_code']; ?>">
                  </div>
                 
                  <div class="col-md-4 form-group">
                    <label for="landmark">Land Mark</label>
                    <input type="text" name="landmark" id="landmark" class="form-control" placeholder="Enter Land Mark" value="<?php echo $sqledit[0]['landmark']; ?>">
                  </div>
                </div>
                <div class="row"> 
                  <div class="col-md-12 form-group">
                    <label for="fulladdress">Full Address</label>
                    <input type="text" name="fulladdress" id="fulladdress" class="form-control" placeholder="Enter Full Address" value="<?php echo $sqledit[0]['fulladdress']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped text-center">
                        <thead class="bg-danger">
                          <tr>
                            <th>Product</th>
                            <th>Unit</th>
                            <th>Size</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th style="width: 9%;"><button type="button" class="btn btn-info btn-sm" id="adds">[ <i class="fa fa-plus"></i> ]</button></th>
                          </tr>
                        </thead>
                        <tbody id="containerss">
                        <?php
                        $pro_id=explode(',',$sqledit[0]['pro_id']);
                        $qty=explode(',',$sqledit[0]['qty']);
                        $size=explode(',',$sqledit[0]['size']);
                        $unit=explode(',',$sqledit[0]['unit']);
                        $price=explode(',',$sqledit[0]['price']);
                        $i=0;
                        foreach ($pro_id as $key) {
                          ?>
                          <tr>
                            <td>
                              <select class="form-control select2 product_key" name="pro_id[]" id="pro_id">
                               <option value="">Select Product</option>
                               <?php 
                               $sqlpro=$this->db->select('*')->from('product')->get()->result_array();
                               foreach($sqlpro as $rows)
                               {
                               ?>
                               <option value="<?php echo $rows['id']; ?>" <?php if($rows['id']==$pro_id[$i]){ echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                               <?php } ?>
                             </select>
                            </td>
                            <td>
                              <select class="form-control" id="unit" name="unit[]">
                                 <option value="">Select Unit</option>
                                 <?php 
                                 $sql=$this->db->select('*')->from('unit')->order_by('name','asc')->get()->result_array();
                                 foreach($sql as $rows){
                                 ?>
                                 <option value="<?php echo $rows['name']; ?>" <?php if($rows['name']==$unit[$i]){ echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                                 <?php } ?>
                              </select>
                            </td>
                            <td>
                              <input type="text" name="size[]" id="size" class="form-control" placeholder="Enter Product Size" value="<?php echo $size[$i]; ?>">
                            </td>
                            <td>
                              <input type="text" name="qty[]" id="qty" class="form-control" placeholder="Enter Product Qty" value="<?php echo $qty[$i]; ?>">
                            </td>
                            <td>
                              <input type="text" name="price[]" id="price" class="form-control" placeholder="Enter Price" value="<?php echo $price[$i]; ?>">
                            </td>
                            <td><button type="button" class="btn btn-success btn-sm" id="remove"><i class="fa fa-remove"></i></button></td>
                          </tr>
                          <?php $i++; }  ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

            
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Details</button>
                </div>
              </form>
               <?php else: ?>
              <form role="form" id="orderform" method="post">
                <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-4">
                      <label for="branch_id">Branch</label>
                      <select class="form-control" name="branch_id" id="branch_id">
                      <option value="">Select Branch</option>
                      <?php
                      $sql=$this->db->select('*')->from('branch')->order_by('name','asc')->get()->result_array();
                      foreach($sql as $rows)
                      {
                      ?>
                      <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="hidden" name="ordid" id="ordid">
                    <label for="order_no">Order No</label>
                    <input type="text" class="form-control" id="order_no" name="order_no" placeholder="Enter Order No" autocomplete="off">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="order_date">Order Date</label>
                    <input type="text" class="form-control" id="order_date" name="order_date" placeholder="Enter Order Date" autocomplete="off">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="cust_id">Customer Name</label>
                    <select class="form-control select2" name="cust_id" id="cust_id" onchange="changecustomer();">
                      <option value="">Select Customer</option>
                      <?php
                      $sql=$this->db->select('*')->from('customer')->order_by('cust_name','asc')->get()->result_array();
                      foreach($sql as $rows)
                      {
                      ?>
                      <option value="<?php echo $rows['id']; ?>"><?php echo $rows['cust_name']; ?> - <?php echo $rows['mobile']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                
                    <div class="form-group col-md-4">
                    <label for="mob_no">Mobile No</label>
                    <input type="text" name="mob_no" id="mob_no" class="form-control numonly" placeholder="Enter Mobile No">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="state_id">State</label>
                    <select class="form-control" id="state_id" name="state_id">
                      <option value="">Select State</option>
                      <?php
                      $sql=$this->db->select('*')->from('state')->order_by('name','asc')->get()->result_array();
                      foreach($sql as $rows)
                      { 
                      ?>
                      <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  
                  <div class="form-group col-md-4">
                    <label for="city_id">City</label>
                    <select class="form-control" id="city_id" name="city_id">
                      <option value="">Select City</option>
                      <?php
                      $sql=$this->db->select('*')->from('city')->order_by('name','asc')->get()->result_array();
                      foreach($sql as $rows)
                      { 
                      ?>
                      <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                
                  <div class="col-md-4 form-group">
                    <label for="pin_code">Pin Code</label>
                    <input type="text" name="pin_code" id="pin_code" class="form-control" placeholder="Enter Pin Code">
                  </div>
                 
                  <div class="col-md-4 form-group">
                    <label for="landmark">Land Mark</label>
                    <input type="text" name="landmark" id="landmark" class="form-control" placeholder="Enter Land Mark">
                  </div>
                </div>
                <div class="row"> 
                  <div class="col-md-12 form-group">
                    <label for="fulladdress">Full Address</label>
                    <input type="text" name="fulladdress" id="fulladdress" class="form-control" placeholder="Enter Full Address">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped text-center">
                        <thead class="bg-danger">
                          <tr>
                            <th>Product</th>
                            <th>Unit</th>
                            <th>Size</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th style="width: 9%;"><button type="button" class="btn btn-info btn-sm" id="adds">[ <i class="fa fa-plus"></i> ]</button></th>
                          </tr>
                        </thead>
                        <tbody id="containerss">
                          <tr>
                            <td>
                              <select class="form-control select2 product_key" name="pro_id[]" id="pro_id">
                               <option value="">Select Product</option>
                               <?php 
                               $sqlpro=$this->db->select('*')->from('product')->get()->result_array();
                               foreach($sqlpro as $rows)
                               {
                               ?>
                               <option value="<?php echo $rows['id']; ?>" data-id="10"><?php echo $rows['name']; ?></option>
                               <?php } ?>
                             </select>
                            </td>
                            <td>
                              <select class="form-control" id="unit" name="unit[]">
                                 <option value="">Select Unit</option>
                                 <?php 
                                 $sql=$this->db->select('*')->from('unit')->order_by('name','asc')->get()->result_array();
                                 foreach($sql as $rows){
                                 ?>
                                 <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
                                 <?php } ?>
                              </select>
                            </td>
                            <td>
                              <input type="text" name="size[]" id="size" class="form-control" placeholder="Enter Product Size">
                            </td>
                            <td>
                              <input type="text" name="qty[]" id="qty" class="form-control" placeholder="Enter Product Qty">
                            </td>
                            <td>
                              <input type="text" name="price[]" id="price" class="form-control" placeholder="Enter Price">
                            </td>
                            <td><button type="button" class="btn btn-success btn-sm" id="remove"><i class="fa fa-remove"></i></button></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

            
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit Details</button>
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
      $("#orderform").validate({
    rules: {
        order_no:{
            required:true
        },
        order_date:{
          required: true
        }
    },
    messages: {
        order_no:{
          required:"Please Enter Order No"
        },
        order_date:{
          required:"Please Select Order Date"
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
       var formData = new FormData($('#orderform')[0]);
      $.ajax({
                url: '<?php echo base_url(); ?>cp/Order/changeorder', 
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
               $('.alert').show().addClass('alert-primary').text("Order Added Successfully");
                $('.alert').fadeOut(6000);
                $('#orderform').trigger('reset');
             }
             else if (data.success=='avail') {
              $('.alert').show().addClass('alert-warning').text("Order No Already Added");
              $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Order has been change Successfully");
                $('.alert').fadeOut(6000);
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
</script>
<script type="text/javascript">
         var x;
            $(document).ready(function(){
                 x=1; 
            });
        $(document).delegate('#adds', 'click', function(event) {
          if(confirm("Are you Sure Add to New Item ?"))
          {
            x=x+1;
      var html='<tr><td> <select class="form-control select2 product_key" name="pro_id[]" id="pro_id'+x+'"><option value="">Select Product</option><?php $sqlpro=$this->db->select('*')->from('product')->get()->result_array();foreach($sqlpro as $rows){ ?><option value="<?php echo $rows['id']; ?>" data-id="10"><?php echo $rows['name']; ?></option><?php } ?></select></td><td><select class="form-control" id="unit" name="unit[]"><option value="">Select Unit</option><?php $sql=$this->db->select('*')->from('unit')->order_by('name','asc')->get()->result_array();foreach($sql as $rows){ ?><option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option><?php } ?></select></td><td><input type="text" name="size[]" id="size" class="form-control" placeholder="Enter Product Size"></td><td><input type="text" name="qty[]" id="qty" class="form-control" placeholder="Enter Product Qty"></td><td> <input type="text" name="price[]" id="price" class="form-control" placeholder="Enter Price"></td><td><button type="button" class="btn btn-success btn-sm" id="remove"><i class="fa fa-remove"></i></button></td></tr>';
        $('#containerss').append(html);
 
         $('#pro_id'+x).select2();
        return false;
         }

         return false;
         });
        </script>
        <script type="text/javascript">
        $(document).ready(function(){   
          $("#containerss").on('click','#remove',function(e){
            if(confirm("Are You want to sure Remove this item ?"))
            {
          $(this).parent('td').parent('tr').remove();
          return false;
           }
          });
        });
     </script>
<script type="text/javascript">
  function changecustomer()
  {
    var cust_id = $('#cust_id').val();
      var formData={'cust_id': cust_id};
      if(cust_id != '')
      {
    $.ajax({
      type:'POST',
      url:'<?php echo base_url('cp/Order/change_customermobile'); ?>',
      dataType:'json',
      data:formData,
      success:function(data){
        //alert(data);
        $('#mob_no').val(data.data.mobile);
      }
    });
    }
    else
    {
      $('#mobile').val('');
    }
  }
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $('#state_id').change(function(){
      var state_id = $('#state_id').val();
      if(state_id != '')
      {
       $.ajax({
        url:"<?php echo base_url(); ?>cp/Location_master/changelocation",
        method:"POST",
        data:{state_id:state_id},
        success:function(data)
        {
         $('#city_id').html(data);
        }
       });
      }
      else
      {
       $('#city_id').html('<option value="">Select City</option>');
      }
     });
    })
</script>
<script type="text/javascript">
 
   function deletesale(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('Sale/deletesale'); ?>',
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
   $(document).ready(function(){   
    $('#paid_amount').on('keyup',function(){
      var duesamount=$('#net_amount').val()-$('#paid_amount').val();
      $('#dues_amount').val(duesamount);
    });
  });
 </script>
 <script>
   function per() {
    var ainword=  $("#net_amount").val();
    var  words = toWords(ainword);
      $("#amount_word").val(words + "Rupees Only");
   }
</script>
  
<script type="text/javascript">
  $(document).ready(function(){
  $("#order_date").datepicker({ 
    dateFormat: "dd-mm-yy",
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true, 
  });
  });
</script>
<script type="text/javascript">
  $(document).on('change','.product_key',function(){
    var product_price =  $(this).find('option:selected').data('id');
   $(this).parent().next().children('.pro-price').val(product_price);
  });
</script>
<script type="text/javascript">
  $(document).on('keyup','#qty',function(){
     var b =  $(this).val();
     var c=$(this).parents('.col-md-7').prev('div').children('.pro-price').val();
     var x=b*c;
     $(this).parent().next().children('.prototal-price').val(x);
     var billamount=0;
     $('.prototal-price').each(function(){

      billamount=parseInt($(this).val())+parseInt(billamount);
      //alert(billamount);
     });
     $('#bill_amount').val(billamount);
     $('#net_amount').val(billamount);
     per();
  });
</script>
<script type="text/javascript">
   function searchbill()
   {
    var key=$('#searchbill').val();
    var userData={"key":key};
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('Sale/searchsale'); ?>',
        dataType: 'json',
        data: userData,
        success:function(data){
        //alert(data);
            $('.supplytable').html(data);
        }
    });
   }
</script>