<?php include('inc-file/head.php'); ?>
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
        <div class="shop__header bg__gray--color d-flex align-items-center justify-content-between mb-30">
            <button class="widget__filter--btn d-flex d-lg-none align-items-center" data-offcanvas>
                <svg  class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80"/><circle cx="336" cy="128" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="176" cy="256" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="336" cy="384" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/></svg> 
                <span class="widget__filter--btn__text">Filter</span>
            </button>
            <div class="product__view--mode d-flex align-items-center">
                <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                    <label class="product__view--label">Prev Page :</label>
                    <div class="select shop__header--select">
                        <select class="product__view--select">
                            <option selected value="1">65</option>
                            <option value="2">40</option>
                            <option value="3">42</option>
                            <option value="4">57 </option>
                            <option value="5">60 </option>
                        </select>
                    </div>
                </div>
                <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                    <label class="product__view--label">Sort By :</label>
                    <div class="select shop__header--select">
                        <select class="product__view--select">
                            <option selected value="1">Sort by latest</option>
                            <option value="2">Sort by popularity</option>
                            <option value="3">Sort by newness</option>
                            <option value="4">Sort by  rating </option>
                        </select>
                    </div>
                </div>
                <div class="product__view--mode__list">
                    <div class="product__grid--column__buttons d-flex justify-content-center">
                        <button class="product__grid--column__buttons--icons active" aria-label="product grid button" data-toggle="tab" data-target="#product_grid">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 9 9">
                                <g  transform="translate(-1360 -479)">
                                  <rect id="Rectangle_5725" data-name="Rectangle 5725" width="4" height="4" transform="translate(1360 479)" fill="currentColor"/>
                                  <rect id="Rectangle_5727" data-name="Rectangle 5727" width="4" height="4" transform="translate(1360 484)" fill="currentColor"/>
                                  <rect id="Rectangle_5726" data-name="Rectangle 5726" width="4" height="4" transform="translate(1365 479)" fill="currentColor"/>
                                  <rect id="Rectangle_5728" data-name="Rectangle 5728" width="4" height="4" transform="translate(1365 484)" fill="currentColor"/>
                                </g>
                              </svg>
                        </button>
                        
                    </div>
                </div>
                <div class="product__view--mode__list product__view--search d-none d-lg-block">
                    <form class="product__view--search__form" action="#">
                        <label>
                            <input class="product__view--search__input border-0" placeholder="Search by" type="text">
                        </label>
                        <button class="product__view--search__btn" aria-label="shop button"  type="submit">
                            <svg class="product__view--search__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>  
                        </button>
                    </form>
                </div>
            </div>
            <p class="product__showing--count">Showing 1–9 of 21 results</p>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="shop__sidebar--widget widget__area d-none d-lg-block">
                    <div class="single__widget widget__bg">
                        <h2 class="widget__title h3">Categories</h2>
                        <ul class="widget__categories--menu">
                            <li class="widget__categories--menu__list">
                                <label class="widget__categories--menu__label d-flex align-items-center">
                                    <img class="widget__categories--menu__img" src="assets/img/product/small-product1.png" alt="categories-img">
                                    <span class="widget__categories--menu__text">Denim Jacket</span>
                                    <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                        <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                    </svg>
                                </label>
                                <ul class="widget__categories--sub__menu">
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product2.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Jacket, Women</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product3.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Woolend Jacket</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product4.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Western denim</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product5.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Mini Dresss</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="widget__categories--menu__list">
                                <label class="widget__categories--menu__label d-flex align-items-center">
                                    <img class="widget__categories--menu__img" src="assets/img/product/small-product2.png" alt="categories-img">
                                    <span class="widget__categories--menu__text">Oversize Cotton</span>
                                    <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" >
                                        <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                    </svg>
                                </label>
                                <ul class="widget__categories--sub__menu">
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product2.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Jacket, Women</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product3.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Woolend Jacket</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product4.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Western denim</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product5.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Mini Dresss</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="widget__categories--menu__list">
                                <label class="widget__categories--menu__label d-flex align-items-center">
                                    <img class="widget__categories--menu__img" src="assets/img/product/small-product3.png" alt="categories-img">
                                    <span class="widget__categories--menu__text">Dairy & chesse</span>
                                    <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                        <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                    </svg>
                                </label>
                                <ul class="widget__categories--sub__menu">
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product2.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Jacket, Women</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product3.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Woolend Jacket</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product4.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Western denim</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product5.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Mini Dresss</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="widget__categories--menu__list">
                                <label class="widget__categories--menu__label d-flex align-items-center">
                                    <img class="widget__categories--menu__img" src="assets/img/product/small-product4.png" alt="categories-img">
                                    <span class="widget__categories--menu__text">Shoulder Bag</span>
                                    <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                        <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                    </svg>
                                </label>
                                <ul class="widget__categories--sub__menu">
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product2.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Jacket, Women</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product3.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Woolend Jacket</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product4.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Western denim</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product5.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Mini Dresss</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="widget__categories--menu__list">
                                <label class="widget__categories--menu__label d-flex align-items-center">
                                    <img class="widget__categories--menu__img" src="assets/img/product/small-product5.png" alt="categories-img">
                                    <span class="widget__categories--menu__text">Denim Jacket</span>
                                    <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                        <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                    </svg>
                                </label>
                                <ul class="widget__categories--sub__menu">
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product2.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Jacket, Women</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product3.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Woolend Jacket</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product4.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Western denim</span>
                                        </a>
                                    </li>
                                    <li class="widget__categories--sub__menu--list">
                                        <a class="widget__categories--sub__menu--link d-flex align-items-center" href="productlist.php">
                                            <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product5.png" alt="categories-img">
                                            <span class="widget__categories--sub__menu--text">Mini Dresss</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="single__widget widget__bg">
                        <h2 class="widget__title h3">Dietary Needs</h2>
                        <ul class="widget__form--check">
                            <li class="widget__form--check__list">
                                <label class="widget__form--check__label" for="check1">Denim shirt</label>
                                <input class="widget__form--check__input" id="check1" type="checkbox">
                                <span class="widget__form--checkmark"></span>
                            </li>
                            <li class="widget__form--check__list">
                                <label class="widget__form--check__label" for="check2">Need Winter</label>
                                <input class="widget__form--check__input" id="check2" type="checkbox">
                                <span class="widget__form--checkmark"></span>
                            </li>
                            <li class="widget__form--check__list">
                                <label class="widget__form--check__label" for="check3">Fashion Trends</label>
                                <input class="widget__form--check__input" id="check3" type="checkbox">
                                <span class="widget__form--checkmark"></span>
                            </li>
                            <li class="widget__form--check__list">
                                <label class="widget__form--check__label" for="check4">Oversize Cotton</label>
                                <input class="widget__form--check__input" id="check4" type="checkbox">
                                <span class="widget__form--checkmark"></span>
                            </li>
                            <li class="widget__form--check__list">
                                <label class="widget__form--check__label" for="check5">Baking material</label>
                                <input class="widget__form--check__input" id="check5" type="checkbox">
                                <span class="widget__form--checkmark"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="single__widget price__filter widget__bg">
                        <h2 class="widget__title h3">Filter By Price</h2>
                        <form class="price__filter--form" action="#"> 
                            <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                                <div class="price__filter--group">
                                    <label class="price__filter--label" for="Filter-Price-GTE2">From</label>
                                    <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                        <span class="price__filter--currency">$</span>
                                        <label>
                                            <input class="price__filter--input__field border-0" name="filter.v.price.gte" type="number" placeholder="0" min="0" max="250.00">
                                        </label>
                                    </div>
                                </div>
                                <div class="price__divider">
                                    <span>-</span>
                                </div>
                                <div class="price__filter--group">
                                    <label class="price__filter--label" for="Filter-Price-LTE2">To</label>
                                    <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                        <span class="price__filter--currency">$</span>
                                        <label>
                                            <input class="price__filter--input__field border-0" name="filter.v.price.lte" type="number" min="0" placeholder="250.00" max="250.00"> 
                                        </label>
                                    </div>  
                                </div>
                            </div>
                            <button class="price__filter--btn primary__btn" type="submit">Filter</button>
                        </form>
                    </div>
                    <div class="single__widget widget__bg">
                        <h2 class="widget__title h3">Top Rated Product</h2>
                        <div class="product__grid--inner">
                            <div class="product__items product__items--grid d-flex align-items-center">
                                <div class="product__items--grid__thumbnail position__relative">
                                    <a class="product__items--link" href="product-details.php">
                                        <img class="product__items--img product__primary--img" src="assets/img/product/small-product1.png" alt="product-img">
                                        <img class="product__items--img product__secondary--img" src="assets/img/product/small-product2.png" alt="product-img">
                                    </a>
                                </div>
                                <div class="product__items--grid__content">
                                    <h3 class="product__items--content__title h4"><a href="product-details.php">Women Fish Cut</a></h3>
                                    <div class="product__items--price">
                                        <span class="current__price">$110</span>
                                        <span class="price__divided"></span>
                                        <span class="old__price">$78</span>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="product__items product__items--grid d-flex align-items-center">
                                <div class="product__items--grid__thumbnail position__relative">
                                    <a class="product__items--link" href="product-details.php">
                                        <img class="product__items--img product__primary--img" src="assets/img/product/small-product3.png" alt="product-img">
                                        <img class="product__items--img product__secondary--img" src="assets/img/product/small-product4.png" alt="product-img">
                                    </a>
                                </div>
                                <div class="product__items--grid__content">
                                    <h3 class="product__items--content__title h4"><a href="product-details.php">Gorgeous Granite is</a></h3>
                                    <div class="product__items--price">
                                        <span class="current__price">$140</span>
                                        <span class="price__divided"></span>
                                        <span class="old__price">$115</span>
                                    </div>
                                  
                                </div>
                            </div>
                            <div class="product__items product__items--grid d-flex align-items-center">
                                <div class="product__items--grid__thumbnail position__relative">
                                    <a class="product__items--link" href="product-details.php">
                                        <img class="product__items--img product__primary--img" src="assets/img/product/small-product5.png" alt="product-img">
                                        <img class="product__items--img product__secondary--img" src="assets/img/product/small-product6.png" alt="product-img">
                                    </a>
                                </div>
                                <div class="product__items--grid__content">
                                    <h4 class="product__items--content__title"><a href="product-details.php">Durable A Steel </a></h4>
                                    <div class="product__items--price">
                                        <span class="current__price">$160</span>
                                        <span class="price__divided"></span>
                                        <span class="old__price">$118</span>
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single__widget widget__bg">
                        <h2 class="widget__title h3">Brands</h2>
                        <ul class="widget__tagcloud">
                            <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="productlist.php">Jacket</a></li>
                            <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="productlist.php">Women</a></li>
                            <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="productlist.php">Oversize</a></li>
                            <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="productlist.php">Cotton </a></li>
                            <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="productlist.php">Shoulder </a></li>
                            <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="productlist.php">Winter</a></li>
                            <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="productlist.php">Accessories</a></li>
                            <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="productlist.php">Dress </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="shop__product--wrapper">
                    <div class="tab_content">
                        <div id="product_grid" class="tab_pane active show">
                            <div class="product__section--inner product__grid--inner">
                                <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-2 mb--n30">
                                    <div class="col mb-30">
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
                                    <div class="col mb-30">
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
                                    <div class="col mb-30">
                                        <div class="product__items">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="product-details.php">
                                                    <img class="product__items--img product__primary--img" src="assets/img/product/product5.png" alt="product-img">
                                                    <img class="product__items--img product__secondary--img" src="assets/img/product/product6.png" alt="product-img">
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
                                                    <span class="old__price">$85</span>
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
                                    <div class="col mb-30">
                                        <div class="product__items">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="product-details.php">
                                                    <img class="product__items--img product__primary--img" src="assets/img/product/product7.png" alt="product-img">
                                                    <img class="product__items--img product__secondary--img" src="assets/img/product/product8.png" alt="product-img">
                                                </a>
                                                <div class="product__badge">
                                                    <span class="product__badge--items sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="product__items--content">
                                                <span class="product__items--content__subtitle">Jacket, Women</span>
                                                <h4 class="product__items--content__title"><a href="product-details.php">Square Shoulder Bag</a></h4>
                                                <div class="product__items--price">
                                                    <span class="current__price">$125</span>
                                                    <span class="price__divided"></span>
                                                    <span class="old__price">$112</span>
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
                                    <div class="col mb-30">
                                        <div class="product__items">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="product-details.php">
                                                    <img class="product__items--img product__primary--img" src="assets/img/product/product9.png" alt="product-img">
                                                    <img class="product__items--img product__secondary--img" src="assets/img/product/product10.png" alt="product-img">
                                                </a>
                                                <div class="product__badge">
                                                    <span class="product__badge--items sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="product__items--content">
                                                <span class="product__items--content__subtitle">Jacket, Women</span>
                                                <h4 class="product__items--content__title"><a href="product-details.php">Light Denim Jacket</a></h4>
                                                <div class="product__items--price">
                                                    <span class="current__price">$125</span>
                                                    <span class="price__divided"></span>
                                                    <span class="old__price">$95</span>
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
                                    <div class="col mb-30">
                                        <div class="product__items">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="product-details.php">
                                                    <img class="product__items--img product__primary--img" src="assets/img/product/product11.png" alt="product-img">
                                                    <img class="product__items--img product__secondary--img" src="assets/img/product/product12.png" alt="product-img">
                                                </a>
                                                <div class="product__badge">
                                                    <span class="product__badge--items sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="product__items--content">
                                                <span class="product__items--content__subtitle">Jacket, Women</span>
                                                <h3 class="product__items--content__title h4"><a href="product-details.php">Oversize Cotton Dress</a></h3>
                                                <div class="product__items--price">
                                                    <span class="current__price">$128</span>
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
                                    <div class="col mb-30">
                                        <div class="product__items">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="product-details.php">
                                                    <img class="product__items--img product__primary--img" src="assets/img/product/product13.png" alt="product-img">
                                                    <img class="product__items--img product__secondary--img" src="assets/img/product/product14.png" alt="product-img">
                                                </a>
                                                <div class="product__badge">
                                                    <span class="product__badge--items sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="product__items--content">
                                                <span class="product__items--content__subtitle">Jacket, Women</span>
                                                <h4 class="product__items--content__title"><a href="product-details.php">Aware organic cotton</a></h4>
                                                <div class="product__items--price">
                                                    <span class="current__price">$127</span>
                                                    <span class="price__divided"></span>
                                                    <span class="old__price">$85</span>
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
                                    <div class="col mb-30">
                                        <div class="product__items">
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
                                                    <span class="current__price">$115</span>
                                                    <span class="price__divided"></span>
                                                    <span class="old__price">$92</span>
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
                                    <div class="col mb-30">
                                        <div class="product__items">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="product-details.php">
                                                    <img class="product__items--img product__primary--img" src="assets/img/product/product2.png" alt="product-img">
                                                    <img class="product__items--img product__secondary--img" src="assets/img/product/product1.png" alt="product-img">
                                                </a>
                                                <div class="product__badge">
                                                    <span class="product__badge--items sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="product__items--content">
                                                <span class="product__items--content__subtitle">Jacket, Women</span>
                                                <h3 class="product__items--content__title h4"><a href="product-details.php">Boxy Denim Jacket</a></h3>
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
                                    <div class="col mb-30">
                                        <div class="product__items">
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
                                                <h4 class="product__items--content__title"><a href="product-details.php">High Ankle Jeans</a></h4>
                                                <div class="product__items--price">
                                                    <span class="current__price">$135</span>
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
                                    <div class="col mb-30">
                                        <div class="product__items">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="product-details.php">
                                                    <img class="product__items--img product__primary--img" src="assets/img/product/product6.png" alt="product-img">
                                                    <img class="product__items--img product__secondary--img" src="assets/img/product/product5.png" alt="product-img">
                                                </a>
                                                <div class="product__badge">
                                                    <span class="product__badge--items sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="product__items--content">
                                                <span class="product__items--content__subtitle">Jacket, Women</span>
                                                <h4 class="product__items--content__title"><a href="product-details.php">Aware organic cotton</a></h4>
                                                <div class="product__items--price">
                                                    <span class="current__price">$140</span>
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
                                    <div class="col mb-30">
                                        <div class="product__items">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="product-details.php">
                                                    <img class="product__items--img product__primary--img" src="assets/img/product/product8.png" alt="product-img">
                                                    <img class="product__items--img product__secondary--img" src="assets/img/product/product7.png" alt="product-img">
                                                </a>
                                                <div class="product__badge">
                                                    <span class="product__badge--items sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="product__items--content">
                                                <span class="product__items--content__subtitle">Jacket, Women</span>
                                                <h4 class="product__items--content__title"><a href="product-details.php">OSmock Mini Dresss</a></h4>
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
                                    <div class="col mb-30">
                                        <div class="product__items">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="product-details.php">
                                                    <img class="product__items--img product__primary--img" src="assets/img/product/product10.png" alt="product-img">
                                                    <img class="product__items--img product__secondary--img" src="assets/img/product/product11.png" alt="product-img">
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
                                    <div class="col mb-30">
                                        <div class="product__items">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="product-details.php">
                                                    <img class="product__items--img product__primary--img" src="assets/img/product/product15.png" alt="product-img">
                                                    <img class="product__items--img product__secondary--img" src="assets/img/product/product14.png" alt="product-img">
                                                </a>
                                                <div class="product__badge">
                                                    <span class="product__badge--items sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="product__items--content">
                                                <span class="product__items--content__subtitle">Jacket, Women</span>
                                                <h4 class="product__items--content__title"><a href="product-details.php">Aware organic cotton</a></h4>
                                                <div class="product__items--price">
                                                    <span class="current__price">$130</span>
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
                                    <div class="col mb-30">
                                        <div class="product__items">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="product-details.php">
                                                    <img class="product__items--img product__primary--img" src="assets/img/product/product13.png" alt="product-img">
                                                    <img class="product__items--img product__secondary--img" src="assets/img/product/product12.png" alt="product-img">
                                                </a>
                                                <div class="product__badge">
                                                    <span class="product__badge--items sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="product__items--content">
                                                <span class="product__items--content__subtitle">Jacket, Women</span>
                                                <h4 class="product__items--content__title"><a href="product-details.php">Quilted Shoulder Bag</a></h4>
                                                <div class="product__items--price">
                                                    <span class="current__price">$150</span>
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
                                    <div class="col mb-30">
                                        <div class="product__items">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="product-details.php">
                                                    <img class="product__items--img product__primary--img" src="assets/img/product/product11.png" alt="product-img">
                                                    <img class="product__items--img product__secondary--img" src="assets/img/product/product10.png" alt="product-img">
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