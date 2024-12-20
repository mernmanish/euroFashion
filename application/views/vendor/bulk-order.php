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
                      <th>Order file</th>
                      <th>Order No</th>
                      <th>Order Date</th>
                      <th>Customer name</th>
                      <th>Mobile No</th>
                      <th>Full Address</th>
                      <th>Status</th>
                      <th>Change Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="filterappointment">
                 <?php
                 $sql=$this->db->select('*')->where('branch_id',$this->session->userdata('sessionuser')['userid'])->from('bulk_order')->order_by('id','desc')->get()->result_array();
                 $i=1;
                 foreach($sql as $rows)
                 { 
                 
                  $cust=$this->db->select('*')->from('customer')->where('id',$rows['cust_id'])->get()->result_array();
                 ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                     
                      <td><a href="<?php echo base_url(); ?><?php echo $rows['image']; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/bulk.png" style="height: 45px;"></a></td>
                   

                      <td><?php echo $rows['order_no']; ?></td>
                      <td><?php echo $rows['order_date']; ?></td>
                      <td><?php echo $cust[0]['cust_name']; ?></td>
                      <td><?php echo $cust[0]['mobile']; ?></td>  
                      <td><?php echo $rows['fulladdress']; ?></td>        
                      <td><?php if($rows['status']==0){ echo '<span class="badge badge-danger">In Pending</span>'; } else { echo '<span class="badge badge-success">Order Recived</span>'; } ?></td>
                      <?php
                      if($rows['status']==1){  
                      ?>
                      <td><button type="button" id="<?php echo $rows['id']; ?>" class="btn btn-success btn-sm" onclick="changepresstatus(this.id,'<?php echo $rows['status']; ?>')">Out of Stock </button></td>
                    <?php } else { ?>
                       <td><button type="button" id="<?php echo $rows['id']; ?>" class="btn btn-success btn-sm" onclick="changepresstatus(this.id,'<?php echo $rows['status']; ?>')">Order Recived</button></td>
                    <?php } ?>
                    <?php
                      if($rows['status']==1){  
                      ?>
                    <td><a href="<?php echo base_url(); ?>branch/Order/bulk_product/<?php echo $rows['id']; ?>" class="btn btn-info btn-sm">Add Product</a></td>
                  <?php } else { ?>
                    <td></td>
                  <?php } ?>
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
  function changepresstatus(id,status)
  {
    var abc=status;
     if(abc==0)
     {
      var d="Order Recived";
     }
     else
     {
      var d="In Pending";
     }
      if(confirm("Are you Sure to "+d+" this Prescription ?")){
      var formdata={'id':id,'status':status};
       $.ajax({
          url: '<?php echo base_url('branch/Order/changebulkorder'); ?>',
          type: 'POST',
          dataType: 'json',
          data: formdata,
          success:function(data){
            //alert(data);
         if(data.success)
         {
          $('.table').load(location.href + " .table");
          $('.alert').show().addClass('alert-success').text("Prescription status Successfully "+d+ "Status");
              $('.alert').fadeOut(3000);
         }
        else
        {
           $('.alert').show().addClass('alert-danger').text("We have faceing some issue,Plz contact to developer");
             $('.alert').fadeOut(3000);
        }
         }  
      });
   }
  }
</script>


