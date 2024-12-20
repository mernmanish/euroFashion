 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="<?php echo base_url(); ?>img/logo.png" alt="superadminLTE Logo" class="brand-image elevation-3"
           style="height: 95px; width: 73%;">
     <!-- Agriculture Protect -->
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php if(!empty($this->session->userdata('sessionuser')['image'])){ ?>
        <div class="image">
          <img src="<?php echo base_url(); ?><?php echo $this->session->userdata('sessionuser')['image']; ?>" class="img-circle elevation-2" alt="User Image" style="height: 40px;">
        </div>
      <?php } else { ?>
        <div class="image">
          <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" style="height: 40px;">
        </div>
      <?php } ?>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('sessionuser')['name']; ?></a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url(); ?>cp/Home" class="nav-link ">
              <!-- <i class="nav-icon fa fa-tachometer-alt"></i> -->
              <i class="nav-icon fa fa-tachometer" aria-hidden="true"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

               <i class="nav-icon fa fa-location-arrow" aria-hidden="true"></i>
              <p>
                 Location Master
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
           
              <li class="nav-item">
                <a href="<?php echo site_url(); ?>cp/Location_master/state" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>State</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo site_url(); ?>cp/Location_master/city" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>City</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url(); ?>cp/Location_master/location" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Location</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

               <i class="nav-icon fa fa-certificate" aria-hidden="true"></i>
              <p>
                 Product Master
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>cp/Product_Master/Product_brand" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Product Brand</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>cp/Product_Master/Product_category" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Product Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>cp/Product_Master/product_unit" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Product Unit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>cp/Product_Master/Product_size" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Product Size</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="<?php echo base_url(); ?>cp/Product_Master/price_range" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Price Range</p>
                </a>
              </li>
             
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

               <i class="nav-icon fa fa-product-hunt" aria-hidden="true"></i>
              <p>
                 Product Details
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>cp/Product" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>cp/Product/import_product" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Bulk Product</p>
                </a>
              </li>  
            </ul>
          </li>
    
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>cp/Product_Master/coupan" class="nav-link">
              <i class="nav-icon fa fa-ticket" aria-hidden="true"></i>
              <p>
                Coupan
              </p>
            </a>
          </li>
          
         <li class="nav-item">
            <a href="<?php echo base_url(); ?>cp/Vendor" class="nav-link">
              <i class="nav-icon fa fa-suitcase" aria-hidden="true"></i>
              <p>
                Vendor
              </p>
            </a>
          </li> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

               <i class="nav-icon fa fa-trophy" aria-hidden="true"></i>
              <p>
                Offers
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url(); ?>cp/Offer/offer_details" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Offer Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
               <i class="nav-icon fa fa-list-alt" aria-hidden="true"></i>
              <p>
                 Order
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>cp/Order/order_list" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Order List</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?php echo base_url(); ?>cp/Order/bulk_order" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Bulk Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>cp/Order/change_order" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Change Order</p>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>cp/Home/technical_support" class="nav-link">
              <i class="nav-icon fa fa-handshake-o" aria-hidden="true"></i>
              <p>
                Support Center
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

               <i class="nav-icon fa fa-rss" aria-hidden="true"></i>
              <p>
                 Blogs Management
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url(); ?>cp/Blog/blog_category" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Blog Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url(); ?>cp/Blog/blog_details" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Blog Details</p>
                </a>
              </li>
            </ul>
          </li>
          
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

               <i class="nav-icon fa fa-globe" aria-hidden="true"></i>
              <p>
                 Web Configration
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url(); ?>cp/Website_setting/testimonial" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Testimonial</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="<?php echo site_url(); ?>cp/Website_setting/slider" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
          
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

               <i class="nav-icon fa fa-cogs" aria-hidden="true"></i>
              <p>
                 Account Setting
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($this->session->userdata('sessionuser')['usertype']=="superadmin"){ ?>
               <li class="nav-item">
                <a href="<?php echo site_url(); ?>cp/Auth/System_admin" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>System Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>cp/Auth/admin" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>cp/Auth/vendor_list" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Vendor List</p>
                </a>
              </li>
            <?php } ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>cp/Auth/change_password" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url(); ?>cp/Auth/logout" class="nav-link ">
              <i class="nav-icon fa fa-sign-out" aria-hidden="true"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>