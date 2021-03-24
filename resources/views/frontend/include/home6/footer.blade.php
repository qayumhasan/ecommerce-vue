<section class="section-padding bg-white border-top">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-truck-fast"></i>
                     <h6>Free & Next Day Delivery</h6>
                     <p>Lorem ipsum dolor sit amet, cons...</p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-basket"></i>
                     <h6>100% Satisfaction Guarantee</h6>
                     <p>Rorem Ipsum Dolor sit amet, cons...</p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-tag-heart"></i>
                     <h6>Great Daily Deals Discount</h6>
                     <p>Sorem Ipsum Dolor sit amet, Cons...</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Footer -->
      <section class="section-padding footer bg-white border-top">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3">
                  <!-- <h4 class="mb-5 mt-0"><a class="logo" href="index.html"><img src="img/logo-footer.png" alt="Groci"></a></h4> -->
                  <h4 class="mb-2 mt-0"><a class="logo" href="{{url('/')}}"><img src="{{asset('/'.$logos->front_logo)}}" alt=""></a></h4>
                  <h2 class="mb-0" ><a class="text-dark" style="font-size:13px" href="#"><i class="mdi mdi-phone"></i> {{$continfor->phone_one}}</a></h2>
                  <h2 class="mb-0"><a class="text-dark" style="font-size:13px" href="#"><i class="mdi mdi-cellphone-iphone"></i> {{$continfor->phone_two}}</a></h2>
                  <style>
                     .footer-brand a{
                        font-size: 11px;
                     }

                       h2.mb-0 {
                           /* margin-top: -5px; */
                           line-height: 24px;
                       }
                  </style>
               </div>
               <div class="col-lg-2 col-md-2">
                 <h6 class="mb-4">PRODUCTS</h6>
                 <ul>
                    <li><a href="{{route('webiste.product.shop')}}">Shop</a></li>
                    <li><a href="{{url('/product/blog')}}">Blog</a></li>
                    <li><a href="{{url('/site/faq')}}">Faq</a></li>
                 </ul>
               </div>
               <div class="col-lg-2 col-md-2">
                 <h6 class="mb-4">SERVICES</h6>
                 <ul>
                    <li><a href="{{url('/about-us')}}">About Us</a></li>
                    <li><a href="{{url('/contract_us/contact')}}">Contact us</a></li>
                     @if(Auth::check())
                     <li><a href="{{route('customar.account.page')}}">My Account</a></li>
                     @else
                     <li><a href="{{url('customar/login')}}">Sign In</a></li>
                     <li><a href="{{url('/customer/register')}}">Sign Up</a></li>
                     @endif
                 </ul>
               </div>
               <div class="col-lg-2 col-md-2">
                 <h6 class="mb-4">Pages</h6>
                 <ul>
                   @foreach($allpage as $page)
                    <li><a href="{{url('pagecrate/'.$page->id)}}">{{$page->page_name}}</a></li>
                   @endforeach
                 </ul>
               </div>
               <div class="col-lg-3 col-md-3">
                  <h6 class="mb-4">Download App</h6>
                  <div class="app">
                     <a href="#"><img src="{{asset('public/frontend')}}/img/google.png" alt=""></a>
                     <a href="#"><img src="{{asset('public/frontend')}}/img/apple.png" alt=""></a>
                  </div>
                  <h6 class="mb-3 mt-4">GET IN TOUCH</h6>
                  <div class="footer-social">
                     <a class="btn-facebook" href="#"><i class="mdi mdi-facebook"></i></a>
                     <a class="btn-twitter" href="#"><i class="mdi mdi-twitter"></i></a>
                     <a class="btn-instagram" href="#"><i class="mdi mdi-instagram"></i></a>
                     <a class="btn-whatsapp" href="#"><i class="mdi mdi-whatsapp"></i></a>
                     <a class="btn-messenger" href="#"><i class="mdi mdi-facebook-messenger"></i></a>
                     <a class="btn-google" href="#"><i class="mdi mdi-google"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Footer -->
      <!-- Copyright -->
      <section class="pt-4 pb-4 footer-bottom">
         <div class="container">
            <div class="row no-gutters">
               <div class="col-lg-6 col-sm-6">
                  <p class="mt-1 mb-0">&copy; Copyright 2020 <strong class="text-dark">{{$continfor->company_name}}</strong>. All Rights Reserved<br>
				  <small class="mt-0 mb-0">Made with <i class="mdi mdi-heart text-danger"></i> by <a href="durbarit" target="_blank" class="text-primary">Durbarit</a>
                  </small>
				  </p>
               </div>
               <div class="col-lg-6 col-sm-6 text-right">
                  <img alt="osahan logo" src="{{asset('public/frontend')}}/img/payment_methods.png">
               </div>
            </div>
         </div>
      </section>
      <!-- End Copyright -->
