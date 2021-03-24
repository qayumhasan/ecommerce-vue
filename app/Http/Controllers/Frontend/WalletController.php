<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Wallet;
use App\PaymentDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use smasif\ShurjopayLaravelPackage\ShurjopayService;
use Paypal;
use Image;


class WalletController extends Controller
{
	  private $_apiContext;
    public function __construct(){

    			$mode = 'sandbox';
                $endPoint = 'https://api.sandbox.paypal.com';


            $this->_apiContext = PayPal::ApiContext(
                env('PAYPAL_CLIENT_ID'),
                env('PAYPAL_CLIENT_SECRET'));

            $this->_apiContext->setConfig(array(
                'mode' => $mode,
                'service.EndPoint' => $endPoint,
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => public_path('logs/paypal.log'),
                'log.LogLevel' => 'FINE'
            ));
    }


      public function getDone(Request $request)
    {
    	$payment_id = $request->get('paymentId');
    	$token = $request->get('token');
    	$payer_id = $request->get('PayerID');
            $mode = 'sandbox';
            $endPoint = 'https://api.sandbox.paypal.com';
        
       
        $this->_apiContext = PayPal::ApiContext(
            env('PAYPAL_CLIENT_ID'),
            env('PAYPAL_CLIENT_SECRET'));

        $this->_apiContext->setConfig(array(
            'mode' => $mode,
            'service.EndPoint' => $endPoint,
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => public_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));

       
        $payment = PayPal::getById($payment_id, $this->_apiContext);
        $paymentExecution = PayPal::PaymentExecution();
    	$paymentExecution->setPayerId($payer_id);
    	$executePayment = $payment->execute($paymentExecution, $this->_apiContext);

        $payment = json_encode($executePayment);

   
        return "ok success";
          
        
    }

