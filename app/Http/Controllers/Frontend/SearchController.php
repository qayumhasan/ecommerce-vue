<?php

namespace App\Http\Controllers\Frontend;

use App\Product;
use App\Category;
use App\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class SearchController extends Controller
{

  public function searchmobile(Request $request){

       // return $request;
      if ($request->search === "") {
         return redirect()->back();
     }
     $searchproduct = Product::where('product_name', 'LIKE', "%$request->search")->get();

      //dd($searchproduct);
    return view('frontend.mobilesearch.search',compact('searchproduct'));


  }
    public function stripe(Request $request){
        return $request;
    }
    public function subsearch(Request $request){

        if(isset($request->price)) {
            if(implode(" ",$request->price)=="1"){
               $products=Product::where('is_deleted',0)->whereBetween('product_price', [50, 600])->orderBy('product_price','ASC')->get();
               return view('frontend.search.productmainajaxsearch', compact('products'));
            }elseif (implode(" ",$request->price)=="2") {
              $products=Product::where('is_deleted',0)->whereBetween('product_price', [601, 1000])->orderBy('product_price','ASC')->get();
               return view('frontend.search.productmainajaxsearch', compact('products'));
            }
            elseif (implode(" ",$request->price) =="3") {
              $products=Product::where('is_deleted',0)->whereBetween('product_price', [1001, 2000])->orderBy('product_price','ASC')->get();
               return view('frontend.search.productmainajaxsearch', compact('products'));
            }
            elseif (implode(" ",$request->price) =="4") {
              $products=Product::where('is_deleted',0)->whereBetween('product_price', [2001, 10000])->orderBy('product_price','ASC')->get();
               return view('frontend.search.productmainajaxsearch', compact('products'));
            }
            elseif (implode(" ",$request->price) == "1 2") {
              $products=Product::where('is_deleted',0)->whereBetween('product_price', [50,1000])->orderBy('product_price','ASC')->get();
               return view('frontend.search.productmainajaxsearch', compact('products'));
            }
            elseif (implode(" ",$request->price) == "1 2 3") {
              $products=Product::where('is_deleted',0)->whereBetween('product_price', [50,2000])->orderBy('product_price','ASC')->get();
               return view('frontend.search.productmainajaxsearch', compact('products'));
            }
            elseif (implode(" ",$request->price) == "1 2 3 4") {
              $products=Product::where('is_deleted',0)->whereBetween('product_price', [50,10000])->orderBy('product_price','ASC')->get();
               return view('frontend.search.productmainajaxsearch', compact('products'));
            }
            elseif (implode(" ",$request->price) == "2 3") {
              $products=Product::where('is_deleted',0)->whereBetween('product_price', [601,2000])->orderBy('product_price','ASC')->get();
               return view('frontend.search.productmainajaxsearch', compact('products'));
            }
            elseif (implode(" ",$request->price) == "2 4") {
              $products=Product::where('is_deleted',0)->whereBetween('product_price', [5601,10000])->orderBy('product_price','ASC')->get();
               return view('frontend.search.productmainajaxsearch', compact('products'));
            }
            elseif (implode(" ",$request->price) == "1 3") {
              $products=Product::where('is_deleted',0)->whereBetween('product_price', [50,600])->orwhereBetween('product_price', [1001,2000])->orderBy('product_price','ASC')->get();
               return view('frontend.search.productmainajaxsearch', compact('products'));
            }
            elseif (implode(" ",$request->price) == "1 4") {
                $products=Product::where('is_deleted',0)->whereBetween('product_price', [50,600])->orwhereBetween('product_price', [2001,10000])->orderBy('product_price','ASC')->get();
                 return view('frontend.search.productmainajaxsearch', compact('products'));
              }
              elseif (implode(" ",$request->price) == "3 4") {
                  $products=Product::where('is_deleted',0)->whereBetween('product_price', [1001,10000])->orderBy('product_price','ASC')->get();
                   return view('frontend.search.productmainajaxsearch', compact('products'));
                }
            else{
               $products=Product::where('is_deleted',0)->orderBy('product_price','ASC')->get();
               return view('frontend.search.productmainajaxsearch', compact('products'));
            }

        }elseif(isset($request->brand)){
              $products=Product::where('is_deleted',0)->whereIn('brand',$request->brand)->orderBy('product_price','ASC')->get();
               return view('frontend.search.productmainajaxsearch', compact('products'));

        }else{
          $products=Product::where('is_deleted',0)->orderBy('product_price','ASC')->get();
           return view('frontend.search.productmainajaxsearch', compact('products'));
        }




    }



    public function newsearch(Request $request)
    {

       $product_name=$request->proname;
        $products = Product::where('product_name', 'LIKE', "%$product_name%")->get();
        return view('frontend.search.productmainajaxsearch', compact('products'));
    }



        public function searchall(Request $request){
            return $request;
        }

        public function mobilesearchajax($productName){
            // echo "ok";
            $products = Product::where('product_name', 'LIKE', "%$productName%")->select(['id', 'product_price', 'slug', 'product_name', 'thumbnail_img'])->get();
            return view('frontend.search.mobilesearchajax',compact('products'));
        }


        public function moajxthemnine($productName){
            echo "ok";
        }








        public function cateajax(Request $request){
            return "ok";
        }















    public function searchProductByAjax($categoryId, $productName)
    {
        //echo $productName;



        $products = "";
        if ($categoryId === "all") {
            $getProductByName = Product::where('product_name', 'LIKE', "%$productName%")->select(['id', 'product_price', 'slug', 'product_name', 'thumbnail_img'])->get();
            $products = $getProductByName;
        }
        $getMainCate = Category::where('id', $categoryId)->select(['id'])->first();
        if ($getMainCate) {
            $getProductByCategoryId = Product::where('cate_id', $getMainCate->id)->where('product_name', 'LIKE', "%$productName%")->select(['id', 'product_price', 'slug', 'product_name', 'thumbnail_img'])->get();
            $products = $getProductByCategoryId;
            return view('frontend.search.mainsearch', compact('products'));
        }
        $getSubCate = SubCategory::where('id', $categoryId)->select(['id'])->first();
        if ($getSubCate) {
            $getProductBySubCategoryId = Product::where('subcate_id', $getSubCate->id)->where('product_name', 'LIKE', "%$productName%")->select(['id', 'product_price', 'slug', 'product_name', 'thumbnail_img'])->get();
            $products = $getProductBySubCategoryId;
            return view('frontend.search.mainsearch', compact('products'));
        }

        return view('frontend.search.mainsearch', compact('products'));

    }


    public function searchProductBySubCatByAjax($categoryId, $productName)
    {
        $products = Product::where('subcate_id', $categoryId)
            ->where('product_name', 'LIKE', "%$productName%")
            ->get();
        return view('frontend.search.product_by_sub_category_result', compact('products'));
    }

    public function searchProductByResubCatByAjax($categoryId, $productName)
    {
        $products = Product::where('resubcate_id', $categoryId)
            ->where('product_name', 'LIKE', "%$productName%")
            ->get();
        return view('frontend.search.product_by_re_sub_category_result', compact('products'));
    }


}
