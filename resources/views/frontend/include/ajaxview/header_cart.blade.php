@php
$total=0;
@endphp
@if($countcartitems->count() >0)
<div class="cart-sidebar-body" id="allcartproduct">
@foreach($countcartitems as $row)
   <div class="cart-list-product">
      @php
        $productcart=App\Product::where('id',$row->product_id)->select(['id','slug','product_name','product_measurement','thumbnail_img'])->first();
      @endphp
      <button onclick="cartheaderdelete(this)" class="float-right remove-cart" href="#" value="{{$row->id}}"><i class="mdi mdi-close"></i></button>
      <img class="img-fluid" src="{{asset('public/uploads/products/thumbnail/'.$productcart->thumbnail_img)}}" alt="">

      <h5><a href="{{url('product/'.$productcart->slug.'/'.$productcart->id)}}">{{$productcart->product_name}}</a></h5>
        <span class="badge badge-success">Quantity-{{$row->qty}}</span>
      <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
      <p class="offer-price mb-0">TK {{$row->product_price}} <i class="mdi mdi-tag-outline"></i>
      <style>
      button.float-right.remove-cart {
          background-color: #ff934b;
          border-style: none;
          color: #fff;
          border-radius: 3px;
      }
      .cart-list-product img {
            background: #fff none repeat scroll 0 0;
            border: 1px solid #efefef;
            border-radius: 5px;
            box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.06);
            float: left;
            height: 99px;
            margin: 0 6px 0 0;
            object-fit: scale-down;
            width: 82px;
        }
      </style>
   </div>
   @php
     $total=$total+ $row->product_price * $row->qty;
   @endphp
@endforeach
</div>
<div class="cart-sidebar-footer">
   <div class="cart-store-details">
      <!-- <p>Sub Total <strong class="float-right">৳{{$total}}</strong></p> -->
      <!-- <p>Delivery Charges <strong class="float-right text-danger">+ 0.0</strong></p> -->
      <!-- <h6>Your total savings <strong class="float-right text-danger">৳55</strong></h6> -->
   </div>
   @if(Auth::guard('web')->check())
   <a href="{{route('product.checkout')}}">
     <button  class="btn btn-secondary btn-lg btn-block text-left">
       <span class="float-left"><i class="mdi mdi-cart-outline"></i> View Cart  </span><span class="float-right"><strong>TK {{$total}}</strong>
         <span class="mdi mdi-chevron-right"></span>
       </span>
   </button>
  </a>

  @else
  <a href="{{url('customar/login')}}">
    <button href="{{url('customar/login')}}" class="btn btn-secondary btn-lg btn-block text-left">
      <span class="float-left"><i class="mdi mdi-cart-outline"></i> View Cart  </span><span class="float-right"><strong>TK {{$total}}</strong>
        <span class="mdi mdi-chevron-right"></span>
      </span>
  </button>
 </a>
  @endif

</div>
@else
<div class="cart-sidebar-body">
  <p>No cart data!!</p>
</div>
@endif
