<?php

namespace App\Http\Controllers\Frontend;

use App\Checkout;
use Cart;
use App\User;
use App\Cupon;
use App\CustomarAccount;
use Carbon\Carbon;
use App\OrderPlace;
use App\DeleveryCharge;
use App\UserAddress;
use App\OrderStorage;
use App\UserUsedCupon;
use App\ProductStorage;
use App\ShippingAddress;
use App\UpozilaCouriers;
use App\Logo;
use Illuminate\Http\Request;
use App\DatabaseStorageModel;
use App\DeleveryAmount;
use App\DifferentAddress;
use App\Mail\OrderSuccessfullMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Product;
use Darryldecode\Cart\Cart as CartCart;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Library\SslCommerz\SslCommerzNotification;
use App\RefundReason;
use App\ReturnAllProduct;
use App\ReturnProduct;
use App\SmsModel;
use App\AddToCart;
use App\OrderFinal;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Stripe\Customer;
use Image;

class CheckoutController extends Controller
{
    // show checkout controller
    public function gettotalprice(Request $request){
      return "ok";

    }
    public function checkoutshow()
    {
        $userid =  \Request::getClientIp(true);
        $cartdata = Cart::session($userid)->getContent();
        if (count($cartdata) > 0) {
            if (Auth::check()) {
                $order_id = rand(1000000, 9999999);
                $useraddress = UserAddress::where('user_id', Auth::user()->id)->first();
                return view('frontend.shopping.checkout', compact('order_id', 'useraddress'));
            } else {

                return view('frontend.accounts.checkout_login');
            }
        } else {
            return redirect('/')->with('alertmessege', 'Please add some product');
        }
    }

   public function surgosuccess(){
        return "ok";
    }

    // Show Checkout Login form

