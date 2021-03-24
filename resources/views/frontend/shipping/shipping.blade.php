@extends('layouts.websiteapp')
@section('title', 'Shipping | '.$seo->meta_title)
@section('content')
<main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="">Home</a></li>
                    <li><a href="user-information.html">Account</a></li>
                    <li><a href="checkout-2.html">Account</a></li>
                    <li>Shipping</li>
                </ul>
            </div>
        </div>
        <section class="ps-section--account ps-checkout">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Shipping Information</h3>
                </div>
                <div class="ps-section__content">
                    <form class="ps-form--checkout" action="index.html" method="get">
                        <div class="ps-form__content">
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-block--shipping">
                                        <div class="ps-block__panel">
                                            <figure><small>Contact</small>
                                                <p><a href="#">user@gmail.com</a></p><a href="#">Change</a>
                                            </figure>
                                            <figure><small>Ship to</small>
                                                <p>2015 South Street, Midland, Texas</p><a href="#">Change</a>
                                            </figure>
                                        </div>
                                        <h4>Shipping method</h4>
                                        <div class="ps-block__panel">
                                            <figure><small>International Shipping</small><strong> $20.00</strong></figure>
                                        </div>
                                        <div class="ps-block__footer"><a href="checkout-2.htl"><i class="icon-arrow-left mr-2"></i> Return ton information</a><a class="ps-btn" href="payment">Continue to payment</a></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-block--checkout-order">
                                        <div class="ps-block__content">
                                            <figure>
                                                <figcaption><strong>Product</strong><strong>Total</strong></figcaption>
                                            </figure>
                                            <figure class="ps-block__items"><a href="#"><strong>Marshall Kilburn Portable Wireless Speaker</strong><span>x1<small>$ 42.99</small></span></a><a href="#"><strong>Herschel Leather Duffle Bag In Brown Color</strong><span>x1<small>$ 125.30</small></span></a>
                                            </figure>
                                            <figure>
                                                <figcaption><strong>Subtotal</strong><strong>$1259.99</strong></figcaption>
                                            </figure>
                                            <figure>
                                                <figcaption><strong>Shipping</strong><strong>$20.00</strong></figcaption>
                                            </figure>
                                            <figure class="ps-block__total">
                                                <h3>Total<strong>$1279.99</strong></h3>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <div class="ps-newsletter">
            <div class="ps-container">
                <form class="ps-form--newsletter" action="do_action" method="post">
                    <div class="row">
                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__left">
                                <h3>Newsletter</h3>
                                <p>Subcribe to get information about products and coupons</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__right">
                                <div class="form-group--nest">
                                    <input class="form-control" type="email" placeholder="Email address">
                                    <button class="ps-btn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @endsection
