@extends('layouts.websiteapp')
@section('content')

 <div id="homepage-kids">
        <div class="container">
            <div class="ps-home-banner">
                <div class="ps-section__left">
                    <ul class="menu--dropdown">
                        <li class="current-menu-item "><a href="#"><i class="icon-fire"></i> Hot Promotions</a>
                        </li>
                        <li class="current-menu-item "><a href="#"><i class="icon-star"></i> Best Seller</a>
                        </li>
                        <li class="current-menu-item "><a href="#"><i class="icon-fire"></i> paper-plane</a>
                        </li>
                        <li class="current-menu-item "><a href="#"><i class="icon-baby-bottle"></i> Eat &amp; Drink for Baby</a>
                        </li>
                        <li class="current-menu-item "><a href="#"><i class="icon-shirt"></i> Appreal for Baby</a>
                        </li>
                        <li class="current-menu-item "><a href="#"><i class="icon-baby3"></i> Baby Hygiene</a>
                        </li>
                        <li class="current-menu-item "><a href="#"><i class="icon-lampshade"></i> Baby Sleeping</a>
                        </li>
                        <li class="current-menu-item "><a href="#"><i class="icon-shield-check"></i> Secures &amp; Health</a>
                        </li>
                        <li class="current-menu-item "><a href="#"><i class="icon-umbrella"></i> Baby Out</a>
                        </li>
                        <li class="current-menu-item "><a href="#"><i class="icon-drawers3"></i> Home Wares</a>
                        </li>
                        <li class="current-menu-item "><a href="#"><i class="icon-puzzle"></i> Toys</a>
                        </li>
                        <li class="current-menu-item "><a href="#"><i class="icon-woman"></i> Pregnancy &amp; Maternity</a>
                        </li>
                        <li class="current-menu-item "><a href="#"><i class="icon-bathtub"></i> Shower For Baby</a>
                        </li>
                        <li class="current-menu-item "><a href="#"><i class="icon-gift"></i> Gifts &amp; Others</a>
                        </li>
                    </ul>
                </div>
                <div class="ps-section__center">
                    <div class="ps-carousel--dots owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on"><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/1.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/2.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/3.jpg" alt=""></a></div><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/promotion-6.jpg" alt=""></a>
                </div>
                <div class="ps-section__right"><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/promotion-1.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/promotion-2.jpg" alt=""></a><a class="wide" href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/promotion-3.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/promotion-4.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/promotion-5.jpg" alt=""></a></div>
            </div>
            <div class="ps-home-collection">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="{{asset('public/frontend')}}/img/promotions/home-kids/1.jpg" alt=""></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="{{asset('public/frontend')}}/img/promotions/home-kids/2.jpg" alt=""></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="{{asset('public/frontend')}}/img/promotions/home-kids/3.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="ps-best-sale-brands ps-section--furniture">
                <div class="ps-section__header">
                    <h3>Best Seller Brands</h3>
                </div>
                <div class="ps-section__content">
                    <ul class="ps-image-list">
                        <li><a href="#"><img src="{{asset('public/frontend')}}/img/brand/2-1.jpg" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend')}}/img/brand/2-2.jpg" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend')}}/img/brand/2-3.jpg" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend')}}/img/brand/2-4.jpg" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend')}}/img/brand/2-5.jpg" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend')}}/img/brand/2-6.jpg" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend')}}/img/brand/2-7.jpg" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend')}}/img/brand/2-8.jpg" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend')}}/img/brand/2-9.jpg" alt=""></a></li>
                        <li><a href="#"><img src="{{asset('public/frontend')}}/img/brand/2-10.jpg" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="ps-search-trending">
                <div class="container">
                    <div class="ps-section__header">
                        <h3>Search Trending<span>Updated at 9:00AM</span></h3>
                    </div>
                    <div class="ps-section__content">
                        <div class="ps-block--categories-tabs ps-tab-root">
                            <div class="ps-block__header">
                                <div class="ps-carousel--nav ps-tab-list owl-slider" data-owl-auto="false" data-owl-speed="1000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="8" data-owl-item-xs="3" data-owl-item-sm="4" data-owl-item-md="6" data-owl-item-lg="6" data-owl-duration="500" data-owl-mousedrag="on"><a class="active" href="#tab-1"><i class="icon-star"></i><span>Hot Trending</span></a><a href="#tab-2"><i class="icon-baby3"></i><span>Baby Hygiene</span></a><a href="#tab-3"><i class="icon-lampshade"></i><span>Baby Sleeping</span></a><a href="#tab-4"><i class="icon-lampshade"></i><span>Baby Out</span></a><a href="#tab-5"><i class="icon-shirt"></i><span>Apparels</span></a><a href="#tab-6"><i class="icon-baby-bottle"></i><span>Eat & Drink</span></a><a href="#tab-7"><i class="icon-baseball"></i><span>Toys</span></a><a href="#tab-8"><i class="icon-book2"></i><span>Home Wares</span></a></div>
                            </div>
                            <div class="ps-tabs">
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-block__item"><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/1.jpg" alt="#bodysuit"><span>#bodysuit</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/2.jpg" alt="#carseat"><span>#carseat</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/3.jpg" alt="#cream"><span>#cream</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/4.jpg" alt="#seat"><span>#seat</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/5.jpg" alt="#bathseat"><span>#bathseat</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/6.jpg" alt="#nipples"><span>#nipples</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/7.jpg" alt="#carriers"><span>#carriers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/8.jpg" alt="#bag"><span>#bag</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/9.jpg" alt="#diapers"><span>#diapers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/10.jpg" alt="#crib"><span>#crib</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/11.jpg" alt="#ointment"><span>#ointment</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/12.jpg" alt="#underwear"><span>#underwear</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/13.jpg" alt="#woolcap"><span>#woolcap</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/14.jpg" alt="#boys"><span>#boys</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/15.jpg" alt="#chair"><span>#chair</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/16.jpg" alt="#pregnancy"><span>#pregnancy</span></a>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-2">
                                        <div class="ps-block__item"><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/3.jpg" alt="#cream"><span>#cream</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/4.jpg" alt="#seat"><span>#seat</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/5.jpg" alt="#bathseat"><span>#bathseat</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/6.jpg" alt="#nipples"><span>#nipples</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/7.jpg" alt="#carriers"><span>#carriers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/8.jpg" alt="#bag"><span>#bag</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/9.jpg" alt="#diapers"><span>#diapers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/10.jpg" alt="#crib"><span>#crib</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/11.jpg" alt="#ointment"><span>#ointment</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/12.jpg" alt="#underwear"><span>#underwear</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/13.jpg" alt="#woolcap"><span>#woolcap</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/14.jpg" alt="#boys"><span>#boys</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/15.jpg" alt="#chair"><span>#chair</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/16.jpg" alt="#pregnancy"><span>#pregnancy</span></a>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-3">
                                        <div class="ps-block__item"><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/4.jpg" al t="#seat"><span>#seat</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/5.jpg" al t="#bathseat"><span>#bathseat</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/6.jpg" al t="#nipples"><span>#nipples</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/7.jpg" al t="#carriers"><span>#carriers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/8.jpg" al t="#bag"><span>#bag</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/9.jpg" al t="#diapers"><span>#diapers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/10.jpg" al t="#crib"><span>#crib</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/11.jpg" al t="#ointment"><span>#ointment</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/12.jpg" al t="#underwear"><span>#underwear</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/13.jpg" al t="#woolcap"><span>#woolcap</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/14.jpg" al t="#boys"><span>#boys</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/15.jpg" al t="#chair"><span>#chair</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/16.jpg" al t="#pregnancy"><span>#pregnancy</span></a>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-4">
                                        <div class="ps-block__item"><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/5.jpg" alt="#bathseat"><span>#bathseat</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/6.jpg" alt="#nipples"><span>#nipples</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/7.jpg" alt="#carriers"><span>#carriers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/8.jpg" alt="#bag"><span>#bag</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/9.jpg" alt="#diapers"><span>#diapers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/10.jpg" alt="#crib"><span>#crib</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/11.jpg" alt="#ointment"><span>#ointment</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/12.jpg" alt="#underwear"><span>#underwear</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/13.jpg" alt="#woolcap"><span>#woolcap</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/14.jpg" alt="#boys"><span>#boys</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/15.jpg" alt="#chair"><span>#chair</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/16.jpg" alt="#pregnancy"><span>#pregnancy</span></a>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-5">
                                        <div class="ps-block__item"><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/6.jpg" alt="#nipples"><span>#nipples</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/7.jpg" alt="#carriers"><span>#carriers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/8.jpg" alt="#bag"><span>#bag</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/9.jpg" alt="#diapers"><span>#diapers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/10.jpg" alt="#crib"><span>#crib</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/11.jpg" alt="#ointment"><span>#ointment</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/12.jpg" alt="#underwear"><span>#underwear</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/13.jpg" alt="#woolcap"><span>#woolcap</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/14.jpg" alt="#boys"><span>#boys</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/15.jpg" alt="#chair"><span>#chair</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/16.jpg" alt="#pregnancy"><span>#pregnancy</span></a>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-6">
                                        <div class="ps-block__item"><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/7.jpg" alt="#carriers"><span>#carriers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/8.jpg" alt="#bag"><span>#bag</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/9.jpg" alt="#diapers"><span>#diapers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/10.jpg" alt="#crib"><span>#crib</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/11.jpg" alt="#ointment"><span>#ointment</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/12.jpg" alt="#underwear"><span>#underwear</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/13.jpg" alt="#woolcap"><span>#woolcap</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/14.jpg" alt="#boys"><span>#boys</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/15.jpg" alt="#chair"><span>#chair</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/16.jpg" alt="#pregnancy"><span>#pregnancy</span></a>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-7">
                                        <div class="ps-block__item"><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/8.jpg" alt="#bag"><span>#bag</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/9.jpg" alt="#diapers"><span>#diapers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/10.jpg" alt="#crib"><span>#crib</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/11.jpg" alt="#ointment"><span>#ointment</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/12.jpg" alt="#underwear"><span>#underwear</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/13.jpg" alt="#woolcap"><span>#woolcap</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/14.jpg" alt="#boys"><span>#boys</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/15.jpg" alt="#chair"><span>#chair</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/16.jpg" alt="#pregnancy"><span>#pregnancy</span></a>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-7">
                                        <div class="ps-block__item"><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/9.jpg" alt="#diapers"><span>#diapers</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/10.jpg" alt="#crib"><span>#crib</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/11.jpg" alt="#ointment"><span>#ointment</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/12.jpg" alt="#underwear"><span>#underwear</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/13.jpg" alt="#woolcap"><span>#woolcap</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/14.jpg" alt="#boys"><span>#boys</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/15.jpg" alt="#chair"><span>#chair</span></a><a href="shop-default.html"><img src="{{asset('public/frontend')}}/img/categories/home-kids/16.jpg" alt="#pregnancy"><span>#pregnancy</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-block--products-of-category">
                <div class="ps-block__categories">
                    <h3>Eat Drink for & <br> Baby</h3>
                    <ul>
                        <li><a href="#">Best Seller</a></li>
                        <li><a href="#">New Arrivals</a></li>
                        <li><a href="#">Milks</a></li>
                        <li><a href="#">Milk Bottles</a></li>
                        <li><a href="#">Weaning Foods</a></li>
                        <li><a href="#">Nipples</a></li>
                        <li><a href="#">Others</a></li>
                        <li><a href="#">Sales & Deals</a></li>
                    </ul><a class="ps-block__more-link" href="#">View All</a>
                </div>
                <div class="ps-block__slider">
                    <div class="ps-carousel--product-box owl-slider" v data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="500" data-owl-mousedrag="off"><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/eat-1.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/eat-2.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/eat-3.jpg" alt=""></a></div>
                </div>
                <div class="ps-block__product-box">
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/eat-drink/1.jpg" alt=""></a>
                            <div class="ps-product__badge">-16%</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Gerber Lil Crunchies, Ounce Canister</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price sale">$567.99 <del>$670.00 </del></p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/eat-drink/2.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Unero Military Classical Backpack</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$101.99</p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/eat-drink/3.jpg" alt=""></a>
                            <div class="ps-product__badge">-25%</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Rayban Rounded Sunglass Brown Color</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>02</span>
                                </div>
                                <p class="ps-product__price sale">$42.00 <del>$60.00 </del></p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/eat-drink/4.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$320.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/eat-drink/5.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Men’s Sports Runnning Swim Board Shorts</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$85.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/eat-drink/6.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Paul’s Smith Sneaker InWhite Color</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$92.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-block--products-of-category">
                <div class="ps-block__categories">
                    <h3>Apparels <br/> for Baby</h3>
                    <ul>
                        <li><a href="#">Best Seller</a></li>
                        <li><a href="#">New Arrivals</a></li>
                        <li><a href="#">For Newborns</a></li>
                        <li><a href="#">Boy Fashion</a></li>
                        <li><a href="#">Girl Fashion</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Sales & Deals</a></li>
                    </ul><a class="ps-block__more-link" href="#">View All</a>
                </div>
                <div class="ps-block__slider">
                    <div class="ps-carousel--product-box owl-slider" v data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="500" data-owl-mousedrag="off"><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/apparel-1.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/apparel-2.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/apparel-3.jpg" alt=""></a></div>
                </div>
                <div class="ps-block__product-box">
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/apparels/1.jpg" alt=""></a>
                            <div class="ps-product__badge">-16%</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Pampers Swaddlers Disposable Baby Diapers</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price sale">$567.99 <del>$670.00 </del></p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/apparels/2.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Huggies Nourish &amp; Care for Baby Wipes (4in1)</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$101.99</p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/apparels/3.jpg" alt=""></a>
                            <div class="ps-product__badge">-25%</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Pampers Baby-dry, 1 month supply</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>02</span>
                                </div>
                                <p class="ps-product__price sale">$42.00 <del>$60.00 </del></p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/apparels/4.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Harry Potter Baby Boys' Layette Clothing Set</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$320.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/apparels/5.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">L'ovedbaby Unisex Baby Organic Kimono Bodysuit</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$85.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/apparels/6.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Hat Baby Boys Girls Infant Newborn</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$92.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-block--products-of-category">
                <div class="ps-block__categories">
                    <h3>Baby Out</h3>
                    <ul>
                        <li><a href="#">Best Seller</a></li>
                        <li><a href="#">New Arrivals</a></li>
                        <li><a href="#">Strollers</a></li>
                        <li><a href="#">Kids Scooters</a></li>
                        <li><a href="#">Travel Gears</a></li>
                        <li><a href="#">Car Seat</a></li>
                        <li><a href="#">Hipseat Carrier</a></li>
                        <li><a href="#">Car Electronic</a></li>
                        <li><a href="#">Sales & Deals</a></li>
                    </ul><a class="ps-block__more-link" href="#">View All</a>
                </div>
                <div class="ps-block__slider">
                    <div class="ps-carousel--product-box owl-slider" v data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="500" data-owl-mousedrag="off"><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/baby-out-1.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/baby-out-2.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/baby-out-3.jpg" alt=""></a></div>
                </div>
                <div class="ps-block__product-box">
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/baby-out/1.jpg" alt=""></a>
                            <div class="ps-product__badge">-16%</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Micro Scooter for Kids</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price sale">$567.99 <del>$670.00 </del></p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/baby-out/2.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Lightweight Stroller</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$101.99</p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/baby-out/3.jpg" alt=""></a>
                            <div class="ps-product__badge">-25%</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Multifunction Baby Stroller/Cradle/Carrycot/Car seat</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>02</span>
                                </div>
                                <p class="ps-product__price sale">$42.00 <del>$60.00 </del></p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/baby-out/4.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">RSLG Universal Baby Pram Umbrella</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$320.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/baby-out/5.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Flip 4in1 Convertible Carrier</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$85.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/baby-out/6.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Hands-Free Babywearing Wraps Made</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$92.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-block--products-of-category">
                <div class="ps-block__categories">
                    <h3>Pregnancy & <br/> Maternity</h3>
                    <ul>
                        <li><a href="#">Best Seller</a></li>
                        <li><a href="#">New Arrivals</a></li>
                        <li><a href="#">For Newborns</a></li>
                        <li><a href="#">Boy Fashion</a></li>
                        <li><a href="#">Girl Fashion</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Sales & Deals</a></li>
                    </ul><a class="ps-block__more-link" href="#">View All</a>
                </div>
                <div class="ps-block__slider">
                    <div class="ps-carousel--product-box owl-slider" v data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="500" data-owl-mousedrag="off"><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/pregnancy-1.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/pregnancy-2.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/slider/home-kids/pregnancy-3.jpg" alt=""></a></div>
                </div>
                <div class="ps-block__product-box">
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/pregnancy/1.jpg" alt=""></a>
                            <div class="ps-product__badge">-16%</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">U-Shaped Maternity Pillow</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price sale">$567.99 <del>$670.00 </del></p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/pregnancy/2.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Maternity Support Belt</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$101.99</p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/pregnancy/3.jpg" alt=""></a>
                            <div class="ps-product__badge">-25%</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Multi-Functional Mommy Backpack Waterproof</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>02</span>
                                </div>
                                <p class="ps-product__price sale">$42.00 <del>$60.00 </del></p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/pregnancy/4.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">SneakPeek Early Gender Prediction DNA Test</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$320.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/pregnancy/5.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Boobie Bar - Oatmeal Chocolate Chip</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$85.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--simple">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('public/frontend')}}/img/products/home-kids/pregnancy/6.jpg" alt=""></a>
                            <div class="ps-product__badge out-stock">Out Of Stock</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content" data-mh="clothing"><a class="ps-product__title" href="product-default.html">Comfy Pregnant Nursing Tops Long Sleeve Shirt </a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$92.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-block--recent-viewed">
                <div class="ps-block__header">
                    <h3>Recently Viewed Products</h3><a href="shop-default.html">View All</a>
                </div>
                <div class="ps-block__content"><a href="#"><img src="{{asset('public/frontend')}}/img/products/home-kids/recent-view/1.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/products/home-kids/recent-view/2.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/products/home-kids/recent-view/3.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/products/home-kids/recent-view/4.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/products/home-kids/recent-view/5.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/products/home-kids/recent-view/6.jpg" alt=""></a><a href="#"><img src="{{asset('public/frontend')}}/img/products/home-kids/recent-view/7.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
@endsection