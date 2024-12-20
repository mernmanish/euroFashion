<?php include('inc-file/head.php'); ?>
<style type="text/css">

    .catproduct{
        height: 215px;
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
 <!-- <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>
                    
                    <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>
                    
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    
                    <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>
                    
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                    
                    <span data-text-preloader="G" class="letters-loading">
                        G
                    </span>
                </div>
            </div>  
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    </div> -->
<?php include('inc-file/header.php'); ?>
<?php include('inc-file/slider.php'); ?>
<section class="banner__section section--padding">
    <div class="container-fluid">
        <div class="row mb--n28">
            <div class="col-lg-12 mb-28">
                <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1">
                <?php
                $sql= $this->db->select('*')->from('offers')->where('status','1')->get()->result_array();
                foreach($sql as $rows)
                { 
                    $pro = $this->db->select('*')->from('product')->where('id',$rows['pro_id'])->get()->result_array();
                ?>
                    <div class="col-lg-4 mb-28">
                        <div class="banner__items">
                            <a class="banner__items--thumbnail position__relative" href="<?php echo base_url(); ?>productlist.php"><img class="banner__items--thumbnail__img " src="<?php echo base_url(); ?>assets/img/banner/banner2.png" alt="banner-img"> 
                                <div class="banner__items--content">
                                    <span class="banner__items--content__subtitle text__secondary"><?php echo $pro[0]['name']; ?></span>
                                    <h2 class="banner__items--content__title h3"><?php echo $rows['offer_title']; ?> <br>
                                        Free Shipping</h2>
                                    <span class="banner__items--content__link">View Discounts
                                        <svg class="banner__items--content__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                            <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="banner__section section--padding">
    <div class="container-fluid">
       <div class="section__heading text-center mb-40">
            <h2 class="section__heading--maintitle">Popular Product Category</h2>
        </div>
        <div class="row">
        <?php
       $sql = $this->db->select('*')->from('category')->where('status','1')->get()->result_array();
        foreach($sql as $rows){ 
        ?>
            <div class="col-lg-4 col-6 mb-2">
                <div class="card " style="background-color: #4caf500f;">
                    <div class="card-body">
                        <a class="banner__items--thumbnail position__relative" href="<?php echo base_url(); ?>Product/category_wise_product_list/<?php echo $rows['id']; ?>">
                            <?php
                            if(!empty($rows['image']))
                            { 
                            ?>
                            <img class="banner__items--thumbnail__img catproduct" src="<?php echo base_url(); ?><?php echo $rows['image']; ?>" alt="banner-img">
                            <?php } else { ?>
                                <img class="banner__items--thumbnail__img catproduct" src="<?php echo base_url(); ?>img/no-image.png" alt="banner-img">
                            <?php } ?> 
                        </a>
                    </div>
                    <h4 class="text-center text-success"><?php echo $rows['name']; ?></h4>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</section>
<section class="product__section section--padding pt-0">
<?php
$sql = $this->db->select('*')->from('category')->where('status','1')->get()->result_array();
foreach($sql as $rows){ 
?>
<div class="container-fluid">
    <div class="section__heading mb-35">
        <h3 class=" mt-4 text-success "><?php echo $rows['name']; ?></h3>
    </div>
    <div class="product__section--inner">
        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
            <?php 
            $sqlpro= $this->db->select('*')->from('product')->where('categoryid',$rows['id'])->get()->result_array();
            foreach($sqlpro as $row)
            {
                $variation = $this->db->select('*')->from('product_variation')->where('pro_id',$row['id'])->get()->result_array();
                $size = $this->db->select('*')->from('size')->where('id',$variation[0]['size_id'])->get()->result_array();
                // $variation = $this->db->select('*')->from('product_variation')->where('pro_id',$row['id'])->get()->result_array();
                // $size = $this->db->select('*')->from('size')->where('id',$variation[0]['size_id'])->get()->result_array();
            ?>
            <!-- <div class="col mb-30">
                <div class="product__items ">
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
                        <span class="product__items--content__subtitle"><?php echo $rows['name']; ?></span>
                        <h4 class="product__items--content__title h4"><a href="<?php echo base_url(); ?>product-details.php"><?php echo substr($row['name'], 0,32); ?></a></h4>
                        <div class="product__items--price">
                            
                            
                            <span class="current__price">$<?php echo $row['sale_price']; ?></span>
                            <span class="price__divided"></span>
                            <span class="old__price">$<?php echo $row['price']; ?></span>
                        </div>
                       <div>
                        
                        <span class="text-success" style="font-weight: bold;">MOQ: <?php echo $row['moq']; ?></span>   
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
                                    <a class="product__items--action__btn" href="<?php echo base_url(); ?>Product/checkout/<?php echo $row['id']; ?>">
                                        <span class=""><i class="fa fa-handshake-o" aria-hidden="true"></i> Send Request</span>
                                    </a>
                            </li>    
                        </ul>
                    </div>
                </div>
            </div> -->
            <div class="col mb-30" >
                    <div class="product__items" style="border: 1px solid #6c0606;
                    padding: 5px;">
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

                                <li class="product__items--action__list" style="background-color: #9f4141;">
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
                                    <a class="product__items--action__btn text-danger"  href="<?php echo base_url(); ?>Product/product_details/<?php echo $row['id']; ?>" style="border:1px solid #6c0606;">
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
<?php } ?>
</section>
<section class="testimonial__section section--padding pt-0">
    <div class="container-fluid">
        <div class="section__heading text-center mb-40">
            <h2 class="section__heading--maintitle">Our Clients Say</h2>
        </div>
        <div class="testimonial__section--inner testimonial__swiper--activation swiper">
            <div class="swiper-wrapper">
            <?php
            $sql=$this->db->select('*')->from('testimonial')->where('status','1')->get()->result_array();
            foreach($sql as $rows){
            ?>
                <div class="swiper-slide">
                    <div class="testimonial__items text-center">
                        <div class="testimonial__items--thumbnail">
                            <img class="testimonial__items--thumbnail__img border-radius-50" src="<?php echo base_url(); ?><?php echo $rows['image']; ?>" alt="testimonial-img" style="height: 95px;">
                        </div>
                        <div class="testimonial__items--content">
                            <h3 class="testimonial__items--title"><?php echo $rows['cust_name']; ?></h3>
                            <p class="testimonial__items--desc"><?php echo $rows['message']; ?> </p>
                           
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
            <div class="testimonial__pagination swiper-pagination"></div>
        </div>
    </div>
</section>
<section class="blog__section section--padding pt-0">
            <div class="container-fluid">
                <div class="section__heading text-center mb-40">
                    <h2 class="section__heading--maintitle">From The Blog</h2>
                </div>
                <div class="blog__section--inner blog__swiper--activation swiper">
                    <div class="swiper-wrapper">
                    <?php
                    $sql=$this->db->select('*')->from('blog')->where('status','1')->get()->result_array();
                    foreach($sql as $rows){ 
                    ?>
                        <div class="swiper-slide">
                            <div class="blog__items">
                                <div class="blog__thumbnail">
                                    <a class="blog__thumbnail--link" href="<?php echo base_url(); ?>#"><img class="blog__thumbnail--img" src="<?php echo base_url(); ?><?php echo $rows['image']; ?>" alt="blog-img"></a>
                                </div>
                                <div class="blog__content">
                                    <span class="blog__content--meta">February 03, 2022</span>
                                    <h3 class="blog__content--title"><a href="<?php echo base_url(); ?>#"><?php echo $rows['news_title']; ?></a></h3>
                                    <a class="blog__content--btn primary__btn" href="<?php echo base_url(); ?>#">Read more </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <div class="swiper__nav--btn swiper-button-next"></div>
                    <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <!-- End blog section -->

    </main>
  <!-- <div class="newsletter__popup" data-animation="slideInUp">
        <div id="boxes" class="newsletter__popup--inner">
            <button class="newsletter__popup--close__btn" aria-label="search close button">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path></svg>
            </button>
            <div class="box newsletter__popup--box d-flex align-items-center">
                <div class="newsletter__popup--thumbnail">
                    <img class="newsletter__popup--thumbnail__img display-block" src="<?php echo base_url(); ?>assets/img/banner/newsletter-popup-thumb2.png" alt="newsletter-popup-thumb">
                </div>
                <div class="newsletter__popup--box__right">
                    <h2 class="newsletter__popup--title">Join Our Newsletter</h2>
                    <div class="newsletter__popup--content">
                        <label class="newsletter__popup--content--desc">Enter your email address to subscribe our notification of our new post &amp; features by email.</label>
                        <div class="newsletter__popup--subscribe" id="frm_subscribe">
                            <form class="newsletter__popup--subscribe__form">
                                <input class="newsletter__popup--subscribe__input" type="text" placeholder="Enter you email address here...">
                                <button class="newsletter__popup--subscribe__btn">Subscribe</button>
                            </form>
                            <div class="newsletter__popup--footer">
                                <input type="checkbox" id="newsletter__dont--show">
                                <label class="newsletter__popup--dontshow__again--text" for="newsletter__dont--show">Don't show this popup again</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<?php include('inc-file/footer.php'); ?>
