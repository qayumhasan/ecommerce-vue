<div class="modal fade login-modal-main" id="bd-example-modal">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <div class="login-modal">
               <div class="row">
                  <div class="col-lg-6 pad-right-0">
                     <div class="login-modal-left">
                     </div>
                  </div>
                  <div class="col-lg-6 pad-left-0">
                     <button type="button" class="close close-top-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                        <span class="sr-only">Close</span>
                     </button>
                     <form>
                        <div class="login-modal-right">
                           <!-- Tab panes -->
                           <div class="tab-content">
                              <div class="tab-pane active" id="login" role="tabpanel">
                                 <h5 class="heading-design-h5">Login to your account</h5>
                                 <fieldset class="form-group">
                                    <label>Enter Email/Mobile number</label>
                                    <input type="text" class="form-control" placeholder="+91 123 456 7890">
                                 </fieldset>
                                 <fieldset class="form-group">
                                    <label>Enter Password</label>
                                    <input type="password" class="form-control" placeholder="********">
                                 </fieldset>
                                 <fieldset class="form-group">
                                    <button type="submit" class="btn btn-lg btn-secondary btn-block">Enter to your
                                       account</button>
                                 </fieldset>
                                 <div class="login-with-sites text-center">
                                    <p>or Login with your social profile:</p>
                                    <button class="btn-facebook login-icons btn-lg"><i class="mdi mdi-facebook"></i>
                                       Facebook</button>
                                    <button class="btn-google login-icons btn-lg"><i class="mdi mdi-google"></i>
                                       Google</button>
                                    <button class="btn-twitter login-icons btn-lg"><i class="mdi mdi-twitter"></i>
                                       Twitter</button>
                                 </div>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                 </div>
                              </div>
                              <div class="tab-pane" id="register" role="tabpanel">
                                 <h5 class="heading-design-h5">Register Now!</h5>
                                 <fieldset class="form-group">
                                    <label>Enter Email/Mobile number</label>
                                    <input type="text" class="form-control" placeholder="+91 123 456 7890">
                                 </fieldset>
                                 <fieldset class="form-group">
                                    <label>Enter Password</label>
                                    <input type="password" class="form-control" placeholder="********">
                                 </fieldset>
                                 <fieldset class="form-group">
                                    <label>Enter Confirm Password </label>
                                    <input type="password" class="form-control" placeholder="********">
                                 </fieldset>
                                 <fieldset class="form-group">
                                    <button type="submit" class="btn btn-lg btn-secondary btn-block">Create Your
                                       Account</button>
                                 </fieldset>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">I Agree with <a
                                          href="#">Term and Conditions</a></label>
                                 </div>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="text-center login-footer-tab">
                              <ul class="nav nav-tabs" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#login" role="tab"><i
                                          class="mdi mdi-lock"></i> LOGIN</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#register" role="tab"><i
                                          class="mdi mdi-pencil"></i> REGISTER</a>
                                 </li>
                              </ul>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="navbar-top pt-2 pb-2">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <a href="#" class="mb-0 text-white">

          </a>
         </div>
         <div class="col-md-6 text-right">
            <a href="#" class="text-white"><i aria-hidden="true" class="mdi mdi-map-marker-circle"></i>Dhaka</a>
             @if(Auth::check())
               <a href="{{route('product.checkout')}}" class="text-white ml-3"><i class="mdi mdi-cart"></i>View Cart</a>
              <a href="{{route('customar.account.page')}}" class="text-white ml-3 mr-3"><i class="mdi mdi-account-circle"></i>My Account</a>

             @else
            <a href="{{url('customar/login')}}" class="text-white ml-3 mr-3"><i class="mdi mdi-lock"></i>Login</a>
            <a href="{{url('/customer/register')}}" class="text-white"><i class="mdi mdi-account-circle"></i>Registration</a>
            @endif
         </div>
      </div>
   </div>
</div>
<nav class="navbar navbar-light navbar-expand-lg bg-dark bg-faded osahan-menu">
   <div class="container">
      <a class="navbar-brand" href="{{url('/')}}"> <img src="{{asset('/'.$logos->front_logo)}}" alt="logo"> </a>

      <button class="navbar-toggler navbar-toggler-white" type="button" data-toggle="collapse"
         data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse" id="navbarNavDropdown ">
         <div class="navbar-nav mr-auto mt-5 mt-lg-2 margin-auto top-categories-search-main">
            <div class="top-categories-search">
              <form action="{{route('asif.mainproduct.search')}}" method="get">
                @csrf
               <div class="input-group">
                  <span class="input-group-btn categories-dropdown">
                     <!-- <select class="form-control-select">
                        <option selected="selected">Your City</option>
                        <option value="0">New Delhi</option>
                        <option value="2">Bengaluru</option>
                        <option value="3">Hyderabad</option>
                        <option value="4">Kolkata</option>
                     </select> -->
                  </span>
                  <input name="search" class="form-control" placeholder="Search products"
                     aria-label="Search products in Your City" type="text">
                  <span class="input-group-btn">
                     <button class="btn btn-secondary" type="submit"><i class="mdi mdi-file-find"></i>Search</button>
                  </span>
               </div>
             </form>
            </div>
         </div>
         <div class="my-2 my-lg-0">
            <ul class="list-inline main-nav-right">
              @php
      					$userid = Request::ip();
      				@endphp
               <li class="list-inline-item cart-btn">
                  <a href="#" data-toggle="offcanvas" class="btn btn-link border-none" onclick="myAddToCartData()" data-id="{{$userid}}" id="cartdataid"><i class="mdi mdi-cart"></i>
                     My Cart
                      @php
                      $cartcountall =App\AddToCart::where('user_ip',\Request::ip())->get();
                      $cartcount = $cartcountall->sum('qty');
                      @endphp
                     <small class="cart-value item-count" id="cartdatacount">{{$cartcount}}</small>
                   </a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light osahan-menu-2 pad-none-mobile">
   <div class="container">
      <div class="collapse navbar-collapse" id="navbarText">
         <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
               <a class="nav-link shop" href="#"><span class="mdi mdi-store"></span> Super Store</a>
            </li>
            <li class="nav-item">
               <a href="{{url('flashdeal/products')}}" class="nav-link">Flash Deal</a>
            </li>
            <li class="nav-item">
               <a href="{{route('webiste.product.shop')}}" class="nav-link">Shop</a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">Gift Card</a>
            </li>


         </ul>
      </div>
   </div>
</nav>
