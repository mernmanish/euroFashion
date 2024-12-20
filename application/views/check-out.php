<?php include('inc-file/head.php'); ?>
<?php include('inc-file/header.php'); ?>
<?php 
 $variation = $this->db->select('*')->from('product_variation')->where('pro_id',$product['id'])->get()->result_array();
?>
<div class="checkout__page--area">
    <div class="container">
        <div class="checkout__page--inner d-flex">
            <div class="main checkout__mian">
                <main class="main__content_wrapper">
                    <form action="<?php echo base_url(); ?>Home/createOrder" method="post">
                        <div class="checkout__content--step section__shipping--address">
                            <div class="section__header mb-25">
                                <h3 class="section__header--title">Shipping address</h3>
                            </div>
                            <?php echo $this->session->flashdata('success') ?>
                            <div class="section__shipping--address__content">
                                <div class="row">
                                    <input type="hidden" name="pro_id" value="<?php echo $product['id']; ?>">
                                    <div class="col-lg-6 mb-12">
                                        <div class="checkout__input--list ">
                                            <label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Full Name"  type="text" name="name" required="">
                                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-12">
                                        <div class="checkout__input--list">
                                            <label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Email Address"  type="text" name="email" required="">
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-12">
                                        <div class="checkout__input--list">
                                            <label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Phone No"  type="text" name="phone" required="">
                                                <span class="text-danger"><?php echo form_error('phone'); ?></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-12">
                                        <div class="checkout__input--list">
                                            <label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Postal code"  type="text" name="postal_code" required="">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-12">
                                        <div class="checkout__input--list">
                                            <label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Address1"  type="text" name="address">
                                            </label>
                                        </div>
                                    </div>
                                   
                                    
                                    
                                </div>
                               
                            </div>
                        </div>
                        <div class="checkout__content--step__footer d-flex align-items-center">
                            <button type="submit" class="continue__shipping--btn primary__btn border-radius-5">Confirm Order</button>
                            <a class="previous__link--content" href="<?php echo base_url(); ?>Home">Continue Shoping</a>
                        </div>
                    </form>
                </main>
                <footer class="main__footer checkout__footer">
                   
                </footer>
            </div>
            <aside class="checkout__sidebar sidebar">
                <div class="cart__table checkout__product--table">
                    <table class="cart__table--inner">
                        <tbody class="cart__table--body">
                            <tr class="cart__table--body__items">
                                <td class="cart__table--body__list">
                                    <div class="product__image two  d-flex align-items-center">
                                        <div class="product__thumbnail border-radius-5">
                                            <a href="<?php echo base_url(); ?>product-details.php"><img class="border-radius-5" src="<?php echo base_url(); ?><?php echo $product['image']; ?>" alt="cart-product" style="height: 75px;"></a>
                                        </div>
                                        <div class="product__description">
                                            <h3 class="product__description--name h4"><a href="<?php echo base_url(); ?>product/product-details/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></h3>
                                            
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__table--body__list">
                                    <span class="cart__price">$<?php echo $variation[0]['sale_price']; ?></span>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table> 
                </div>
              
                <div class="checkout__total">
                    <table class="checkout__total--table">
                        <tbody class="checkout__total--body">
                            <tr class="checkout__total--items">
                                <td class="checkout__total--title text-left">Subtotal </td>
                                <td class="checkout__total--amount text-right">$<?php echo $variation[0]['sale_price']; ?></td>
                            </tr>
                            <tr class="checkout__total--items">
                                <td class="checkout__total--title text-left">Shipping</td>
                                <td class="checkout__total--calculated__text text-right">Calculated at next step</td>
                            </tr>
                        </tbody>
                        <tfoot class="checkout__total--footer">
                            <tr class="checkout__total--footer__items">
                                <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                <td class="checkout__total--footer__amount checkout__total--footer__list text-right">$<?php echo $variation[0]['sale_price']; ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </aside>
        </div>
    </div>
</div>

<?php include('inc-file/footer.php'); ?>
<?php if($this->session->flashdata('success')){ ?>
        <script>
            swal({
                title: "Success !",
                text: "<?php echo $this->session->flashdata('success') ?>",
                icon: "success",
                button: "OK",
                timer: 3000
           });
        </script>
    <?php } ?>

    <?php if($this->session->flashdata('error')){ ?>
        <script>
            swal({
                title: "Oops!",
                text: "<?php echo $this->session->flashdata('error') ?>",
                icon: "warning",
                button: "OK",
            });
            // Swal.fire({
            //     title: "Oops!",
            //     text: "<?php echo $this->session->flashdata('error') ?>",
            //     icon: "warning",
            //     button: "OK",
            // });
        </script>
    <?php } ?>