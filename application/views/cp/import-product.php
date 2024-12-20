<?php include_once('inc-file/head.php'); ?>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div> 
      </div>
    </section>
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card" >
              <div class="card-header bg-success">
                <h4 class="card-title"><i class="fa fa-cloud-download" aria-hidden="true"></i> Upload Excel File</h4>
              </div>
               <form  id="import_csv" enctype="multipart/form-data" method="post" accept-charset="utf-8">
              <div class="card-body">
                  <div class="form-group col-md-12">
                    <label for="">Vendor</label>
                    <select class="form-control" id="vendor_id" name="vendor_id" required>
                      <option value="">Select Vendors</option>
                      <?php
                      $sql=$this->db->select('*')->from('vendor')->order_by('name','ASC')->get()->result_array();
                      foreach($sql as $rows)
                      { 
                      ?>
                      <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                     <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="">Upload Excel</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="csv_file" required>
                        <label class="custom-file-label" for="file">Choose file</label>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-success">Import Excel</button>
              </div>
              </form>
            </div>
        </div>
     </div>
  </div>
</section>
</div>

<?php include_once('inc-file/footer.php'); ?>
<script type="text/javascript">
  $(document).ready(function(){
  $('#import_csv').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"<?php echo base_url(); ?>cp/Product/upload_excel",
   method:"POST",
   data:new FormData(this),
   dataType:"json",
   contentType:false,
   cache:false,
   processData:false,
/*
   beforeSend:function(){
    $('#import_csv_btn').html('Importing...');
   },*/
   success:function(data)
   {
    //alert(data);
    $('.table').load(location.href + " .table");
    $('#import_csv')[0].reset();
    $('#import_csv_btn').attr('disabled', false);
    $('#import_csv_btn').html('Import Done');
    $('.alert').show().addClass('alert-success').text("Excel Import Successfully");
    $('.alert').fadeOut(3000);
    load_data();
   }
  })
 });
});
</script>
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
          url: '<?php echo base_url('cp/Home/changecustomerstatus'); ?>',
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
            window.location.href = '<?php echo base_url('cp/Product'); ?>';
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