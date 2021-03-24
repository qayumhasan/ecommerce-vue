@extends('layouts.websiteapp')
@section('content')
 <div id="homepage-10">
        <div class="ps-home-banner">
            <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
                <div class="ps-banner--technology" data-background="{{asset('public/frontend')}}/img/slider/home-10/1.jpg"><img src="{{asset('public/frontend')}}/img/slider/home-10/1.jpg" alt="">
                    <div class="ps-banner__content">
                        <h4>Weekend Promotions</h4>
                        <h3>Mini Helicopter <br /> Mini Helicopter <br /> sale<strong> 40% Off</strong></h3><a class="ps-btn" href="#">Shop Now</a>
                    </div>
                </div>
                <div class="ps-banner--technology" data-background="{{asset('public/frontend')}}/img/slider/home-10/2.jpg"><img src="{{asset('public/frontend')}}/img/slider/home-10/2.jpg" alt="">
                    <div class="ps-banner__content">
                        <h4>Weekend Promotions</h4>
                        <h3>iLuv Aud Mini & <br /> Ultra Slim Pocket-Sized <br /> speaker just<strong> 40% Off</strong></h3><a class="ps-btn" href="#">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-site-features">
            <div class="container">
                <div class="ps-block--site-features ps-block--site-features-2">
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-rocket"></i></div>
                        <div class="ps-block__right">
                            <h4>Free Delivery</h4>
                            <p>For all oders over $99</p>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-sync"></i></div>
                        <div class="ps-block__right">
                            <h4>90 Days Return</h4>
                            <p>If goods have problems</p>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-credit-card"></i></div>
                        <div class="ps-block__right">
                            <h4>Secure Payment</h4>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-bubbles"></i></div>
                        <div class="ps-block__right">
                            <h4>24/7 Support</h4>
                            <p>Dedicated support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-deal-of-day">
            <div class="container">
                <div class="ps-section__header">
                    <div class="ps-block--countdown-deal">
                        <div class="ps-block__left">
                            <h3>Deal of the day</h3>
                        </div>
                        <div class="ps-block__right">
                            <figure>
                                <figcaption>End in:</figcaption>
                                <ul class="ps-countdown" data-time="July 21, 2020 15:37:25">
                                    <li><span class="days"></span></li>
                                    <li><span class="hours"></span></li>
                                    <li><span class="minutes"></span></li>
                                    <li><span class="seconds"></span></li>
                                </ul>
                            </figure>
                        </div>
                    </div><a href="shop-default.html">View all</a>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        <div class="ps-product ps-product--inner">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/1.jpg" alt=""></a>
                                <div class="ps-product__badge">11%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <p class="ps-product__price sale">$1389.99 <del>$1893.00</del><small>18% off</small></p>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone X 256GB T-Mobile – Black</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <div class="ps-product__progress-bar ps-progress" data-value="92">
                                        <div class="ps-progress__value"><span></span></div>
                                        <p>Sold:15</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--inner">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/2.jpg" alt=""></a>
                                <div class="ps-product__badge">11%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <p class="ps-product__price sale">$820.99 <del>$893.00</del><small>18% off</small></p>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone 7 Plus 128 GB – Red Color</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <div class="ps-product__progress-bar ps-progress" data-value="94">
                                        <div class="ps-progress__value"><span></span></div>
                                        <p>Sold:95</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--inner">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/3.jpg" alt=""></a>
                                <div class="ps-product__badge">21%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <p class="ps-product__price sale">$1020.99 <del>$1120.00</del><small>18% off</small></p>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple MacBook Air Retina 13.3-Inch Laptop</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <div class="ps-product__progress-bar ps-progress" data-value="83">
                                        <div class="ps-progress__value"><span></span></div>
                                        <p>Sold:27</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--inner">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/4.jpg" alt=""></a>
                                <div class="ps-product__badge">18%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <p class="ps-product__price sale">$64.99 <del>$80.00</del><small>18% off</small></p>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Samsung Gear VR Virtual Reality Headset</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <div class="ps-product__progress-bar ps-progress" data-value="80">
                                        <div class="ps-progress__value"><span></span></div>
                                        <p>Sold:67</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--inner">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/5.jpg" alt=""></a>
                                <div class="ps-product__badge">18%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <p class="ps-product__price sale">$42.99 <del>$52.00</del><small>18% off</small></p>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Bose Bluetooth &amp; Wireless Speaker 2.0 – Blue</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <div class="ps-product__progress-bar ps-progress" data-value="3">
                                        <div class="ps-progress__value"><span></span></div>
                                        <p>Sold:35</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--inner">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/6.jpg" alt=""></a>
                                <div class="ps-product__badge">17%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <p class="ps-product__price sale">$542.99 <del>$592.00</del><small>18% off</small></p>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Samsung Gallaxy A8 8GB Ram – Sliver Version</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <div class="ps-product__progress-bar ps-progress" data-value="9">
                                        <div class="ps-progress__value"><span></span></div>
                                        <p>Sold:9</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--inner">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/7.jpg" alt=""></a>
                                <div class="ps-product__badge">17%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <p class="ps-product__price sale">$542.99 <del>$592.00</del><small>18% off</small></p>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Samsung Gallaxy A8 8GB Ram – Sliver Version</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <div class="ps-product__progress-bar ps-progress" data-value="56">
                                        <div class="ps-progress__value"><span></span></div>
                                        <p>Sold:5</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-home-promotions">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="{{asset('public/frontend')}}/img/promotions/home-10/1.jpg" alt=""></a>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="{{asset('public/frontend')}}/img/promotions/home-10/2.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-top-categories">
            <div class="container">
                <h3>Top categories of the month</h3>
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <div class="ps-block--category" data-mh="categories">
                            <div class="ps-block__thumbnail"><img src="{{asset('public/frontend')}}/img/categories/technology/1.jpg" alt=""></div>
                            <div class="ps-block__content">
                                <p>Smartphone</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <div class="ps-block--category" data-mh="categories">
                            <div class="ps-block__thumbnail"><img src="{{asset('public/frontend')}}/img/categories/technology/2.jpg" alt=""></div>
                            <div class="ps-block__content">
                                <p>Tables</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <div class="ps-block--category" data-mh="categories">
                            <div class="ps-block__thumbnail"><img src="{{asset('public/frontend')}}/img/categories/technology/3.jpg" alt=""></div>
                            <div class="ps-block__content">
                                <p>Laptops</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <div class="ps-block--category" data-mh="categories">
                            <div class="ps-block__thumbnail"><img src="{{asset('public/frontend')}}/img/categories/technology/4.jpg" alt=""></div>
                            <div class="ps-block__content">
                                <p>Sounds</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <div class="ps-block--category" data-mh="categories">
                            <div class="ps-block__thumbnail"><img src="{{asset('public/frontend')}}/img/categories/technology/5.jpg" alt=""></div>
                            <div class="ps-block__content">
                                <p>Technology Toys</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <div class="ps-block--category" data-mh="categories">
                            <div class="ps-block__thumbnail"><img src="{{asset('public/frontend')}}/img/categories/technology/6.jpg" alt=""></div>
                            <div class="ps-block__content">
                                <p>Accessories</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-product-list">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Popular Smartphones & Tablets</h3>
                    <ul class="ps-section__links">
                        <li><a href="shop-grid.html">Iphone</a></li>
                        <li><a href="shop-grid.html">IPad</a></li>
                        <li><a href="shop-grid.html">Samsung</a></li>
                        <li><a href="shop-grid.html">View All</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/2.jpg" alt="" /></a>
                                <div class="ps-product__badge">11%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone 7 Plus 128 GB – Red Color</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$820.99 <del>$893.00</del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Apple iPhone 7 Plus 128 GB – Red Color</a>
                                    <p class="ps-product__price sale">$820.99 <del>$893.00</del></p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/6.jpg" alt="" /></a>
                                <div class="ps-product__badge">17%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Samsung Gallaxy A8 8GB Ram – Sliver Version</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$542.99 <del>$592.00</del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Samsung Gallaxy A8 8GB Ram – Sliver Version</a>
                                    <p class="ps-product__price sale">$542.99 <del>$592.00</del></p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/7.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Yuntab K107 10.1 Inch Quad Core CPU MT6580</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$99.99</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Yuntab K107 10.1 Inch Quad Core CPU MT6580</a>
                                    <p class="ps-product__price">$99.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/7.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB – Gold</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$899.99 </p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB – Gold</a>
                                    <p class="ps-product__price">$899.99 </p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/8.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Android Tablet 10” 16GB Marshmallow</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$95.99</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Android Tablet 10” 16GB Marshmallow</a>
                                    <p class="ps-product__price">$95.99</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-product-list">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Best Seller Laptops & Sounds</h3>
                    <ul class="ps-section__links">
                        <li><a href="shop-grid.html">Iphone</a></li>
                        <li><a href="shop-grid.html">Apple</a></li>
                        <li><a href="shop-grid.html">Laptop</a></li>
                        <li><a href="shop-grid.html">Asus</a></li>
                        <li><a href="shop-grid.html">Marshall</a></li>
                        <li><a href="shop-grid.html">Speaker</a></li>
                        <li><a href="shop-grid.html">JBL</a></li>
                        <li><a href="shop-grid.html">Speaker</a></li>
                        <li><a href="shop-grid.html">View All</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/3.jpg" alt="" /></a>
                                <div class="ps-product__badge">11%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple MacBook Air Retina 13.3-Inch Laptop</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$820.99 <del>$893.00</del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Apple MacBook Air Retina 13.3-Inch Laptop</a>
                                    <p class="ps-product__price sale">$820.99 <del>$893.00</del></p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/9.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple MacBook Air Retina 13.3-Inch Laptop</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$42.99</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Apple MacBook Air Retina 13.3-Inch Laptop</a>
                                    <p class="ps-product__price">$42.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/12.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple MacBook Air Retina 12-Inch Laptop</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$942.99</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Apple MacBook Air Retina 12-Inch Laptop</a>
                                    <p class="ps-product__price">$942.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/5.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Bose Bluetooth &amp; Wireless Speaker 2.0 – Blue</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$92.99</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Bose Bluetooth &amp; Wireless Speaker 2.0 – Blue</a>
                                    <p class="ps-product__price">$92.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/6.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Bose Ear-Phone Bluetooth &amp; Wireless</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$392.99</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Bose Ear-Phone Bluetooth &amp; Wireless</a>
                                    <p class="ps-product__price">$392.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/11.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Bose Ear-Phone Bluetooth &amp; Wireless</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$102.99</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Bose Ear-Phone Bluetooth &amp; Wireless</a>
                                    <p class="ps-product__price">$102.99</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-product-list">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Technology Toys Recommended For You</h3>
                    <ul class="ps-section__links">
                        <li><a href="shop-grid.html">Micro</a></li>
                        <li><a href="shop-grid.html">Drone/Flycam</a></li>
                        <li><a href="shop-grid.html">Microphone</a></li>
                        <li><a href="shop-grid.html">iQOS</a></li>
                        <li><a href="shop-grid.html">View All</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/4.jpg" alt="" /></a>
                                <div class="ps-product__badge">11%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Samsung Gear VR Virtual Reality Headset</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$820.99 <del>$893.00</del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Samsung Gear VR Virtual Reality Headset</a>
                                    <p class="ps-product__price sale">$820.99 <del>$893.00</del></p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/13.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">iQOS 2.4 Plus Kit, Holder &amp; Chargers – White</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$42.99</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">iQOS 2.4 Plus Kit, Holder &amp; Chargers – White</a>
                                    <p class="ps-product__price">$42.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/14.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">DJI Phantom 4 Quadcopter Drone</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$942.99</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">DJI Phantom 4 Quadcopter Drone</a>
                                    <p class="ps-product__price">$942.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/15.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple TV 4k – 32 GB (4th Generation)</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$92.99</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Apple TV 4k – 32 GB (4th Generation)</a>
                                    <p class="ps-product__price">$92.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/16.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">GoPro Karman 4 Channels Quadcopter Drone</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$392.99</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">GoPro Karman 4 Channels Quadcopter Drone</a>
                                    <p class="ps-product__price">$392.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/17.jpg" alt="" /></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Samsung Gear VR Virtual Reality Headset</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$102.99</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Samsung Gear VR Virtual Reality Headset</a>
                                    <p class="ps-product__price">$102.99</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-product-list">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Good Price Accessories</h3>
                    <ul class="ps-section__links">
                        <li><a href="shop-grid.html">HeadPhone</a></li>
                        <li><a href="shop-grid.html">Charge</a></li>
                        <li><a href="shop-grid.html">Case USB</a></li>
                        <li><a href="shop-grid.html">Hard Drive</a></li>
                        <li><a href="shop-grid.html">TV Box</a></li>
                        <li><a href="shop-grid.html">View All</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 ">
                            <div class="ps-product--horizontal">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/18.jpg" alt="" /></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">HP Chromebook CB 10014 Desktop</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$820.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 ">
                            <div class="ps-product--horizontal">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/19.jpg" alt="" /></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Acrylic Cover Case for iPhone X- (Clear)</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$49.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 ">
                            <div class="ps-product--horizontal">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/20.jpg" alt="" /></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">B&amp;O Play Mini Bluetooth Speaker</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$49.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 ">
                            <div class="ps-product--horizontal">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/21.jpg" alt="" /></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Beats Mini On Ear Bluetooth, Wireless Headphone</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$64.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 ">
                            <div class="ps-product--horizontal">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/22.jpg" alt="" /></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Package 2 iClever Bootscube Mini Chargers</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$12.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 ">
                            <div class="ps-product--horizontal">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/technology/17.jpg" alt="" /></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Samsung Gear VR Virtual Reality Headset</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$12.99</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
@endsection