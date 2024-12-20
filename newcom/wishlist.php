<?php include('inc-file/head.php'); ?>
<?php include('inc-file/header.php'); ?>
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row row-cols-1">
            <div class="col">
                <div class="breadcrumb__content text-center">
                    <h1 class="breadcrumb__content--title text-white mb-25">Wishlist</h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb__content--menu__items"><span class="text-white">Wishlist</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cart__section section--padding">
    <div class="container">
        <div class="cart__section--inner">
            <form action="#"> 
                <h2 class="cart__title mb-40">Wishlist</h2>
                <div class="cart__table">
                    <table class="cart__table--inner">
                        <thead class="cart__table--header">
                            <tr class="cart__table--header__items">
                                <th class="cart__table--header__list">Product</th>
                                <th class="cart__table--header__list">Price</th>
                                <th class="cart__table--header__list text-center">STOCK STATUS</th>
                                <th class="cart__table--header__list text-right">ADD TO CART</th>
                            </tr>
                        </thead>
                        <tbody class="cart__table--body">
                            <tr class="cart__table--body__items">
                                <td class="cart__table--body__list">
                                    <div class="cart__product d-flex align-items-center">
                                        <button class="cart__remove--btn" aria-label="search button" type="button">
                                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg>
                                        </button>
                                        <div class="cart__thumbnail">
                                            <a href="product-details.php"><img class="border-radius-5" src="assets/img/product/product1.png" alt="cart-product"></a>
                                        </div>
                                        <div class="cart__content">
                                            <h4 class="cart__content--title"><a href="product-details.php">Fresh-whole-fish</a></h4>
                                            <span class="cart__content--variant">COLOR: Blue</span>
                                            <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__table--body__list">
                                    <span class="cart__price">£65.00</span>
                                </td>
                                <td class="cart__table--body__list text-center">
                                    <span class="in__stock text__secondary">in stock</span>
                                </td>
                                <td class="cart__table--body__list text-right">
                                    <a class="wishlist__cart--btn primary__btn" href="cart.php">Add To Cart</a>
                                </td>
                            </tr>
                            <tr class="cart__table--body__items">
                                <td class="cart__table--body__list">
                                    <div class="cart__product d-flex align-items-center">
                                        <button class="cart__remove--btn" aria-label="search button" type="button">
                                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg>
                                        </button>
                                        <div class="cart__thumbnail">
                                            <a href="product-details.php"><img class="border-radius-5" src="assets/img/product/product2.png" alt="cart-product"></a>
                                        </div>
                                        <div class="cart__content">
                                            <h4 class="cart__content--title"><a href="product-details.php">Vegetable-healthy</a></h4>
                                            <span class="cart__content--variant">COLOR: Blue</span>
                                            <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__table--body__list">
                                    <span class="cart__price">£65.00</span>
                                </td>
                                <td class="cart__table--body__list text-center">
                                    <span class="in__stock text__secondary">in stock</span>
                                </td>
                                <td class="cart__table--body__list text-right">
                                    <a class="wishlist__cart--btn primary__btn" href="cart.php">Add To Cart</a>
                                </td>
                            </tr>
                            <tr class="cart__table--body__items">
                                <td class="cart__table--body__list">
                                    <div class="cart__product d-flex align-items-center">
                                        <button class="cart__remove--btn" aria-label="search button" type="button">
                                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg>
                                        </button>
                                        <div class="cart__thumbnail">
                                            <a href="product-details.php"><img class="border-radius-5" src="assets/img/product/product3.png" alt="cart-product"></a>
                                        </div>
                                        <div class="cart__content">
                                            <h4 class="cart__content--title"><a href="product-details.php">Raw-onions-surface</a></h4>
                                            <span class="cart__content--variant">COLOR: Blue</span>
                                            <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__table--body__list">
                                    <span class="cart__price">£65.00</span>
                                </td>
                                <td class="cart__table--body__list text-center">
                                    <span class="in__stock text__secondary">in stock</span>
                                </td>
                                <td class="cart__table--body__list text-right">
                                    <a class="wishlist__cart--btn primary__btn" href="cart.php">Add To Cart</a>
                                </td>
                            </tr>
                            <tr class="cart__table--body__items">
                                <td class="cart__table--body__list">
                                    <div class="cart__product d-flex align-items-center">
                                        <button class="cart__remove--btn" aria-label="search button" type="button">
                                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg>
                                        </button>
                                        <div class="cart__thumbnail">
                                            <a href="product-details.php"><img class="border-radius-5" src="assets/img/product/product4.png" alt="cart-product"></a>
                                        </div>
                                        <div class="cart__content">
                                            <h4 class="cart__content--title"><a href="product-details.php">Oversize Cotton Dress</a></h4>
                                            <span class="cart__content--variant">COLOR: Blue</span>
                                            <span class="cart__content--variant">WEIGHT: 2 Kg</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__table--body__list">
                                    <span class="cart__price">£65.00</span>
                                </td>
                                <td class="cart__table--body__list text-center">
                                    <span class="in__stock text__secondary">in stock</span>
                                </td>
                                <td class="cart__table--body__list text-right">
                                    <a class="wishlist__cart--btn primary__btn" href="cart.php">Add To Cart</a>
                                </td>
                            </tr>
                        </tbody>
                    </table> 
                    <div class="continue__shopping d-flex justify-content-between">
                        <a class="continue__shopping--link" href="index.php">Continue shopping</a>
                        <a class="continue__shopping--clear" href="productlist.php">View All Products</a>
                    </div>
                </div> 
            </form> 
        </div>
    </div>     
