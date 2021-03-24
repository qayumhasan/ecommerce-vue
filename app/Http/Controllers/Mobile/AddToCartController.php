<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Product;
use App\FlashDealDetail;
use Illuminate\Http\Request;
use Cart;

class AddToCartController extends Controller
{
    // Product Add To cart

    public function addToCart(Request $request)
    {



        $product = Product::findOrFail($request->product_id);

        $userid = $request->ip();

        // variation product add

        if ($product->product_type == 1) {

            $flashDealdiscounts = FlashDealDetail::where('product_id', $request->product_id)->first();
            if ($flashDealdiscounts) {

                if ($flashDealdiscounts->discount_type == 1) {

                    $product_price = $request->product_price - $flashDealdiscounts->discount;
                } else {
                    $perdiscount = ($flashDealdiscounts->discount * $request->product_price) / 100;

                    $product_price = $request->product_price - $perdiscount;
                }
            } else {
                $product_price = $request->product_price;
            }


            $id = rand(5, 15);

            $data = array();
            $data['id'] = $id;
            $data['name'] = $product->product_name;
            $data['price'] = $product_price;
            $data['quantity'] = +$request->quantity;
            $data['attributes']['thumbnail_img'] = $product->thumbnail_img;
            $data['attributes']['colors'] = $request->color;
            $data['attributes']['product_id'] = $product->id;
            $data['attributes']['variation'] = 'variation';
            $data['attributes']['sku'] = $request->product_sku;
            $data['attributes']['flashdeals'] = 0;



            $productdetails = Product::findOrFail($request->product_id);

            foreach (json_decode($productdetails->choice_options) as $key => $choice) {
                $choicename = $choice->name;

                $data['attributes'][$choice->title] = $request->$choicename;
            }

            $add = Cart::session($userid)->add($data);

            if ($flashDealdiscounts) {

                Cart::session($userid)->update(
                    $id,
                    [

                        'attributes' => [
                            'flashdeals' => $flashDealdiscounts->discount,
                            'thumbnail_img' => $product->thumbnail_img,
                            'colors' => $request->color,
                            'product_id' => $product->id,
                            'variation' => 'variation',
                            'sku' => $request->product_sku,
                        ],
                    ]
                );
            }

            // non variation product add
            $product->number_of_sale++;
            $product->save();
        } else {
            $flashDealdiscounts = FlashDealDetail::where('product_id', $request->product_id)->first();
            if ($flashDealdiscounts) {

                if ($flashDealdiscounts->discount_type == 1) {

                    $product_price = $request->product_price - $flashDealdiscounts->discount;
                } else {
                    $perdiscount = ($flashDealdiscounts->discount * $request->product_price) / 100;

                    $product_price = $request->product_price - $perdiscount;
                }
            } else {
                $product_price = $request->product_price;
            }


            $add = Cart::session($userid)->add([
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product_price,
                'quantity' => +$request->quantity,
                'attributes' => [
                    'thumbnail_img' => $product->thumbnail_img,
                    'product_id' => $product->id,
                    'sku' => $product->product_sku,
                    'flashdeals' => 0,
                ],
            ]);


            if ($flashDealdiscounts) {

                Cart::session($userid)->update(
                    $product->id,
                    [

                        'attributes' => [
                            'flashdeals' => $flashDealdiscounts->discount,
                            'thumbnail_img' => $product->thumbnail_img,
                            'product_id' => $product->id,
                            'sku' => $product->product_sku,
                        ],
                    ]
                );
            }
        }

        $product->number_of_sale++;
        $product->save();

        $userid = $request->ip();
        // $getcartdatas = Cart::session($userid)->getContent();
        $quantity = Cart::session($userid)->getTotalQuantity();
        $gettotal = Cart::session($userid)->getTotal();



        if ($add) {
            return response()->json([

                'quantity' => $quantity,
                'total' => $gettotal,
            ]);
        }
    }
}
