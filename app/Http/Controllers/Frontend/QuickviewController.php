<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class QuickviewController extends Controller
{
    public function quick($p_id){
    	$product=Product::where('id',$p_id)->first();
    	return json_encode($product);

    }
}
