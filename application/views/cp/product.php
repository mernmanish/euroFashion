<?php include_once('inc-file/head.php'); ?>
<?php include_once('inc-file/header.php'); ?>
<?php include_once('inc-file/sidebarmenu.php'); ?>
<?php date_default_timezone_set("Asia/Calcutta"); ?>
<?php if (!isset($_GET['do'])): ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Product List <a href="<?php echo base_url(); ?>cp/Product?do=new" class="btn btn-success" style="float: right;">Add New Product</a></h1>

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
                  <thead class="text-white bg-danger">                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Vendor</th>
                      <th>Image</th>
                      <th>Back Image</th>
                      
                      <th>Product name</th>
                      <th>Brand</th>
                      <th>Category</th>
                      
                      <th>Sale Type</th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody class="producttable">
                  <?php
                  $sqlproduct=$this->db->select('*')->from('product')->order_by('id','desc')->get()->result_array();
                  $i=1;
                  foreach($sqlproduct as $rows)
                  {
                    $brand=$this->db->select('*')->from('brand')->where('id',$rows['brandid'])->get()->result_array(); 
                    $category=$this->db->select('*')->from('category')->where('id',$rows['categoryid'])->get()->result_array();
                    $branch=$this->db->select('*')->from('vendor')->where('id',$rows['vendor_id'])->get()->result_array();
                    ?>
                   
                    <tr>
                      <th><?php echo $i; ?></th>
                      <td><?php echo $branch[0]['name']; ?></td>
                      <?php if(!empty($rows['image'])){ ?>
                      <td><img src="<?php echo base_url(); ?><?php echo $rows['image']; ?>" style="height: 45px;"></td>
                    <?php } else { ?>
                      <td></td>
                    <?php } ?>
                     <?php if(!empty($rows['second_image'])){ ?>
                      <td><img src="<?php echo base_url(); ?><?php echo $rows['second_image']; ?>" style="height: 45px;"></td>
                    <?php } else { ?>
                      <td></td>
                    <?php } ?>
                      
                      <td><?php echo $rows['name']; ?></td>
                      <?php if(!empty($brand[0]['name'])){ ?>
                      <td><?php echo $brand[0]['name']; ?></td>
                    <?php } else { ?>
                      <td></td>
                    <?php } ?>
                      <?php if(!empty($category[0]['name'])){ ?>
                      <td><?php echo $category[0]['name']; ?></td>
                    <?php } else { ?>
                      <td></td>
                    <?php } ?>
                     
                    
                      
                      <input type="hidden" name="pro_id[]" id="pro_id" value="<?php echo $rows['id']; ?>">
                    
                      <td><select class="form-control" name="stock_type[]" id="stock_type" onchange="changestocktatus('<?php echo $rows['id']; ?>')">
                        <option value="in_stock" <?php if($rows['stock_type']=="in_stock"){ echo "selected"; } ?>>In Stock</option>
                        <option value="out_of_stock" <?php if($rows['stock_type']=="out_of_stock"){ echo "selected"; } ?>>Out of Stock</option>
                      </select></td>
                   
                     <!--  <td><?php echo $rows['pricerange']; ?></td> -->
                     
                      <td>
		               <a  class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>cp/Product?do=update&id=<?php echo $rows['id']; ?>"><i class="fa fa-pencil"></i></a>
		              <button type="button" class="btn btn-danger btn-sm" id="<?php echo $rows['id']; ?>" onclick="deleteproduct(this.id)"><i class="fa fa-trash"></i></button></td>
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
<?php else: ?>
	<div class="content-wrapper">
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 col-12">
            <h1>Manage Product  <a href="<?php echo base_url(); ?>cp/Product" class="btn btn-success pull-right">Product List</a></h1>
          </div>
        </div> 
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
              <!-- <div class="card-header">
                <h3 class="card-title">Update User</h3>
              </div> -->
		            <?php if (isset($_GET['do']) && isset($_GET['id']) && !empty($_GET['do']) && !empty($_GET['id'])): ?>
		          <?php $id=$_GET['id']; 
              $sqledit=$this->db->select('*')->from('product')->where('id',$id)->get()->result_array();
              $product_inventries=$this->db->select('*')->from('product_inventries')->where('pro_id',$sqledit[0]['id'])->get()->result_array();

                ?>
              <div class="col-md-12">
          <form role="form" id="productform" method="post">
            <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header bg-danger">
                  <h4 class="card-title">Product Details</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                  <input type="hidden" name="pid" id="pid" value="<?php echo $sqledit[0]['id']; ?>">
                  <div class="form-group col-md-4">
                    <label for="vendor_id">Vendor</label>
                    <select class="form-control" id="vendor_id" name="vendor_id">
                      <option value="">Select Vendor</option>
                      <?php
                      $sql=$this->db->select('*')->from('vendor')->order_by('name','ASC')->get()->result_array();
                      foreach($sql as $rows)
                      { 
                      ?>
                      <option value="<?php echo $rows['id']; ?>" <?php if($sqledit[0]['vendor_id']==$rows['id']){ echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                     <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="sku_no">SKU No</label>
                    <input type="text" class="form-control" id="sku_no" name="sku_no" placeholder="Enter SKU No" value="<?php echo $sqledit[0]['sku_no']; ?>" readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="categoryid">Product Category</label>
                    <select class="form-control select2" name="categoryid" id="categoryid">
                      <option value="">Select Categroy</option>
                      <?php 
                      $sqlcategroy=$this->db->select('*')->from('category')->get()->result_array();
                      foreach($sqlcategroy as $rows)
                      {
                      ?>
                      <option value="<?php echo $rows['id']; ?>" <?php if($sqledit[0]['categoryid']==$rows['id']){ echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                 
                 
                </div>
                <div class="row">
                   <div class="form-group col-md-8">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product name" value="<?php echo $sqledit[0]['name']; ?>">
                  </div>
                   <div class="form-group col-md-4">
                    <label for="brandid">Brand</label>
                    <select class="form-control select2" name="brandid" id="brandid">
                      <option value="">Select Product Brand</option>
                      <?php 
                      $sqlbrand=$this->db->select('*')->from('brand')->get()->result_array();
                      foreach($sqlbrand as $rows)
                      {
                      ?>
                      <option value="<?php echo $rows['id']; ?>" <?php if($sqledit[0]['brandid']==$rows['id']){ echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>Short Description</label>
                    <textarea class="form-control" rows="5" name="short_description" id="short_description" placeholder="Enter Short Description"><?php echo $sqledit[0]['short_description']; ?></textarea>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                    <label>Description</label>
                    <textarea class="form-control" rows="5" name="description" id="description"><?php echo $sqledit[0]['description']; ?></textarea>
                  </div>
              </div>
              <div class="row text-center">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead class="bg-danger text-white">
                        <tr>
                          <th>Unit</th>
                          <th>Size</th>
                          <th style="width: 15%;">Price</th>
                          <th style="width: 17%;">Sale Price</th>
                          <th>Avg Price</th>
                          <th style="width: 7%;"><button type="button" class="btn btn-info btn-sm" id="adds"> <i class="fa fa-plus"></i> </button></th>
                        </tr>
                      </thead>
                      <tbody id="containerss">
                        <?php
                        $variation=$this->db->select('*')->from('product_variation')->where('pro_id',$sqledit[0]['id'])->get()->result_array();
                        foreach ($variation as $variations) {
                          ?>
                        <tr>
                          <td><select class="form-control unitdata" name="unit_id[]" id="unit_id">
                            <option value="">Select Unit</option>
                            <?php
                            $sql=$this->db->select('*')->from('unit')->order_by('id','ASC')->get()->result_array();
                            foreach($sql as $rows)
                            { 
                            ?>
                            <option value="<?php echo $rows['id']; ?>" <?php if($rows['id']==$variations['unit_id']){ echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                          <?php } ?>
                          </select></td>
                          <td><select class="form-control sizedata" name="size_id[]" id="size_id">
                            <option value="">Select Size</option>
                            <?php
                            $sql=$this->db->select('*')->from('size')->order_by('id','ASC')->get()->result_array();
                            foreach($sql as $rows)
                            { 
                            ?>
                            <option value="<?php echo $rows['id']; ?>" <?php if($rows['id']==$variations['size_id']){ echo "selected"; } ?>><?php echo $rows['name']; ?></option>
                          <?php } ?>
                          </select></td>
                          <td><input type="text" name="price[]" id="price" class="form-control" placeholder="Enter Price"  value="<?php echo $variations['price']; ?>"></td>
                          <td><input type="text" name="sale_price[]" id="sale_price" placeholder="Enter Sale Price" class="form-control" value="<?php echo $variations['sale_price']; ?>"></td>
                          <td><select class="form-control" name="price_id[]" id="price_id">
                            <option value="">Select Avg Price</option>
                            <?php
                            $sql=$this->db->select('*')->from('product_price')->order_by('id','ASC')->get()->result_array();
                            foreach($sql as $rows)
                            { 
                            ?>
                            <option value="<?php echo $rows['id']; ?>" <?php if($rows['id']==$variations['price_id']){ echo "selected"; } ?>><?php echo $rows['pricerange']; ?></option>
                          <?php } ?>
                          </select></td>
                          <td><button type="button" class="btn btn-danger btn-sm" id="remove"><i class="fa fa-remove"></i></button></td>

                        </tr>
                      <?php  }    ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <!-- <div class="card">
             <div class="card-header bg-danger">
               <h4 class="card-title">Flash Sale</h4>
             </div>
              <div class="card-body">
                <div class="col-md-12 form-group">
                  <label>Stock</label>
                   <input type="text" name="flash_qty" id="flash_qty" class="form-control" placeholder="Enter Flash Sale Qty" value="<?php echo $sqledit[0]['flash_qty']; ?>">
                </div>
                <div class="col-md-12 form-group">
                  <label>Flash Sale</label>
                   <input type="text" name="flash_qty" id="flash_qty" class="form-control" placeholder="Enter Flash Sale Qty" value="<?php echo $sqledit[0]['flash_qty']; ?>">
                </div>
              </div>
          </div> -->
          <div class="card">
             <div class="card-header bg-danger">
               <h4 class="card-title">Stock Details</h4>
             </div>
              <div class="card-body">
                <div class="row">
                <div class="col-md-6 form-group">
                  <div class="icheck-danger d-inline">
                      <input type="radio" class="changestocks" name="stock_type" id="in_stock" value="in_stock" <?php if($sqledit[0]['stock_type']=="in_stock"){ echo "checked"; } ?>>
                      <label for="in_stock">In Stock </label>
                  </div>
                  <p class="ml-4 text-success" style="font-size: 13px; font-weight: bold;">Avail stock: <?php echo $product_inventries[0]['in_stock_item'] ?? "N/A" ?> Items</p>
                </div>
                <div class="col-md-6 form-group">
                  <div class="icheck-danger d-inline">
                      <input type="radio" class="changestocks" name="stock_type" id="out_of_stock" value="out_of_stock"  <?php if($sqledit[0]['stock_type']=="out_of_stock"){ echo "checked"; } ?>>
                      <label for="out_of_stock">Out of Stock</label>
                  </div>
                </div>
              </div>
              <div class="row stockData" style="display: block;">
                <div class="col-md-12">
                  <input type="text" name="no_of_stock" placeholder="Enter No of Stocks" class="form-control" id="no_of_stock" value="0">
                </div>
              </div>
              </div>
          </div>
          <div class="card">
             <div class="card-header bg-danger">
               <h4 class="card-title">Sale Information</h4>
             </div>
              <div class="card-body">
                <div class="row">
                <div class="col-md-6 form-group">
                  <div class="icheck-success d-inline">
                      <input type="radio" name="sale_type" id="new" value="New" <?php if($sqledit[0]['sale_type']=="New"){ echo "checked"; } ?>>
                      <label for="new">New</label>
                  </div>
                </div>
                <div class="col-md-6 form-group">
                  <div class="icheck-danger d-inline">
                      <input type="radio" name="sale_type" id="on" value="On Sale" <?php if($sqledit[0]['sale_type']=="On Sale"){ echo "checked"; } ?>>
                      <label for="on">On Sale</label>
                  </div>
                </div>
               
                <div class="col-md-6 form-group">
                  <div class="icheck-danger d-inline">
                      <input type="radio" name="sale_type" id="discount" value="Discount" <?php if($sqledit[0]['sale_type']=="Discount"){ echo "checked"; } ?>>
                      <label for="discount">Discount</label>
                  </div>
                </div>
                <div class="col-md-6 form-group">
                  <div class="icheck-danger d-inline">
                      <input type="radio" name="sale_type" id="seasonal" value="seasonal"  <?php if($sqledit[0]['sale_type']=="seasonal"){ echo "checked"; } ?>>
                      <label for="seasonal">Seasonal</label>
                  </div>
                </div>
              </div>
             
          </div>
        </div>
         <div class="card">
             <div class="card-header bg-danger">
               <h4 class="card-title">Product Main Image</h4>
             </div>
              <div class="card-body">
                <div class="col-md-12 form-group">
                    <label for="">Image</label>
                    <?php if(!empty($sqledit[0]['image'])){ ?>
                    <img src="<?php echo base_url(); ?><?php echo $sqledit[0]['image']; ?>" style="width: 100%;max-height: 150px;">
                  <?php } else { ?>
                    <img src="<?php echo base_url(); ?>/img/no-image.jpg" style="width: 100%;max-height: 150px;">
                  <?php } ?>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                </div>
              </div>
          </div>
          <div class="card">
             <div class="card-header bg-danger">
               <h4 class="card-title">Product Background Image</h4>
             </div>
              <div class="card-body">
                <div class="col-md-12 form-group">
                    <label for="">Background Image</label>
                    <?php if(!empty($sqledit[0]['second_image'])){ ?>
                    <img src="<?php echo base_url(); ?><?php echo $sqledit[0]['second_image']; ?>" style="width: 100%;max-height: 150px;">
                  <?php } else { ?>
                    <img src="<?php echo base_url(); ?>/img/no-image.jpg" style="width: 100%;max-height: 150px;">
                  <?php } ?>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="second_image" name="second_image">
                        <label class="custom-file-label" for="second_image">Choose file</label>
                      </div>
                    </div>
                </div>
              </div>
          </div>
           <div class="card">
             <div class="card-header bg-danger">
               <h4 class="card-title">Product Gallery</h4>
             </div>
              <div class="card-body">
                 <div class="row imgpreview">
                      <?php if(!empty($sqledit[0]['gallery'])){  ?>
                        <?php 
                        $gal=explode(",",$sqledit[0]['gallery']);
                        foreach($gal as $keys){ 
                        ?>
                        <div class="col-md-6">
                          <div class="imgcontainer">
                            <img src="<?php echo base_url(); ?><?php echo $keys; ?>" class="proimage" style="width:100%;min-height:80px; margin-bottom: 10px;">
                          </div>
                        </div>
                      <?php } ?>
                      <?php } ?>
                  </div>
                <div class="col-md-12 form-group">
                    <label for="">Gallery</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="gallery" name="gallery[]" multiple="multiple">
                      </div>
                    </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Update Details</button>
              </div>
          </div>
      </form>
    </div>
    <?php else: ?>
         <div class="col-md-12">
          <form role="form" id="productform" method="post">
            <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header bg-danger">
                  <h4 class="card-title">Product Details</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                  <input type="hidden" name="pid" id="pid">
                  <div class="form-group col-md-4">
                    <label for="vendor_id">Vendor</label>
                    <select class="form-control" id="vendor_id" name="vendor_id">
                      <option value="">Select Vendor</option>
                      <?php
                      $sql=$this->db->select('*')->from('vendor')->order_by('name','ASC')->get()->result_array();
                      foreach($sql as $rows)
                      { 
                      ?>
                      <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                     <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="sku_no">SKU No</label>
                    <input type="text" class="form-control" id="sku_no" name="sku_no" placeholder="Enter SKU No">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="categoryid">Product Category</label>
                    <select class="form-control select2" name="categoryid" id="categoryid">
                      <option value="">Select Categroy</option>
                      <?php 
                      $sqlcategroy=$this->db->select('*')->from('category')->get()->result_array();
                      foreach($sqlcategroy as $rows)
                      {
                      ?>
                      <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                                 
                </div>
                <div class="row">
                  <div class="form-group col-md-8">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product name">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="brandid">Brand</label>
                    <select class="form-control select2" name="brandid" id="brandid">
                      <option value="">Select Product Brand</option>
                      <?php 
                      $sqlbrand=$this->db->select('*')->from('brand')->get()->result_array();
                      foreach($sqlbrand as $rows)
                      {
                      ?>
                      <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                   
                  
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>Short Description</label>
                    <textarea class="form-control" rows="5" name="short_description" id="short_description" placeholder="Enter Short Description"></textarea>
                  </div>
              </div>
              <div class="row mb-4">
                  <div class="col-md-12">
                    <label>Description</label>
                    <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                  </div>
              </div>
            <hr>
              <div class="row">
                <div class="col-md-12">
                  <h5 style="color: #0d5228">Product Variation</h5>
                  <div class="table-responsive text-center">
                    <table class="table table-bordered">
                      <thead class="bg-danger text-white">
                        <tr>
                          <th>Unit</th>
                          <th>Size</th>
                          <th style="width: 15%;">Price</th>
                          <th style="width: 17%;">Sale Price</th>
                          <th>Avg Price</th>
                          <th style="width: 7%;"><button type="button" class="btn btn-info btn-sm" id="adds"> <i class="fa fa-plus"></i> </button></th>
                        </tr>
                      </thead>
                      <tbody id="containerss">
                        <tr>
                          <td><select class="form-control unitdata" name="unit_id[]" id="unit_id">
                            <option value="">Select Unit</option>
                            <?php
                            $sql=$this->db->select('*')->from('unit')->order_by('id','ASC')->get()->result_array();
                            foreach($sql as $rows)
                            { 
                            ?>
                            <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                          <?php } ?>
                          </select></td>
                          <td><select class="form-control sizedata" name="size_id[]" id="size_id">
                            <option value="">Select Size</option>
                            <?php
                            $sql=$this->db->select('*')->from('size')->order_by('id','ASC')->get()->result_array();
                            foreach($sql as $rows)
                            { 
                            ?>
                            <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                          <?php } ?>
                          </select></td>
                          <td><input type="text" name="price[]" id="price" class="form-control" placeholder="Enter Price"></td>
                          <td><input type="text" name="sale_price[]" id="sale_price" placeholder="Enter Sale Price" class="form-control"></td>
                          <td><select class="form-control" name="price_id[]" id="price_id">
                            <option value="">Select Avg Price</option>
                            <?php
                            $sql=$this->db->select('*')->from('product_price')->order_by('id','ASC')->get()->result_array();
                            foreach($sql as $rows)
                            { 
                            ?>
                            <option value="<?php echo $rows['id']; ?>"><?php echo $rows['pricerange']; ?></option>
                          <?php } ?>
                          </select></td>
                          <td><button type="button" class="btn btn-danger btn-sm" id="remove"><i class="fa fa-remove"></i></button></td>

                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
             <div class="card-header bg-danger">
               <h4 class="card-title">Stock Details</h4>
             </div>
              <div class="card-body">
                <div class="row">
                <div class="col-md-6 form-group">
                  <div class="icheck-danger d-inline">
                      <input type="radio" name="stock_type" id="in_stock" value="in_stock" class="changestocks">
                      <label for="in_stock">In Stock</label>
                  </div>
                </div>
                <div class="col-md-6 form-group">
                  <div class="icheck-danger d-inline">
                      <input type="radio" name="stock_type" id="out_of_stock" value="out_of_stock" class="changestocks">
                      <label for="out_of_stock">Out of Stock</label>
                  </div>
                </div>
              </div>
              <div class="row stockData" style="display: none;">
                <div class="col-md-12">
                  <input type="text" name="no_of_stock" placeholder="Enter No of Stocks" class="form-control" id="no_of_stock">
                </div>
              </div>
              </div>
          </div>
          <div class="card">
             <div class="card-header bg-danger">
               <h4 class="card-title">Sale Information</h4>
             </div>
              <div class="card-body">
                <div class="row">
                <div class="col-md-6 form-group">
                  <div class="icheck-danger d-inline">
                      <input type="radio" name="sale_type" id="new" value="New">
                      <label for="new">New</label>
                  </div>
                </div>
                <div class="col-md-6 form-group">
                  <div class="icheck-danger d-inline">
                      <input type="radio" name="sale_type" id="on" value="On Sale">
                      <label for="on">On Sale</label>
                  </div>
                </div>
              
                <div class="col-md-6 form-group">
                  <div class="icheck-danger d-inline">
                      <input type="radio" name="sale_type" id="discount" value="Discount">
                      <label for="discount">Discount</label>
                  </div>
                </div>
                <div class="col-md-6 form-group">
                  <div class="icheck-danger d-inline">
                      <input type="radio" name="sale_type" id="seasonal" value="seasonal">
                      <label for="seasonal">Seasonal</label>
                  </div>
                </div>
              </div>
             
          </div>
        </div>
         <div class="card">
             <div class="card-header bg-danger">
               <h4 class="card-title">Product Main Image</h4>
             </div>
              <div class="card-body">
                <div class="col-md-12 form-group">
                    <label for="">Image</label>
                    <img src="<?php echo base_url(); ?>/img/no-image.jpg" style="width: 100%;max-height: 150px;">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                </div>
              </div>
          </div>
          <div class="card">
             <div class="card-header bg-danger">
               <h4 class="card-title">Product Background Image</h4>
             </div>
              <div class="card-body">
                <div class="col-md-12 form-group">
                    <label for="">Product Background Image</label>
                    <img src="<?php echo base_url(); ?>/img/no-image.jpg" style="width: 100%;max-height: 150px;">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="second_image" name="second_image">
                        <label class="custom-file-label" for="second_image">Choose file</label>
                      </div>
                    </div>
                </div>
              </div>
          </div>
           <div class="card">
             <div class="card-header bg-danger">
               <h4 class="card-title">Product Gallery</h4>
             </div>
              <div class="card-body">
                 <div class="row imgpreview">
                        
                  </div>
                <div class="col-md-12 form-group">
                    <label for="">Gallery</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="gallery" name="gallery[]" multiple="multiple">
                      </div>
                    </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit Details</button>
              </div>
          </div>
      </form>
    </div>
      


               <?php endif ?>
            </div>
        </div>  
</section>
</div>
<?php endif ?>
<?php include_once('inc-file/footer.php'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('.changestocks').on('change',function(){
      var stockVal = $(this).val();
      if(stockVal=="in_stock")
      {
        $('.stockData').show();
      }
      else
      {
        $('.stockData').hide();
      }
    });
  });
</script>
<script type="text/javascript">
  function changestocktatus(pro_id)
  {
    if(confirm('Are you to sure Change Stock Type ?')){
    var pro_id = pro_id;
    var stock_type=$('#stock_type').val();
    //alert(stock_type);
    var formData={"pro_id":pro_id,"stock_type":stock_type};
    $.ajax({
      url:'<?php echo base_url('cp/Product/changestocktatus'); ?>',
      type:'POST',
      dataType:'json',
      data: formData,
    success:function(data)
    {
      if(data.success)
      {
      $('.table').load(location.href + " .table");
      $('.alert').show().addClass('alert-danger').text("Product Deleted Successfully");
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
  //   var pro_id = pro_id;
  //   alert(pro_id);
  //   var stock_type=$('#stock_type').val();
  //   alert(stock_type);
  //   if(confirm('Are you to sure Change Stock Type ?')){
  //   var formData={"pro_id":pro_id,"pro_id":stock_type};
  //     $.ajax({
  //               url: '<?php echo base_url(); ?>cp/Product/changestocktatus', 
  //               type: 'POST',
  //               dataType: 'json', 
  //               data: formData
  //              success:function(data)
  //              {
  //               if (data.success) {
  //                 $('.table').load(location.href + " .table");
  //                 $('.alert').show().addClass('alert-success').text("Product Stock Type Changed Successfully");
  //                 $('.alert').fadeOut(6000);
  //               }
  //               else{
  //                $('.alert').show().addClass('alert-danger').text("Product Data Not Changed");
  //                $('.alert').fadeOut(6000);
               
  //             }
  //             }   
  //           });
  // }
}
</script>
<script type="text/javascript">
	$(document).ready(function(){
     CKEDITOR.replace('description');
      $("#productform").validate({
    rules: {
        name:{
            required:true
        },
        branch_id:{
          required:true
        }
    },
    messages: {
        name:{
          required:"Please Enter Product name"
        },
        branch_id:{
          required:"Please Select Your Branch"
        }
    },
    errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        if (element.parent().hasClass('input-group')) {
            label.insertAfter(element.parent());
        } else if (element.is('select')) {
                label.insertAfter(element);
            }  else {   
                label.insertAfter(element);
            }

    },
    highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
        $(element).next('label').remove()
    },
    unhighlight: function(element) {
        $(element).parent().removeClass('has-danger')
        $(element).addClass('form-control-danger')
        $(element).next('label').remove()
    },
    success: function(label, element) {
        $(element).removeClass('text-danger');
    },
    submitHandler: function() {
      var description= CKEDITOR.instances.description.getData();
       var formData = new FormData($('#productform')[0]);
         formData.append('description',description );
      $.ajax({
                url: '<?php echo base_url(); ?>cp/Product/manage_product', 
                type: 'POST',
                dataType: 'json', 
                data: formData,
                contentType: false,
                cache: false,
                processData:false
            })
            .done(function(data) {
                //alert(data);
                if (data.success) {
                  if (data.status=="added") {
                  $('.table').load(location.href + " .table");
               $('.alert').show().addClass('alert-primary').text("Product Added Successfully");
                $('.alert').fadeOut(6000);
                $('#productform').trigger('reset');
             }
             else if (data.success=='avail') {
                 $('.alert').show().addClass('alert-warning').text("Product Added Successfully");
                $('.alert').fadeOut(6000); 
            }
             else{
                 $('.table').load(location.href + " .table");
                $('.alert').show().addClass('alert-success').text("Product Updated Successfully");
                $('.alert').fadeOut(6000);
                 $('#productform .btn-primary').text("Submit Details");
              } 
            }
            else{

                $('.alert').show().addClass('alert-danger').text("Data not Added");
                $('.alert').fadeOut(6000);
                return false;
              }  
            })
            .fail(function(data){
              alert('Failed');
            return false;
            })
        }
  });
	});
  function deleteproduct(id)
  {
     if(confirm('Are you to sure delete data?')){
    var formData={"id":id};
    $.ajax({
      url:'<?php echo base_url('cp/Product/delete_product'); ?>',
      type:'POST',
      dataType:'json',
      data: formData,
    success:function(data)
    {
      if(data.success)
      {
      $('.table').load(location.href + " .table");
      $('.alert').show().addClass('alert-danger').text("Product Deleted Successfully");
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
<script type="text/javascript">
    $(document).on('change','.unitdata',function(event){
      event.preventDefault();
      var cur=$(this);
      var unit_id = $(this).val();
      if(unit_id != '')
      {
       $.ajax({
        url:"<?php echo base_url(); ?>cp/Product/change_product",
        method:"POST",
        data:{unit_id:unit_id},
        success:function(data)
        {
         cur.closest('tr').find('.sizedata').html(data);
        }
       });
      }
      else
      {
       $('#size_id').html('<option value="">Select Size</option>');
      }
     });
  
</script>
   <script type="text/javascript">
  function filter_product()
   {
      var productsearch=$("#productsearch").val();
      var brandid=$("#brandid option:selected").val();
      var categoryid=$("#categoryid option:selected").val();
      var formData={"productsearch":productsearch,"brandid":brandid,"categoryid":categoryid};

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url() ?>cp/Product/filter_product',
        dataType: 'json',
        data: formData,
        success:function(data){
          //alert(data);
            $('.producttable').html(data);
        }
    });
   }
   </script>
    <script type="text/javascript">
         var x;
            $(document).ready(function(){
                 x=1; 
            });
        $(document).delegate('#adds', 'click', function(event) {
          if(confirm("Are you Sure Add to New Item ?"))
          {
            x=x+1;
      var html='<tr><td><select class="form-control unitdata" name="unit_id[]" id="unit_id"><option value="">Select Unit</option><?php $sql=$this->db->select('*')->from('unit')->order_by('id','ASC')->get()->result_array(); foreach($sql as $rows) { ?> <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option><?php } ?></select></td><td><select class="form-control sizedata" name="size_id[]" id="size_id"><option value="">Select Size</option><?php $sql=$this->db->select('*')->from('size')->order_by('id','ASC')->get()->result_array(); foreach($sql as $rows) { ?><option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option> <?php } ?></select></td><td><input type="text" name="price[]" id="price" class="form-control" placeholder="Enter Price"></td><td><input type="text" name="sale_price[]" id="sale_price" placeholder="Enter Sale Price" class="form-control"></td><td><select class="form-control" name="price_id[]" id="price_id"><option value="">Select Avg Price</option><?php $sql=$this->db->select('*')->from('product_price')->order_by('id','ASC')->get()->result_array();foreach($sql as $rows){ ?><option value="<?php echo $rows['id']; ?>"><?php echo $rows['pricerange']; ?></option><?php } ?></select></td><td><button type="button" class="btn btn-danger btn-sm" id="remove"><i class="fa fa-remove"></i></button></td></tr>';
        $('#containerss').append(html);
 
         CKEDITOR.replace('details'+x);
        return false;
         }

         return false;
         });
        </script>
        <script type="text/javascript">
        $(document).ready(function(){   
          $("#containerss").on('click','#remove',function(e){
            if(confirm("Are You want to sure Remove this item ?"))
            {
          $(this).parent('td').parent('tr').remove();
          return false;
           }
          });
        });
     </script>