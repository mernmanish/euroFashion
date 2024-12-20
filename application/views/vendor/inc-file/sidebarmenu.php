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
          <a href="#" class="d-block">Welcome <?php echo $this->session->userdata('sessionuser')['name']; ?></a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url(); ?>vendor/Home" class="nav-link ">
              <!-- <i class="nav-icon fa fa-tachometer-alt"></i> -->
              <i class="nav-icon fa fa-tachometer" aria-hidden="true"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
               <i class="nav-icon fa fa-product-hunt" aria-hidden="true"></i>
              <p>
                 Product
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>vendor/Product" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Manage Product</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>vendor/Product_Master/coupan" class="nav-link">
              <i class="nav-icon fa fa-ticket" aria-hidden="true"></i>
              <p>
                Coupan
              </p>
            </a>
          </li>
          
         <li class="nav-item">
            <a href="<?php echo base_url(); ?>vendor/Vendor" class="nav-link">
              <i class="nav-icon fa fa-suitcase" aria-hidden="true"></i>
              <p>
                Profile
              </p>
            </a>
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
                <a href="<?php echo base_url(); ?>vendor/Order/order_list" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Order List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>vendor/Order/bulk_order" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Bulk Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>vendor/Order/change_order" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Change Order</p>
                </a>
              </li>
            </ul>
          </li>
         
         <li class="nav-item">
            <a href="<?php echo base_url(); ?>vendor/Home/technical_support" class="nav-link">
              <i class="nav-icon fa fa-handshake-o" aria-hidden="true"></i>
              <p>
                Support Center
              </p>
            </a>
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
              
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>vendor/Auth/change_password" class="nav-link">
                  <i class="nav-icon fa fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url(); ?>vendor/Auth/logout" class="nav-link">
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