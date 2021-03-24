<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\OrderPlace;
use App\OrderStorage;
use App\ShippingAddress;
use App\UserAddress;
use App\ProductStorage;
use Stripe\Charge;
use Stripe\Stripe;
use App\Logo;
use App\PaymentDetail;
use App\Mail\PaymentSuccessMail;
use Illuminate\Support\Facades\DB;
use Stripe\Exception\CardException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;
use Illuminate\Foundation\Console\Presets\React;
use Cart;
use PayPal;

class MobilePaymentController extends Controller
{

    public function mobileStripePaymentPage($payment_secure_id)
    {
        $orderInfo = OrderPlace::where('user_id', Auth::user()->id)->where('payment_secure_id', $payment_secure_id)->firstOrFail();
        if ($orderInfo) {
            return view('mobile.shopping.stripe_payment.stripe_payment_page', compact('orderInfo'));
        }
    }

    public function mobileStripePaymentSubmit(Request $request, $payment_secure_id)
    {
        date_default_timezone_set('Asia/Dhaka');
        $getPlaceOrder = OrderPlace::where('payment_secure_id', $payment_secure_id)->first();
        abort_if(!$getPlaceOrder, 403);
        $this->validate($request, [
            'holder_name' => 'required',
        ]);

        try {

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge =  Charge::create([
                "amount" => $request->total_price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => Auth::user()->email,
                'metadata' => [
                    'quantity' => $request->total_quantity,
                    'total_payable' => $request->total_price,
                    'invoice_no' => $request->invoice_no,
                ],
            ]);

            if ($charge->status === "succeeded") {
                $sources = $charge->source;
                PaymentDetail::insert([
                    'provider_name' => 'Stripe',
                    'card_id' => $sources->id,
                    'order_place_id' => $getPlaceOrder->id,
                    'date' => date('d/m/Y'),
                    'time' => date('h:i:s'),
                    'address_zip' => $sources->address_zip,
                    'card_brand' => $sources->brand,
                    'country' => $sources->country,
                    'funding' => $sources->funding,
                    'last_four_digits' => $sources->last4,
                    'card_holder_name' => $sources->name,
                    'expire_month' => $sources->exp_month,
                    'expire_year' => $sources->exp_year,
                    'currency_type' => $charge->currency,
                    'pay_amount' => $charge->amount,
                ]);

                OrderPlace::where('id', $request->order_id)->update([
                    'status' => 1,
                    'is_paid' => 1,
                    'payment_method_id' => 2,
                ]);
                $placeOrder = OrderPlace::where('payment_secure_id', $payment_secure_id)->first();
                if (Auth::user()->email) {
                    $siteSettings = DB::table('sitesetting')
                    ->select('company_name', 'address', 'facebook', 'twitter', 'instagram')->first();

                $frontLogo = Logo::select(['front_logo'])->first();
                   $userAddress = UserAddress::where('user_id', $placeOrder->user_id)->select('user_address')->first();
                $shippingAddress = ShippingAddress::where('shipping_user_id', $placeOrder->user_id)
                                        ->where('order_id', $placeOrder->order_id)
                                        ->select('shipping_address')
                                        ->first();
                    Mail::to(Auth::user()->email)
                    ->send(new PaymentSuccessMail($placeOrder, $frontLogo, $siteSettings, $userAddress, $shippingAddress));
                }

                OrderPlace::where('id', $request->order_id)->update([
                    'payment_secure_id' => null
                ]);
            }

            session()->flash('success', 'Thank you, Successfully payment accepted');
            return view('mobile.shopping.paypalsuccess');

        } catch (CardException $e) {
            return Redirect::refresh()->withErrors(['error', $e->getMessage()]);
        }

    }

  public function paymentPage($paymentSecureId)
  {
      $orderPlace = OrderPlace::where('user_id', Auth::user()->id)->where('payment_secure_id', $paymentSecureId)->first();
      abort_if(!$orderPlace, 403);
      $orderProducts = ProductStorage::where('order_id', $orderPlace->order_id)->first();
      $address = '';
      $shippingAddress = ShippingAddress::where('order_id', $orderPlace->order_id)
                          ->where('shipping_user_id', Auth::user()->id)
                          ->select('shipping_address')
                          ->first();
      if ($shippingAddress) {
          $address = $shippingAddress->shipping_address;
      }else{
          $userAddress = UserAddress::where('user_id', Auth::user()->id)->select('user_address')->first();
          $address = $userAddress->user_address;
      }
      return view('mobile.shopping.payment', compact('orderPlace', 'orderProducts', 'address'));
  }

