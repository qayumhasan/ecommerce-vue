 <footer class="ps-footer ps-footer--2">
            <div class="container">
                <div class="ps-footer__content">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 ">
                            <aside class="widget widget_footer">
                                <h4 class="widget-title">Pages</h4>
                                <ul class="ps-list--link">
                                     @foreach($allpage as $page)
                                        <li><a href="{{url('pagecrate/'.$page->id)}}">{{$page->page_name}}</a></li>
                                        @endforeach
                                </ul>
                            </aside>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 ">
                            <aside class="widget widget_footer">
                                <h4 class="widget-title">Company</h4>
                                <ul class="ps-list--link">
                                    <li><a href="{{url('/faq')}}">Faqs</a></li>
                                    <li><a href="{{url('/warranty')}}">warranty</a></li>
                                    <li><a href="{{url('/tracking/page')}}">Order Traking</a></li>
                                    <li><a href="{{route('contract.us')}}">Contact</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ">
                            <aside class="widget widget_footer">
                                <h4 class="widget-title">Bussiness</h4>
                                <ul class="ps-list--link">
                                    <li><a href="{{url('/product/blog')}}">Our Blog</a></li>
                                    @if(Auth::guard('web')->check())
                                    <li><a href="{{route('product.cart.data')}}">Checkout</a></li>
                                    @else
                                     <li><a href="{{route('customar.login.form')}}">Checkout</a></li>
                                    @endif
                                     @if(Auth::guard('web')->check())
                                    <li><a href="{{route('customar.account.page')}}">My account</a></li>
                                    @else
                                     <li><a href="{{route('customar.login.form')}}">My account</a></li>
                                    @endif

                                </ul>
                            </aside>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 ">
                            <aside class="widget widget_newletters">
                                <h4 class="widget-title">Newsletter</h4>
                                <form class="ps-form--newletter" action="{{route('frontend.subscriber.insert')}}" method="post">
                                    @csrf
                                    <div class="form-group--nest">
                                        <input class="form-control"
                                        name="subscriber_email" type="email" placeholder="Email Address" required>
                                        <button type="submit" class="ps-btn">Subscribe</button>
                                    </div>
                                    <ul class="ps-list--social">
                                        <li><a class="facebook" href="{{$social->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="{{$social->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="google-plus" href="{{$social->google}}"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="instagram" href="{{$social->instagram}}"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </form>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="ps-footer__copyright">
                    <p>{{$footer->copyright}}</p>
                    <p><span>We Using Safe Payment For:</span><a href="#"><img src="{{asset('public/uploads/footerpayment/'.$footer->payment_image)}}" alt=""></a></p>
                </div>
            </div>
        </footer>

    <div id="back2top"><i class="pe-7s-angle-up"></i></div>
    <div class="ps-site-overlay"></div>
    <div id="loader-wrapper">
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
        <div class="ps-search__content">
            <form class="ps-form--primary-search" action="do_action" method="post">
                <input class="form-control" type="text" placeholder="Search for...">
                <button><i class="aroma-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
  <!--   <div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
                <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                    <div class="ps-product__header">
                        <div class="ps-product__thumbnail" data-vertical="false">
                            <div class="ps-product__images" data-arrow="true">
                                <div class="item"><img src="img/products/detail/fullwidth/1.jpg" alt=""></div>
                                <div class="item"><img src="img/products/detail/fullwidth/2.jpg" alt=""></div>
                                <div class="item"><img src="img/products/detail/fullwidth/3.jpg" alt=""></div>
                            </div>
                        </div>
                        <div class="ps-product__info">
                            <h1>Marshall Kilburn Portable Wireless Speaker</h1>
                            <div class="ps-product__meta">
                                <p>Brand:<a href="shop-default.html">Sony</a></p>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>(1 review)</span>
                                </div>
                            </div>
                            <h4 class="ps-product__price">$36.78 – $56.99</h4>
                            <div class="ps-product__desc">
                                <p>Sold By:<a href="shop-default.html"><strong> Go Pro</strong></a></p>
                                <ul class="ps-list--dot">
                                    <li> Unrestrained and portable active stereo speaker</li>
                                    <li> Free from the confines of wires and chords</li>
                                    <li> 20 hours of portable capabilities</li>
                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                </ul>
                            </div>
                            <div class="ps-product__shopping"><a class="ps-btn ps-btn--black" href="#">Add to cart</a><a class="ps-btn" href="#">Buy Now</a>
                                <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div> -->
