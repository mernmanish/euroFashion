<?php include('inc-file/head.php'); ?>
<?php include('inc-file/header.php'); ?>
<?php include('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>New Order List</h1>
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
                      <!-- <th>Vendor</th> -->
                      <th>Order No</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Order Date</th>
                      <th>Tags</th>
                      <th>Address</th>
                      <th>Landmark</th>
                      <th>Payment Status</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="filterappointment">
                 <?php
                 $sql=$this->db->select('*')->from('orders')->where('status','new')->order_by('id','desc')->get()->result_array();
                 $i=1;
                 foreach($sql as $rows)
                 { 
                  $pro=$this->db->select('*')->from('product')->where('id',$rows['pro_id'])->get()->result_array();
                  $cust=$this->db->select('*')->from('users')->where('id',$rows['cust_id'])->get()->result_array();
                  $address=$this->db->select('*')->from('customer_address')->where('user_id',$rows['cust_id'])->get()->result_array();
                  // $branch=$this->db->select('*')->from('branch')->where('id',$rows['branch_id'])->get()->result_array();
                 ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <!-- <td><?php echo $branch[0]['name']; ?></td> -->
                      <td><?php echo $rows['order_number']; ?></td>
                      <td><?php echo $cust[0]['name']; ?></td>
                      <td><?php echo $cust[0]['mobile']; ?></td>
                      <td><?php echo date('d-F-Y',strtotime($rows['created_at'])) ?></td>
                      <td><?php echo $address[0]['location_tag']; ?></td>
                      <td><?php echo $address[0]['street_address']; ?></td>
                      <td><?php echo $address[0]['landmark']; ?></td>
                      <?php
                      if($rows['payment_status']=="pending"){
                      ?>
                      <td><span class="badge badge-danger"><?php echo ucwords($rows['payment_status']) ?></span></td>
                    <?php } else { ?>
                      <td><span class="badge badge-success"><?php echo ucwords($rows['payment_status']) ?></span></td>
                    <?php } ?>
                      <td><?php
                      if($rows['status']=="new")
                      { ?>
                        <span class="badge badge-dark"><?php echo ucwords($rows['status']) ?></span>
                      <?php }  else if($rows['status']=="accepted"){ ?>
                        <span class="badge badge-info"><?php echo ucwords($rows['status']) ?></span>
                      <?php } else if($rows['status']=="declined"){ ?>
                        <span class="badge badge-warning"><?php echo ucwords($rows['status']) ?></span>
                      <?php } else if($rows['status']=="canceled"){ ?>
                        <span class="badge badge-danger"><?php echo ucwords($rows['status']) ?></span>
                      <?php } else if($rows['status']=="delivered"){ ?>
                        <span class="badge badge-success"><?php echo ucwords($rows['status']) ?></span>
                      <?php } else { ?>
                    <span class="badge badge-primary"><?php echo ucwords($rows['status']) ?></span>
                        <?php } ?>
                      </td> 
                      <?php if($rows['status']!= "delivered"){ ?>
                     <td><select class="form-control statuss" name="status" id="<?php echo $rows['id']; ?>">
                        <option value="new" <?php if($rows['status']=="new"){ echo "selected"; } ?>>New</option>
                         <option value="pending" <?php if($rows['status']=="pending"){ echo "selected"; } ?>>Pending</option>
                        <option value="accepted" <?php if($rows['status']=="accepted"){ echo "selected"; } ?>>Accepted</option>
                         <option value="declined" <?php if($rows['status']=="declined"){ echo "selected"; } ?>>Declined</option>
                         <option value="outofdelivery" <?php if($rows['status']=="outofdelivery"){ echo "selected"; } ?>>Out of Delivery</option>
                         <option value="delivered" <?php if($rows['status']=="delivered"){ echo "selected"; } ?>>Delivered</option>
                      </select></td>
                    <?php } else { ?>
                      <td></td>
                    <?php } ?>
                      
                    <!-- <td>
                      <a href="<?php echo base_url(); ?>cp/
                        Order/invoice/<?php echo $rows['id']; ?>" class="btn btn-dark btn-sm"><img src="<?php echo base_url(); ?>img/invoice.png" style="height: 30px;"></a></td> -->
                      <!-- <td></td> -->
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
          url: '<?php echo base_url('cp/Order/changeorderstatus'); ?>',
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
          url: '<?php echo base_url('cp/Order/changeorderstatus'); ?>',
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

