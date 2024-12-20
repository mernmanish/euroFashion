<?php include('inc-file/head.php'); ?>
<?php include('inc-file/header.php'); ?>
<?php include('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper mt-4" style="min-height: 1416.81px;">
 <?php  $id=$this->uri->segment(4);  ?>
    <section class="content">
      <div class="container-fluid" >
        <div class="row" id="printarea">
          <div class="col-12">
            <div class="invoice p-3 mb-3">
              <div class="row">
                <div class="col-12">
                  <h2 class="text-center">Vegmato Fresh Pvt Ltd.</h2>
                  <h5 class="text-center">House No 17, AN Path, Boring Rd, Patna, Bihar 800013</h5>
                  <p class="text-center">PAN No - AAGCV9490A</p>
                </div>
              </div>
             <?php 
             $sqlinvoice=$this->db->select('*')->from('orders')->where('id',$id)->get()->result_array(); 

             $cust=$this->db->select('*')->from('customer')->where('id',$sqlinvoice[0]['cust_id'])->get()->result_array();

             ?>

              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col pull-left">
              
                  <address>
                    <strong><?php echo $cust[0]['cust_name']; ?></strong><br>
                    <?php echo $sqlinvoice[0]['fulladdress']; ?><br>
                    Phone: <?php echo $sqlinvoice[0]['mob_no']; ?><br>
                   
                 
                  </address>
                </div>
                <div class="col-sm-5 clearfix"></div>
                <div class="col-sm-3 invoice-col float-right">
                  <b>Order No: #<?php echo $sqlinvoice[0]['order_no']; ?></b><br>
                  <b>Order Date:</b> <?php echo $sqlinvoice[0]['order_date']; ?> <br>
                 <b>Total Amount:</b> <span id="tpss">  </span> ( <?php echo $sqlinvoice[0]['payment_mode']; ?> )<br>
                </div>
              </div>
             
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th >#</th>
                      <th>Product</th>
                      <th >Sale Price</th>
                      <th>Qty</th>
                      <th style="width: 10%;" >Total Price</th>
                    </tr>
                    </thead>
                    <tbody> 
                    <?php  
                    $i=1;
                    $totalam="";
                    $pro=explode(",", $sqlinvoice[0]['pro_id']);
                    $qty=explode(",", $sqlinvoice[0]['qty']);
                    $size=explode(",", $sqlinvoice[0]['size']);
                    $price=explode(",", $sqlinvoice[0]['price']);
                    foreach($pro as $vals=>$keys)
                    {
                      $pros=$this->db->select('*')->from('product')->where('id',$keys)->get()->result_array();
                      
                    ?>                   
                    <tr>
                      <td><?php echo $i; ?></td>
                      <?php if(!empty($pros[0]['name'])){ ?>
                       <td><?php echo $pros[0]['name']; ?></td>
                     <?php } else { ?>
                      <td>Product Not Available</td>
                     <?php } ?>
                      <td><?php echo $price[$vals]; ?> /-</td>
                      <td><?php if(!empty($size[$vals])){ ?><?php echo $size[$vals]; } else { echo "N/A"; } ?> &times <?php echo $qty[$vals]; ?> Unit</td>
                      <td style="width: 10%;"><?php echo $price[$vals]*$qty[$vals]; ?> /-</td>
                      <input class="toprice" type="hidden" name="totalprice" id="totalprice" value="<?php echo $price[$vals]*$qty[$vals]; ?>">
                    </tr>
                   <?php $i++; }  ?>
                  <!--  <tr>
                     <th colspan="4"></th>
                     <th>Subtotal : 20</th>
                   </tr> -->
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-8">
                </div>
                <!-- /.col -->
                <div class="col-4 tcount pull-right">
                  <div class="table-responsive">
                   
                    <table class="table">
                      <tbody>
                        <tr>
                        <th style="width:65%">Total :</th>
                        <td id="totals"></td>
                      </tr>
                        <tr>
                        <th style="width:65%">Delivery Charge :</th>
                        <td id="extras"></td>
                      </tr>
                        <tr>
                        <th style="width:65%">Sub Total :</th>
                        <td id="tpsss"></td>
                      </tr>
                      
                    </tbody>
                  </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
             
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include('inc-file/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){
     var finalmrps=0;
         $('.toprice').each(function(){
          finalmrps=parseFloat($(this).val())+parseFloat(finalmrps);
          $('#totals').html('<i class="fa fa-inr"></i> '+finalmrps+'.00 /-');
          if(finalmrps<=300)
          {
            $('#extras').html('<i class="fa fa-inr"></i> 30.00 /-');
            var totalcost=parseFloat(finalmrps)+parseFloat(30);
            $('#tpss').html('<i class="fa fa-inr"></i> '+totalcost+'.00 /-');
            $('#tpsss').html('<i class="fa fa-inr"></i> '+totalcost+'.00 /-');
          }
          else
          {
            $('#extras').html('<i class="fa fa-inr"></i> 0.00 /-');
             var totalcost=parseFloat(finalmrps)+parseFloat(0);
            $('#tpss').html('<i class="fa fa-inr"></i> '+totalcost+'.00 /-');
            $('#tpsss').html('<i class="fa fa-inr"></i> '+totalcost+'.00 /-');
          }
          });
    });
</script>

<script type="text/javascript">
 function beforeprintdata()
 {
  $('footer').hide();
 }
 function afterprintdata()
 {
 $('footer').show();
 }
</script>
<!-- <script type="text/javascript">
  $(document).ready(function(){
      $("#printinvoice").click(function () {
       $("#printarea").show();
          window.print();
     })
  })
</script> -->