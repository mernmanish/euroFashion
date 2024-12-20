<?php include_once('inc-file/head.php'); ?>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Customer List </h1>
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
                      <th>Name</th>
                      <th>Email Id</th>
                      <th>Mobile Number</th>
                      <th>Reg Date</th>
                      <th>Refer Id</th>
                      <th>Wallet</th>
                      <th style="width: 120px;">Status</th>
                     
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php
                  $sqluser=$this->db->select('*')->from('customer')->where('branch_id',$this->session->userdata('sessionuser')['userid'])->order_by('id','DESC')->get()->result_array();
                  $i=1;
                  foreach($sqluser as $rows)
                  {
                   ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <td><?php echo $rows['cust_name']; ?></td>
               
                      <td><?php echo $rows['email']; ?></td>
                      <td><?php echo $rows['mobile']; ?></td>
                      <td><?php echo $rows['reg_date']; ?></td>
                      <td><?php echo $rows['ref_id']; ?></td>
                      <td><?php echo $rows['wallet']; ?></td>
                      <td><select class="form-control" name="status" id="status" onchange="changecustomerstatus('<?php echo $rows['id']; ?>','<?php echo $rows['status']; ?>')">
                        <option value="1" <?php if($rows['status']==1){ echo "selected"; } ?>>Active</option>
                        <option value="0" <?php if($rows['status']==0){ echo "selected"; } ?>>Inactive</option>
                      </select></td>
                    
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

<?php include_once('inc-file/footer.php'); ?>
<script type="text/javascript">
  function changecustomerstatus(id,status)
  {
     var abc=status;
     if(abc==0)
     {
      var d="Active";
     }
     else
     {
      var d="Inactive";
     }
      if(confirm("Are you Sure to "+d+" this Customer Status ?")){
      var formdata={'id':id,'status':status};
       $.ajax({
          url: '<?php echo base_url('branch/Home/changecustomerstatus'); ?>',
          type: 'POST',
          dataType: 'json',
          data: formdata,
          success:function(data){
            //alert(data);
         if(data.success)
         {
          $('.table').load(location.href + " .table");
          $('.alert').show().addClass('alert-success').text("Customer status Successfully "+d);
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