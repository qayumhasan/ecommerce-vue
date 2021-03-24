@extends('layouts.websiteapp')
@section('title', 'Checkout| '.$seo->meta_title)
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <a href="#"><strong><span class="mdi mdi-home"></span> Home</strong></a> <span
                       class="mdi mdi-chevron-right"></span> <a href="#">Checkout</a>
               </div>
           </div>
       </div>
   </section>
   <section id="checkout">
       <div class="container">
           <div class="row">
               <div class="col-sm-8">
                   <div class="sp_cart">
                       <div class="row">
                           <div class="col-sm-6 text-left">
                               <div class="sp_head">
                                   <h3>Shopping Cart <span id="cartdatacount"></span></h3>
                               </div>
                           </div>
                           <div class="col-sm-6 text-right">
                               <div class="msp_btn">
                                   <a href="{{url('/')}}">
                                       More Shopping
                                   </a>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="cart-page section-padding">
                       <div class="row">
                           <div class="col-md-12">
                               <div class="card card-body cart-table">
                                   <div class="table-responsive">
                                       <table class="table cart_summary">
                                           <thead>
                                               <tr>
                                                   <th class="cart_product">Product</th>
                                                   <th>Description</th>
                                                   <th>Avail.</th>
                                                   <th>Unit price</th>
                                                   <th>Qty</th>
                                                   <th>Total</th>
                                                   <th class="action"><i class="mdi mdi-delete-forever"></i></th>
                                               </tr>
                                           </thead>
                                           <tbody id="cartdata">



                                           </tbody>
                                           <tfoot>
                                               <tr>
                                                   <td colspan="1"></td>
                                                   <td colspan="2"></td>
                                                   <td colspan="4">
                                                       <form class="form-inline float-right" action="{{route('customer.apply.cupon')}}" method="post">
                                                         @csrf
                                                           <div class="form-group">
                                                               <input type="text" name="coupon" id="input-coupon" placeholder="Enter discount code" class="form-control border-form-control form-control-sm">
                                                           </div>
                                                           &nbsp;
                                                           <button class="btn btn-success float-left btn-sm" type="button" onclick="cuponApply()">Apply</button>
                                                       </form>
                                                   </td>

                                               </tr>

                                           </tfoot>
                                       </table>
                                   </div>

                               </div>

                           </div>
                       </div>

                   </div>
               </div>
               <div class="col-sm-4">
                 <form action="{{route('checkout.data.create')}}" method="post" enctype="multipart/form-data">
                   @csrf
                   <div class="ac_main_box">

                       <div class="ac_pro">
                           <div class="row">
                               <div class="col-sm-12">
                                   <table class="table">
                                       <tbody id="totalprice">

                                       </tbody>
                                   </table>
                               </div>
                           </div>

                       </div>
                      <div class="nt mt-2" id="prescrive">



                      </div>
                      <div class="payment_box">
                            <h4>Choose Payment Method</h4>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="radio-buttons">
                                        <label class="custom-radio">
                                            <input type="radio"  name="payment_type" value="1" checked />
                                            <span class="radio-btn"><i class="las la-check"></i>
                                                <div class="hobbies-icon">
                                                    <span class="material-icons">
                                                        monetization_on
                                                    </span>
                                                    <h3>Cash On Delivery</h3>
                                                </div>
                                            </span>
                                        </label>
                                        <label class="custom-radio">
                                            <input type="radio"  name="payment_type" value="2" />
                                            <span class="radio-btn"><i class="las la-check"></i>
                                                <div class="hobbies-icon">
                                                    <span class="material-icons">
                                                        monetization_on
                                                    </span>
                                                    <h3>SSL</h3>
                                                </div>
                                            </span>
                                        </label>
                                        <label class="custom-radio">
                                            <input type="radio"  name="payment_type" value="3"/>
                                            <span class="radio-btn"><i class="las la-check"></i>
                                                <div class="hobbies-icon">
                                                    <span class="material-icons">
                                                        monetization_on
                                                    </span>
                                                    <h3>Stripe</h3>
                                                </div>
                                            </span>
                                        </label>
                                        <label class="custom-radio">
                                            <input type="radio" name="payment_type" value="4"/>
                                            <span class="radio-btn"><i class="las la-check"></i>
                                                <div class="hobbies-icon">
                                                    <span class="material-icons">
                                                        monetization_on
                                                    </span>
                                                    <h3>Bkash</h3>
                                                </div>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <style>
                                    .radio-buttons {
                                        width: 100%;
                                        margin: 0 auto;
                                        text-align: center;
                                    }

                                    .custom-radio input {
                                        display: none;
                                    }

                                    .radio-btn {
                                        /* margin: 10px; */
                                        width: 75px;
                                        height: 75px;
                                        border: 3px solid transparent;
                                        display: inline-block;
                                        border-radius: 5px;
                                        position: relative;
                                        text-align: center;
                                        box-shadow: 0 0 20px #c3c3c367;
                                        cursor: pointer;
                                    }

                                    .radio-btn>i {
                                        color: #ffffff;
                                        background-color: #8373e6;
                                        font-size: 20px;
                                        position: absolute;
                                        top: -15px;
                                        left: 50%;
                                        transform: translateX(-50%) scale(4);
                                        border-radius: 50px;
                                        padding: 3px;
                                        transition: 0.2s;
                                        pointer-events: none;
                                        opacity: 0;
                                    }

                                    .radio-btn .hobbies-icon {
                                        width: 80px;
                                        height: 80px;
                                        position: absolute;
                                        top: 68%;
                                        left: 50%;
                                        transform: translate(-50%, -50%);
                                    }

                                    .hobbies-icon span.material-icons {
                                        color: #ff934b;
                                    }

                                    .radio-btn .hobbies-icon i {
                                        color: #8373e6;
                                        line-height: 80px;
                                        font-size: 60px;
                                    }

                                    .radio-btn .hobbies-icon h3 {
                                        color: #ff934b;
                                        font-family: "Raleway", sans-serif;
                                        font-size: 10px;
                                        font-weight: 600;
                                        text-transform: capitalize;
                                    }

                                    .custom-radio input:checked+.radio-btn {
                                        border: 1px solid #ff934b;

                                    }



                                </style>

                            </div>
                        </div>

                       <!-- <div class="payment_box">
                         <h4>Choose Payment Method</h4>
                         <div class="row">
                           <div class="col-sm-3 text-center">
                               <div class="box_main">
                                   <label>
                                       <input type="radio" name="payment_type" value="1" checked/>
                                       <div class="back-end box">
                                           <span class="material-icons">
                                               local_atm
                                           </span><br>
                                           <span>Cash on Delivery</span>
                                       </div>
                                   </label>
                               </div>
                           </div>
                           <div class="col-sm-3 text-center">
                               <div class="box_main">
                                   <label>
                                       <input type="radio" name="payment_type" value="2"/>
                                       <div class="back-end box">
                                           <span class="material-icons">
                                               local_atm
                                           </span><br>
                                           <span>SSl Com</span>
                                       </div>
                                   </label>
                               </div>
                           </div>
                           <div class="col-sm-3 text-center">
                               <div class="box_main">
                                   <label>
                                       <input type="radio" name="payment_type" value="3"/>
                                       <div class="back-end box">
                                           <span class="material-icons">
                                               local_atm
                                           </span><br>
                                           <span>Stripe</span>
                                       </div>
                                   </label>
                               </div>
                           </div>
                           <div class="col-sm-3 text-center">
                               <div class="box_main">
                                   <label>
                                       <input type="radio" name="payment_type" value="4"/>
                                       <div class="back-end box">
                                           <span class="material-icons">
                                               local_atm
                                           </span><br>
                                           <span>PayPal</span>
                                       </div>
                                   </label>
                               </div>
                           </div>
                       </div>
                        </div> -->

                       <div class="payment_type">
                           <!-- <h4>Choose Payment Method</h4> -->
                           <div class="row">
                               <div class="col-sm-12">
                                   <div class="box_tab">
                                       <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                           <!-- <li class="nav-item">
                                               <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                   href="#pills-home" role="tab" aria-controls="pills-home"
                                                   aria-selected="true">Home Delivery</a>
                                           </li>
                                            <li class="nav-item">
                                               <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                                   href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                   aria-selected="false">PickUp</a>
                                           </li>  -->

                                       </ul>
                                       <div class="tab-content" id="pills-tabContent">
                                           <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                               aria-labelledby="pills-home-tab">
                                               <div class="row">
                                                   <div class="col-sm-12">
                                                       <div class="ship_div">
                                                           <div class="ship_icon">
                                                               <span class="material-icons">
                                                                   room
                                                               </span>
                                                           </div>
                                                           <div class="ship_t">
                                                               <h4>Shipping Address <br>
                                                                   <span>your Default Address.</span></h4>
                                                           </div>
                                                           <div class="clear"></div>
                                                           <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                           <input type="hidden" name="phone" value="{{Auth::user()->phone}}">
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="row">
                                                   <div class="col-sm-12" id="defaultaddress">
                                                           <div class="form-group">
                                                               <input type="text" name="s_name" class="form-control" value="{{Auth::user()->name}}" disabled>
                                                           </div>
                                                           <div class="form-group">
                                                               <input type="text" name="s_phone" class="form-control" value="{{Auth::user()->phone}}" disabled>
                                                           </div>
                                                           <div class="form-group">
                                                               <textarea name="s_address" class="form-control" disabled>{{Auth::user()->address}}</textarea>
                                                           </div>
                                                   </div>
                                                   <div class="col-sm-12" style="display:none" id="otheraddress">

                                                           <div class="form-group">
                                                               <input type="text" name="shipping_name" class="form-control" placeholder="Name">
                                                               @error('shipping_name')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                           </div>
                                                           <div class="form-group">
                                                               <input type="text" name="shipping_phone" class="form-control" placeholder="Mobile">
                                                               @error('shipping_phone')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                           </div>
                                                           <div class="form-group">
                                                               <textarea name="shipping_address" class="form-control" placeholder="Address"></textarea>
                                                               @error('shipping_address')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                           </div>
                                                   </div>
                                               </div>
                                               <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-check">
                                                            <input name="shipping_type" class="form-check-input checkaddress" type="checkbox" value="1" id="checkaddress">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                              If you shipping deferent address
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                               <div class="row">
                                                   <div class="col-sm-12">
                                                       <div class="del-d">
                                                           <h4>Choose Delivery Date-Time</h4>

                                                               <div class="row">
                                                                   <div class="col-sm-6">
                                                                       <input type="date" name="delevery_date" class="form-control">

                                                                   </div>
                                                                   <div class="col-sm-6">
                                                                       <div class="form-group">

                                                                           <select class="form-control" name="delevery_time">
                                                                             <option value="">select</option>
                                                                             @foreach(App\ShippingTime::get() as $time)
                                                                               <option value="{{$time->time}}">{{$time->time}}</option>
                                                                              @endforeach
                                                                           </select>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <div class="row">
                                                                   <div class="col-sm-12">
                                                                       <div class="form-group">
                                                                           <textarea name="review" class="form-control"
                                                                               rows="3"></textarea>
                                                                       </div>
                                                                       <div class="form-check">
                                                                           <input class="form-check-input" type="checkbox"  name="aggree" id="defaultCheck1">

                                                                           <label class="form-check-label" for="defaultCheck1">
                                                                               I Agree With Terms and Condition
                                                                           </label>
                                                                           @error('aggree')
                                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                            @enderror
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <div class="chk">
                                                                   <button type="submit">Checkout </button>
                                                               </div>

                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                               aria-labelledby="pills-profile-tab">Lorem ipsum dolor sit amet
                                               consectetur
                                               adipisicing elit. Ipsam repudiandae ad doloremque dolorem consectetur
                                               consequatur!</div>

                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                   </div>
                 </form>
               </div>
           </div>
       </div>
       <style>
           #checkout {
               padding: 80px 0px;
           }

           .sp_cart {
               background-color: #fff;
               border: 1px solid rgb(232 232 232);
               padding: 15px;
           }

           .sp_head h3 {
               font-size: 18px;
               text-transform: capitalize;
           }

           .msp_btn a {
               background-color: #ff8453;
               color: #fff;
               padding: 8px 15px;
           }

           .productpanel {
               margin-top: 10px;
           }

           .card-header.kin_panel h5 {
               font-size: 16px;
               position: relative;
               top: 5px;
               color: #ff8453;
           }

           .pro_title {
               float: left;
               width: 80%;
           }

           .pro_count {
               float: left;
               width: 20%;
           }

           .pro_image img {
               width: 100px !important;
               height: 70px !important;
           }

           .clear {
               clear: both;
           }

           .pro_image {
               float: left;
           }

           .pro_name {
               float: left;
           }

           .pro_name h4 {
               font-size: 15px;
               margin-left: 8px;
               position: relative;
               top: 10px;
           }

           /* .pro_count input.form-control {
               max-width: 74px;

           } */

           .pro_count span.material-icons {
               font-size: 14px;
           }

           .ac_pro {
               background-color: #fff;
           }

           .ac_pro .table td,
           .table th {
               padding: 8px;
               vertical-align: top;
               border-top: 0px solid #dee2e6 !important;
           }

           .total {
               background-color: #000;

           }

           .payment_box {
               margin-top: 20px;
           }

           .ac_pro table {
               margin-bottom: 0px !important;

           }

           .ac_main_box {
               background-color: #ffffff;
               padding: 8px;
               border: 1px solid #e4e4e4;
           }

           .total td {
               color: #fff;
               text-transform: uppercase;
           }

           .payment_box h4 {
               font-size: 16px;
               margin-bottom: 15px;
           }

           .box_main {
               background-color: #f5f5f5;
               border-radius: 4px;
               padding: 5px;
               border: 1px solid #e2e2e2;
           }

           .box_main h5 {
               color: #000;
               font-size: 12px;

               /* border-radius: 4px; */
           }

           .box_main span.material-icons {
               color: #000;

           }

           .payment_type h4 {
               font-size: 16px;
               margin-top: 12px;
               margin-bottom: 10px;
           }

           .box_tab {}

           .box_tab .nav-link {
               display: block;
               padding: 0.5rem 49px;
               font-weight: 600;
           }

           .box_tab .nav-pills .nav-link.active {
               color: #fff;
               background-color: #ff8453;
           }

           .box_tab .nav-pills .nav-link {
               border-radius: 0px !important;
           }

           .ship_icon span {
               font-size: 17px;
               color: #000;
               font-weight: 600;
           }

           .ship_icon {
               float: left;
               margin-right: 5px;
           }

           .ship_t h4 {
               font-weight: 600;
           }

           .ship_icon span.material-icons {
               position: relative;
               top: 2px;
               color: #ff8453;
           }

           .ship_t span {
               font-size: 9px;
           }

           .link_sp a {
               color: #ff8453;
               border: 1px solid #ff8453;
               padding: 5px 10px;
           }

           .link_sp {
               position: relative;
               top: 12px;
           }

           span.ap_c {
               position: absolute;
               right: 3%;
               top: 1px;
               background-color: #ff8453;
               padding: 4px 15px;
               color: #fff;
           }

           span.ap_c a {

               color: #fff;
           }

           .chk button {
               display: block;
               background-color: #ff8453;
               border-style: none;
               color: #fff;
               font-size: 18px;
               font-weight: 600;
               padding: 8px;
               width: 100%;
           }

           /*cart*/
            .cart_product img {
                -moz-border-bottom-colors: none;
                -moz-border-left-colors: none;
                -moz-border-right-colors: none;
                -moz-border-top-colors: none;
                border-color: #ececec #ececec #dcdcdc;
                border-image: none;
                border-radius: 2px;
                border-style: solid;
                border-width: 1px 1px 3px;
                box-shadow: 0 0 3px #ececec;
                float: left;
                height: auto !important;
                margin: 0px;
                object-fit: scale-down;
                width: 72px;
            }

            .cart_summary td {
                vertical-align: middle;
            }

            .cart_summary>thead,
            .cart_summary>tfoot {
                background: #f7f7f7 none repeat scroll 0 0;
            }

            .cart_summary {
                border: medium none !important;
            }

            .qty .form-control {
                border-radius: 2px !important;
                margin: 0 2px;
                text-align: center;
                width: 18px;
            }

            .qty .btn {
                background: #5a6268 none repeat scroll 0 0;
                border-radius: 2px !important;
                color: #fff;
                font-size: 23px;
                height: 33px;
                line-height: 15px;
                padding: 0;
                text-align: center !important;
                vertical-align: baseline;
                width: 27px;
            }

            .cart_description h5 {
                font-size: 15px;
                margin: 0 0 5px;
            }

            .cart_description h6 {
                font-size: 12px;
                font-weight: 100;
            }

            .availability .badge {
                font-size: 11px;
                padding: 6px 11px;
            }

            .cart-table {
                border-top: medium none;
                padding: 0;
            }

            .cart-table .table {
                margin-bottom: 0;
            }

            .cart-table .btn-secondary {
                border-radius: 0 !important;
                font-size: 16px;
                padding: 20px;
                text-transform: uppercase;
            }

            .cart_product {
                width: 10%;
            }



            .box_main {
                width: 100%;
                text-align: center;
            }

            .box_main input[type="radio"] {
                display: none;
            }

            .box_main input[type="radio"]:checked+.box {
                background-color: #ff8453;
            }

            .box_main input[type="radio"]:checked+.box span {
                color: white;

            }

            .box_main input[type="radio"]:checked+.box span:before {

                opacity: 1;
            }

            .box_main .box span {
                position: absolute;
                transform: translate(0, 60px);
                left: 4px;
                top: -37px;
                transition: all 300ms ease;
                font-size: 11px;
                font-weight: 600;
                line-height: 13px;
            }

            .box_main .box {
                width: 50px;
                height: 50px;
                background-color: #fff;
                transition: all 250ms ease;
                will-change: transition;
                display: inline-block;
                text-align: center;
                top: 5px;
                cursor: pointer;
                position: relative;
            }

            .box_main .box:active {
                transform: translateY(0px);
            }
            .box_main label {
                font-size: 13px;
                margin: 0 0 -2px;
            }
            .box_main .box {
              width: 55px;
              height: 51px;
              background-color: #fff;
              transition: all 250ms ease;
              will-change: transition;
              display: inline-block;
              text-align: center;
              top: -1px;
              right: 4px;
              cursor: pointer;
              position: relative;
          }
            .box_main .box span.material-icons {
                position: absolute;
                top: -51px;
                left: 23px;
                font-size: 14px;
                color: #9a9a9a;

            }

       </style>
   </section>


   <script>
   function increment_quantity(cart_id) {
     // alert("asif")
        var inputQuantityElement = $("#input-quantity-"+cart_id);
        var newQuantity = parseInt($(inputQuantityElement).val())+1;

        save_to_db(cart_id, newQuantity);
        getcartdatanew();
         gettotalpricedatanew();
         prescive();
         allcartmain();
   }

   function decrement_quantity(cart_id) {
        // alert("foysal")
       var inputQuantityElement = $("#input-quantity-"+cart_id);
       if($(inputQuantityElement).val() > 1)
       {
       var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
        save_to_db(cart_id, newQuantity);
       }
       getcartdatanew();
        gettotalpricedatanew();
        prescive();
        allcartmain();
   }

   function save_to_db(cart_id, new_quantity) {
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
       var inputQuantityElement = $("#input-quantity-"+cart_id);
       $.ajax({
           url : "{{ route('product.cart.update') }}",
           data : "cart_id="+cart_id+"&new_quantity="+new_quantity,
           type : 'post',
           success : function(response) {

             toastr.success("Product Quantity Changed successfully");
                // $(".input-number").val(new_quantity);
                // $(".price").val(new_price);
           }
       });
        getcartdatanew();
        gettotalpricedatanew();
        prescive();
        allcartmain();
   }

   </script>
   <script>
   function getcartdatanew(){
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });

       $.ajax({
           type: 'GET',
           url: "{{ route('get.cart.data') }}",
            // {_token: '{{ csrf_token() }}',
           success: function(data) {
               $('#cartdata').html(data);
           }
       });
   }
   getcartdatanew();

   </script>

