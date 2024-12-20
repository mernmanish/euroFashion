<?php include('inc-file/head.php'); ?>
<?php include('inc-file/header.php'); ?>
<?php include('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Support Center Message List</h1>
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
                    
                      <th>Vendor</th>
                      <th>Full Name</th>
                      <th>Email Id</th>
                      <th>Mobile No</th>
                      <th>Message</th>
                      <th>ctime</th>
                      <th style="width: 5%;">Action</th>
                    </tr>
                  </thead>
                  <tbody class="filterappointment">
                 <?php
                 $sql=$this->db->select('*')->from('support_center')->order_by('id','desc')->get()->result_array();
                 $i=1;
                 foreach($sql as $rows)
                 { 
                  $branch=$this->db->select('*')->from('vendor')->where('id',$rows['vendor_id'])->get()->result_array();
                 ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <td><?php echo $branch[0]['name']; ?></td>
                      <td><?php echo $rows['name']; ?></td>
                      <td><?php echo $rows['email_id']; ?></td>
                      <td><?php echo $rows['mobile']; ?></td>
                      <td><?php echo $rows['message']; ?></td>
                      <td><?php echo date('d-m-Y',strtotime($rows['ctime'])); ?></td>
                      <td class="text-center"><button class="btn btn-outline-info btn-sm"><i class="fa fa-reply" aria-hidden="true"></i></button></td>
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

