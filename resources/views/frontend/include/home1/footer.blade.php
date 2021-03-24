
<section class="section-padding bg-white border-top">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-sm-6">
            <div class="feature-box">
               <i class="mdi mdi-truck-fast"></i>
               <h6>Free & Same Day Delivery</h6>
               <p>For All Oders Over 300TK</p>
            </div>
         </div>
         <div class="col-lg-4 col-sm-6">
            <div class="feature-box">
              <i class="mdi mdi-comment"></i>
               <h6>Online Support</h6>
               <p>We Have Support 24/7</p>
            </div>
         </div>
         <div class="col-lg-4 col-sm-6">
            <div class="feature-box">
             <i class="mdi mdi-cash"></i>
               <h6>Secure Payment</h6>
               <p>100% Secure Payment</p>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="footer section-padding py-5">
   <div class="container">
      <div class="row py-lg-4">
         <div class="col-xl-2 col-sm-6">
            <div class="footer-brand">

                  <h4 class="mb-2 mt-0"><a class="logo" href="{{url('/')}}"><img src="{{asset('/'.$logos->front_logo)}}" alt=""></a></h4>
                  <h2 class="mb-0" ><a class="text-dark" style="font-size:13px" href="#"><i class="mdi mdi-phone"></i> {{$continfor->phone_one}}</a></h2>
                  <h2 class="mb-0"><a class="text-dark" style="font-size:13px" href="#"><i class="mdi mdi-cellphone-iphone"></i> {{$continfor->phone_two}}</a></h2>
                  <!--<h2 class="mb-0"><a class="text-dark" href="#"><i class="mdi mdi-email"></i>{{$continfor->email_one}}</a></h2>-->
                  <!--<p class="mb-0"><a class="text-primary" href="#"><i class="mdi mdi-address"></i> {{$continfor->address}}</a></p>-->
               </div>
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
         <div class="col-xl-2 col-sm-6">
            <h6 class="mb-4">PRODUCTS</h6>
            <ul>
               <li><a href="{{route('webiste.product.shop')}}">Shop</a></li>
               <li><a href="{{url('/product/blog')}}">Blog</a></li>

            </ul>
         </div>
         <div class="col-xl-2 col-sm-6">
            <h6 class="mb-4">SERVICES</h6>
            <ul>

               <li><a href="{{route('contract.us')}}">Contact us</a></li>
                @if(Auth::check())
                <li><a href="{{route('customar.account.page')}}">My Account</a></li>
                @else
                <li><a href="{{url('customar/login')}}">Sign In</a></li>
                <li><a href="{{url('/customer/register')}}">Sign Up</a></li>
                @endif
            </ul>
         </div>
         <div class="col-xl-2 col-sm-6">
            <h6 class="mb-4">Pages</h6>
            <ul>
              @foreach($allpage as $page)
               <li><a href="{{url('pagecrate/'.$page->id)}}">{{$page->page_name}}</a></li>
              @endforeach

              <li><a href="{{url('/about-us')}}">About Us</a></li>
                <li><a href="{{url('/site/faq')}}">Faq</a></li>
            </ul>
         </div>
         <div class="col-xl-4 col-sm-6">
            <h6 class="mb-4">Subscribe to our Newsletter</h6>
            <form action="{{route('frontend.subscriber.insert')}}" class="form-inline newsletter-form mb-1" method="post">
              @csrf
               <input type="text" name="subscriber_email" class="form-control mr-sm-2" placeholder="Enter your email">
               <button type="submit" class="btn btn-secondary">Subscribe</button>
            </form>
            <small><a href="#">Register now to get updates on <span class="text-info">Offers and
                     products</span></a></small>
            <div class="app mt-4 pt-2">
               <h6 class="mb-4">DOWNLOAD APP</h6>
               <a href="#">
                  <img class="img-fluid" src="{{asset('public/frontend')}}/img/google.png">
               </a>
               <a href="#">
                  <img class="img-fluid" src="{{asset('public/frontend')}}/img/apple.png">
               </a>
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
            <p class="mt-1 mb-0">&copy; Copyright 2020 <strong class="text-dark">{{$continfor->company_name}}</strong>. All Rights
               Reserved<br>
               <small class="mt-0 mb-0">Made with <i class="mdi mdi-heart text-danger"></i> by <a
                     href="www.durbarit.com" target="_blank" class="text-primary">Durbarit</a>
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
