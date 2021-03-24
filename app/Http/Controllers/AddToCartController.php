<?php

namespace App\Http\Controllers\Frontend;
use App\DatabaseStorageModel;
use App\Http\Controllers\Controller;
use App\Product;
use App\FlashDealDetail;
use App\UserUsedCupon;
use App\AddToCart;
use App\DeleveryCharge;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Str;
use Auth;

class AddToCartController extends Controller
{


    // Product Add To cart

    public function addToCart(Request $request)
    {
        // return $request;
        // $product_id = $request->product_id;
      //  return $product_id;

         $userid = $request->ip();
         $product=Product::where('id',$request->product_id)->first();
         //return $product;
          $carttab =AddToCart::where('product_id',$request->product_id)->where('user_ip',$userid)->first();

          if($carttab){
              $carttab->increment('qty');
              AddToCart::where('product_id',$request->product_id)->update([
                'ptodacttotalprice'=>$request->product_price + $carttab->ptodacttotalprice,

              ]);
          }else{
              AddToCart::insertGetId([
                'user_ip'=>$userid,
                'product_id'=>$request->product_id,
                'product_name'=>$request->product_name,
                'image'=>$request->image,
                'product_price'=>$request->product_price,
                'discount_price'=>$request->dis_price,
                'product_type'=>$request->product_type,
                'grug_type'=>$request->grug_type,
                'qty'=>$request->quantity,
                'sku'=>$request->sku,
                'ptodacttotalprice'=>$request->product_price,
            ]);
          }

        $cartcountall =AddToCart::OrderBy('id','DESC')->where('user_ip',\Request::ip())->get();
        $cartcount = $cartcountall->sum('qty');
        return response()->json([
           'data'=>'Product Add Successfully!',
           'count'=>$cartcount,
       ]);


    }




    public function addcartdata($request, $product)
    {

                            $id = rand(5, 15);

                            $data = array();
                            $data['id'] = $id;
                            $data['name'] = $product->product_name;
                            $data['price'] = 150;
                            $data['quantity'] = +$request->quantity;
                            $data['attributes']['thumbnail_img'] = $product->thumbnail_img;
                            $data['attributes']['colors'] = $request->color;
                            $data['attributes']['product_id'] = $product->id;
                            $data['attributes']['variation'] = 'variation';
                            $data['attributes']['sku'] = $request->product_sku;
                            $data['attributes']['slug'] = $product->slug;
                            $data['attributes']['flashdeals'] = 0;
                            $data['attributes']['flashdealtype'] = 0;



                            $productdetails = Product::findOrFail($request->product_id);

                            foreach (json_decode($productdetails->choice_options) as $key => $choice) {

                                $choicename = $choice->name;
                                $data['attributes'][$choice->title] = $request->$choicename;
                            }

                            $userid = "123456789";

                            $add = Cart::session($userid)->add($data);




                            $quantity = Cart::session($userid)->getTotalQuantity();
                            $gettotal = Cart::session($userid)->getTotal();


                            return 'ok';
                            if($add){
                                return response()->json([

                                    'quantity' => $quantity,
                                    'total' => $gettotal,
                                ]);
                            }
                        }




    // check if this product already exited in cart

    public function checkExitCartProduct($request)
    {
        // store form value
        $choseformnameattibute = [];

        // store attibute name
        $sizename = [];

        //  same add to cart
        $sameitem = [];


        $productdetails = Product::findOrFail($request->product_id);

        foreach (json_decode($productdetails->choice_options) as $key => $choice) {


            $size = $choice->title; //this reaturn size,model
            $choicename = $choice->name; //this reaturn form name
            //    $attibute = $request->$choicename;
            array_push($choseformnameattibute, $choicename);
            array_push($sizename, $size);
        }

        $userid = $request->ip();

        $items = \Cart::session($userid)->getContent();


        $rowcount = count($sizename);
        $formvaluecount = count($choseformnameattibute);


        // get the value of attibuate name from database of this product

        foreach ($items as $item) {

            $i = 0;
            while ($i < $rowcount) {

                $attibutevalue = $sizename[$i]; //find size,model

                $item->attributes->$attibutevalue; //find value l,nokia

                $choice = $choseformnameattibute[$i];

                $request->$choice;

                if ($item->attributes->$attibutevalue == $request->$choice) {
                    array_push($sameitem, $item->id);
                } else {
                    return false;
                }
            }
        }

        return $sameitem;
    }



