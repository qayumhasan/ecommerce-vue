<div class="col-md-4">
   <div class="card account-left">
      <div class="user-profile-header">
        @if(auth::user()->avatar == NULL)
         <img alt="logo" src="{{asset('public/frontend')}}/img/user.jpg">
        @else
        <img alt="logo" src="{{asset('public/uploads/customer/'.Auth::user()->avatar)}}">
        @endif
         <h5 class="mb-1 text-secondary"><strong></strong>{{Auth::user()->name}} </h5>
         <p>{{Auth::user()->phone}}</p>
      </div>
      <div class="list-group">
         <a href="{{route('customar.account.page')}}" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-account-outline"></i> DashBoard</a>
         <a href="{{route('customar.address.page')}}" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-map-marker-circle"></i> My profile</a>
         <!-- <a href="{{route('customar.wishlist')}}" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-heart-outline"></i>  Wish List </a> -->
         <a href="{{route('customar.orderlist')}}" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-format-list-bulleted"></i> Order List</a>
         <!-- <a href="{{route('customar.wallet')}}" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-format-list-bulleted"></i>Wallet</a> -->
         <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-lock"></i>  Logout</a>
         <!-- <a class="list-group-item list-group-item-action" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#"><i aria-hidden="true" class="mdi mdi-lock"></i>Logout</a></div> -->
            <form id="logout-form" method="post" action="{{route('customar.logout')}}">
                @csrf
            </form>
      </div>
   </div>
</div>
