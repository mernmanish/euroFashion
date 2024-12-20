<?php include('inc-file/head.php'); ?>
<?php include('inc-file/header.php'); ?>
<?php include('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Order List</h1>
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
                    
                      <th>Order No</th>
                      <th>Customer name</th>
                      <th>Mobile No</th>
                      <th>Order Date</th>
                      <th>Full Address</th>
                      <th>Landmark</th>
                      <th>Time Slot</th>
                      <th>Payment Mode</th>
                      <th>Status</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="filterappointment">
                 <?php
                 $sql=$this->db->select('*')->from('orders')->where('vendor_id',$this->session->userdata('sessionuser')['userid'])->order_by('id','desc')->get()->result_array();
                 $i=1;
                 foreach($sql as $rows)
                 { 
                  $pro=$this->db->select('*')->from('product')->where('id',$rows['pro_id'])->get()->result_array();
                  $cust=$this->db->select('*')->from('customer')->where('id',$rows['cust_id'])->get()->result_array();
                 ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                     
                      <td><?php echo $rows['order_no']; ?></td>
                      <td><?php echo $cust[0]['cust_name']; ?></td>
                      <td><?php echo $cust[0]['mobile']; ?></td>
                      <td><?php echo $rows['order_date']; ?></td>
                      <td><?php echo $rows['fulladdress']; ?></td>
                      <td><?php echo $rows['landmark']; ?></td>
                      <td><?php echo $rows['time_slot']; ?></td>
                      <td><?php echo $rows['payment_mode']; ?></td>
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
                      <?php if($rows['status']!=4){ ?>
                     <td><select class="form-control statuss" name="status" id="<?php echo $rows['id']; ?>">
                         <option value="0" <?php if($rows['status']==0){ echo "selected"; } ?>>Pending</option>
                        <option value="1" <?php if($rows['status']==1){ echo "selected"; } ?>>Accepted</option>
                         <option value="2" <?php if($rows['status']==2){ echo "selected"; } ?>>Completed</option>
                         <option value="3" <?php if($rows['status']==3){ echo "selected"; } ?>>Cancelled</option>
                      </select></td>
                    <?php } else { ?>
                      <td></td>
                    <?php } ?>
                    <td>
                       
                      <a href="<?php echo base_url(); ?>branch/Order/invoice/<?php echo $rows['id']; ?>" class="btn btn-dark btn-sm"><img src="<?php echo base_url(); ?>img/invoice.png" style="height: 30px;"></a></td>
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

<?php include_once('inc-file/footer.php'); ?>
<script type="text/javascript">
   $(document).ready(function(){
  $("#todate").datepicker({ 
    dateFormat: "dd/mm/yy",
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
  });

  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.statuss').change('on',function(){
      var id=$(this).attr('id');
      var status=$('option:selected',this).attr('value');
      if(confirm("Are you Sure to change Status ?")){
      var formdata={'id':id,'status':status};
       $.ajax({
          url: '<?php echo base_url('branch/Order/changeorderstatus'); ?>',
          type: 'POST',
          dataType: 'json',
          data: formdata,
          success:function(data){
         if(data.success)
         {
          location.reload();
          $('.table').load(location.href + " .table");
          $('.alert').show().addClass('alert-success').text("Order has been Successfully Changed");
          $('.alert').fadeOut(3000);
         }
        else
        {
           $('.alert').show().addClass('alert-danger').text("We have faceing some issue,Plz try again");
             $('.alert').fadeOut(3000);
        }
        }  
      });
      }
    });
  });
  /*function changeorderstatus(id)
  {  	  
    var status=$('option:selected',this).attr('value');
       alert(status);
      if(confirm("Are you Sure to change Status ?")){
      var formdata={'id':id,'status':status};
       $.ajax({
          url: '<?php echo base_url('branch/Order/changeorderstatus'); ?>',
          type: 'POST',
          dataType: 'json',
          data: formdata,
          success:function(data){
         if(data.success)
         {
          $('.table').load(location.href + " .table");
          $('.alert').show().addClass('alert-success').text("Order has been Successfully Changed");
          $('.alert').fadeOut(3000);
         }
        else
        {
           $('.alert').show().addClass('alert-danger').text("We have faceing some issue,Plz try again");
             $('.alert').fadeOut(3000);
        }
         }  
      });
   }
  }*/
</script>

