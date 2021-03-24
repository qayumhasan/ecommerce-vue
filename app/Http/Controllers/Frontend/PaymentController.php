<?php

namespace App\Http\Controllers\Frontend;


use Stripe\Charge;
use Stripe\Stripe;
use App\OrderPlace;
use App\UserAddress;
use App\PaymentDetail;
use App\ProductStorage;
use App\Logo;
use Illuminate\Http\Request;
use App\Mail\PaymentSuccessMail;
use Illuminate\Support\Facades\DB;
use Stripe\Exception\CardException;
use App\Http\Controllers\Controller;
use App\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\CustomarAddress;
use App\CustomarAccount;
use App\OrderFinal;
use smasif\ShurjopayLaravelPackage\ShurjopayService;

class PaymentController extends Controller
{
    public function index($payment_secure_id)
    {
        //return "ok";
        $orderInfo = OrderPlace::where('user_id', Auth::user()->id)->where('payment_secure_id', $payment_secure_id)->firstOrFail();
        if ($orderInfo) {
            return view('frontend.payment.stripe', compact('orderInfo'));
        }
    }

    public function successStripePaymentView()
    {
        return view('frontend.payment.stripe_success_payment_page');
    }
    public function paypalsuccess()
    {
        return view('frontend.payment.paypal_success');
    }
    public function redirectToCheckout(Request $request)
    {

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
            $userAddress = CustomarAccount::where('user_id', Auth::user()->id)->select('user_address')->first();
            $address = $userAddress->user_address;
        }
        return view('frontend.shopping.order_payment', compact('orderPlace', 'orderProducts', 'address'));
    }

    public function makePayment(Request $request)
    {
        //return $request->order_id;

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

        $userAddress = CustomarAccount::where('userid', Auth::user()->id)->first();
        $shippingAddress = ShippingAddress::where('shipping_user_id', Auth::user()->id)->where('order_id', $request->order_id)->first();

        if ($request->payment_method_id == 2) {
            //return $request->payment_method_id;
            return redirect()->route('stripe.index', $getOrderInfo->payment_secure_id);

        } elseif ($request->payment_method_id == 3) {
            return redirect()->route('payment.paypal');
        }
        elseif ($request->payment_method_id == 5) {

            $shurjopay_service = new ShurjopayService();
            $tx_id = $shurjopay_service->generateTxId('646456');
            $success_route = route('shurjopay.response');
            $shurjopay_service->sendPayment(2, $success_route);
        }

        elseif ($request->payment_method_id == 4) {
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
            $post_data['cus_name'] = Auth::user()->username;
            $post_data['cus_email'] = Auth::user()->email ? Auth::user()->email : NULL;
            $post_data['cus_add1'] = "";
            // $post_data['cus_add2'] = "Dhaka";
            //$post_data['cus_city'] = DB::table('divisions')->where('id', $request->user_division_id)->select('name')->first()->name;
            $post_data['cus_state'] = "Dhaka";
            $post_data['cus_postcode'] = "1216";
            $post_data['cus_country'] = "Bangladesh";
            $post_data['cus_phone'] = Auth::user()->phone;
            //$post_data['cus_fax'] = "01711111111";

            if ($shippingAddress) {
                $post_data['ship_name'] = "foysal";
                $post_data['ship_add1 '] = "asif";
                //$post_data['ship_add2'] = "Dhaka";

                //$post_data['ship_city'] = 'Dhaka';
                $post_data['ship_state'] = "mirpur";
                $post_data['ship_postcode'] = "1216";

                $post_data['ship_country'] = "DHaka";
            } else {
                $post_data['ship_name'] = Auth::user()->username;
                $post_data['ship_add1 '] = "panana";
                $post_data['ship_state'] = "raj";
                $post_data['ship_postcode'] = "1216";
                $post_data['ship_country'] = "bangladesh";
            }
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

    public function stripeSubmit(Request $request)
    {
         $payment_secure_id=$request->payment_secure_id;
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
                    'payment_status'=>1,
                ]);

                $placeOrder = OrderPlace::where('payment_secure_id', $payment_secure_id)->first();

                if (Auth::user()->email) {

                    $siteSettings = DB::table('sitesetting')
                    ->select('company_name', 'address', 'facebook', 'twitter', 'instagram')->first();

                    $frontLogo = Logo::select(['front_logo'])->first();

                    $userAddress = CustomarAccount::where('userid', $placeOrder->user_id)->select('address')->first();
                    $shippingAddress = ShippingAddress::where('shipping_user_id', $placeOrder->user_id)
                                        ->where('order_id', $placeOrder->order_id)
                                        ->select('shipping_address')
                                        ->first();
                    // Mail::to(Auth::user()->email)
                    // ->send(new PaymentSuccessMail($placeOrder, $frontLogo, $siteSettings, $userAddress, $shippingAddress));

                }

                $paymentsecurid =OrderPlace::where('id', $request->order_id)->first();
                if($paymentsecurid){
                    $paymentid =$paymentsecurid->payment_secure_id;
                    $order_id =$paymentsecurid->order_id;
                }


            }


            return redirect()->route('offline.order.payment',[$order_id,$paymentid]);
        } catch (CardException $e) {
            return Redirect::refresh()->withErrors(['error', $e->getMessage()]);
        }

        // Stripe::setApiKey(env('STRIPE_SECRET'));
        // $charge = Charge::create([
        //     "amount" => $request->total_price * 100,
        //     "currency" => "usd",
        //     "source" => $request->stripeToken,
        //     'description' => 'Order',
        //     'receipt_email' => "admin@email.com",
        //     'metadata' => [
        //         'quantity' => 3,
        //         'total_payable' => 1200,
        //     ],
        // ]);

        // dd($charge);
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
            $updateOrderPlace = OrderFinal::where('invoice_id', $request->tran_id)->update([
                'payment_status' => 1,
                'payment_type' => 2
            ]);
            $getOrderPlace = OrderFinal::where('invoice_id', $request->tran_id)->first();
            PaymentDetail::insert([
                'provider_name' => "SSL-COMMERZ",
                // 'order_place_id' => $getOrderPlace->id,
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

            // if (Auth::user()->email) {
            //     $siteSettings = DB::table('sitesetting')
            //         ->select('company_name', 'address', 'facebook', 'twitter', 'instagram')->first();
            //     $frontLogo = Logo::select(['front_logo'])->first();
            //     $userAddress = CustomarAddress::where('user_id', $getOrderPlace->user_id)->select('user_address')->first();
            //     $shippingAddress = ShippingAddress::where('shipping_user_id', $getOrderPlace->user_id)
            //                             ->where('order_id', $getOrderPlace->order_id)
            //                             ->select('shipping_address')
            //                             ->first();
            //     Mail::to(Auth::user()->email)->send(new PaymentSuccessMail($getOrderPlace, $frontLogo, $siteSettings, $userAddress, $shippingAddress));
            // }


            $paymentsecurid = OrderFinal::where('invoice_id', $request->tran_id)->first();
            $invoice=$paymentsecurid->invoice_id;

            $notification = array(
                'messege' => 'Insert Successfully',
                'alert-type' => 'success'
            );
              return redirect()->route('cashon.success',$invoice)->with($notification);

        }
    }

    public function sslFail(Request $request)
    {
        // dd($request->all());
        if ($request->status === "FAILED") {
            return view('frontend.payment.ssl_commerce.failed');
        }
    }

    public function sslCancel()
    {
        return view('frontend.payment.ssl_commerce.cancel');
    }







}
