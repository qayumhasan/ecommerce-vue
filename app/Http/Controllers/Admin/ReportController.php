<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function productstockreport(){
    	$report=Product::OrderBy('id','DESC')->get();
    	return view('admin.ecommerce.report.stockproduct',compact('report'));
    }

    public function categoryreport(Request $request){
    	$cate_id=$request->cate_id;
    	$report=Product::where('cate_id',$cate_id)->get();
    	return view('admin.ecommerce.report.stockproductresult',compact('report'));

    }

    public function wishproduct(){
        $wishlist=DB::table('wishlists')
                    ->select('product_id', DB::raw('count(id) as total_id'))
                    ->groupBy('product_id')
                    ->get();
                    // ->join('products', 'wishlists.product_id', '=', 'products.id')

        return view('admin.ecommerce.report.wishproduct',compact('wishlist'));
    }

    // best sell report
    public function bestsell(){
        $bestsell=Product::OrderBy('number_of_sale','DESC')->get();
        return view('admin.ecommerce.report.bestsell',compact('bestsell'));
    }
}
