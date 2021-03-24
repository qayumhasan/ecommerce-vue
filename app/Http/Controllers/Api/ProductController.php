<?php

namespace App\Http\Controllers\Api;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\productResource;
use App\Http\Resources\singleProductResource;

class ProductController extends Controller
{
	public function showProduct()
	{
		return $products =Product::paginate(16);
	}

	public function showSingleProduct($id)
	{
		
		$product =Product::findOrFail($id);
		
		return new productResource($product);
		
		// return response()->json($product);
	}

	public function getbanner()
	{
		$banners = Banner::all();
		return response()->json($banners);
	}
}