    public function recharge(Request $request){

    	if($request->payment_type==1){
    		$user_id=Auth::user()->id;
	    	if($request->payment_id==2){
	    		$amount=$request->amount;
	    		$time=Carbon::now()->toDateTimeString();
	    		$date=Carbon::now()->format('Y-m-d');;
	    		$invoice_no=rand();
	    		
	    		//return $invoice_no;
	    		return view('frontend.payment.walletstripe',compact('time','amount','user_id','invoice_no'));
	    	}

	    	elseif($request->payment_id==3){

	    	$totalamount=$request->amount;
	    	$payer = PayPal::Payer();
	    	$payer->setPaymentMethod('paypal');
	    	$amount = PayPal::Amount();
	    	$amount->setCurrency('USD');

	        $amount->$totalamount;
	        $description = 'Wallet Payment';
	           

	    	$transaction = PayPal::Transaction();
	    	$transaction->setAmount($amount);
	    	$transaction->setDescription($description);
	    	$redirectUrls = PayPal:: RedirectUrls();
	    	$redirectUrls->setReturnUrl(url('paypal/payment/done'));
	    	$redirectUrls->setCancelUrl(url('paypal/payment/cancel'));
	    	$payment = PayPal::Payment();
	    	$payment->setIntent('sale');
	    	$payment->setPayer($payer);
	    	$payment->setRedirectUrls($redirectUrls);
	    	$payment->setTransactions(array($transaction));
	    	$response = $payment->create($this->_apiContext);
	    	$redirectUrl = $response->links[1]->href;

	    	return Redirect::to( $redirectUrl );

	    	}
	    	elseif($request->payment_id==4){
                $amount=$request->amount;
                $time=Carbon::now()->toDateTimeString();
                $date=Carbon::now()->format('Y-m-d');;
                $invoice_no=rand();

                $insert=Wallet::insertGetid([
                        'user_id' => $user_id,
                        'payment_status'=>1,
                        'payment_style'=>0,
                        'payment_type'=>4,
                        'is_paid'=>1,
                        'invoice_id'=>$invoice_no,
                        'amount'=>$amount,
                        'transection_id'=>'',
                        'date'=>$time,
                ]);
	    	
	         
            $post_data = array();
            $post_data['store_id'] = env('SSLCOMMERZ_STORE_ID');
            $post_data['store_passwd'] = env('SSLCOMMERZ_STORE_PASSWORD');
            $post_data['total_amount'] = $totalamount=$request->amount;
            $post_data['currency'] = "BDT";
            // $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
            $post_data['tran_id'] = $invoice_no;
            $post_data['success_url'] = url('/wallet/ssl/success');
            $post_data['fail_url'] = url('/wallet/ssl/cancle');
            $post_data['cancel_url'] = url('/wallet/ssl/fail');
            # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

            # EMI INFO
            // $post_data['emi_option'] = "1";
            // $post_data['emi_max_inst_option'] = "9";
            // $post_data['emi_selected_inst'] = "9";

            # CUSTOMER INFORMATION
            $post_data['cus_name'] = "asif";
            $post_data['cus_email'] = "ashif@gmail.com";
            $post_data['cus_add1'] = "";
            // $post_data['cus_add2'] = "Dhaka";
            //$post_data['cus_city'] = DB::table('divisions')->where('id', $request->user_division_id)->select('name')->first()->name;
            $post_data['cus_state'] = "Dhaka";
            $post_data['cus_postcode'] = "1216";
            $post_data['cus_country'] = "Bangladesh";
            $post_data['cus_phone'] = "Bangladesh";
            //$post_data['cus_fax'] = "01711111111";
            
                $post_data['ship_name'] = "foysal";
                $post_data['ship_add1 '] = "asif";
                //$post_data['ship_add2'] = "Dhaka";

                //$post_data['ship_city'] = 'Dhaka';
                $post_data['ship_state'] = "mirpur";
                $post_data['ship_postcode'] = "1216";

                $post_data['ship_country'] = "DHaka";
            

            # SHIPMENT INFORMATION
            # OPTIONAL PARAMETERS
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

                echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
               
                exit;
            } else {
                echo "JSON Data parsing error!";
            }


	    		
	    	}
	    	elseif($request->payment_id==5){
	    		$user_id=Auth::user()->id;
	    		$amount=$request->amount;
	    		$time=Carbon::now()->toDateTimeString();
	    		$date=Carbon::now()->format('Y-m-d');;
	    		$invoice_no=rand();

	    		$shurjopay_service = new ShurjopayService(); 
	            $tx_id = $shurjopay_service->generateTxId($invoice_no); 
	            $success_route = route('shurjopay.response'); 
	            $shurjopay_service->sendPayment($amount, $success_route);

	             Wallet::insert([
	                    'user_id' => $user_id,
	                    'is_paid' => 1,
	                    'payment_type' => 5,
	                    'payment_status'=>1,
	                    'payment_style'=>1,
	                    'invoice_id'=>$invoice_no,
	                    'amount'=>$amount,
	                    'date'=>$time,
	                ]);

	    	}
    	}else{
    		$user_id=Auth::user()->id;
    		$amount=$request->amount;
	    	$time=Carbon::now()->toDateTimeString();
	    	$date=Carbon::now()->format('Y-m-d');;
	    	$invoice_no=rand();

	    	$insert=Wallet::insertGetid([
	                    'user_id' => $user_id,
	                    'is_paid' => 1,
	                    'payment_status'=>0,
	                    'payment_style'=>2,
	                    'invoice_id'=>$invoice_no,
	                    'amount'=>$amount,
	                    'transection_id'=>$request->transection_id,
	                    'date'=>$time,
	            ]);
	    	 if($request->hasFile('pic')) {
                $image = $request->file('pic');
                $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 440)->save('public/uploads/wallet/' . $ImageName);
                Wallet::where('id',$insert)->update([
                	'image'=>$ImageName,
                ]);
                
            }
               if ($insert) {
		            $notification = array(
		                'messege' => 'Offline Payment Success',
		                'alert-type' => 'success'
		            );
		            return Redirect()->back()->with($notification);
		        } else {
		            $notification = array(
		                'messege' => 'Online Payment Faild',
		                'alert-type' => 'error'
		            );
		            return Redirect()->back()->with($notification);
		        }
    		
    	}
	    	
    }

    public function sslSuccess(Request $request)
    {
        
        
        //echo "success";
          date_default_timezone_set('Asia/Dhaka');

         PaymentDetail::insert([
                'provider_name' => "SSL-COMMERZ",
                'order_place_id' => $request->tran_id,
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
           
    

                
             $notification = array(
                        'messege' => 'Payment Success',
                        'alert-type' => 'success'
                    );
           return Redirect()->route('customar.account.page')->with($notification);
           
            //return view('frontend.payment.payment_success', compact('information'));
        
    }









     public function stripeSubmit(Request $request)
    {

    	$user_id=Auth::user()->id;
        //  $payment_secure_id=$request->payment_secure_id;
        // date_default_timezone_set('Asia/Dhaka');
        // $getPlaceOrder = OrderPlace::where('payment_secure_id', $payment_secure_id)->first();
        // abort_if(!$getPlaceOrder, 403);

        $this->validate($request, [
            'holder_name' => 'required',
        ]);

        try {

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge =  Charge::create([
                "amount" => $request->total_price,
                "currency" => "usd",
                "source" => $request->stripeToken,
                'description' => 'wallet',
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
                    'order_place_id' =>$request->invoice_no,
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

                Wallet::insert([

                    'user_id' => $user_id,
                    'is_paid' => 1,
                    'payment_type' => 2,
                    'payment_status'=>1,
                    'payment_style'=>1,
                    'invoice_id'=>$request->invoice_no,
                    'amount'=>$request->total_price,
                    'date'=>$request->paid_time,
                ]);

               $notification = array(
                        'messege' => 'Payment Success',
                        'alert-type' => 'success'
                    );
           return Redirect()->route('customar.account.page')->with($notification);
            }

            
            
        } catch (CardException $e) {
            return Redirect::refresh()->withErrors(['error', $e->getMessage()]);
        }

      
    }

   



}
