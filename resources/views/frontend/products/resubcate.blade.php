@extends('layouts.websiteapp')
@section('title', $resubcate->resubcate_name. "Re-sub-category |".$seo->meta_title)
@section('content')
<div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>{{$resubcate->resubcate_name}}</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--shop">
        <div class="ps-container">
            <div class="ps-shop-banner">
                <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                <!--     <a href="#"><img src="{{asset('/public/frontend')}}/img/slider/shop-default/1.jpg" alt=""></a><a href="#"><img src="{{asset('/public/frontend')}}/img/slider/shop-default/2.jpg" alt=""></a> -->
                </div>
            </div>
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="ps-list--categories">

                            @foreach($allcategory as $cate)
                            @php

                                $check = App\SubCategory::where('cate_id',$cate->id)->first();
                            @endphp
                                @if($check)
                                <li class="current-menu-item menu-item-has-children"><a href="{{url('product/page/'.$cate->cate_slug)}}">{{$cate->cate_name}}</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                    <ul class="sub-menu">
                                        @php
                                            $allsub=App\SubCategory::where('cate_id',$cate->id)->where('is_deleted',0)->where('subcate_status',1)->get();
                                        @endphp
                                        @foreach($allsub as $sub)
                                           @php
                                                $resubcatecheck =App\ReSubCategory::where('is_deleted',0)->where('subcate_id',$sub->id)->first();
                                           @endphp
                                           @if($resubcatecheck)
                                            <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">{{$sub->subcate_name}}</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                                <ul class="sub-menu">
                                                    @php
                                                        $resub=App\ReSubCategory::where('is_deleted',0)->where('subcate_id',$sub->id)->get();
                                                    @endphp
                                                    @foreach($resub as $resubnew)
                                                    <li class="current-menu-item "><a href="{{url('resubacetegory/'.$cate->cate_slug.'/'.$sub-> subcate_slug.'/'.$resubnew->resubcate_slug)}}">{{$resubnew->resubcate_name}}</a>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </li>
                                            @else

                                            <li class="current-menu-item "><a href="">{{$sub->subcate_name}}</a>
                                            @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @else
                                <li class="current-menu-item "><a href="{{url('product/page/'.$cate->cate_slug)}}">{{$cate->cate_name}}</a>
                                </li>
                                @endif
                            @endforeach

                        </ul>
                    </aside>
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">BY BRANDS</h4>
                        <form class="ps-form--widget-search" action="do_action" method="get">
                           <!--  <input class="form-control" type="text" placeholder="">
                            <button><i class="icon-magnifier"></i></button> -->
                        </form>
                        <figure class="ps-custom-scrollbar" data-height="250">
                            @foreach($allbrand as $key => $brand)
                                @php
                                    $bproduct=App\Product::where('resubcate_id',$resubcate->id)->where('is_deleted',0)->where('brand',$brand->id)->count();
                                @endphp
                              @php
                                    $bproductlol=App\Product::where('resubcate_id',$resubcate->id)->where('brand',$brand->id)->first();
                                @endphp
                                
                                @if($bproductlol)
                            <div class="ps-checkbox">
                                <input class="common_selector form-control brand" type="checkbox" id="{{++$key}}"  value="{{$brand->id}}">
                                <label for="{{$key}}">{{$brand->brand_name}} ({{ $bproduct}})</label>
                            </div>
                            @endif
                            @endforeach

                        </figure>
                        <figure>
                            <h4 class="widget-title">By Price</h4>

                            <div id="nonlinear" onclick="get_filter_range_value()"></div>
                            <input type="hidden" name="minval" class="minval" value="" id="hidden_minimum_price" >
                            <input type="hidden" name="maxval" class="minval" value="" id="hidden_maximum_price"><br>
                            <p class="ps-slider__meta">Price:<span class="ps-slider__value">৳<span class="ps-slider__min"></span></span>-<span class="ps-slider__value">৳<span class="ps-slider__max"></span></span></p>
                        </figure>
                      <!--
                        <figure>
                            <h4 class="widget-title">By Color</h4>
                            <div class="ps-checkbox ps-checkbox--color color-1 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-1" name="size">
                                <label for="color-1"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-2 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-2" name="size">
                                <label for="color-2"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-3 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-3" name="size">
                                <label for="color-3"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-4 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-4" name="size">
                                <label for="color-4"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-5 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-5" name="size">
                                <label for="color-5"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-6 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-6" name="size">
                                <label for="color-6"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-7 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-7" name="size">
                                <label for="color-7"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-8 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-8" name="size">
                                <label for="color-8"></label>
                            </div>
                        </figure>
                        <figure class="sizes">
                            <h4 class="widget-title">BY SIZE</h4><a href="#">L</a><a href="#">M</a><a href="#">S</a><a href="#">XL</a>
                        </figure> -->
                    </aside>
                </div>
                <div class="ps-layout__right">
                    <div class="ps-block--shop-features">
                        <div class="ps-block__header">
                            <h3>Best Sale Items</h3>
                            <div class="ps-block__navigation"><a class="ps-carousel__prev" href="#recommended1"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="#recommended1"><i class="icon-chevron-right"></i></a></div>
                        </div>
                        <div class="ps-block__content">
                            <div class="owl-slider" id="recommended1" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                @foreach($productbestsell as $product)
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}">
                                        <img data-src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" src="{{asset('public/frontend/lazy_loader/home-product-banner.gif')}}" class="lazy" alt=""></a>
                                        <ul class="ps-product__actions">
                                           <li><a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>

                                                    <li>
                                                         @if($product->product_type==1)
                                                    <a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}" data-toggle="tooltip" data-placement="top" data-placement="top" title="Quick View"><i class="icon-eye"></i></a>
                                                    @else
                                                    <a class="quickview" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview" data-id="{{$product->id}}"><i class="icon-eye"></i></a>
                                                    @endif
                                                    </li>

                                                    <li>
                                                        @if(Auth::guard('web')->check())
                                                        <a class="mywishlist" data-id="{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a>
                                                        @else
                                                         <a href="{{url('customar/login')}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a>
                                                        @endif
                                                    </li>

                                                    <li><a class="compare" data-id="{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="#"></a>
                                        <div class="ps-product__content"><a class="ps-product__title" href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}">{{Str::limit($product->product_name,23)}}</a>
                                            <div class="ps-product__rating">
                                              @php
                                                        $rcount=App\ProductReview::where('product_id',$product->id)->count();
                                                        @endphp
                                                        @if($rcount)
                                                            @if($rcount)
                                                            @php
                                                             $sumofreview=App\ProductReview::where('product_id',$product->id)->sum('review');
                                                             $rating=$sumofreview/$rcount;
                                                            @endphp
                                                             @if($rating == 1)
                                                            <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="2">3</option>
                                                                <option value="2">4</option>
                                                                <option value="2">5</option>
                                                            </select>
                                                            @elseif($rating < 2)
                                                                 <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="2">3</option>
                                                                <option value="2">4</option>
                                                                <option value="2">5</option>
                                                            </select>
                                                            @elseif($rating < 3)
                                                                 <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="2">3</option>
                                                                <option value="2">4</option>
                                                                <option value="2">5</option>
                                                            </select>

                                                            @elseif($rating < 4)
                                                                 <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="2">4</option>
                                                                <option value="2">5</option>
                                                            </select>

                                                            @elseif($rating < 5)
                                                                 <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="1">4</option>
                                                                <option value="2">5</option>
                                                            </select>

                                                            @elseif($rating == 5)
                                                                 <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="2">3</option>
                                                                <option value="2">4</option>
                                                                <option value="2">5</option>
                                                            </select>

                                                            @elseif($rating == 0)
                                                              <select class="ps-rating" data-read-only="true">
                                                                  <option value="0">1</option>
                                                                  <option value="2">2</option>
                                                                  <option value="2">3</option>
                                                                  <option value="2">4</option>
                                                                  <option value="2">5</option>
                                                              </select>
                                                              @endif
                                                            @endif
                                                        @endif
                                            </div>
                                            <p class="ps-product__price">{{$product->product_price}}</p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}">{{Str::limit($product->product_name,23)}}</a>
                                            <p class="ps-product__price">{{$product->product_price}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                   <!--  <div class="ps-block--shop-features">
                        <div class="ps-block__header">
                            <h3>Recommended Items</h3>
                            <div class="ps-block__navigation"><a class="ps-carousel__prev" href="#recommended"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="#recommended"><i class="icon-chevron-right"></i></a></div>
                        </div>
                        <div class="ps-block__content">
                            <div class="owl-slider" id="recommended" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('/public/frontend')}}/img/products/shop/recommended/1.jpg" alt=""></a>
                                        <div class="ps-product__badge">-37%</div>
                                        <ul class="ps-product__actions">
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                            <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="#">Young Shop</a>
                                        <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Ciate Palemore Lipstick Bold Red Color</a>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select><span>01</span>
                                            </div>
                                            <p class="ps-product__price sale">$42.99 <del>$60.00 </del></p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Ciate Palemore Lipstick Bold Red Color</a>
                                            <p class="ps-product__price sale">$42.99 <del>$60.00 </del></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('/public/frontend')}}/img/products/shop/recommended/2.jpg" alt=""></a>
                                        <div class="ps-product__badge">-37%</div>
                                        <ul class="ps-product__actions">
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                            <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="#">Robert's Store</a>
                                        <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Set 30 Piece Korea StartSkin Natural Mask</a>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select><span>01</span>
                                            </div>
                                            <p class="ps-product__price sale">$32.99 <del>$60.00 </del></p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Set 30 Piece Korea StartSkin Natural Mask</a>
                                            <p class="ps-product__price sale">$32.99 <del>$60.00 </del></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('/public/frontend')}}/img/products/shop/recommended/3.jpg" alt=""></a>
                                        <div class="ps-product__badge">-25%</div>
                                        <ul class="ps-product__actions">
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                            <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="#">Go Pro</a>
                                        <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Baxter Care Hair Kit For Bearded Mens</a>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select><span>02</span>
                                            </div>
                                            <p class="ps-product__price sale">$93.00 <del>$60.00 </del></p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Baxter Care Hair Kit For Bearded Mens</a>
                                            <p class="ps-product__price sale">$93.00 <del>$60.00 </del></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('/public/frontend')}}/img/products/shop/recommended/4.jpg" alt=""></a>
                                        <div class="ps-product__badge">-46%</div>
                                        <ul class="ps-product__actions">
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                            <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="#">Go Pro</a>
                                        <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Letter Printed Cushion Cover Cotton</a>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select><span>01</span>
                                            </div>
                                            <p class="ps-product__price sale">$13.00 <del>$20.00 </del></p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Letter Printed Cushion Cover Cotton</a>
                                            <p class="ps-product__price sale">$13.00 <del>$20.00 </del></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('/public/frontend')}}/img/products/shop/recommended/5.jpg" alt=""></a>
                                        <div class="ps-product__badge">-46%</div>
                                        <ul class="ps-product__actions">
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                            <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="#">Young Shop</a>
                                        <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Amcrest Security Camera in White Color</a>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select><span>01</span>
                                            </div>
                                            <p class="ps-product__price sale">$13.00 <del>$20.00 </del></p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Amcrest Security Camera in White Color</a>
                                            <p class="ps-product__price sale">$13.00 <del>$20.00 </del></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('/public/frontend')}}/img/products/shop/recommended/6.jpg" alt=""></a>
                                        <div class="ps-product__badge">-28%</div>
                                        <ul class="ps-product__actions">
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                            <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="#">Young Shop</a>
                                        <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">LG White Front Load Steam Washer</a>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select><span>01</span>
                                            </div>
                                            <p class="ps-product__price sale">$1025.00 <del>$1422.00 </del></p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">LG White Front Load Steam Washer</a>
                                            <p class="ps-product__price sale">$1025.00 <del>$1422.00 </del></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('/public/frontend')}}/img/products/shop/recommended/7.jpg" alt=""></a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                            <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="#">Robert's Store</a>
                                        <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Samsung UHD TV 24inch</a>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select><span>01</span>
                                            </div>
                                            <p class="ps-product__price">$599.00</p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Samsung UHD TV 24inch</a>
                                            <p class="ps-product__price">$599.00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                 <div class="filter_data">

                </div>
                <div class="all_category_wise_product">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <p><strong> {{$productcount}}</strong> Products found</p>
                            <div class="ps-shopping__actions">

                                <div class="ps-shopping__view">
                                    <p>View</p>
                                    <ul class="ps-tab-list">
                                        <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>
                                        <li><a href="#tab-2"><i class="icon-list4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row">
                                        @foreach($allproduct as $product)
                                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}"><img data-src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" src="{{asset('public/frontend/lazy_loader/home-product-banner.gif')}}" class="lazy" alt=""></a>
                                                    <ul class="ps-product__actions">
                                                           <li><a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>

                                                    <li>
                                                         @if($product->product_type==1)
                                                    <a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}" data-toggle="tooltip" data-placement="top" data-placement="top" title="Quick View"><i class="icon-eye"></i></a>
                                                    @else
                                                    <a class="quickview" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview" data-id="{{$product->id}}"><i class="icon-eye"></i></a>
                                                    @endif
                                                    </li>

                                                    <li>
                                                        @if(Auth::guard('web')->check())
                                                        <a class="mywishlist" data-id="{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a>
                                                        @else
                                                         <a href="{{url('customar/login')}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a>
                                                        @endif
                                                    </li>

                                                    <li><a class="compare" data-id="{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#"></a>
                                                    <div class="ps-product__content"><a class="ps-product__title" href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}">{{Str::limit($product->product_name,23)}}</a>
                                                        <p class="ps-product__price">{{$product->product_price}}৳</p>
                                                    </div>
                                                    <div class="ps-product__content hover"><a class="ps-product__title" href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}">{{Str::limit($product->product_name,23)}}</a>
                                                        <p class="ps-product__price">{{$product->product_price}}৳</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="ps-pagination">
                                   <!--  <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>

                                    </ul> -->
                                    {{ $allproduct->links() }}
                                </div>
                            </div>
                            <div class="ps-tab" id="tab-2">
                                <div class="ps-shopping-product">
                                     @foreach($allproduct as $product)
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}"><img data-src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" src="{{asset('public/frontend/lazy_loader/home-product-banner.gif')}}" class="lazy" alt=""></a>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}">{{Str::limit($product->product_name,23)}}</a>
                                                <p class="ps-product__vendor"></a></p>

                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price">{{$product->product_price}}</p><a class="ps-btn" id="shopaddtocart{{$product->id}}" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li>@if(Auth::guard('web')->check()) <a class="mywishlist" data-id="{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i>
                                                     Wishlist</a>
                                                     @else
                                                     <a href="{{url('customar/login')}}"><i class="icon-heart"></i>
                                                     Wishlist</a>
                                                     @endif
                                                 </li>
                                                    <li><a class="compare" data-id="{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                                $(document).ready(function () {
                                                    $('#shopaddtocart{{$product->id}}').on('click', function () {






                                                        $.ajax({
                                                            type: 'GET',
                                                            url: "{{ route('product.add.cart') }}",
                                                            data: {
                                                                product_id: {{$product->id}},
                                                                product_price: {{$product->product_price}},
                                                                product_sku: {{$product->product_sku}},
                                                                quantity: 1,
                                                                },
                                                            success: function (data) {
                                                                document.getElementById('cartdatacount').innerHTML = data.quantity;
                                                                document.getElementById('mobilecartdatacount').innerHTML = data.quantity;
                                                                // document.getElementById('product_price').innerHTML = toFixed(data.total);
                                                                iziToast.success({
                                                                message: 'Product Add To cart Successfully!',
                                                                'position':'topRight'
                                                            });
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>
                                    @endforeach


                                </div>
                                <div class="ps-pagination">
                                    <ul class="pagination">
                                        {{ $allproduct->links() }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="modal" id="shop-filter-lastest" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="list-group"><a class="list-group-item list-group-item-action" href="#">Sort by</a><a class="list-group-item list-group-item-action" href="#">Sort by average rating</a><a class="list-group-item list-group-item-action" href="#">Sort by latest</a><a class="list-group-item list-group-item-action" href="#">Sort by price: low to high</a><a class="list-group-item list-group-item-action" href="#">Sort by price: high to low</a><a class="list-group-item list-group-item-action text-center" href="#" data-dismiss="modal"><strong>Close</strong></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>

$(document).ready(function(){
 $('.search_category_product').hide();

         $('.common_selector').click(function(){
            //alert("hoy");
            filter_data();
        });



    });
</script>
<script>
     function filter_data(minval = null , maxval = null)
    {
       //alert("ok")
       $('.filter_data').html('<div id="loading" style="" ></div>');
        var brand = get_filter('brand');

        if (brand === "") {
                $('.filter_data').hide();
                $('.all_category_wise_product').show();
            } else {
                $('.all_category_wise_product').hide();
                $('.filter_data').show();
            }

         $.ajax({
            url:"{{ route('foysal.product.ajaxsearchmain') }}",
            method:"POST",
            data:{brand:brand,minval:minval,maxval:maxval},
            success:function(data)
            {
                //alert('ok');

                    $('.filter_data').empty();
                    $('.filter_data').html(data);


             }
        });

    }
</script>

<script>

      function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

</script>

<script>
    function get_filter_range_value(){
        var minval = document.getElementById('hidden_minimum_price').value;
        var maxval = document.getElementById('hidden_maximum_price').value;
        filter_data(minval,maxval);
    }
</script>
<script>
    $(document).ready(function(){

        $('#input-search').on('keyup', function(){
            var product_name = $(this).val();
            var category_id = $('#category_id').val();


            $.ajax({
                url:"search/product/by/category"+"/"+category_id+"/"+product_name,
                type:'get',
                success:function(data){
                   $('#search-result').empty();
                    $('#search-result').html(data);
                }
            });
        });
    });
</script>
@endsection
