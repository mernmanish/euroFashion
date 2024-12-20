<?php include_once('inc-file/head.php'); ?>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>
              <a href="#" class="text-dark">
              <div class="info-box-content">
                <span class="info-box-text">Total Product</span>
                <span class="info-box-number">
                  <?php echo $count=$this->db->select('*')->from('product')->where('vendor_id',$this->session->userdata('sessionuser')['userid'])->count_all_results(); ?>
                </span>
              </div>
             </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-thumbs-up"></i></span>
              <a href="<?php echo base_url(); ?>vendor/Home/deliverd_ordered" class="text-dark">
              <div class="info-box-content">
                <span class="info-box-text">Deliverd Order</span>
                <?php echo $count=$this->db->select('*')->where('status','2')->from('orders')->where('vendor_id',$this->session->userdata('sessionuser')['userid'])->count_all_results(); ?>
              </div>
             </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-shopping-cart"></i></span>
              <a href="<?php echo base_url(); ?>vendor/Home/new_ordered" class="text-dark">
              <div class="info-box-content">
                <span class="info-box-text">New Order</span>
                <span class="info-box-number"> <?php echo $count=$this->db->select('*')->where('status','0')->from('orders')->where('vendor_id',$this->session->userdata('sessionuser')['userid'])->count_all_results(); ?></span>
              </div>
             </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-shopping-cart"></i></span>
              <a href="<?php echo base_url(); ?>vendor/Order/order_list" class="text-dark">
              <div class="info-box-content">
                <span class="info-box-text">Total Ordered</span>
                <span class="info-box-number"><?php echo $count=$this->db->select('*')->from('orders')->where('vendor_id',$this->session->userdata('sessionuser')['userid'])->count_all_results(); ?></span>
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      
        <!-- /.row -->

        <!-- Main row -->
      
        <!-- /.row -->
      </div><!--/. container-fluid -->
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
                      <th>Status</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="filterappointment">
                 <?php
                 $sql=$this->db->select('*')->from('orders')->where('vendor_id',$this->session->userdata('sessionuser')['userid'])->order_by('id','desc')->limit(10)->get()->result_array();
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
 