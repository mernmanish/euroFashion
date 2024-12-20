<?php include('inc-file/head.php'); ?>
<style type="text/css">

    .catproduct{
        height: 180px; 
        width: 100%;
    }
    @media only screen and (max-width: 600px) {
        .catproduct {
            height: 120px; 
        }
    }​
   .productImage{
      height: 200px!important;
    }
    @media only screen and (max-width: 600px) {
        .productImage {
            height: 135px; 
            width: 100%;
        }
    }​
</style>
<?php include('inc-file/header.php'); ?>
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row row-cols-1">
            <div class="col">
                <div class="breadcrumb__content text-center">
                    <h1 class="breadcrumb__content--title text-white mb-25">Product List</h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb__content--menu__items"><span class="text-white">Product List</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shop__section section--padding">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="shop__product--wrapper">
                    <div class="tab_content">
                        <div id="product_grid" class="tab_pane active show">
                            <div class="product__section--inner product__grid--inner">
                                <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                                <?php
                                foreach($product as $row)
                                {
                        $variation = $this->db->select('*')->from('product_variation')->where('pro_id',$row['id'])->get()->result_array();
                        $size = $this->db->select('*')->from('size')->where('id',$variation[0]['size_id'])->get()->result_array();
                                ?>
            <div class="col mb-30" >
                    <div class="product__items" style="border: 1px solid #63b343; padding: 16px;">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="<?php echo base_url(); ?>Product/product_details/<?php echo $row['id']; ?>">
                            <?php
                            if(!empty($row['image']))
                            { 
                            ?>
                                <img class="product__items--img product__primary--img productImage " src="<?php echo base_url(); ?><?php echo $row['image']; ?>" alt="product-img" >
                                <img class="product__items--img product__secondary--img productImage" src="<?php echo base_url(); ?><?php echo $row['second_image']; ?>" alt="product-img">
                           <?php } else { ?>
                                 <img class="product__items--img product__primary--img productImage " src="<?php echo base_url(); ?>img/no-image.png" alt="product-img" >
                                <img class="product__items--img product__secondary--img productImage" src="<?php echo base_url(); ?>img/no-image.png" alt="product-img">
                           <?php } ?>
                        </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale"><?php echo $row['sale_type']; ?></span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <!-- <span class="product__items--content__subtitle">Jacket, Women</span> -->
                            <!--  <span class="product__items--content__subtitle"><?php echo $rows['name']; ?></span> -->
                        <h4 class="product__items--content__title h4"><a href="<?php echo base_url(); ?>Product/product_details/<?php echo $row['id']; ?>"><?php echo substr($row['name'], 0,32); ?></a></h4>
                        <div class="product__items--price">
                            <div>
                              <span class="text-success" style="font-weight: bold;"><?php echo $size[0]['name']; ?></span>
                            </div>
                            <!-- <span class="price__divided"></span> -->
                            <span class="current__price">₹<?php echo $variation[0]['sale_price']; ?></span>
                            <span class="price__divided"></span>
                            <span class="old__price">₹<?php echo $variation[0]['price']; ?></span>
                        </div>
                       
                           
                            <ul class="product__items--action d-flex">

                                <li class="product__items--action__list" style="background-color: #9ac88e6b;">
                                <a class="product__items--action__btn add__to--cart" href="javascript:void(0)" onclick="addtocart('<?php echo $row['id']; ?>','<?php echo $variation[0]['id']; ?>')">
                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                        <g transform="translate(0 0)">
                                          <g>
                                            <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                            <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                            <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                          </g>
                                        </g>
                                    </svg>
                                    <span class="add__to--cart__text"> + Add to cart</span>
                                </a>
                            </li>
                               
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn"  href="<?php echo base_url(); ?>Product/product_details/<?php echo $row['id']; ?>">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                        <span class="visually-hidden">Quick View</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagination__area bg__gray--color">
                        <nav class="pagination justify-content-center">
                            <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                                <li class="pagination__list">
                                    <a href="productlist.php" class="pagination__item--arrow  link ">
                                        <svg xmlns="http://www.w3.org/2000/svg"  width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292"/></svg>
                                        <span class="visually-hidden">pagination arrow</span>
                                    </a>
                                <li>
                                <li class="pagination__list"><span class="pagination__item pagination__item--current">1</span></li>
                                <li class="pagination__list"><a href="productlist.php" class="pagination__item link">2</a></li>
                                <li class="pagination__list"><a href="productlist.php" class="pagination__item link">3</a></li>
                                <li class="pagination__list"><a href="productlist.php" class="pagination__item link">4</a></li>
                                <li class="pagination__list">
                                    <a href="productlist.php" class="pagination__item--arrow  link ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"/></svg>
                                        <span class="visually-hidden">pagination arrow</span>
                                    </a>
                                <li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('inc-file/footer.php'); ?>