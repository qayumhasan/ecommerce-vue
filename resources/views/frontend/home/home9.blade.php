@extends('layouts.websiteapp')
@section('content')
 <div id="homepage-9">
        <div class="ps-home-banner">
            <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
                @foreach($banner as $ban)
                <div class="ps-banner--organic" data-background="{{asset('public/uploads/banner/'.$ban->ban_image)}}"><img src="{{asset('public/frontend/lazy_loader/slider.gif')}}" data-src="{{asset('public/uploads/banner/'.$ban->ban_image)}}" class="lazy" alt="">
                    <div class="ps-banner__content">
                        <h4>{{$ban->text}}</h4>
                        <h3>{{$ban->description}}</h3><a class="ps-btn" href="{{url('/shop')}}">Shop Now</a>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
        <div class="ps-site-features">
            <div class="container">
                <div class="ps-block--site-features ps-block--site-features-2">
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-rocket"></i></div>
                        <div class="ps-block__right">
                            <h4>Free Delivery</h4>
                            <p>For all oders over 5000Tk</p>
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
        <div class="ps-top-categories">
            <div class="container">
                <h3>Top categories of the month</h3>
                <div class="row">
                    @foreach($allcate as $cate)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 ">
                        <a href="{{url('product/page/'.$cate->cate_slug)}}">
                        <div class="ps-block--category" data-mh="categories">
                            <div class="ps-block__thumbnail"><img data-src="{{asset('public/uploads/category/'.$cate->cate_image)}}" src="{{asset('public/frontend/lazy_loader/home-product-banner-mini.gif')}}" class="lazy" alt=""></div>
                            <div class="ps-block__content">
                                <p>{{ $cate->cate_name}}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
        <div class="ps-home-promotion">
            <div class="container">
                <div class="row">
                    @foreach($middleban as $ban)
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 "><a class="ps-collection" href="#"><img data-src="{{asset('public/uploads/sitebanner/'.$ban->image)}}" src="{{asset('public/frontend/lazy_loader/home-banner.gif')}}" class="lazy" alt=""></a>
                    </div>
                    @endforeach
                 
                </div>
            </div>
        </div>
        <!-- hot deal -->
        @if($hotdeal)
        <div class="ps-deal-hot">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block--deal-hot" data-mh="dealhot">
                            <div class="ps-block__header">
                                <h3><a href="{{ route('hot.deal.products') }}">Deal hot today</a></h3>
                                <div class="ps-block__navigation"><a class="ps-carousel__prev" href=".ps-carousel--deal-hot"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href=".ps-carousel--deal-hot"><i class="icon-chevron-right"></i></a></div>
                            </div>
                            <div class="ps-product__content">
                                <div class="ps-carousel--deal-hot ps-carousel--deal-hot owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                                    <!-- product -->
                                    @foreach($hotdeal->flash_deal_details as $flasdetail)
                                    <div class="ps-product--detail ps-product--hot-deal">
                                        <div class="ps-product__header">
                                            <div class="ps-product__thumbnail" data-vertical="true">
                                                <figure>
                                                    <div class="ps-wrapper">
                                                        <div class="ps-product__gallery" data-arrow="true">
                                                            @php
                                                                $product_id=$flasdetail->product->id;
                                                                $product_img=App\Product::where('id',$product_id)->first();
                                                            @endphp
                                                            
                                                          @foreach(json_decode($product_img->photos) as $img)
                                                            <div class="item">
                                                                <a href="{{url('storage/app/public/'.$img) }}">
                                                                    <img src="{{url('storage/app/public/'.$img) }}" alt="">
                                                                </a>
                                                            </div>
                                                            @endforeach
                                                            
                                                        
                                                        </div>
                                                    </div>
                                                </figure>
                                                <div class="ps-product__variants" data-item="4" data-md="3" data-sm="3" data-arrow="false">
                                                    @foreach(json_decode($product_img->photos) as $img)
                                                    <div class="item">
                                                        <img src="{{url('storage/app/public/'.$img) }}" alt="">
                                                    </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            <div class="ps-product__info">
                                                <h5></h5>
                                                <h3 class="ps-product__name"><a href="{{url('product/')}}/{{$flasdetail->product->slug}}/{{$flasdetail->product->id}}">{{Str::limit($flasdetail->product->product_name,23)}} </a></h3>
                                                <div class="ps-product__meta">
                                                    <h4 class="ps-product__price sale">

                                                    @if($flasdetail->discount_type==1)
                                                           ৳{{$flasdetail->product->product_price - $flasdetail->discount}}<del>৳{{ $flasdetail->product->product_price }}</del>
                                                               
                                                            @elseif($flasdetail->discount_type==2)
                                                             @php
                                                                $dis=($flasdetail->discount * $flasdetail->product->product_price)/100;
                                                            @endphp
                                                            ৳{{$flasdetail->product->product_price - $dis}}<del>{{ $flasdetail->product->product_price }}</del>

                                                       @endif
                                                    </h4>
                                                    <div class="ps-product__rating">
                                               <!--          <select class="ps-rating" data-read-only="true">
                                                            <option value="1">1</option>
                                                            <option value="1">2</option>
                                                            <option value="1">3</option>
                                                            <option value="1">4</option>
                                                            <option value="2">5</option>
                                                        </select><span>(1 review)</span> -->
                                                    </div>
                                                    <div class="ps-product__specification">
                                                        <!-- <p>Status:<strong class="in-stock"> In Stock</strong></p> -->
                                                    </div>
                                                </div>
                                                <div class="ps-product__expires">
                                                    @php
                                                        $enddate=$hotdeal->end_date;
                                                         $experedate=$enddate->format('F d,Y');
                                                    @endphp
                                                    <p>Expires In</p>
                                                    <ul class="ps-countdown" data-time="{{$experedate}} 23:00:00">
                                                        <li><span class="days"></span>
                                                            <p>Days</p>
                                                        </li>
                                                        <li><span class="hours"></span>
                                                            <p>Hours</p>
                                                        </li>
                                                        <li><span class="minutes"></span>
                                                            <p>Minutes</p>
                                                        </li>
                                                        <li><span class="seconds"></span>
                                                            <p>Seconds</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="ps-product__processs-bar">
                                                    <div class="ps-progress" data-value="10"><span class="ps-progress__value"></span></div>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- product end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <aside class="widget widget_best-sale" data-mh="dealhot">
                            <h3 class="widget-title">Top Best Sell</h3>
                            <div class="widget__content">
                                <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                                    <div class="ps-product-group">
                                        @foreach($topsell as $product)
                                            @php
                                                $flashdealdetail=App\FlashDealDetail::where('product_id',$product->id)->where('status',1)->get();
                                            @endphp
                                        <div class="ps-product--horizontal">
                                            <div class="ps-product__thumbnail"><a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}"><img data-src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" src="{{asset('public/frontend/lazy_loader/home-product-banner.gif')}}" class="lazy" alt=""></a></div>
                                            <div class="ps-product__content"><a class="ps-product__title" href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}">{{ Str::limit($product->product_name,23)}}</a>
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
                                                <p class="ps-product__price sale">
                                                    @if(count($flashdealdetail) > 0)
                                                     @foreach($flashdealdetail as $row)
                                                        <?php $productdiscount = ($product->product_price * $row->discount) / 100; ?>
                                                        @if($row ->discount_type == 1 )
                                                            ৳ {{$product->product_price - $row->discount}}
                                                            <del>৳ {{$product->product_price}} </del>
                                                        @elseif($row ->discount_type == 2)
                                                        ৳ {{$product->product_price - $productdiscount}}
                                                        @else
                                                        {{$product->product_price}}
                                                        @endif
                                                    @endforeach
                                                @else
                                                ৳{{$product->product_price}}
                                                @endif
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach
                                     
                                    </div>
                                    <div class="ps-product-group">
                                        @foreach($topsellskip as $product)
                                            @php
                                                $flashdealdetail=App\FlashDealDetail::where('product_id',$product->id)->where('status',1)->get();
                                            @endphp
                                        <div class="ps-product--horizontal">
                                            <div class="ps-product__thumbnail"><a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}"><img data-src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" src="{{asset('public/frontend/lazy_loader/home-product-banner.gif')}}" class="lazy"></a></div>
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
                                                <p class="ps-product__price sale"> 
                                                    @if(count($flashdealdetail) > 0)
                                                     @foreach($flashdealdetail as $row)
                                                        <?php $productdiscount = ($product->product_price * $row->discount) / 100; ?>
                                                        @if($row ->discount_type == 1 )
                                                            ৳ {{$product->product_price - $row->discount}}
                                                            <del>৳ {{$product->product_price}} </del>
                                                        @elseif($row ->discount_type == 2)
                                                        ৳ {{$product->product_price - $productdiscount}}
                                                        @else
                                                        {{$product->product_price}}
                                                        @endif
                                                    @endforeach
                                                @else
                                                ৳{{$product->product_price}}
                                                @endif
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach
                                      
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- hot deal end -->
        <div class="ps-product-list ps-product-list--2">
            <div class="container">
                <div class="ps-section__header">
                    <h3>New Arrivals</h3>
                    <ul class="ps-section__links">
                        @foreach($allcate as $cate)
                        <li><a href="{{url('product/page/'.$cate->cate_slug)}}">{{$cate->cate_name}}</a></li>
                        @endforeach
                        
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        @foreach($newarrival as $product)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}"><img data-src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" src="{{asset('public/frontend/lazy_loader/home-product-banner.gif')}}" class="lazy"></a>
                                    <ul class="ps-product__actions">

                                        <li><a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-eye"></i></a></li>

                                  
                                    <li>
                                        @if($product->product_type==1)
                                        <a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}" data-toggle="tooltip" data-placement="top" data-placement="top" title="Quick View"><i class="icon-bag2"></i></a>
                                        @else
                                        <a class="quickview" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview" data-id="{{$product->id}}"><i class="icon-bag2"></i></a>
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
                                <div class="ps-product__container">
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
                                        <p class="ps-product__price">৳{{$product->product_price}}</p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}">{{Str::limit($product->product_name,23)}}</a>
                                        <p class="ps-product__price">৳{{$product->product_price}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
       <!--  <div class="ps-client-say bg--cover" data-background="{{asset('public/frontend')}}/img/bg/testimonial-organic.jpg">
            <div class="container">
                <div class="ps-section__header">
                    <h3>What client say</h3>
                    <div class="ps-section__nav"><a class="ps-carousel__prev" href=".ps-carousel--testimonials"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href=".ps-carousel--testimonials"><i class="icon-chevron-right"></i></a></div>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--testimonials owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="2" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="2" data-owl-duration="1000" data-owl-mousedrag="on">
                        <div class="ps-block--testimonial">
                            <div class="ps-block__header"><img src="{{asset('public/frontend')}}/img/users/1.jpg" alt=""></div>
                            <div class="ps-block__content"><i class="icon-quote-close"></i>
                                <h4>Kanye West<span>Head Chef at BBQ Restaurant</span></h4>
                                <p>Sed elit quam, iaculis sed semper sit amet udin vitae nibh. at magna akal semperFusce commodo molestie luctus.Lorem ipsum Dolor tusima olatiup.</p>
                            </div>
                        </div>
                        <div class="ps-block--testimonial">
                            <div class="ps-block__header"><img src="{{asset('public/frontend')}}/img/users/2.png" alt=""></div>
                            <div class="ps-block__content"><i class="icon-quote-close"></i>
                                <h4>Anabella Kleva<span>Boss at TocoToco</span></h4>
                                <p>Sed elit quam, iaculis sed semper sit amet udin vitae nibh. at magna akal semperFusce commodo molestie luctus.Lorem ipsum Dolor tusima olatiup.</p>
                            </div>
                        </div>
                        <div class="ps-block--testimonial">
                            <div class="ps-block__header"><img src="{{asset('public/frontend')}}/img/users/3.jpg" alt=""></div>
                            <div class="ps-block__content"><i class="icon-quote-close"></i>
                                <h4>William Roles<span>Head Chef at BBQ Restaurant</span></h4>
                                <p>Sed elit quam, iaculis sed semper sit amet udin vitae nibh. at magna akal semperFusce commodo molestie luctus.Lorem ipsum Dolor tusima olatiup.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
         <div class="ps-section--default ps-home-blog">
            <!-- <div class="container">
                <div class="ps-section__header">
                    <h3>News</h3>
                    <ul class="ps-section__links">
                        <li><a href="#">News</a></li>
                        <li><a href="#">Review Products</a></li>
                        <li><a href="#">Tips & Tricks</a></li>
                        <li><a href="#">Promotions</a></li>
                        <li><a href="#">Videos</a></li>
                        <li><a href="#">See All</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="{{asset('public/frontend')}}/img/blog/organic/1.jpg" alt=""></div>
                                <div class="ps-post__content"><a class="ps-post__meta" href="#">Tips & Tricks</a><a class="ps-post__title" href="#">How To Make A Fresh Juice Blended For Your Family?</a>
                                    <p>December 17, 2017 by<a href="#"> drfurion</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail">
                                    <div class="ps-post__badge"><i class="icon-volume-high"></i></div><a class="ps-post__overlay" href="blog-detail.html"></a><img src="{{asset('public/frontend')}}/img/blog/organic/2.jpg" alt="">
                                </div>
                                <div class="ps-post__content"><a class="ps-post__meta" href="#">Review Product</a><a class="ps-post__title" href="#">Fresh Eggs From Caroline’s Farm</a>
                                    <p>December 17, 2017 by<a href="#"> drfurion</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail">
                                    <div class="ps-post__badge"><i class="icon-volume-high"></i></div>
                                    <div class="ps-post__badge"><i class="icon-volume-high"></i></div><a class="ps-post__overlay" href="blog-detail.html"></a><img src="{{asset('public/frontend')}}/img/blog/organic/3.jpg" alt="">
                                </div>
                                <div class="ps-post__content"><a class="ps-post__meta" href="#">News</a><a class="ps-post__title" href="#">Discover Fresh Organic Farms In Switzeland Villages</a>
                                    <p>December 17, 2017 by<a href="#"> drfurion</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div> 
        <!-- first cate start-->
       
        @foreach($allcategory as $firstcate)
        <div class="ps-product-list ps-product-list--2">
            <div class="container">
                <div class="ps-section__header">
                    <h3>{{$firstcate->cate_name}}</h3>
                    <ul class="ps-section__links">
                        
                        <li><a href="{{url('product/page/'.$firstcate->cate_slug)}}">View All</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    @php
                        $cate_id=$firstcate->id;
                        $allproduct=App\Product::where('is_deleted',0)->where('cate_id',$cate_id)->orderBy('id','DESC')->limit(10)->get();
                    @endphp
                    <div class="row">
                        @foreach($allproduct as $product)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}"><img data-src="{{asset('public/uploads/products/thumbnail/'.$product->thumbnail_img)}}" src="{{asset('public/frontend/lazy_loader/home-product-banner.gif')}}" class="lazy"></a>
                                    <ul class="ps-product__actions">

                                        <li><a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-eye"></i></a></li>

                                  
                                    <li>
                                        @if($product->product_type==1)
                                        <a href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}" data-toggle="tooltip" data-placement="top" data-placement="top" title="Quick View"><i class="icon-bag2"></i></a>
                                        @else
                                        <a class="quickview" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview" data-id="{{$product->id}}"><i class="icon-bag2"></i></a>
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
                                <div class="ps-product__container">
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
                                        <p class="ps-product__price">৳{{$product->product_price}}</p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="{{url('product/')}}/{{$product->slug}}/{{$product->id}}">{{Str::limit($product->product_name,23)}}</a>
                                        <p class="ps-product__price">৳{{$product->product_price}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
       

    </div>


@endsection