<?php include_once('inc-file/head.php'); ?>
<style type="text/css">
   .radio-wrapper {
        overflow-x: auto;
        overflow-y: hidden;
        max-height: 4.25rem;
    }

    .radio-wrapper .radio-item {
        margin-right: 0.25rem;
    }

    .radio-wrapper .radio-item:last-child {
        margin-right: 0;
    }

    .radio-item span {
        display: block;
        background: #93d6a2;
        padding: .5rem;
        line-height: 1rem;
        /*font-family: "SFProText";*/
        font-size: 18px;
        font-weight: 400;
        cursor: pointer;
        color: fff;
        white-space: nowrap;
        border-radius: 2px;
        
    }

    .radio-item input[type=radio]:checked+span {
        background: #28a745;
        color: #ffffff;
    }

    .input-group-text {
        background-color: #fff !important;
    }
</style>
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
              <a href="<?php echo base_url(); ?>cp/Home/customer_list" class="text-dark">
              <div class="info-box-content">
                <span class="info-box-text">Total Customer</span>
                <span class="info-box-number">
                  <?php echo $count=$this->db->select('*')->from('users')->where('usertype','customer')->count_all_results(); ?>
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
              <a href="<?php echo base_url(); ?>cp/Home/deliverd_ordered" class="text-dark">
              <div class="info-box-content">
                <span class="info-box-text">Deliverd Order</span>
                <?php echo $count=$this->db->select('*')->where('status','delivered')->from('orders')->count_all_results(); ?>
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
              <a href="<?php echo base_url(); ?>cp/Home/new_ordered" class="text-dark">
              <div class="info-box-content">
                <span class="info-box-text">New Order</span>
                <span class="info-box-number"> <?php echo $count=$this->db->select('*')->where('status','new')->from('orders')->count_all_results(); ?></span>
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
              <a href="<?php echo base_url(); ?>cp/Order/order_list" class="text-dark">
              <div class="info-box-content">
                <span class="info-box-text">Total Ordered</span>
                <span class="info-box-number"><?php echo $count=$this->db->select('*')->from('orders')->count_all_results(); ?></span>
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
              <div class="card-header bg-success">
                <h4 class="card-title"><i class="fa fa-list"></i> Recent Order List</h4>
              </div> 
              <div class="card-body">
                <div class="radio-wrapper d-flex flex-row">
                <label class="radio-item text-center"><input type="radio" value="all" name="order_filter" class="d-none js_searchByCategory" id="all" checked><span for="all"> All (<?php echo $count=$this->db->select('*')->from('orders')->count_all_results(); ?>)</span></label>
                <?php 
                foreach($query as $status){
                ?>
                <label class="radio-item text-center"><input type="radio" value="<?php echo $status['status']; ?>" name="order_filter" class="d-none js_searchByCategory" id="<?php echo $status['status']; ?>"><span for="<?php echo $status['status']; ?>"> <?php echo ucwords($status['status']); ?> (<?php echo $status['count']; ?>)</span></label>
              <?php } ?>
                <!-- <label class="radio-item text-center"><input type="radio" value="new" name="order_filter" class="d-none js_searchByCategory" id="new"><span for="new" >New (10)</span></label>
                <label class="radio-item text-center"><input type="radio" value="new" name="order_filter" class="d-none js_searchByCategory" id="new"><span for="new" >New (10)</span></label> -->

                 
        
            </div>
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
                 $sql=$this->db->select('*')->from('orders')->limit('10')->order_by('id','desc')->get()->result_array();
                 $i=1;
                 foreach($sql as $rows)
                 { 
                  // $pro=$this->db->select('*')->from('product')->where('id',$rows['pro_id'])->get()->result_array();
                  $cust=$this->db->select('*')->from('users')->where('id',$rows['cust_id'])->get()->result_array();
                  $address=$this->db->select('*')->from('customer_address')->where('user_id',$rows['cust_id'])->get()->result_array();
                  // $branch=$this->db->select('*')->from('branch')->where('id',$rows['branch_id'])->get()->result_array();
                 ?>
                    <tr class="order-list" data-status="<?php echo $rows['status']; ?>">
                      <th><?php echo $i; ?></th>
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
            $(document).on('click','.js_searchByCategory',function(){
                var category_id = $(this).val();
                if(category_id=="all")
                {
                    $('.order-list').removeClass('d-none');
                }
                else{
                    $('.order-list').each(function(){
                        console.log($(this).data('status'));
                        if($(this).data('status')==category_id){
                            $(this).removeClass('d-none');
                        }else{
                            $(this).addClass('d-none');
                        }
                    });
                }
                // console.log($(this).val());
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
  
</script>