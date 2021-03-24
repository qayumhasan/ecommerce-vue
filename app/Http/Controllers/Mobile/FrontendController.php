<?php

namespace App\Http\Controllers\Mobile;

use App\Brand;
use App\FlashDeal;
use App\FlashDealDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use App\ReSubCategory;
use App\CompareProduct;
use App\Product;
use App\wishlist;
use App\BlogComment;
use App\Color;
use App\ProductReview;
use App\OrderPlace;
use App\Blog;
use Carbon\Carbon;
use Auth;

class FrontendController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Dhaka');
        $hotdeal = FlashDeal::with(['flash_deal_details'])
        ->where('status', 1)
        ->where('is_deleted', 0)
        ->select('id', 'start_date', 'end_date')
        ->orderBy('id', 'DESC')
        ->first();
        if ($hotdeal) {
            if ($hotdeal->end_date == date('Y-m-d')) {
                foreach ($hotdeal->flash_deal_details as $value) {
                    $value->update([
                        'status' => 0,
                    ]);
                }
                $hotdeal->update([
                    'status' => 0
                ]);
            }
        }
        return view('mobile.home.home');
    }

    public function flashDealProducts()
    {
        $flash_deal = FlashDeal::where('status', 1)->where('is_deleted', 0)->select('id', 'end_date')->first();
        $flash_deal_details = 0;
        if ($flash_deal) {
            $flash_deal_details = FlashDealDetail::with('product')->where('flash_deal_id', $flash_deal->id)->paginate(16);
        }
        return view('mobile.hot_deal.hot_deal_products', compact('flash_deal', 'flash_deal_details'));
    }

    // category
    public function m_category($slug, $id)
    {
        $colours = Color::where('color_status', 1)->where('is_deleted', 0)->get();
        $all_brands = Brand::where('brand_status', 1)->where('is_deleted', 0)->select(['id','brand_name'])->get();
        $all_categories = Category::where('is_deleted', 0)->where('cate_status', 1)->select(['id', 'cate_name'])->get();
        $cate = Category::where('id', $id)->first();
        return view('mobile.category.cate', compact('cate', 'all_categories', 'all_brands', 'colours'));
    }
    // subcategory
    public function m_subcategory($slug, $id)
    {
        $colours = Color::where('color_status', 1)->where('is_deleted', 0)->get();
        $all_brands = Brand::where('brand_status', 1)->where('is_deleted', 0)->select(['id','brand_name'])->get();
        $all_subcategories = SubCategory::where('is_deleted', 0)->where('subcate_status', 1)->select(['id', 'subcate_name'])->get();
        $subcate = SubCategory::where('id', $id)->first();
        return view('mobile.subcategory.subcate', compact('subcate', 'all_subcategories', 'all_brands', 'colours'));
    }
    // resubcategory
    public function m_resubcategory($slug, $id)
    {
        $colours = Color::where('color_status', 1)->where('is_deleted', 0)->get();
        $all_brands = Brand::where('brand_status', 1)->where('is_deleted', 0)->select(['id','brand_name'])->get();
        $all_re_subcategories = ReSubCategory::where('is_deleted', 0)->where('resubcate_status', 1)->select(['id', 'resubcate_name'])->get();
        $resubcate = ReSubCategory::where('id', $id)->first();
        return view('mobile.resubcategory.resubcate', compact('resubcate', 'all_re_subcategories', 'all_brands', 'colours'));
    }
    // product varient
    public function varient(Request $request)
    {
        //echo "ok";
        $product = Product::find($request->id);
        $str = '';
        $quantity = 0;

        if ($request->has('color')) {
            $data['color'] = $request['color'];
            $str = Color::where('color_code', $request['color'])->first()->color_name;
        }

        foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
            if ($str != null) {
                $str .= '-' . str_replace(' ', '', $request[$choice->name]);
            } else {
                $str .= str_replace(' ', '', $request[$choice->name]);
            }
        }

        if ($str != null) {
            $price = json_decode($product->variations)->$str->price;
            $sku = json_decode($product->variations)->$str->sku;
        } else {
            $price = $product->product_price;
            $sku = $product->product_sku;
        }
        return array('price' => $price, 'sku' => $sku);
    }
    // product compareproduct
    public function product_compare(Request $request, $id)
    {
        //return $userid;
        $userid = $request->ip();
        //return $userid;
        $checkproduct = CompareProduct::where('product_id', $id)->first();
        $checkip = CompareProduct::where('ip_address', $userid)->first();
        if ($checkproduct && $checkip) {
            return response()->json(['checkip' => $checkip]);
        } else {
            $compare = CompareProduct::insertGetId([
                'ip_address' => $userid,
                'product_id' => $id,
            ]);
            if ($compare) {
                return response()->json(['compare' => $compare]);
            }
        }
    }
    // product wishlist
    public function product_wishlist(Request $request, $id)
    {
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
    // allwishlist
    public function allwishlist()
    {
        $user_id = Auth::id();
        $allwishlist = wishlist::where('user_id', $user_id)->get();
        return view('mobile.shopping.wishlist', compact('allwishlist'));
    }
    public function deletewishlist($id)
    {
        $delete = wishlist::where('id', $id)->delete();
        if ($delete) {
            $notification = array(
                'messege' => 'Wish List Product Delete',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Wish List Product Delete Faild',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function checkoutPage()
    {
        return view('frontend.shipping.checkout');
    }

    // compare
    public function compare()
    {
        return view('mobile.shopping.compare');
    }
    // compare detele
    public function comparedelete($id)
    {
        // return $id;
        $delete = CompareProduct::where('id', $id)->delete();
        if ($delete) {
            $notification = array(
                'messege' => 'Delete Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Delete Faild',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // review
    public function review(Request $request)
    {
        $insert = ProductReview::insertGetId([
            'name' => $request['name'],
            'description' => $request['description'],
            'review' => $request['review'],
            'product_id' => $request['id'],
        ]);
        if ($insert) {
            $notification = array(
                'messege' => 'Your Review Has been Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Your Review Has been Faild,Please try Again!!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // order history
    public function orderhistory(){

      $user_id = Auth::id();
      $history = OrderPlace::where('user_id', $user_id)->orderBy('id', 'DESC')->simplepaginate(5);
      return view('mobile.shopping.orderhistory',compact('history'));
    }
// order details
    public function orderdetails($id){
      $orderplaceid = OrderPlace::where('id', $id)->first();
      return view('mobile.shopping.orderdetails',compact('orderplaceid'));

    }
    // order traking
    public function ordertraking(){
      return view('mobile.shopping.traking');
    }

    // search traking
    public function searchtraking(Request $request){
      $id=$request->orderid;
      $result= OrderPlace::where('order_id', $id)->first();
      return view('mobile.shopping.trackresult',compact('result'));
    }

    // payment blade
    public function paymentblade(){
      return view('mobile.shopping.payment');
    }

    // new arrival
    public function newarrival(){
      $products=Product::where('is_deleted',0)->where('status',1)->Simplepaginate(8);
      $all_categories=Category::where('is_deleted',0)->where('cate_status',1)->get();
      $all_brands=Brand::where('is_deleted',0)->where('brand_status',1)->get();
      $colours=Color::where('is_deleted',0)->where('color_status',1)->get();
      return view('mobile.newarrival.narrival',compact('products','all_categories','all_brands','colours'));
    }

    // warrenty area start

    public function showWarrenty()
    {
        return view('mobile.warrenty.warrenty');
    }


    // show support page
    public function showSupportPage()
    {
        return view('mobile.support.support');
    }


     public function blog()
    {
        $allblog=Blog::where('is_deleted',0)->where('status',1)->Simplepaginate(8);
        return view('mobile.blog.blog',compact('allblog'));
    }
    // details
    public function blogdetails($id){
        $data=Blog::where('id',$id)->first();
        return view('mobile.blog.blogdetails',compact('data'));
    }
    public function blogcom(Request $request){
        $id=$request->id;
        $comment=BlogComment::insertGetId([
            'blog_id'=>$request['id'],
            'name'=>$request['name'],
            'email'=>$request['email'],
            'comment'=>$request['comment'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($comment){
            $notification = array(
                'messege' => 'comment Success',
                'alert-type' =>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'comment faild',
                'alert-type' =>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    
}
