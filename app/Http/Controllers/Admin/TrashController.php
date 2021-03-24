<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\ReSubCategory;
use App\Mesurement;
use App\Color;
use App\Product;
use App\Support;
use App\Blog;
use App\BlogComment;
use App\Brand;
use App\Cupon;
use App\Faq;
use App\Page;
use App\Warranty;
use App\Banner;
use Carbon\Carbon;
use App\SiteBanner;
use App\OrderPlace;
use App\MobileSlider;
use App\MobileBanner;
use DB;

class TrashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    }

    // blog
    public function blog(){
        $all=Blog::where('is_deleted',1)->get();
        return view('admin.ecommerce.trash.blog',compact('all'));
    }
    // del
    public function blogdel(Request $request){
       switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deletpost = Blog::whereIn('id', $deleteid)->delete();
                     $commentdelete=BlogComment::whereIn('blog_id',$deleteid)->get();
                        foreach ($commentdelete as $key => $value) {
                            $comm=$value->delete();
                           
                        }
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Blog::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }

    // category
    public function category()
    {
        $allcategory = Category::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.category', compact('allcategory'));
    }
    // heard delete and restore

    public function hearddeletecategory(Request $request)
    {

        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Category::whereIn('id', $deleteid)->first();
                    $cate_image = $delet->cate_image;
                    $cate_icon = $delet->cate_icon;
                    $deletpost = Category::whereIn('id', $deleteid)->delete();
                    unlink('public/uploads/category/' . $cate_image);
                    unlink('public/uploads/category/' . $cate_icon);

                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Category::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }

    // subcategory
    public function subcategory()
    {
        // $allsubcate=SubCategory::where('is_deleted',0)->get();

        $allsubcate = DB::table('sub_categories')
            ->join('categories', 'sub_categories.cate_id', '=', 'categories.id')
            ->select('sub_categories.*', 'categories.cate_name')
            ->where('sub_categories.is_deleted', 1)
            ->get();
        return view('admin.ecommerce.trash.subcategory', compact('allsubcate'));
    }
    // heard delete subcategory

    public function hearddelsubcate(Request $request)
    {

        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = SubCategory::whereIn('id', $deleteid)->first();
                    $subcate_image = $delet->subcate_image;
                    $subcate_icon = $delet->subcate_icon;
                    $deletpost = SubCategory::whereIn('id', $deleteid)->delete();
                    unlink('public/uploads/subcategory/' . $subcate_image);
                    unlink('public/uploads/subcategory/' . $subcate_icon);

                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = SubCategory::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }
    // resubcategory
    public function resubcategory()
    {
        $allresubcate = DB::table('re_sub_categories')
            ->join('categories', 're_sub_categories.cate_id', '=', 'categories.id')
            ->join('sub_categories', 're_sub_categories.subcate_id', '=', 'sub_categories.id')
            ->select('re_sub_categories.*', 'categories.cate_name', 'sub_categories.subcate_name')
            ->where('re_sub_categories.is_deleted', 1)
            ->get();
        return view('admin.ecommerce.trash.resubcategory', compact('allresubcate'));
    }
    // multidele
    public function resubmultidel(Request $request)
    {
        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = ReSubCategory::whereIn('id', $deleteid)->first();

                    $resubcate_icon = $delet->resubcate_icon;
                    $deletpost = ReSubCategory::whereIn('id', $deleteid)->delete();
                    unlink('public/uploads/resubcategory/' . $resubcate_icon);
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = ReSubCategory::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }
    // color
    public function color()
    {
        $allcolor = Color::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.color', compact('allcolor'));
    }

    public function multicolordel(Request $request)
    {
        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {

                    $deletpost = Color::whereIn('id', $deleteid)->delete();
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Color::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }
    // brand
    public function brand()
    {
        $allbrand = Brand::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.brand', compact('allbrand'));
    }
    // multi heard delete
    public function brandhearddelete(Request $request)
    {
        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {

                    $delet = Brand::whereIn('id', $deleteid)->first();
                    $brand_logo = $delet->brand_logo;

                    $deletpost = Brand::whereIn('id', $deleteid)->delete();
                    unlink('public/uploads/brand/' . $brand_logo);

                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Brand::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }
    // measurement
    public function measurement()
    {
        $allmesurement = Mesurement::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.measurement', compact('allmesurement'));
    }

    public function measurementhearddelete(Request $request)
    {
        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {

                    $deletpost = Mesurement::whereIn('id', $deleteid)->delete();
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Mesurement::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }
    // product
    public function product()
    {
        $allproduct = Product::where('is_deleted', 1)->get();

        return view('admin.ecommerce.trash.product', compact('allproduct'));
    }

    // multi-heard delete

    public function producthearddel(Request $request)
    {

        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deleid = Product::whereIn('id', $deleteid)->first();
                    $image_thumb = $deleid->thumbnail_img;
                    unlink('public/uploads/products/thumbnail/' . $image_thumb);
                    unlink('public/uploads/products/thumbnail/cartthum/' . $image_thumb);
                    unlink('public/uploads/products/thumbnail/productdetails/' . $image_thumb);
                    unlink('public/uploads/products/thumbnail/smallthum/' . $image_thumb);
                    $deletpost = Product::whereIn('id', $deleteid)->delete();
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Product::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }
    // cupon
    public function cupon()
    {
        $allcupon = Cupon::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.cupon', compact('allcupon'));
    }

    // multi heard delete and restore
    public function cuponmultidelete(Request $request)
    {
        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deletpost = Cupon::whereIn('id', $deleteid)->delete();
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Cupon::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }

    // faq
    public function faqtrash()
    {
        $allfaq = Faq::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.faq', compact('allfaq'));
    }
    // faqmulti delete & recover
    public function multihearddelfaq(Request $request)
    {
        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deletpost = Faq::whereIn('id', $deleteid)->delete();
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Faq::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }
    // page
    public function page()
    {
        $page = Page::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.page', compact('page'));
    }
    // page heard delete and recover
    public function pagemultdel(Request $request)
    {
        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deletpost = Page::whereIn('id', $deleteid)->delete();
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multidelete Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Page::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }
    // banner
    public function banner()
    {
        $allbanner = Banner::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.banner', compact('allbanner'));
    }

    public function banmultidel(Request $request)
    {
        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deleid = Banner::whereIn('id', $deleteid)->first();
                    $image_thumb = $deleid->ban_image;

                    unlink('public/uploads/banner/' . $image_thumb);
                    $deletpost = Banner::whereIn('id', $deleteid)->delete();
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Banner::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }


    public function SiteBanner()
    {
        $siteban = SiteBanner::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.sitebanner', compact('siteban'));
    }

    // trash siteban
    // sitebanner multidel
    public function sitebanmultidel(Request $request)
    {
        // return $request;
        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deleid = SiteBanner::whereIn('id', $deleteid)->first();
                    $image_thumb = $deleid->image;
                    unlink('public/uploads/sitebanner/' . $image_thumb);
                    $deletpost = SiteBanner::whereIn('id', $deleteid)->delete();
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = SiteBanner::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }


    // pending order
    public function alldeleteOrder()
    {
        $allorder = OrderPlace::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.order', compact('allorder'));
    }
    //

    public function ordermultdel(Request $request)
    {
        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deletpost = OrderPlace::whereIn('id', $deleteid)->delete();
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = OrderPlace::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }

    // warranty
    public function warrantytrash()
    {
        $allwarranty = Warranty::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.warranty', compact('allwarranty'));
    }

    // multi delete warranty
    public function warrantytrashdelete(Request $request)
    {
        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deletpost = Warranty::whereIn('id', $deleteid)->delete();
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Warranty::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }

    //Support
    public function support()
    {
        $allsupport = Support::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.support', compact('allsupport'));
    }

    public function supportnnmultidel(Request $request)
    {

        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deletpost = Support::whereIn('id', $deleteid)->delete();
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = Support::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }

    // mobile slider_img
    public function mobileslider()
    {
        $allslider = MobileSlider::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.m_slider', compact('allslider'));
    }

    // multipleDelete

    public function msliderdel(Request $request)
    {
        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deletpost = MobileSlider::whereIn('id', $deleteid)->delete();
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = MobileSlider::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }
    // mobile banner
    public function trashmobilebanner()
    {
        $allbanner = MobileBanner::where('is_deleted', 1)->OrderBy('id', 'DESC')->get();
        return view('admin.ecommerce.trash.mobilebanner', compact('allbanner'));
    }
    // multipleDelete
    public function mobilebandel(Request $request)
    {
        switch ($request->input('submit')) {
            case 'delete':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $deletpost = MobileBanner::whereIn('id', $deleteid)->delete();
                    if ($deletpost) {
                        $notification = array(
                            'messege' => 'Multiple Delete Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Delete Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Delete',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
            case 'restore':
                $deleteid = $request['delid'];
                if ($deleteid) {
                    $delet = MobileBanner::whereIn('id', $deleteid)->update([
                        'is_deleted' => '0',
                        'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    if ($delet) {
                        $notification = array(
                            'messege' => 'Multiple Recover Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'messege' => 'Multiple Recover Faild',
                            'alert-type' => 'errors'
                        );
                        return Redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'messege' => 'Nothing To Recover',
                        'alert-type' => 'info'
                    );
                    return Redirect()->back()->with($notification);
                }
                break;
        }
    }
    //

}
