<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function productDetails($slug,$id)
    {
        $productdetails = Product::where('id',$id)->first();

        return view('mobile.products.product_details',compact('productdetails'));
    }

    public function productCheckoutDetails($id)
    {
        $productdetails = Product::where('id',$id)->first();

        return view('mobile.products.product_details',compact('productdetails'));
    }
}