  public function makePayment(Request $request)
  {
    //return $request->payment_secure_id;

      if (!$request->payment_method_id) {
          $notification = array(
              'messege' => 'Select a payment method',
              'alert-type' => 'warning'
          );
          return redirect()->back()->with($notification);
      }
      $getOrderInfo = OrderPlace::where('user_id', Auth::user()->id)
          ->where('order_id', $request->order_id)
          ->where('payment_secure_id', $request->payment_secure_id)
          ->firstOrFail();
      $userAddress = UserAddress::where('user_id', Auth::user()->id)->first();
      $shippingAddress = ShippingAddress::where('shipping_user_id', Auth::user()->id)->where('order_id', $request->order_id)->first();

      if($request->payment_method_id == 2) {
          return redirect()->route('mobile.stripe.payment', $getOrderInfo->payment_secure_id);
      }elseif($request->payment_method_id == 3){
          return redirect()->route('payment.paypal');
      }elseif($request->payment_method_id == 4) {
          /* PHP */
          $post_data = array();
          $post_data['store_id'] = env('SSLCOMMERZ_STORE_ID');
          $post_data['store_passwd'] = env('SSLCOMMERZ_STORE_PASSWORD');
          $post_data['total_amount'] = $getOrderInfo->total_price;
          $post_data['currency'] = "BDT";
          // $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
          $post_data['tran_id'] = $getOrderInfo->order_id;
          $post_data['success_url'] = url('payment/ssl_commercez/success');
          $post_data['fail_url'] = url('payment/ssl_commercez/fail');
          $post_data['cancel_url'] = url('payment/ssl_commercez/cancel');
          # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

          # EMI INFO
          // $post_data['emi_option'] = "1";
          // $post_data['emi_max_inst_option'] = "9";
          // $post_data['emi_selected_inst'] = "9";

          # CUSTOMER INFORMATION
          $post_data['cus_name'] = Auth::user()->first_name . " " . Auth::user()->last_name;
          $post_data['cus_email'] = Auth::user()->email ? Auth::user()->email : NULL;
          $post_data['cus_add1'] = $userAddress->user_address;
          // $post_data['cus_add2'] = "Dhaka";
          //$post_data['cus_city'] = DB::table('divisions')->where('id', $request->user_division_id)->select('name')->first()->name;
          $post_data['cus_state'] = DB::table('divisions')->where('id', $userAddress->user_division_id)->select('name')->first()->name;
          $post_data['cus_postcode'] = $userAddress->user_postcode;
          $post_data['cus_country'] = DB::table('countries')->where('id', $userAddress->user_country_id)->select('name')->first()->name;
          $post_data['cus_phone'] = Auth::user()->phone;
          //$post_data['cus_fax'] = "01711111111";

          if ($shippingAddress) {
              $post_data['ship_name'] = $shippingAddress->shipping_name;
              $post_data['ship_add1 '] = $shippingAddress->shipping_address;
              //$post_data['ship_add2'] = "Dhaka";

              //$post_data['ship_city'] = 'Dhaka';
              $post_data['ship_state'] = DB::table('divisions')
                  ->where('id', $shippingAddress->shipping_division_id)
                  ->select('name')
                  ->first()
                  ->name;
              $post_data['ship_postcode'] = $shippingAddress->shipping_postcode;

              $post_data['ship_country'] = DB::table('countries')
                  ->where('id', $shippingAddress->shipping_country_id)
                  ->select('name')
                  ->first()
                  ->name;
          } else {
              $post_data['ship_name'] = Auth::user()->first_name . " " . Auth::user()->last_name;
              $post_data['ship_add1 '] = $userAddress->user_address;
              $post_data['ship_state'] = DB::table('divisions')->where('id', $userAddress->user_division_id)->select('name')->first()->name;
              $post_data['ship_postcode'] = $userAddress->user_postcode;
              $post_data['ship_country'] = DB::table('countries')->where('id', $userAddress->user_country_id)->select('name')->first()->name;
          }

          # SHIPMENT INFORMATION
          # OPTIONAL PARAMETERS
          // $post_data['value_a'] = "ref001";
          // $post_data['value_b '] = "ref002";
          // $post_data['value_c'] = "ref003";
          // $post_data['value_d'] = "ref004";

          # CART PARAMETERS
          // $post_data['cart'] = json_encode(array(
          //     array("product" => "DHK TO BRS AC A1", "amount" => "200.00"),
          //     array("product" => "DHK TO BRS AC A2", "amount" => "200.00"),
          //     array("product" => "DHK TO BRS AC A3", "amount" => "200.00"),
          //     array("product" => "DHK TO BRS AC A4", "amount" => "200.00")
          // ));
          // $post_data['product_amount'] = "100";
          // $post_data['vat'] = "5";
          // $post_data['discount_amount'] = "5";
          // $post_data['convenience_fee'] = "3";

          # REQUEST SEND TO SSLCOMMERZ
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

  public function sslSuccess(Request $request)
    {
        // echo "payment success";
        // echo "Transaction is Successful";
        // echo $tran_id = $request->input('tran_id');
        // echo $amount = $request->input('amount');
        // echo $currency = $request->input('currency');
        //dd($request->all());

        date_default_timezone_set('Asia/Dhaka');
        $information = $request->all();
        if ($request->status === "VALID") {

            $updateOrderPlace = OrderPlace::where('order_id', $request->tran_id)->update([
                'is_paid' => 1,
                'status' => 1
            ]);
            $getOrderPlace = OrderPlace::where('order_id', $request->tran_id)->first();
            PaymentDetail::insert([
                'provider_name' => "SSL-COMMERZ",
                'order_place_id' => $getOrderPlace->id,
                'transition_id' => $request->tran_id,
                'pay_amount' => $request->amount,
                'card_type' => $request->card_type,
                'card_brand' => $request->card_brand,
                'card_issuer_country' => $request->card_issuer_country,
                'card_issuer_country_code' => $request->card_issuer_country_code,
                'val_id' => $request->val_id,
                'last_four_digits' => $request->card_no,
                'currency_type' => $request->currency_type,
                'store_amount' => $request->store_amount,
                'card_issuer' => $request->card_issuer,
                'bank_trans_id' => $request->bank_tran_id,
                'date' => date('d/m/Y'),
                'time' => date('h:i:s'),
            ]);

            // $getOrderPlace->update([
            //     'status' => 1,
            //     'is_paid' => 1,
            //     'payment_method_id' => 4,
            //     'payment_secure_id' => NULL,
            // ]);

            $getOrderPlace->is_paid = 1;
            $getOrderPlace->payment_method_id = 4;
            $getOrderPlace->payment_secure_id = NULL;
            $getOrderPlace->save();

            if (Auth::user()->email) {
               $siteSettings = DB::table('sitesetting')
                    ->select('company_name', 'address', 'facebook', 'twitter', 'instagram')->first();

                $frontLogo = Logo::select(['front_logo'])->first();
                   $userAddress = UserAddress::where('user_id', $getOrderPlace->user_id)->select('user_address')->first();
                $shippingAddress = ShippingAddress::where('shipping_user_id', $getOrderPlace->user_id)
                                        ->where('order_id', $getOrderPlace->order_id)
                                        ->select('shipping_address')
                                        ->first();
                Mail::to(Auth::user()->email)
                ->send(new PaymentSuccessMail($getOrderPlace, $frontLogo, $siteSettings, $userAddress, $shippingAddress));
            }

            return redirect()->route('payment.paypal.success');
        }
    }

    public function sslFail(Request $request)
    {
        // dd($request->all());
        if ($request->status === "FAILED") {
            return view('mobile.shopping.ssl_commerz.ssl_commerz_falil_page');
        }
    }

    public function sslCancel()
    {
        return view('mobile.shopping.ssl_commerz.ssl_commerz_cancel');
    }

      // paypal
      // paypal add
      public function paywithpaypal()
      {
        // return "paypal";
          $provider = new ExpressCheckout;
          $invoiceId = uniqid();
          $data = $this->cartData($invoiceId);
          $response = $provider->setExpressCheckout($data);
          // This will redirect user to PayPal
          return redirect($response['paypal_link']);
      }
      // success


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

          if (Auth::user()->email) {
              Mail::to(Auth::user()->email)->queue(new PaymentSuccessMail($usercartdatas));
          }
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
          $cartid = $usercartdatas->cart_id;

          $orderstorage = OrderStorage::where('purchase_key', $cartid)->first();

          foreach (json_decode($orderstorage->cart_data) as $key => $cart) {
              $itemdetails = [
                  'name' => $cart->name,
                  'price' => $cart->price,
                  'qty' => $cart->quantity,
              ];
              $data['items'][] = $itemdetails;
          }

          $data['invoice_id'] = $usercartdatas->order_id;
          $data['invoice_description'] = $invoiceId;
          $data['return_url'] = url('/payment/success');
          $data['cancel_url'] = url('/text');

          $total = 0;
          $shipping = 10;

          foreach ($data['items'] as $item) {
              $total += $item['price'] * $item['qty'];
          }
          $data['total'] = $total;

          return $data;
      }

      // success
      public function paypalsuccess(){
        return view('mobile.shopping.paypalsuccess');
      }


}
