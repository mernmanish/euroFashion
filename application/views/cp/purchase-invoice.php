<?php include('inc-file/head.php'); ?>
<?php include('inc-file/header.php'); ?>
<?php include('inc-file/sidebarmenu.php'); ?>
<div class="content-wrapper mt-4" style="min-height: 1416.81px;">
 <?php $id=$this->uri->segment(3);  ?>
    <section class="content">
      <div class="container-fluid" >
        <div class="row" id="printarea">
          <div class="col-12">
            <div class="invoice p-3 mb-3">
              <div class="row">
                <div class="col-12">
                  <h2 class="text-center">Puja & Jyoti Hardware, Arwal</h2>
                  <h5 class="text-center">Jehanabad Road, Rojapar NH110, Arwal (Bihar)</h5>
                  <p class="text-center">GSTIN/UIN - 10BTAPK3608N1ZX</p>
                </div>
              </div>
             <?php $sqlinvoice=$this->db->select('*')->from('purchase')->where('id',$id)->get()->result_array(); ?>
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col pull-left">
               <?php $sqlsupplier=$this->db->select('*')->from('supplier')->where('id',$sqlinvoice[0]['supplierid'])->get()->result_array(); ?>
                  <address>
                    <strong><?php echo $sqlsupplier[0]['name']; ?></strong><br>
                    <?php echo $sqlsupplier[0]['fulladdress']; ?><br>
                    Phone: <?php echo $sqlsupplier[0]['mobile']; ?><br>
                    GSTIN: <?php echo $sqlsupplier[0]['gst_no']; ?><br>
                   
                 
                  </address>
                </div>
                <div class="col-sm-5 clearfix"></div>
                <div class="col-sm-3 invoice-col float-right">
                  <b>Invoice No: <?php echo $sqlinvoice[0]['invoice_no']; ?></b><br>
                  <b>Billing Date:</b> <?php echo $sqlinvoice[0]['billing_date']; ?> <br>
                 <b>Total Amount:</b> <?php echo $sqlinvoice[0]['bill_amount']; ?> <br>
                 <b>Dues Date:</b> <?php echo $sqlinvoice[0]['dues_date']; ?> <br>
                </div>
              </div>
             
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Item</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th>Total Price</th>
                    </tr>
                    </thead>
                    <tbody> 
                    <?php  
                    $i=1;
                    foreach($sqlinvoice as $rows)
                    {
                    $proqty=explode(",",$rows['qty']);
                    $proid=explode(",",$rows['productid']);
                    $proprice=explode(",",$rows['product_price']);
                    $prototal=explode(",",$rows['total_price']);
                    foreach($proid as $prodata =>$proin)
                    {
                   $sqlpro=$this->db->select('*')->from('product')->where('id',$proin)->get()->result_array();  ?>                   
                    <tr>
                      <td><?php echo $i; ?></td>
                       <td><?php echo $sqlpro[0]['name']; ?></td>
                      <td><?php echo $proprice[$prodata]; ?></td>
                      <td><?php echo $proqty[$prodata]; ?></td>
                      <td><?php echo $prototal[$prodata]; ?></td>
                    </tr>
                   <?php $i++; } } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-7">
                </div>
                <!-- /.col -->
                <div class="col-5 tcount">
                  <div class="table-responsive">
                   
                    <table class="table">
                      <tbody>
                        <tr>
                        <th style="width:50%">Subtotal (Include GST (18%)):</th>
                        <td><?php echo $sqlinvoice[0]['bill_amount']; ?></td>
                       </tr>
                       <tr>
                        <th style="width:50%">Discount Amount:</th>
                        <td><?php echo $sqlinvoice[0]['total_discount']; ?></td>
                       </tr>
                      <tr>
                        <th>Gross Amount:</th>
                        <td><?php echo $sqlinvoice[0]['net_amount']; ?></td>
                      </tr>
                      <tr>
                        <th>Paid Amount:</th>
                        <td><?php echo $sqlinvoice[0]['paid_amount']; ?></td>
                      </tr>
                      <tr>
                        <th>Dues Amount:</th>
                        <td><?php echo $sqlinvoice[0]['net_amount']-$sqlinvoice[0]['paid_amount'] ?></td>
                      </tr>
                      <tr>
                        <th>Amount in Word: </th>
                      <td><?php echo $sqlinvoice[0]['amount_word']; ?></td>
                      </tr>
                    </tbody></table>
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