</section>
<section class="product__section product__section--style3 section--padding pt-0">
    <div class="container product3__section--container">
        <div class="section__heading text-center mb-50">
            <h2 class="section__heading--maintitle">New Products</h2>
        </div>
        <div class="product__section--inner product__swiper--column4__activation swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="product__items ">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="product-details.php">
                                <img class="product__items--img product__primary--img" src="assets/img/product/product1.png" alt="product-img">
                                <img class="product__items--img product__secondary--img" src="assets/img/product/product2.png" alt="product-img">
                            </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale">Sale</span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">Jacket, Women</span>
                            <h3 class="product__items--content__title h4"><a href="product-details.php">Oversize Cotton Dress</a></h3>
                            <div class="product__items--price">
                                <span class="current__price">$110</span>
                                <span class="price__divided"></span>
                                <span class="old__price">$78</span>
                            </div>
                         
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="cart.php">
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
                                    <a class="product__items--action__btn" href="wishlist.php">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg> 
                                        <span class="visually-hidden">Wishlist</span>
                                    </a>
                                </li>
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                        <span class="visually-hidden">Quick View</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product__items ">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="product-details.php">
                                <img class="product__items--img product__primary--img" src="assets/img/product/product3.png" alt="product-img">
                                <img class="product__items--img product__secondary--img" src="assets/img/product/product4.png" alt="product-img">
                            </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale">Sale</span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">Jacket, Women</span>
                            <h3 class="product__items--content__title h4"><a href="product-details.php">Boxy Denim Jacket</a></h3>
                            <div class="product__items--price">
                                <span class="current__price">$120</span>
                                <span class="price__divided"></span>
                                <span class="old__price">$88</span>
                            </div>
                        
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="cart.php">
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
                                    <a class="product__items--action__btn" href="wishlist.php">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg> 
                                        <span class="visually-hidden">Wishlist</span>
                                    </a>
                                </li>
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                        <span class="visually-hidden">Quick View</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product__items ">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="product-details.php">
                                <img class="product__items--img product__primary--img" src="assets/img/product/product5.png" alt="product-img">
                                <img class="product__items--img product__secondary--img" src="assets/img/product/product11.png" alt="product-img">
                            </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale">Sale</span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">Jacket, Women</span>
                            <h4 class="product__items--content__title"><a href="product-details.php">Quilted Shoulder Bag</a></h4>
                            <div class="product__items--price">
                                <span class="current__price">$115</span>
                                <span class="price__divided"></span>
                                <span class="old__price">$75</span>
                            </div>
                          
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="cart.php">
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
                                    <a class="product__items--action__btn" href="wishlist.php">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg> 
                                        <span class="visually-hidden">Wishlist</span>
                                    </a>
                                </li>
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                        <span class="visually-hidden">Quick View</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product__items ">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="product-details.php">
                                <img class="product__items--img product__primary--img" src="assets/img/product/product8.png" alt="product-img">
                                <img class="product__items--img product__secondary--img" src="assets/img/product/product15.png" alt="product-img">
                            </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale">Sale</span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">Jacket, Women</span>
                            <h4 class="product__items--content__title"><a href="product-details.php">Square Shoulder Bag</a></h4>
                            <div class="product__items--price">
                                <span class="current__price">$117</span>
                                <span class="price__divided"></span>
                                <span class="old__price">$80</span>
                            </div>
                           
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="cart.php">
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
                                    <a class="product__items--action__btn" href="wishlist.php">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg> 
                                        <span class="visually-hidden">Wishlist</span>
                                    </a>
                                </li>
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                        <span class="visually-hidden">Quick View</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product__items ">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="product-details.php">
                                <img class="product__items--img product__primary--img" src="assets/img/product/product12.png" alt="product-img">
                                <img class="product__items--img product__secondary--img" src="assets/img/product/product13.png" alt="product-img">
                            </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale">Sale</span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">Jacket, Women</span>
                            <h4 class="product__items--content__title"><a href="product-details.php">Wool-blend Jacket</a></h4>
                            <div class="product__items--price">
                                <span class="current__price">$144</span>
                                <span class="price__divided"></span>
                                <span class="old__price">$98</span>
                            </div>
                           
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="cart.php">
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
                                    <a class="product__items--action__btn" href="wishlist.php">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg> 
                                        <span class="visually-hidden">Wishlist</span>
                                    </a>
                                </li>
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                        <span class="visually-hidden">Quick View</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product__items ">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="product-details.php">
                                <img class="product__items--img product__primary--img" src="assets/img/product/product14.png" alt="product-img">
                                <img class="product__items--img product__secondary--img" src="assets/img/product/product15.png" alt="product-img">
                            </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale">Sale</span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">Jacket, Women</span>
                            <h4 class="product__items--content__title"><a href="product-details.php">Western denim shirt</a></h4>
                            <div class="product__items--price">
                                <span class="current__price">$128</span>
                                <span class="price__divided"></span>
                                <span class="old__price">$72</span>
                            </div>
                          
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="cart.php">
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
                                    <a class="product__items--action__btn" href="wishlist.php">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg> 
                                        <span class="visually-hidden">Wishlist</span>
                                    </a>
                                </li>
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                        <span class="visually-hidden">Quick View</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product__items ">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="product-details.php">
                                <img class="product__items--img product__primary--img" src="assets/img/product/product11.png" alt="product-img">
                                <img class="product__items--img product__secondary--img" src="assets/img/product/product8.png" alt="product-img">
                            </a>
                            <div class="product__badge">
                                <span class="product__badge--items sale">Sale</span>
                            </div>
                        </div>
                        <div class="product__items--content">
                            <span class="product__items--content__subtitle">Jacket, Women</span>
                            <h4 class="product__items--content__title"><a href="product-details.php">Aware organic cotton</a></h4>
                            <div class="product__items--price">
                                <span class="current__price">$135</span>
                                <span class="price__divided"></span>
                                <span class="old__price">$68</span>
                            </div>
                           
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn add__to--cart" href="cart.php">
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
                                    <a class="product__items--action__btn" href="wishlist.php">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg> 
                                        <span class="visually-hidden">Wishlist</span>
                                    </a>
                                </li>
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                        <span class="visually-hidden">Quick View</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper__nav--btn swiper-button-next"></div>
            <div class="swiper__nav--btn swiper-button-prev"></div>
        </div>
    </div>
</section>
<?php include('inc-file/footer.php'); ?>