
     <div class="navbar-top pt-2 pb-2">
        <div class="container">
           <div class="row">
              <div class="col-md-6">
                 <a href="#" class="mb-0 text-white">
                    20% cashback for all users | Code: <strong><span class="text-light">OGOFERS13 <span class="mdi mdi-tag-faces"></span></span> </strong>                   </a>
              </div>
              <div class="col-md-6 text-right">
                 <a href="#" class="text-white"><i aria-hidden="true" class="mdi mdi-map-marker-circle"></i>Dhaka</a>
                 @if(Auth::check())
                   <a href="{{route('product.checkout')}}" class="text-white ml-3 mr-3"><i class="mdi mdi-cart"></i>View Cart</a>
                  <a href="{{route('customar.account.page')}}" class="text-white"><i class="mdi mdi-account-circle"></i>My Account</a>
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

           <button class="navbar-toggler navbar-toggler-white" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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
                       <input class="form-control" name="search" placeholder="Search products in Your City" aria-label="Search products in Your City" type="text">
                       <span class="input-group-btn">
                       <button class="btn btn-secondary" type="submit"><i class="mdi mdi-file-find"></i> Search</button>
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
                  @php
                  $cartcountall =App\AddToCart::where('user_ip',\Request::ip())->get();
                  $cartcount = $cartcountall->sum('qty');
                  @endphp
                    <li class="list-inline-item cart-btn">
                       <a href="#" data-toggle="offcanvas" class="btn btn-link border-none" onclick="myAddToCartData()" data-id="{{$userid}}" id="cartdataid"> <i class="mdi mdi-cart"></i> My Cart <small class="cart-value" id="cartdatacount">{{$cartcount}}</small></a>
                    </li>
                 </ul>
              </div>
           </div>
        </div>
     </nav>
     <nav class="navbar navbar-expand-lg navbar-light osahan-menu-2 pad-none-mobile">
        <div class="container-fluid">
           <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto">
                 <li class="nav-item">
                    <a class="nav-link shop" href=""><span class="mdi mdi-store"></span> Super Store</a>
                 </li>
                 <li class="nav-item">
                    <a href="{{url('flashdeal/products')}}" class="nav-link">Flash Deal</a>
                 </li>
                 <li class="nav-item">
                    <a href="{{route('webiste.product.shop')}}" class="nav-link">Shop</a>
                 </li>
                 <li class="nav-item">
                    <a href="" class="nav-link">Gift Card</a>
                 </li>
              </ul>
           </div>
        </div>
     </nav>