<script>
   $(document).ready(function(){
     $("#checkaddress").click(function () {
           if ($(this).is(":checked")){
               $("#otheraddress").show();
               $("#defaultaddress").hide();
           } else{
               $("#otheraddress").hide();
               $("#defaultaddress").show();
           }
       });
   });
 </script>

 <script>
    function prescive(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          type: 'GET',
          url: "{{ route('get.prescrive.data') }}",
           // {_token: '{{ csrf_token() }}',
          success: function(data) {
              $('#prescrive').html(data);
          }
      });
    }
    prescive();

 </script>

 <script>
    function cuponApply() {
      //alert("ok");
    var cuponvalue =document.getElementById('input-coupon').value;
    //var ordervalue =document.getElementById('input_order').value;
    // alert(cuponvalue);

    $.post('{{ route('customer.apply.cupon') }}', {_token: '{{ csrf_token() }}',cuponvalue: cuponvalue},
            function(data) {
				// getCuponValue(ordervalue);
                console.log(data);

                if(data.cuponalert){
                    iziToast.success({
                        message: data.cuponalert,
                        'position':'topRight'
                    });
                    $('input-coupon').val(null);
                };
                gettotalpricedatanew();
            });

    }
</script>
<script>
function gettotalpricedatanew(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: "{{ route('get.total_price.data') }}",
         // {_token: '{{ csrf_token() }}',
        success: function(data) {
            $('#totalprice').html(data);
        }
    });
}
gettotalpricedatanew();

</script>
@endsection