    public function CustomerLogin()
    {
        return view('frontend.accounts.checkout_login');
    }



    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'login_email' => 'required',
            'login_password' => 'required',
        ]);
        // $admin = User::where('email', request('email'))->first();
        $admin = User::where('email', request('login_email'))->where('status', 1)->first();
        if ($admin) {
            if (Auth::attempt(['email' => $request->login_email, 'password' => $request->login_password])) {
                return redirect()->intended(route('checkout.page.show'));
            }
        } else {
            session()->flash('errorMsg', 'Sorry !! Email or Password not matched! or You are not verify user!');
            return redirect()->route('checkout.login.show');
        }
    }

    public function applyCupon(Request $request)
    {

      //return $request;
      if(Cupon::where('cupon_code', $request->cuponvalue)->where('status',1)->exists()){
            $cuponuser = Cupon::where('cupon_code', $request->cuponvalue)->where('status',1)->first();

           if(UserUsedCupon::where('status',1)->where('cupon_id', $cuponuser->id)->where('user_ip', Auth::user()->id)->doesntExist()) {
              if(Cupon::where('cupon_code', $request->cuponvalue)->where('status',1)->first()->cupon_type == 1){
                  $userid =  \Request::getClientIp(true);
                  $cartdata=AddToCart::where('user_ip',$userid)->get();
                  $total_price=0;
                  foreach ($cartdata as $key => $value) {
                    $total_price=$total_price+$value->product_price*$value->qty;
                  }
                  if($cuponuser->minimum_shopping <=  $total_price){
                        $insert=UserUsedCupon::insert([
                            'user_ip'=>Auth::user()->id,
                            'cupon_id'=>$cuponuser->id,
                            'order_id'=>'',
                            'status'=>0,
                            'created_at'=>Carbon::now()->toDateTimeString(),
                        ]);
                        if($insert){
                          return response()->json([
                              'cuponalert' => "Cupon insert successfully!",
                          ]);
                        }else{
                          return response()->json([
                              'cuponalert' => "Cupon Insert FAILED!",
                          ]);
                        }

                  }else{
                    return response()->json([
                        'cuponalert' => "You need More Shopping!",
                    ]);
                 }

              }else{

                $userid = \Request::getClientIp(true);
                $cartdata=AddToCart::where('user_ip',$userid)->get();

                foreach($cartdata as $val){
                    // $cuponuser = Cupon::where('cupon_code', $request->cuponvalue)->where('status',1)->first();
                      foreach( json_decode($cuponuser->product_id) as $cuponproduct) {
                          if($val->product_id == $cuponproduct){
                            $insert=UserUsedCupon::Insert([
                              'user_ip'=>Auth::user()->id,
                              'cupon_id'=>$cuponuser->id,
                              'status'=>0,
                              'created_at'=>Carbon::now()->toDateTimeString(),
                            ]);
                            return response()->json([
                                'cuponalert' => "Success used cupon",
                            ]);

                          }else{
                            return response()->json([
                                'cuponalert' => "no product in this cupon",
                            ]);
                          }
                        }
                }






              }



           }
           else{
               return response()->json([
                   'cuponalert' => "You are alrady used this cupon",
               ]);
           }

      }else{
        return response()->json([
                'cuponalert' => "No Cupon Available On this code.",
            ]);
      }


    }

    // order submit area start
  // order submit area start

    public function orderSubmit(Request $request)
    {




        // user data validation


        $validatedData = $request->validate([
            'user_id' => 'required',
            'user_address' => 'required',
            'user_post_office' => 'required',
            'user_postcode' => 'required',
            'user_country_id' => 'required',
            'user_division_id' => 'required',
            'user_district_id' => 'required',
            'user_upazila_id' => 'required',
            'privacy' => 'accepted',
            'agree' => 'accepted',
            'payment_type' => 'required',
        ]);


        // user data insert

        $usseraddress_id = UserAddress::insertGetId([
            'user_id' => $request->user_id,
            'user_address' => $request->user_address,
            'user_post_office' => $request->user_post_office,
            'user_postcode' => $request->user_postcode,
            'user_country_id' => $request->user_country_id,
            'user_division_id' => $request->user_division_id,
            'user_district_id' => $request->user_district_id,
            'user_upazila_id' => $request->user_upazila_id,
            'is_shipping_address' => $request->is_shipping_address,
            'created_at' => Carbon::now(),
        ]);


        // if user insert shipping data


        if (UserAddress::findOrFail($usseraddress_id)->is_shipping_address == NULL) {

            $request->validate([
                'shipping_name' => 'required',
                'shipping_name' => 'required',
                'shipping_phone' => 'required',
                'shipping_customer_address' => 'required',
                'shipping_post_office' => 'required',
                'shipping_postcode' => 'required',
                'shipping_country_id' => 'required',
                'shipping_division_id' => 'required',
                'shipping_district_id' => 'required',
                'shipping_upazila_id' => 'required',
            ]);

            ShippingAddress::insert([
                'shipping_user_id' => $request->shipping_user_id,
                'shipping_name' => $request->shipping_name,
                'shipping_phone' => $request->shipping_phone,
                'shipping_address' => $request->shipping_customer_address,
                'shipping_post_office' => $request->shipping_post_office,
                'shipping_postcode' => $request->shipping_postcode,
                'shipping_country_id' => $request->shipping_country_id,
                'shipping_division_id' => $request->shipping_division_id,
                'shipping_district_id' => $request->shipping_district_id,
                'shipping_upazila_id' => $request->shipping_upazila_id,
                'order_id' => $request->order_id,
                'created_at' => Carbon::now(),
            ]);
        }





        $userid =  \Request::getClientIp(true);
        $useriditem =  \Request::getClientIp(true) . '_cart_items';
        $useridcondition =  \Request::getClientIp(true) . '_cart_conditions';
        $purchase_key = DatabaseStorageModel::findOrFail($useriditem)->purchase_key;




        // get the cupon value which is insert within 2 minutes ago



        $cuponid = UserUsedCupon::where('user_ip',Auth::user()->id)->where('status',0)->orderBy('id', 'DESC')->first();

        if (isset($cuponid)) {
            $cupondata = Cupon::findOrFail($cuponid->cupon_id);
            $cupondiscount =$cupondata->discount;

            $cupondiscounttype = $cupondata->discount_type;
        }else{
            $cupondiscount = 0;
            $cupondiscounttype = 0;
        }


        // get the delevery amount

            if (UserAddress::findOrFail($usseraddress_id)->is_shipping_address == NULL) {

            $deleveryamount = DeleveryAmount::first();


            if ($request->shipping_division_id == 6) {
                $deleverycharge =$deleveryamount->insidedhaka;
                $totalprice =Cart::session(\Request::getClientIp(true))->getTotal() + $deleverycharge;
            }else{
                $deleverycharge =$deleveryamount->outsidedhaka;
                $totalprice =Cart::session(\Request::getClientIp(true))->getTotal() + $deleverycharge;
            }
        }else{
            $user_division = UserAddress::findOrFail($usseraddress_id);
            $deleveryamount = DeleveryAmount::first();
            if ($user_division->user_division_id == 6) {
                $deleverycharge =$deleveryamount->insidedhaka;
                $totalprice =Cart::session(\Request::getClientIp(true))->getTotal() + $deleverycharge;
            }else{
                $deleverycharge =$deleveryamount->outsidedhaka;
                $totalprice =Cart::session(\Request::getClientIp(true))->getTotal() + $deleverycharge;
            }

        }


        // Insert data in order place table


        $orderPlaceId = OrderPlace::insertGetId([
            'shipping_id' => $request->shipping_id,
            // 'payment_method_id' => $request->payment_method_id,

            'payment_type' => $request->payment_type,
            'comment' => $request->comment,
            'order_id' => $request->order_id,
            'user_id' => Auth::user()->id,
            'cart_id' => $purchase_key,
            'total_price' => $totalprice,
            'total_quantity' => $request->total_quantity,
            'payment_secure_id' => md5($request->order_id),
            'cupon_value' => $cupondiscount,
            'cupon_type' =>$cupondiscounttype,
            'created_at' => Carbon::now(),
        ]);



        // insert data in product storese

        $orderid = $request->order_id;

        $usercartdatas = Cart::session(\Request::getClientIp(true))->getContent();


        $products = array();

        foreach ($usercartdatas as $usercartdata) {
            $item['id'] = $usercartdata->attributes->product_id;
            $item['name'] = $usercartdata->name;
            $item['price'] = $usercartdata->price;
            $item['quantity'] = $usercartdata->quantity;
            $item['sku'] = $usercartdata->attributes->sku;
            $item['flashdeals'] = $usercartdata->attributes->flashdeals;
            $item['flashdealtype'] = $usercartdata->attributes->flashdealtype;
            array_push($products, $item);
        }

        ProductStorage::insert([
            'product_details' => json_encode($products),
            'order_id' => $orderid,
            'shipping_amount'=>$deleverycharge,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        // delete exsit userdata

        $userdetails = UserAddress::where('user_id', Auth::user()->id)->get();
        $userdatacount = count($userdetails);

        if ($userdatacount > 1) {
            $userdatas = UserAddress::where('user_id', Auth::user()->id)->first()->delete();
        }

        // delete cart data

        DatabaseStorageModel::where('id', $useriditem)->first()->delete();
        if (DatabaseStorageModel::where('id', $useridcondition)->first()) {
            DatabaseStorageModel::where('id', $useridcondition)->first()->delete();
        }

        // change status in user used cupon

        if(isset($cuponid)){
            UserUsedCupon::where('user_ip',Auth::user()->id)->where('status',0)->update([
                'status'=>1,
            ]);
        }

        $getOrder = OrderPlace::where('id', $orderPlaceId)->select(['id','order_id', 'payment_secure_id' , 'total_price', 'created_at'])->first();
        $siteSettings = DB::table('sitesetting')->select('company_name', 'address', 'facebook', 'twitter', 'instagram')->first();
        $frontLogo = Logo::select(['front_logo'])->first();
        if (Auth::user()->email) {
            Mail::to(Auth::user()->email)->send(new OrderSuccessfullMail($getOrder, $frontLogo, $siteSettings));
        }

        if ($request->payment_type == 1) {
            $notification = array(
                'messege' => 'Successfully you order is confirmed',
                'alert-type' => 'success'
            );

            return redirect()->route('customer.order')->with($notification);

        } else {
            return redirect()->route('order.payment', $getOrder->payment_secure_id);
        }

        // return OrderStorage::where('purchase_key', $purchase_key)->first()->cart_data;

    }


    public function userCountrySubmit($id)
    {

        $divisions = DB::table('divisions')->where('country_id', $id)->get();
        return response()->json($divisions);
    }

    public function userDivisionSubmit($id)
    {
        $divisions = DB::table('districts')->where('division_id', $id)->get();
        return response()->json($divisions);
    }

    public function userUpazilaSubmit($id)
    {

        $divisions = DB::table('upazilas')->where('district_id', $id)->get();
        return response()->json($divisions);
    }


    public function orderData()
    {
        $userid =  \Request::getClientIp(true);

        $usercartdatas = Cart::session($userid)->getContent();
        return view('frontend.shopping.orderajaxdata', compact('usercartdatas'));
    }

    public function orderDataUpdate(Request $request)
    {
        $userid =  \Request::getClientIp(true);
        $updatecart = Cart::session($userid)->update(
            $request->rowid,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity,
                ),
            )
        );

        if ($updatecart) {
            $userid =  \Request::getClientIp(true);
            $usercartdatas = Cart::session($userid)->getContent();
            // return view('frontend.shopping.cartajaxdata', compact('usercartdatas'));
            return view('frontend.shopping.orderajaxdata', compact('usercartdatas'));
        } else {
            return 0;
        }
    }

    // Order Place delete
    public function orderDataDelete(Request $request)
    {
        $userid =  \Request::getClientIp(true);
        $datadelete = Cart::session($userid)->remove($request->user_id);
        $usercartdatas = Cart::session($userid)->getContent();
        return view('frontend.shopping.orderajaxdata', compact('usercartdatas'));
    }

    public function getCourierByUpazila($upazilaId)
    {
        $getCourierIdByUpId =  UpozilaCouriers::where('upazila_id', $upazilaId)->get();
        return view('frontend.shopping.ajax_view.couriers', compact('getCourierIdByUpId'));
    }

    // paypal add
    public function paywithpaypal()
    {
        $provider = new ExpressCheckout;
        $invoiceId = uniqid();
         $data = $this->cartData($invoiceId);
        //$provider->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data);
        return $response;
        return redirect($response['paypal_link']);
    }



    public function paymentsuccess(Request $request)
    {

        $provider = new ExpressCheckout;
        $token = $request->token;
        $PayerID = $request->PayerID;
        $response = $provider->getExpressCheckoutDetails($token);
        $invoiceId = $response['INVNUM'] ?? uniqid();
        $data = $this->cartData($invoiceId);
        $response = $provider->doExpressCheckoutPayment($data, $token, $PayerID);
        //dd($response);
        $userid = Auth::user()->id;
        $usercartdatas = OrderPlace::where('user_id', $userid)->orderBy('id', 'DESC')->first();
        $update = OrderPlace::where('id', $usercartdatas->id)->update([
            'is_paid' => '1',
        ]);
        return redirect()->route('payment.paypal.success');
    }

    protected function cartData($invoiceId)
    {
        $data = [];
        $data['items'] = [];
        // $userid =  \Request::getClientIp(true);
        // $usercartdatas = Cart::session($userid)->getContent();
        $userid = Auth::user()->id;
        $usercartdatas = OrderPlace::where('user_id', $userid)->orderBy('id', 'DESC')->first();
        $cartid = $usercartdatas->order_id;

        $orderstorage = Checkout::where('orderid', $cartid)->first();



        foreach ($orderstorage->products as $key => $cart) {
            $itemdetails = [
                'name' => $cart->name,
                'price' => $cart->price,
                'qty' => $cart->quantity,
            ];
            $data['items'][] = $itemdetails;
        }

        $data['invoice_id'] = $usercartdatas->order_id;
        $data['invoice_description'] = $usercartdatas->order_id;
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/text');

        $total = 0;
        $shipping = 0;

        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
        $data['total'] = $total;
        return $data;
    }

    public function applyCuponValue($oderid)
    {

        // $userusedcupon = UserUsedCupon::where('order_id', $oderid)->where('user_ip', Auth::user()->id)->first();
        $userusedcupon = UserUsedCupon::where('user_ip', Auth::user()->id)->first();

        $cupon = Cupon::findOrFail($userusedcupon->cupon_id);




        return view('frontend.include.ajaxview.cart_total_amount', compact('cupon'));
    }

    public function checkCourierCashOnDeliviry($upazila_id, $courier_id)
    {
        $courier = UpozilaCouriers::where('upazila_id', $upazila_id)->where('courier_id', $courier_id)->first();
        return response()->json(['data' => $courier->is_cash_on_delivery]);
    }

     // get shipping charge value

     public function shippingChargeValue($id)
     {
         $deleveryamount =DeleveryAmount::first();
         $userid =  \Request::getClientIp(true);

         $usercartdatas = Cart::session($userid)->getContent();

         if($id == 6){
             $deleverycharge =$deleveryamount ->insidedhaka;
         }else{
             $deleverycharge =$deleveryamount ->outsidedhaka;
         }


         return view('frontend.shopping.extra_orderajaxdata', compact('deleverycharge','usercartdatas'));

     }




     // send shipping value to the input field

     public function shippingChargeValueSend($id)

     {
         $deleveryamount =DeleveryAmount::first();
         $userid =  \Request::getClientIp(true);
         $usercartdatas = Cart::session($userid)->getContent();

         if($id == 6){
             $deleverycharge =$deleveryamount ->insidedhaka;
         }else{
             $deleverycharge =$deleveryamount ->outsidedhaka;
         }
         $totalpricewithcharge =Cart::session(\Request::getClientIp(true))->getTotal() + $deleverycharge;

         return response()->json([
             'deleverycharge'=>$deleverycharge,
             'totalpricewithcharge'=>$totalpricewithcharge,
         ]);
     }




    //  shipping address
    public function checkoutPage()
    {
        if(Auth::user()->name==NULL || Auth::user()->address == NULL){
          $notification = array(
              'messege' => 'Please Enter Your Default Address First!!!!',
              'alert-type' => 'error'
          );

          return redirect()->route('customar.address.page')->with($notification);
        }else{
          $username = Auth::user()->name;
          $ip_address =  \Request::getClientIp(true);
          $userid = Auth::user()->id;
          $user = Auth::user();
          $invoic_id = rand(6666,99999);
          $total_price=0;
          $allproduct =AddToCart::where('user_ip',$ip_address)->get();
          $allquantity =AddToCart::where('user_ip',$ip_address)->sum('qty');
          // return $allquantity;
          foreach ($allproduct as $key => $pro) {
            $total_price= $total_price+ $pro->product_price * $pro->qty;
          }

          return view('frontend.shipping.checkout',compact('invoic_id','total_price','allquantity','userid','user'));
        }

    }




     public function customarDataCreate(Request $request)
     {
       // return $request;

       $validatedData = $request->validate([
           'aggree' => 'required',
       ]);


        $ip_address =  \Request::getClientIp(true);
        $items = AddToCart::where('user_ip',$ip_address)->get();
         if(count($items) == 0){
             $notification = array(
                 'messege' => 'Please add some products!',
                 'alert-type' =>'success'
             );
             return redirect('/')->with($notification);
         }

        $usercartdatas = AddToCart::where('user_ip',$ip_address)->get();
        $checkprescrive = AddToCart::where('user_ip',$ip_address)->where('product_type',2)->where('grug_type',2)->first();
        $products = array();
        foreach ($usercartdatas as $usercartdata) {
            $itemall['id'] = $usercartdata->product_id;
            $itemall['name'] = $usercartdata->product_name;
            $itemall['price'] = $usercartdata->product_price;
            $itemall['quantity'] = $usercartdata->qty;
            $itemall['sku'] = $usercartdata->sku;
            $itemall['image'] = $usercartdata->image;
            array_push($products, $itemall);
        }
         $invoice=rand(66666,100000);
         $data = new OrderFinal;
         $data->user_id = $request->user_id;
         $data->invoice_id = $invoice;
         $data->total_price = $request->total_price;
         $data->total_quantity = $request->total_quantity;
         $data->payment_type = $request->payment_type;
         $data->shipping_type = $request->shipping_type;

         $data->delevery_charge = $request->delevery_amount;
         $data->order_device = 1;

         if($request->shipping_type==1){
           $validatedData = $request->validate([
               'shipping_address' => 'required',
               'shipping_phone' => 'required',
               'shipping_name' => 'required',
           ]);
           $data->shipping_address = $request->shipping_address;
           $data->shipping_phone = $request->shipping_phone;
           $data->shipping_name = $request->shipping_name;
         }else{
           $data->shipping_address =auth::user()->address;
           $data->shipping_phone = auth::user()->phone;
           $data->shipping_name = auth::user()->name;
         }
        $data->dalevary = 0;
        $data->delevery_time = $request->delevery_time;
        $data->delevery_date = $request->delevery_date;
        $data->payment_status = 0;
        $data->payment_secoure_id = md5($invoice);
        $data->product = json_encode($products);
        $data->phone = $request->phone;
        $data->review = $request->review;

        if($checkprescrive){
          if ($request->hasFile('gragfile')) {
              $image = $request->file('gragfile');
              $ImageName = 'th'.'_'.time() . '.' .$image->getClientOriginalExtension();
              Image::make($image)->resize(300, 300)->save('public/uploads/prescrive/' . $ImageName);
              $data->gragfile = $ImageName;
          }
        }
        // $numsell = Product::where('is_deleted',1)->where('status',1)->get();
        // foreach($numsell as $sell){
        //   foreach($items as $row){
        //     if($row->product_id == $sell->id){
        //       Product::where('id',$sell->id)->update([
        //         'number_of_sale'=> $sell->number_of_sale + $row->qty,
        //       ]);
        //     }
        //
        //   }
        // }

         foreach($items as $row){

           AddToCart::findOrFail($row->id)->delete();
         }

         if($request->payment_type==1){
           $counupdate=UserUsedCupon::where('user_ip',Auth::user()->id)->get();
           foreach($counupdate as $cup){
             UserUsedCupon::where('id',$cup->id)->update([
               'status'=>1,
             ]);
           }
           $this->checkoutSMS($request,$invoice);
           $data->save();
           $notification = array(
               'messege' => 'Insert Successfully',
               'alert-type' => 'success'
           );
             return redirect()->route('cashon.success',$invoice)->with($notification);
         }elseif($request->payment_type==2){
           $counupdate=UserUsedCupon::where('user_ip',Auth::user()->id)->get();
           foreach($counupdate as $cup){
             UserUsedCupon::where('id',$cup->id)->update([
               'status'=>1,
             ]);
           }
            $this->checkoutSMS($request,$invoice);
            $data->save();
            $post_data = array();
            $post_data['store_id'] = env('SSLCOMMERZ_STORE_ID');
            $post_data['store_passwd'] = env('SSLCOMMERZ_STORE_PASSWORD');
            $post_data['total_amount'] = $request->total_price;
            $post_data['currency'] = "BDT";
            // $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
            $post_data['tran_id'] = $invoice;
            $post_data['success_url'] = url('payment/ssl_commercez/success');
            $post_data['fail_url'] = url('payment/ssl_commercez/fail');
            $post_data['cancel_url'] = url('payment/ssl_commercez/cancel');
            # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

            # EMI INFO
            // $post_data['emi_option'] = "1";
            // $post_data['emi_max_inst_option'] = "9";
            // $post_data['emi_selected_inst'] = "9";

            # CUSTOMER INFORMATION
            $post_data['cus_name'] = Auth::user()->name;
            $post_data['cus_email'] = Auth::user()->email ? Auth::user()->email : NULL;
            $post_data['cus_add1'] = "";
            // $post_data['cus_add2'] = "Dhaka";
            //$post_data['cus_city'] = DB::table('divisions')->where('id', $request->user_division_id)->select('name')->first()->name;
            $post_data['cus_state'] = "Dhaka";
            $post_data['cus_postcode'] = "1216";
            $post_data['cus_country'] = "Bangladesh";
            $post_data['cus_phone'] = Auth::user()->phone;
            //$post_data['cus_fax'] = "01711111111";


                $post_data['ship_name'] = Auth::user()->username;
                $post_data['ship_add1 '] = "panana";
                $post_data['ship_state'] = "raj";
                $post_data['ship_postcode'] = "1216";
                $post_data['ship_country'] = "bangladesh";

            $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";
            $handle = curl_init();
            curl_setopt($handle, CURLOPT_URL, $direct_api_url);
            curl_setopt($handle, CURLOPT_TIMEOUT, 30);
            curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
            curl_setopt($handle, CURLOPT_POST, 1);
            curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


            $content = curl_exec($handle);
            $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            if ($code == 200 && !(curl_errno($handle))) {
                curl_close($handle);
                $sslcommerzResponse = $content;

            } else {
                curl_close($handle);
                echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
                exit;
            }

            # PARSE THE JSON RESPONSE
            $sslcz = json_decode($sslcommerzResponse, true);

            if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
                # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
                # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
                echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
                # header("Location: ". $sslcz['GatewayPageURL']);
                exit;
            } else {
                echo "JSON Data parsing error!";
            }
          }
        }



     public function cashonsuccess($orderid){

       return view('frontend.shipping.offlinepaymentsuccess',compact('orderid'));
     }

    //  checkout sms send

    public function checkoutSMS($request,$invoice)
    {

            $useraddr =User::where('id',auth()->user()->id)->first();
            $phone = $useraddr->phone;
            $name = $useraddr->name;



        $siteUrl = URL::to("/");
        $sms_text = 'Dear ' .$name . " Successfully Your order is compleated.Your Order ID is: " . $invoice . ' For More info,visite our site. ' . $siteUrl;
        $smsinfo =SmsModel::first();
        $smsurl =$smsinfo->sms_url;
        $smsname =$smsinfo->sms_username; #durbar2020
        $smspassword =$smsinfo->sms_password; #12345678

        $postData = array(
            'username'=>urlencode($smsname),
            'password'=>urlencode($smspassword),
            'sms_content'=>$sms_text,
            'number'=>urlencode($phone),
            'sms_type'=>1,

        );

        $ch = curl_init();
            curl_setopt_array($ch, array(
            CURLOPT_URL => $smsurl,
             CURLOPT_URL => 'http://gosms.xyz/api/v1/sendSms',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_FOLLOWLOCATION => true
            ));

            return $output = curl_exec($ch);
    }



    //  checkout data create

    public function checkoutDataCreate($request, $id =Null)
    {
        $items = \Cart::session(\Request::getClientIp(true))->getContent();
        $checkout =new Checkout;
        $checkout->userid = auth()->user()->id;
        if($request->diff_addr == 1){
            $checkout->diffaddr_id = $id;
        }




        $data = array();
        foreach($items as $item){

            $productdetails = Product::findOrFail($item->attributes->product_id);

            $sizename = [];
            foreach (json_decode($productdetails->choice_options) as $key => $choice) {



                $size = $choice->title; //this reaturn size,model

                array_push($sizename, $size);
            }

            $sizecount = count($sizename);

            if($sizecount == 0){


                $product['id']=$item->id;
                $product['name']=$item->name;
                $product['price']=$item->price;
                $product['quantity']=$item->quantity;
                $product['thumbnail_img']=$item->attributes->thumbnail_img;
                $product['colors']=$item->attributes->colors;
                $product['product_id']=$item->attributes->product_id;
                $product['sku']=$item->attributes->sku;
                $product['flashdeals']=$item->attributes->flashdeals;
                $product['flashdealtype']=$item->attributes->flashdealtype;
                $product['return_product']=0;
                $item['approve_product']=0;
                array_push($data, $product);
            }

            if($sizecount == 1){

                $attibute = $sizename[0];

                $product['id']=$item->id;
                $product['name']=$item->name;
                $product['price']=$item->price;
                $product['quantity']=$item->quantity;
                $product['thumbnail_img']=$item->attributes->thumbnail_img;
                $product['colors']=$item->attributes->colors;
                $product['product_id']=$item->attributes->product_id;
                $product['sku']=$item->attributes->sku;
                $product['flashdeals']=$item->attributes->flashdeals;
                $product['flashdealtype']=$item->attributes->flashdealtype;
                $product[$attibute]=$item->attributes->$attibute;
                $product['return_product']=0;
                $item['approve_product']=0;
                array_push($data, $product);


            }elseif($sizecount == 2){
                $attibuteone = $sizename[0];
                $attibutetwo = $sizename[1];

                $product['id']=$item->id;
                $product['name']=$item->name;
                $product['price']=$item->price;
                $product['quantity']=$item->quantity;
                $product['thumbnail_img']=$item->attributes->thumbnail_img;
                $product['colors']=$item->attributes->colors;
                $product['product_id']=$item->attributes->product_id;
                $product['sku']=$item->attributes->sku;
                $product['flashdeals']=$item->attributes->flashdeals;
                $product['flashdealtype']=$item->attributes->flashdealtype;
                $product[$attibuteone]=$item->attributes->$attibuteone;
                $product[$attibutetwo]=$item->attributes->$attibutetwo;
                $product['return_product']=0;
                $item['approve_product']=0;
                array_push($data, $product);
            }elseif($sizecount == 3){
                $attibuteone = $sizename[0];
                $attibutetwo = $sizename[1];
                $attibutethree = $sizename[2];

                $product['id']=$item->id;
                $product['name']=$item->name;
                $product['price']=$item->price;
                $product['quantity']=$item->quantity;
                $product['thumbnail_img']=$item->attributes->thumbnail_img;
                $product['colors']=$item->attributes->colors;
                $product['product_id']=$item->attributes->product_id;
                $product['sku']=$item->attributes->sku;
                $product['flashdeals']=$item->attributes->flashdeals;
                $product['flashdealtype']=$item->attributes->flashdealtype;
                $product[$attibuteone]=$item->attributes->$attibuteone;
                $product[$attibutetwo]=$item->attributes->$attibutetwo;
                $product[$attibutethree]=$item->attributes->$attibutethree;
                $product['return_product']=0;
                $item['approve_product']=0;
                array_push($data, $product);
            }elseif($sizecount == 4){
                $attibuteone = $sizename[0];
                $attibutetwo = $sizename[1];
                $attibutethree = $sizename[2];
                $attibutefour = $sizename[3];

                $product['id']=$item->id;
                $product['name']=$item->name;
                $product['price']=$item->price;
                $product['quantity']=$item->quantity;
                $product['thumbnail_img']=$item->attributes->thumbnail_img;
                $product['colors']=$item->attributes->colors;
                $product['product_id']=$item->attributes->product_id;
                $product['sku']=$item->attributes->sku;
                $product['flashdeals']=$item->attributes->flashdeals;
                $product['flashdealtype']=$item->attributes->flashdealtype;
                $product[$attibuteone]=$item->attributes->$attibuteone;
                $product[$attibutetwo]=$item->attributes->$attibutetwo;
                $product[$attibutethree]=$item->attributes->$attibutethree;
                $product[$attibutefour]=$item->attributes->$attibutefour;
                $product['return_product']=0;
                $item['approve_product']=0;
                array_push($data, $product);
            }elseif($sizecount == 4){
                $attibuteone = $sizename[0];
                $attibutetwo = $sizename[1];
                $attibutethree = $sizename[2];
                $attibutefour = $sizename[3];
                $attibutefive = $sizename[4];

                $product['id']=$item->id;
                $product['name']=$item->name;
                $product['price']=$item->price;
                $product['quantity']=$item->quantity;
                $product['thumbnail_img']=$item->attributes->thumbnail_img;
                $product['colors']=$item->attributes->colors;
                $product['product_id']=$item->attributes->product_id;
                $product['sku']=$item->attributes->sku;
                $product['flashdeals']=$item->attributes->flashdeals;
                $product['flashdealtype']=$item->attributes->flashdealtype;
                $product[$attibuteone]=$item->attributes->$attibuteone;
                $product[$attibutetwo]=$item->attributes->$attibutetwo;
                $product[$attibutethree]=$item->attributes->$attibutethree;
                $product[$attibutefive]=$item->attributes->$attibutefive;
                $product['return_product']=0;
                $item['approve_product']=0;
                array_push($data, $product);
            }
        }

        // loop end

        $checkout->products = json_encode($data);
        $checkout->orderid = auth()->user()->order_id;
        $checkout->save();

        // return $checkout;
        return $checkout;


    }


    // order place function

    public function orderPlace($request,$checkout)
    {

        $shipping_id = rand(6666,99999);
        $token = Str::random(60);

        $orderplace =OrderPlace::create([
            'shipping_id'=>$shipping_id,
            'payment_type'=>$request->payment_type,
            'order_id'=>auth()->user()->order_id,
            'user_id'=>auth()->user()->id,
            'checkout_id'=>$checkout->id,
            'total_price'=>Cart::session(\Request::getClientIp(true))->getTotal(),
            'total_quantity'=>Cart::session(\Request::getClientIp(true))->getTotalQuantity(),
            'is_paid'=>0,
            'payment_secure_id'=>$token,
            'delevary'=>0,
            'payment_status'=>0,
            'cupon_value'=>0,
            'cupon_type'=>0,
            'created_at' => Carbon::now(),
        ]);

        return $orderplace;

    }

    // online payment page

    public function onlinePaymentPage ($order_id,$secure_id)
    {
      $orderPlace = OrderPlace::where('user_id', Auth::user()->id)->where('payment_secure_id', $secure_id)->where('order_id',$order_id)->first();
        abort_if(!$orderPlace, 403);

        $cartdata =Checkout::where('orderid',$order_id)->first();
        $coupon = UserUsedCupon::where('order_id',$order_id)->first();
        if($coupon){
            $coupon_id = $coupon->cupon_id;
            $coupon = Cupon::findOrFail($coupon_id);
        }else{
            $coupon = false;
        }

        $address = DifferentAddress::where('orderid',$orderPlace->order_id)->first();

        if($address){
            return view('frontend.payment.payment',compact('orderPlace','address','cartdata','coupon'));
        }else{

            $address =CustomarAccount::where('userid',auth()->user()->id)->first();
            return view('frontend.payment.payment',compact('orderPlace','address','cartdata','coupon'));
        }
    }

    // get total amount

    public function getCartTotalAmount()
    {

        $userid = \Request::ip();
        $totalprice=AddToCart::where('user_ip',$userid)->get();
        $total=0;
        foreach ($totalprice as $key => $value) {
          $total +=$value->qty*$value->product_price;
        }
        return view('frontend.include.ajaxview.total_amount_autoload',compact('total'));
    }


    // offline payment area



    public function offlinePaymentPage($order_id ,$secure_id)
    {



        $orderPlace = OrderPlace::where('user_id', Auth::user()->id)->where('payment_secure_id', $secure_id)->where('order_id',$order_id)->first();
        abort_if(!$orderPlace, 403);

        $cartdata =Checkout::where('orderid',$order_id)->first();
        $coupon = UserUsedCupon::where('order_id',$order_id)->first();
        if($coupon){
            $coupon_id = $coupon->cupon_id;
            $coupon = Cupon::findOrFail($coupon_id);
        }else{
            $coupon = false;
        }


        $address = DifferentAddress::where('orderid',$orderPlace->order_id)->first();

        if($address){
            return view('frontend.shipping.invoices_details',compact('orderPlace','address','cartdata','coupon','secure_id'));

        }else{

            $address =CustomarAccount::where('userid',auth()->user()->id)->first();

            return view('frontend.shipping.invoices_details',compact('orderPlace','address','cartdata','coupon','secure_id'));
        }



    }

    // Customar invoice show

    public function customarInvoiceShow($userid)
    {


        $allorder = $orders = OrderPlace::where('user_id',auth()->user()->id)->get();
        foreach($allorder as $order){
            $checkoutdata =Checkout::where('orderid',$order->order_id)->where('userid',auth()->user()->id)->first();
            if($checkoutdata){
                if($checkoutdata->products == NULL){
                    $deletedorder =OrderPlace::where('user_id',auth()->user()->id)->where('order_id',$order->order_id)->first();
                    if($deletedorder){
                        $deletedorder->delete();
                    }
                }
            }
        }
        $orders = OrderPlace::where('user_id',auth()->user()->id)->orderBy('id', 'desc')->simplePaginate(7);
        return view('frontend.shipping.invoices',compact('orders'));
    }


    // invoice cancel

    public function invoiceCancel ($orderid)
    {
        $orders = OrderPlace::where('order_id',$orderid)->first();
        if($orders){
            $orders->delete();
        }

        $notification = array(
            'messege' => 'Order Cancel',
            'alert-type' => 'faild'
        );

        return back()->with($notification);
    }


    // customar invoice details show

    public function invoiceShow($order_id)
    {
        // return "ok";
        $orderPlace = OrderFinal::where('user_id', Auth::user()->id)->where('id',$order_id)->first();
        return view('frontend.shipping.invoice_details_show',compact('orderPlace'));


    }

    // customar product return
    // $orderid,$name,$id
    public function productReturn(Request $request)
    {


        $orderid = $request->orderid;
        $name = $request->name;
        $id = $request->id;

       $allproducts = Checkout::where('orderid',$orderid)->where('userid',auth()->user()->id)->first();
        abort_if(!$allproducts, 403);

        RefundReason::insert([
            'product_id'=>$id,
            'user_id'=>auth()->user()->id,
            'order_id'=>$orderid,
            'refund_reason'=>$request->refund_reason_,
            'created_at'=>Carbon::now(),
        ]);

        $totalprice=0;
        $quantity=0;
       $products =$allproducts->products;
       $productpush = [];
       foreach($products as  &$value){
           if($value->id == $id){
            $item = array();
            $item['id']=$value->id;
            $item['name']=$value->name;
            $item['name']=$value->name;
            $item['price']=$value->price;
            $item['quantity']=$value->quantity;
            $item['thumbnail_img']=$value->thumbnail_img;
            $item['colors']=$value->colors;
            $item['product_id']=$value->product_id;
            $item['sku']=$value->sku;
            $item['sku']=$value->sku;
            $item['flashdeals']=$value->flashdeals;
            $item['flashdealtype']=$value->flashdealtype;
            $item['return_product']=1;
            $item['approve_product']=0;

            $totalprice .=$value->price;
            $quantity .=$value->quantity;
            // NEW ACTION AREA START


             // store attibute name
             $sizename = [];

             $productdetails = Product::findOrFail($value->product_id);
             foreach (json_decode($productdetails->choice_options) as $key => $choice) {


                $size = $choice->title; //this reaturn size,model
                array_push($sizename, $size);
            }
            $rowcount = count($sizename);

            if($rowcount == 1){
                $sizeone =$sizename[0];
                $item[$sizeone]=$value->$sizeone;
            }elseif($rowcount == 2){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
            }elseif($rowcount == 3){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
            }elseif($rowcount == 4){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $sizefour =$sizename[3];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
                $item[$sizefour]=$value->$sizefour;
            }elseif($rowcount == 5){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $sizefour =$sizename[3];
                $sizefive =$sizename[4];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
                $item[$sizefour]=$value->$sizefour;
                $item[$sizefive]=$value->$sizefive;
            }


            // NEW ACTION AREA END
            array_push($productpush,$item);

           }else{
            $item = array();
            $item['id']=$value->id;
            $item['name']=$value->name;
            $item['name']=$value->name;
            $item['price']=$value->price;
            $item['quantity']=$value->quantity;
            $item['thumbnail_img']=$value->thumbnail_img;
            $item['colors']=$value->colors;
            $item['product_id']=$value->product_id;
            $item['sku']=$value->sku;
            $item['sku']=$value->sku;
            $item['flashdeals']=$value->flashdeals;
            $item['flashdealtype']=$value->flashdealtype;
            $item['return_product']=$value->return_product;
            $item['approve_product']=0;

            // NEW ACTION AREA START


             // store attibute name
             $sizename = [];

             $productdetails = Product::findOrFail($value->product_id);
             foreach (json_decode($productdetails->choice_options) as $key => $choice) {


                $size = $choice->title; //this reaturn size,model
                array_push($sizename, $size);
            }
            $rowcount = count($sizename);

            if($rowcount == 1){
                $sizeone =$sizename[0];
                $item[$sizeone]=$value->$sizeone;
            }elseif($rowcount == 2){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
            }elseif($rowcount == 3){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
            }elseif($rowcount == 4){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $sizefour =$sizename[3];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
                $item[$sizefour]=$value->$sizefour;
            }elseif($rowcount == 5){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $sizefour =$sizename[3];
                $sizefive =$sizename[4];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
                $item[$sizefour]=$value->$sizefour;
                $item[$sizefive]=$value->$sizefive;
            }


            // NEW ACTION AREA END
            array_push($productpush,$item);
           }


       }

       $allproducts->update([
           'products'=>$productpush,
       ]);

        $returnProduct =ReturnProduct::where('orderrid',$orderid)->first();
        if($returnProduct){
            $returnProduct->update([
                'orderrid'=>$orderid,
                'user_id'=>auth()->user()->id,
                'created_at'=>Carbon::now(),
            ]);
            $returnProduct->increment('price', $totalprice);
            $returnProduct->increment('quantity', $quantity);
        }else{
            ReturnProduct::insert([
                'orderrid'=>$orderid,
                'user_id'=>auth()->user()->id,
                'price'=>$totalprice,
                'quantity'=>$quantity,
                'created_at'=>Carbon::now(),
            ]);
        }


        $notification = array(
            'messege' => 'Successfully Products Return! This Product is waiting for approval by Admin',
            'alert-type' => 'success'
        );
        return redirect()->route('customar.invoice.show.details',$orderid)->with($notification);


    }

    public function invoicePayNow($order_id)
    {
        $order=OrderPlace::where('order_id',$order_id)->where('user_id',auth()->user()->id)->first();
        abort_if(!$order, 403);
        return redirect()->route('order.payment', [$order_id ,$order->payment_secure_id]);
    }


    public function customarProductReturnShow ($id)
    {
         $pronotapprove = Checkout::where('userid',$id)->select(['products','orderid','created_at'])->get();
         $order=OrderPlace::where('user_id',$id)->get();
         $returnapprovepro=ReturnAllProduct::where('user_id',$id)->get();
         if($returnapprovepro){
            return view('frontend.shipping.return_product',compact('pronotapprove','returnapprovepro'));
         }else{
             $returnapprovepro =[];
            return view('frontend.shipping.return_product',compact('pronotapprove','returnapprovepro'));
         }

    }

    //
    public function checkoutPagetwo(){
      return view('frontend.shipping.checkout2');
    }

    public function prescrivedata(){
      $userip =  \Request::getClientIp(true);
      $alldata=AddToCart::where('user_ip',$userip)->orderBy('id','DESC')->where('product_type',2)->where('grug_type',2)->first();
      if($alldata){
          return view('frontend.include.ajaxview.prescrive');
      }else{
        echo "";
      }

    }





}
