@extends('layouts.websiteapp')
@section('title', 'Checkout| '.$seo->meta_title)
@section('content')
<style>
.order-placed-dt i {
    color: #f55d2c;
    font-size: 52px;
}

.pln-icon i {
    font-size: 20px;
    color: #f55d2c;
}
.pln-icon {
    float: left;
    width: 50px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    margin-right: 10px;
}
.title585 h4 {
    float: left;
    margin-top: 0;
    font-weight: 500;
    font-size: 16px;
    color: #2b2f4c;
    line-height: 50px;
}
.order-placed-dt p {
    font-size: 14px;
    font-weight: 500;
    color: #3e3f5e;
    margin-bottom: 0;
    text-align: left;
    line-height: 24px;
}
.order-placed-dt h2 {
    font-size: 30px;
    font-weight: 500;
    color: #2b2f4c;
    text-align: center;
    margin-bottom: 25px;
}
.delivery-address-bg {
    margin-top: 40px;
    background: #fff;
    border-radius: 5px;
    float: left;
    width: 100%;
    text-align: left;
    box-shadow: 0 1px 2px 0 #e9e9e9;
}
.stay-invoice {
    float: left;
    width: 100%;
    padding: 15px 20px;
    display: flex;
    align-items: center;
    border-top: 1px solid #efefef;
    border-bottom: 1px solid #efefef;
}
st-hm {
    font-size: 16px;
    font-weight: 500;
    color: #2b2f4c;
}
.invc-link {
    margin-left: auto;
    font-size: 14px;
    font-weight: 500;
    color: #fff;
    background: #f55d2c;
    padding: 5px 15px;
    border-radius: 5px;
}
.order-placed-dt p {
    font-size: 14px;
    font-weight: 400;
    color: #3e3f5e;
    margin-bottom: 0;
    /* text-align: center; */
    margin-bottom: 6px;
    line-height: 24px;
}
.title585 {
    border-bottom: 1px solid #ececec;
}
.clear{
  clear: both;
}
ul.address-placed-dt1 {
    padding: 20px;
}
.placed-bottom-dt {
    padding: 12px;
    text-align: center;
}
.all-product-grid {
    padding: 40px 0px;
}
</style>
<div class="wrapper">
   <div class="all-product-grid">
     <div class="container">
       <div class="row justify-content-center">
         <div class="col-lg-6 col-md-8">
           <div class="order-placed-dt">
             <div class="top text-center">
               @php
                  $data=App\OrderFinal::where('invoice_id',$orderid)->first();
               @endphp
               <i class="mdi mdi-checkbox-marked-circle"></i>
               <h2>Order Successfully Placed</h2>
               <p class="text-center">Thank you for your order! @if($data->delevery_date !=NULL)   will received order timing <span>{{$data->delevery_date}} {{$data->delevery_time}}</span> @endif</p>
             </div>
             <div class="delivery-address-bg">
               <div class="title585">
                 <div class="pln-icon"><i class="mdi mdi-telegram"></i></div>
                 <h4>Your order will be sent to this address</h4>
                 <div class="clear"></div>
               </div>
               <ul class="address-placed-dt1" style="text-align:left;">
                <li><p><i class="uil uil-card-atm"></i>Invoice ID : <span>{{$orderid}}</span></p></li>
                 <li><p><i class="uil uil-phone-alt"></i>Phone Number : <span>{{$data->shipping_phone}}</span></p></li>
                 <li><p><i class="uil uil-card-atm"></i>Payment Method : <span>@if($data->payment_type==1)Cash on Delivery @elseif($data->payment_type==2) SslCommerz @endif</span></p></li>
                  <li><p><i class="uil uil-map-marker-alt"></i>Address : <span>{{$data->shipping_address}}</span></p></li>
               </ul>
               <div class="stay-invoice">
                 <div class="st-hm">Stay Home<i class="uil uil-smile"></i></div>
                 <a href="{{route('customar.invoice.show.details',$data->id)}}" class="invc-link hover-btn">View Invoice</a>
               </div>
               <div class="placed-bottom-dt">

               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>


@endsection
