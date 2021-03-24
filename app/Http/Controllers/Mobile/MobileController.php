<?php

namespace App\Http\Controllers\Mobile;

use App\DatabaseStorageModel;
use App\Http\Controllers\Controller;
use App\UserUsedCupon;
use Illuminate\Http\Request;
use Cart;

class MobileController extends Controller
{
    
    // header cart data show

    public function getCartData()
    {
        $userid =  \Request::getClientIp(true);

        $usercartdatas = Cart::session($userid)->getContent();


        return view('frontend.include.ajaxview.mobile._cartheader', compact('usercartdatas'));
    }

        // header cart data show

        public function mobileGetCartData()
        {
            $userid =  \Request::getClientIp(true);
    
            $usercartdatas = Cart::session($userid)->getContent();
    
    
            return view('frontend.include.ajaxview.mobile.mobile_menu_cart', compact('usercartdatas'));
        }


    // product add to cart Deleted

    public function addToCartDelete(Request $request)
    {

        $userid = $request->ip();

        $datadelete = Cart::session($userid)->remove($request->user_id);
        $getcartdatas = Cart::session($userid)->getContent();

        $usercartdatas = Cart::session($userid)->getContent();
        if(count($usercartdatas) == 0){
            $useridcondition =  \Request::getClientIp(true) . '_cart_conditions';
            
            $carddatas =DatabaseStorageModel::where('id', $useridcondition)->first();
            if($carddatas){
                $carddatas->delete();
            }
            $userusedcupon =UserUsedCupon::where('order_id',auth()->user()->order_id)->first();
            if($userusedcupon){
                $userusedcupon->delete();
            }
            
        }

        
        if ($datadelete) {
            $items = 0;
            $price = 0;

            foreach (Cart::session($userid)->getContent() as $item) {
                $items -= $item->quantity;
                $price -= $item->price * $items;
            }
        }

        return response()->json([
            'quantity' => $items,
            'price' => $price
        ]);
    }
}
