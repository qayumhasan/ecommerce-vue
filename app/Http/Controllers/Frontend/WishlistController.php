<?php

namespace App\Http\Controllers\Frontend;


use App\wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function index()
    {
 
        return view('frontend.shipping.whishlist');
    }
    public function insert(Request $request, $id)
    {
       // return "ok";
        if (Auth::check()) {
            $user_id = Auth::id();
            $check = wishlist::where('product_id', $id)->first();
            if ($check) {
                return response()->json(['check' => $check]);
            } else {
                $insert = wishlist::insert([
                    'product_id' => $id,
                    'user_id' => $user_id,
                    'created_at' => Carbon::now()->toDateTime(),
                ]);
                if ($insert) {
                    return response()->json($insert);
                }
            }
        } else {
            return redirect()->back();
        }
    }
    // delete
    public function delete(Request $request)
    {
       //return "ok";
        $user_id = Auth::id();
        //return $id;
        $delete = wishlist::where('id', $request->id)->delete();
        $allwishlist = wishlist::where('user_id', $user_id)->get();
        return view('frontend.products.wishajax',compact('allwishlist'));
        
       
    }
    // 
    public function wishcount(Request $request, $id){
         if (Auth::check()) {
            $user_id = Auth::id();
            $data = wishlist::where('user_id', $user_id)->count();
            //echo $data;
            return response()->json(['data' => $data]);

          }
          else {
            return redirect()->back();
            }



    }

    public function getajaxdata(){
         $user_id = Auth::id();
         $allwishlist = wishlist::where('user_id', $user_id)->get();
         return view('frontend.products.wishajax',compact('allwishlist'));
    }




}
