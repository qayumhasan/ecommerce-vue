<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CompareProduct;
use smasif\ShurjopayLaravelPackage\ShurjopayService;

class CompareProductController extends Controller
{

    public function productCompare()
    {      
        // $userip = Request::ip();
        // return $userip;
        // $allproduct = CompareProduct::where('ip_address', $userip)->orderBy('id','DESC')->get();
        //dd($allproduct);
        return view('frontend.shipping.compare');
    }


    public function necompare(Request $request, $com_id)
    {
        //return $com_id;

        $userid = $request->ip();
        //return $userid;
        $checkproduct = CompareProduct::where('product_id', $com_id)->first();
        $checkip = CompareProduct::where('ip_address', $userid)->first();
        $comcount = CompareProduct::where('ip_address', $userid)->count();

        //echo $comcount;

        if ($checkproduct && $checkip) {
            return response()->json(['checkip' => $checkip]);
            return response()->json(['comcount' => $comcount]);
        } else {
            $compare = CompareProduct::insertGetId([
                'ip_address' => $userid,
                'product_id' => $com_id,
            ]);
            if ($compare) {
                return response()->json(['compare' => $compare]);
                return response()->json(['comcount' => $comcount]);
            }
        }
    }
    public function delete(Request $request)
    {
        //return $id;
        $delete = CompareProduct::where('id', $request->id)->delete();
        return view('frontend.shipping.compareajax');
      
    }

    public function getCompare(){

        return view('frontend.shipping.compareajax');
    }

    public function comparecount(Request $request,$id){
        $userid = $request->ip();
        $data = CompareProduct::where('ip_address', $userid)->count();
            //echo $data;
         return response()->json(['data' => $data]);
    }

    public function surjopaynew(Request $request){
             $tid= $request->order_id;
          
             $amount = $request->amount;

            $shurjopay_service = new ShurjopayService(); 
            $tx_id = $shurjopay_service->generateTxId($tid); 
            $success_route = route('surjopy.com.success'); 
            $shurjopay_service->sendPayment($amount, $success_route);
    }

    public function surjosuccess(){
        return "ok";
    }
}