    // product add to cart show



    public function addToCartShow(Request $request)
    {
      // return $request->user_id;
         $countcartitems = AddToCart::where('user_ip',$request->user_id)->orderBy('id','DESC')->get();
         $subtotal= AddToCart::where('user_ip',$request->user_id)->sum('product_price');
         return view('frontend.include.ajaxview.header_cart', compact('countcartitems','subtotal'));
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

    // Product add to view cart page


    public function productViewCart()
    {
        // $items = \Cart::session(\Request::getClientIp(true))->getContent();
   // $countcartitems = AddToCart::where('user_ip',$request->user_id)->orderBy('id','DESC')->get();
        // if(count($items) == 0){
        //     $notification = array(
        //         'messege' => 'Please add some products!',
        //         'alert-type' =>'success'
        //     );
        //     return redirect('/')->with($notification);
        // }
        // $orderid = str::random(60);

        return view('frontend.shipping.shopping_cart');
    }


    // get cart data

    public function getCartData()
    {
      // return "ok";
        $userid =  \Request::getClientIp(true);
        $countcartitems = AddToCart::where('user_ip',$userid)->orderBy('id','DESC')->get();
        //
        // $usercartdatas = Cart::session($userid)->getContent();


        return view('frontend.include.ajaxview.cartajaxdata',compact('countcartitems'));
    }


    // update view cart product

    public function viewCartUpdate(Request $request)
    {
       // return $request->new_quantity;

        $updatecartdata=AddToCart::where('id',$request->cart_id)->Update([
          'qty'=>$request->new_quantity,
        ]);


        //
        // if ($updatecartdata) {
        //
        //     return view('frontend.include.ajaxview.cartajaxdata', compact('usercartdatas'));
        // } else {
        //     return 0;
        // }
    }

    // checkout page show

    public function checkoutPage()
    {
        return view('frontend.shipping.checkout');

    }


    // update view cart deleted

    public function viewCartDelete(Request $request)
    {
        $userid =  \Request::getClientIp(true);

        $deletedproduct = Cart::session($userid)->remove($request->cartid);

        return redirect()->route('product.cart.add');
    }


    // shopping cart delete
    public function cartDataDelete(Request $request)
    {
        $id=$request->user_id;
        $userid =  \Request::getClientIp(true);
        $datadelete = AddToCart::where('user_ip',$userid)->where('id',$id)->delete();
        $countcartitems = AddToCart::where('user_ip',$userid)->get();
        return view('frontend.include.ajaxview.cartajaxdata', compact('countcartitems'));
    }
    public function carDeleteheader(Request $request)
    {

      // return "ok";
        $id=$request->user_id;
        $userid =  \Request::getClientIp(true);
        $datadelete = AddToCart::where('user_ip',$userid)->where('id',$id)->delete();
        $countcartitems = AddToCart::where('user_ip',$userid)->get();
        return view('frontend.include.ajaxview.header_cart', compact('countcartitems'));
    }


    // show total price in frontend

    public function showTotalPrice()
    {
        $userid =  \Request::getClientIp(true);
        // $getcartdatas = Cart::session($userid)->getContent();
        $quantity = Cart::session($userid)->getTotalQuantity();
        $gettotal = Cart::session($userid)->getTotal();
        return response()->json([

            'quantity' => $quantity,
            'total' => $gettotal,
        ]);
    }
    public function gettotalpriceData(){
      $userid =  \Request::getClientIp(true);
      $totalprice=0;

      $delevery_amount=DeleveryCharge::first();

      $alldata=AddToCart::where('user_ip',$userid)->get();
      $allqty=AddToCart::where('user_ip',$userid)->sum('qty');
      foreach ($alldata as $key => $value) {
        $totalprice=$totalprice + $value->qty * $value->product_price;
      }
      // cupun value

      return view('frontend.include.ajaxview.checkout_price',compact('totalprice','allqty','delevery_amount'));

    }


    public function allcartdatanew(){
        $userid =  \Request::getClientIp(true);
        $allqty=AddToCart::where('user_ip',$userid)->sum('qty');
        return response()->json($allqty);
    }



}
