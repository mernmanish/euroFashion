<?php include_once('inc-file/head.php'); ?>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Vendor List</h1>
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
                      <th>Image</th>
                      <th>Vendor name</th>
                      <th>Email Id</th>
                      <th>Mobile Number</th>
                      <th>Emergency No</th>
                      <th>Full Address</th>
                      <th style="width: 120px;">Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="usertable">
                  <?php
                  $sqluser=$this->db->select('*')->from('users')->where('usertype','vendor')->order_by('id','DESC')->get()->result_array();
                  $i=1;
                  foreach($sqluser as $rows)
                  {
                   ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <?php if(!empty($rows['image'])){ ?>
                      <th><img src="<?php echo base_url(); ?><?php echo $rows['image']; ?>" style="height: 45px;"></th>
                    <?php } else { ?>
                      <th></th>
                      <?php } ?>
                      <td><?php echo $rows['name']; ?></td>
                      <td><?php echo $rows['email_id']; ?></td>
                      <td><?php echo $rows['mobile']; ?></td>
                      <td><?php echo $rows['emg_no']; ?></td>
                      <td><?php echo $rows['full_address']; ?></td>
                      <td><select class="form-control" name="status" id="status" onchange="changeadminstatus('<?php echo $rows['id']; ?>','<?php echo $rows['status']; ?>')">
                        <option value="1" <?php if($rows['status']=="active"){ echo "selected"; } ?>>Active</option>
                        <option value="0" <?php if($rows['status']=="inactive"){ echo "selected"; } ?>>Inactive</option>
                      </select></td>
                      <td>
		              <button class="btn btn-success btn-sm" id="<?php echo $rows['id']; ?>" onclick="deleteuser(this.id)"><i class="fa fa-trash"></i></button></td>
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
  function changeadminstatus(id,status)
  {
     var abc=status;
     if(abc=="inactive")
     {
      var d="Active";
     }
     else
     {
      var d="Inactive";
     }
      if(confirm("Are you Sure to "+d+" this Branch Status ?")){
      var formdata={'id':id,'status':status};
       $.ajax({
          url: '<?php echo base_url('cp/Auth/changesuperstatus'); ?>',
          type: 'POST',
          dataType: 'json',
          data: formdata,
          success:function(data){
            //alert(data);
         if(data.success)
         {
          $('.table').load(location.href + " .table");
          $('.alert').show().addClass('alert-success').text("Branch status Successfully "+d);
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
   function deleteuser(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('cp/Auth/deleteadmin'); ?>',
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
