<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function productSearchByAjax($product_name)
    {
        $products = Product::where('product_name', 'LIKE', "%$product_name%")
        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])->take(8)->get();
        return view('mobile.ajax_blade.search.search_product_result', compact('products'));
    }

    public function productSearchByPage(Request $request)
    {
        if ($request->search_field) {
            $products = Product::where('product_name', 'LIKE', "%$request->search_field%")
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->paginate(8);
            $search_field = $request->search_field;
            return view('mobile.search.search_result_page', compact('products', 'search_field'));
        }else{
            return redirect()->back();
        }
    }

    public function searchByMainCategory(Request $request)
    {

        if ($request->category_id && $request->brand_id && $request->color_code) {
            $color_code = $request->color_code;
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('cate_id', $request->category_id)
                        ->where('brand', $request->brand_id)
                        ->whereColumn('colors', 'LIKE', "%$color_code%")
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif ($request->category_id) {
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('cate_id', $request->category_id)
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif ($request->brand_id) {

            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('brand', $request->brand_id)
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif($request->color_code) {
            $color_code = $request->color_code;
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->whereColumn('colors', 'LIKE', "%$color_code%")
                        ->get();
        }elseif ($request->category_id && $request->brand_id) {
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('cate_id', $request->category_id)
                        ->where('brand', $request->brand_id)
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif($request->category_id && $request->color_code){
            $color_code = $request->color_code;
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('cate_id', $request->category_id)
                        ->whereColumn('colors', 'LIKE', "%$color_code%")
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif ($request->brand_id && $request->color_code) {
            $color_code = $request->color_code;
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('cate_id', $request->brand_id)
                        ->whereColumn('colors', 'LIKE', "%$color_code%")
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }else {
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }



        return view('mobile.search.search_result_page', compact('products'));

    }

    public function searchBySubCategory(Request $request)
    {
        $color_code = $request->color_code;
        if ($request->sub_category_id && $request->brand_id && $request->color_code) {

            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('subcate_id', $request->sub_category_id)
                        ->where('brand', $request->brand_id)
                        ->whereColumn('colors', 'LIKE', "%$color_code%")
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif ($request->sub_category_id) {
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('subcate_id', $request->sub_category_id)
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif ($request->brand_id) {
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('brand', $request->brand_id)
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif($request->color_code) {

            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->whereColumn('colors', 'LIKE', "%$color_code%")
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
        }elseif ($request->sub_category_id && $request->brand_id) {
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('subcate_id', $request->sub_category_id)
                        ->where('brand', $request->brand_id)
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif($request->sub_category_id && $request->color_code){

            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('subcate_id', $request->sub_category_id)
                        ->whereColumn('colors', 'LIKE', "%$color_code%")
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif ($request->brand_id && $request->color_code) {
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('brand', $request->brand_id)
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->whereColumn('colors', 'LIKE', "%$color_code%")
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }else {
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }
    }

    public function searchByReSubCategory(Request $request)
    {



        $color_code = $request->color_code;
        if ($request->re_sub_category_id && $request->brand_id && $request->color_code) {

            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('resubcate_id', $request->re_sub_category_id)
                        ->where('brand', $request->brand_id)
                        ->whereColumn('colors', 'LIKE', "%$color_code%")
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif ($request->re_sub_category_id) {
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('resubcate_id', $request->re_sub_category_id)
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif ($request->brand_id) {
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('brand', $request->brand_id)
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif($request->color_code) {

            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->whereColumn('colors', 'LIKE', "%$color_code%")
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
        }elseif ($request->re_sub_category_id && $request->brand_id) {
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('resubcate_id', $request->re_sub_category_id)
                        ->where('brand', $request->brand_id)
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif($request->re_sub_category_id && $request->color_code){

            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('resubcate_id', $request->re_sub_category_id)
                        ->whereColumn('colors', 'LIKE', "%$color_code%")
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }elseif ($request->brand_id && $request->color_code) {
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->where('brand', $request->brand_id)
                        ->whereColumn('colors', 'LIKE', "%$color_code%")
                        ->select(['id', 'slug', 'product_sku', 'product_description', 'product_price', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }else {
            $products = Product::where('product_price', '>=', $request->min_price)
                        ->where('product_price', '<=', $request->max_price)
                        ->where('status', 1)
                        ->where('is_deleted', 0)
                        ->select(['id', 'slug', 'product_sku', 'product_price', 'product_description', 'product_name', 'thumbnail_img'])
                        ->get();
            return view('mobile.search.search_result_page', compact('products'));
        }
    }
}
