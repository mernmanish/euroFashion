<?php include('inc-file/head.php'); ?>
<?php include('inc-file/header.php'); ?>
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row row-cols-1">
            <div class="col">
                <div class="breadcrumb__content text-center">
                    <h1 class="breadcrumb__content--title text-white mb-25">Registration</h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb__content--menu__items"><span class="text-white">Registration</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="login__section section--padding">
    <div class="container">
        <form action="#">
            <div class="login__section--inner">
                <div class="row">
	                 <div class="col-md-6 offset-md-3">
	                        <div class="account__login register">
	                            <div class="account__login--header mb-25">
	                                <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
	                                <p class="account__login--header__desc">Register here if you are a new customer</p>
	                            </div>
	                            <div class="account__login--inner">
	                                <input class="account__login--input" placeholder="Username" type="text">
	                                <input class="account__login--input" placeholder="Email Addres" type="text">
	                                <input class="account__login--input" placeholder="Password" type="password">
	                                <input class="account__login--input" placeholder="Confirm Password" type="password">
	                                <button class="account__login--btn primary__btn mb-10" type="submit">Submit & Register</button>
	                                <div class="account__login--remember position__relative">
	                                    <input class="checkout__checkbox--input" id="check2" type="checkbox">
	                                    <span class="checkout__checkbox--checkmark"></span>
	                                    <label class="checkout__checkbox--label login__remember--label" for="check2">
	                                        I have read and agree to the terms & conditions</label>
	                                </div>
	                            </div>
	                        </div>
	                 </div>
                </div>
            </div>
        </form>
    </div>     
</div>
<?php include('inc-file/footer.php'); ?>