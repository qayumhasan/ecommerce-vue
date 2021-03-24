<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\FlashDeal;
use App\FlashDealDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class FlashDealController extends Controller
{
    // insert flash deal view
    public function create()
    {
        $products = Product::select(['product_name', 'id'])->where('is_deleted', 0)->where('status', 1)->get();
        return view('admin.ecommerce.flash_deal.create', compact('products'));
    }

    // flash deal insert method
    public function insert(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'product_id' => 'required'
        ]);

        // $start_date = date('d/m/Y', strtotime($request->start_date));
        // $end_date = date('d/m/Y', strtotime($request->end_date));

        $AddFlashDeal = FlashDeal::insertGetId([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 0,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        $discount = $request->discount;
        $discountType = $request->discount_type;
        $index = 0;
        foreach ($discount as $id => $value) {

            FlashDealDetail::insert([
                'flash_deal_id' => $AddFlashDeal,
                'product_id' => $id,
                'discount' => $value,
                'status' => 0,
                'discount_type' => $discountType[$index],
            ]);
            $index++;

        }

        $notification = array(
            'messege' => 'Flash Deal Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    // Get All Products Method
    public function index()
    {
        $flashDeals = FlashDeal::where('is_deleted', 0)->get();
        return view('admin.ecommerce.flash_deal.index', compact('flashDeals'));
    }

    // Change Flash Deal Status Method
    public function changeStatus($flashDeal)
    {
        $allActiveFlashDeal = FlashDeal::where('status', 1)->get();
        if ($allActiveFlashDeal->count() > 1) {
            foreach ($allActiveFlashDeal as $value) {
                $value->update([
                    'status' => 0
                ]);

                foreach ($value->flash_deal_details as $flash_deal_detail) {
                    $flash_deal_detail->status = 0;
                    $flash_deal_detail->save();
                }
            }
        }

        $changeFlashDealStatus = FlashDeal::where('id', $flashDeal)->first();

        if ($changeFlashDealStatus->status == 1) {
            $changeFlashDealStatus->update([
                'status' => 0
            ]);

            foreach ($changeFlashDealStatus->flash_deal_details as $flash_deal_detail) {
                $flash_deal_detail->update([
                    'status' => 0
                ]);
            }
        } else {

            $changeFlashDealStatus->update([
                'status' => 1
            ]);

            foreach ($changeFlashDealStatus->flash_deal_details as $flash_deal_detail) {
                $flash_deal_detail->update([
                    'status' => 1
                ]);
            }
        }
        $notification = array(
            'messege' => 'Successfully Changed Flash Deal Status',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // Flash Deal Edit view Method
    public function edit($flashDealId)
    {
        $flashDeal = FlashDeal::with(['flash_deal_details', 'flash_deal_details.product'])->where('id', $flashDealId)->firstOrFail();
        $products = Product::select(['id', 'product_name', 'thumbnail_img'])->get();
        return view('admin.ecommerce.flash_deal.edit', compact('flashDeal', 'products'));
    }

    // This is the update method of flash deal
    public function update(Request $request, $flashDealId)
    {

        $this->validate($request, [
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        FlashDeal::where('id', $flashDealId)->update([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        //$product_ids = $request->product_id;

        $getFlashDealDetails = FlashDealDetail::where('flash_deal_id', $flashDealId)->get();

        if ($getFlashDealDetails) {
            foreach ($getFlashDealDetails as $getFlashDealDetail) {
                $getFlashDealDetail->change_status_for_update = 1;
                $getFlashDealDetail->save();
            }
        }

        $discount = $request->discount;
        $discount_type = $request->discount_type;
        $index = 0;

        foreach ($discount as $pId => $value) {
            FlashDealDetail::insert([
                'flash_deal_id' => $flashDealId,
                'product_id' => $pId,
                'discount' => $value,
                'discount_type' => $discount_type[$index]
            ]);
            $index++;
        }

        $deleteFlashDealDetails = FlashDealDetail::where('flash_deal_id', $flashDealId)->where('change_status_for_update', 1)->get();
        foreach ($deleteFlashDealDetails as $deleteFlashDealDetail) {
            $deleteFlashDealDetail->delete();
        }

        $notification = array(
            'messege' => 'Flash Deal Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Flash Deal Single Soft Delete
    public function softDelete($flashDealId)
    {
        $flashDeal = FlashDeal::where('id', $flashDealId)->first();

        $flashDeal->update([
            'is_deleted' => 1,
            'status' => 0
        ]);
        foreach ($flashDeal->flash_deal_details as $flash_deal_detail) {
            $flash_deal_detail->update([
                'status' => 0
            ]);
        }
        $notification = array(
            'messege' => 'Flash Deal Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Flash Deal multiple Soft Delete
    public function multipleSoftDelete(Request $request)
    {
        $delId = $request->delid;
        if ($delId == NULL) {
            $notification = array(
                'messege' => 'You Did Not Select Any Flash Deal',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $delId = $request->delid;

        $getFlashDeal = FlashDeal::where('id', $delId)->get();

        foreach ($getFlashDeal as $value) {

            $value->update([
                'is_deleted' => 1,
                'status' => 0,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            foreach ($value->flash_deal_details as $flash_deal_detail) {
                $flash_deal_detail->status = 0;
                $flash_deal_detail->save();
            }
        }
        $notification = array(
            'messege' => 'All Flash Deal has been Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // All Flash Deal Trash View
    public function allFlashDealTrashView()
    {
        $allFlashDealTrashes = FlashDeal::where('is_deleted', 1)->get();
        return view('admin.ecommerce.trash.flash_deal', compact('allFlashDealTrashes'));
    }

    // Flash Deal single Refactor From Trash
    public function singleRefactor($flashDealId)
    {
        FlashDeal::where('id', $flashDealId)->update([
            'is_deleted' => 0
        ]);
        $notification = array(
            'messege' => 'Flash Deal Refactored Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Flash Deal Single Force Delete From Trash , This Is The Method
    public function singleForceDelete($flashDealId)
    {
        $deleteFlashDeal = FlashDeal::where('id', $flashDealId)->first();
        $flashdealdetails=FlashDealDetail::where('flash_deal_id',$flashDealId)->get();
        foreach ($flashdealdetails as $data) {
          $data->delete();
        }

        $deleteFlashDeal->delete();
        $notification = array(
            'messege' => 'Flash Deal Permanent Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Multiple Flash Deal Force Delete And Refactor Method
    public function multipleForceDelete(Request $request)
    {
        $delId = $request->delid;
        if ($delId == null) {
            if ($delId == NULL) {
                $notification = array(
                    'messege' => 'You Did Not Select Any Flash Deal',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        if ($request->submit === 'delete') {

            $flashDeals = FlashDeal::where('id', $delId)->get();
            foreach ($flashDeals as $flashDeal) {
                foreach ($flashDeal->flash_deal_details as $flash_deal_detail) {
                    $flash_deal_detail->delete();
                }
                $flashDeal->delete();
            }
            $notification = array(
                'messege' => 'Your Selected All Flash Deal Permanent Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } elseif ($request->submit === 'restore') {

            FlashDeal::whereIn('id', $delId)->update([
                'is_deleted' => 0,
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);

            $notification = array(
                'messege' => 'Your Selected All Flash Deal Is Refactored Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function inactiveAll()
    {
        $allActiveFlashDeal = FlashDeal::where('status', 1)->get();

        foreach ($allActiveFlashDeal as $value) {
            $value->status = 0;
            $value->save();
            foreach ($value->flash_deal_details as $flash_deal_detail) {
                $flash_deal_detail->status = 0;
                $flash_deal_detail->save();
            }
        }
        $notification = array(
            'messege' => 'Successfully All Flash Deal Is Deactivated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // get product by ajax and method is here
    public function getProductsByAjax(Request $request)
    {
        $product_ids = $request->productId;
        return view('admin.ecommerce.flash_deal.partial.products_view', compact('product_ids'));
    }
    // get flash deal's previous And new  product by ajax and method is here
    public function getProductsPreviousAndNewByAjax(Request $request)
    {
        $flash_deal_id = $request->flash_deal_id;
        $product_ids = $request->productId;
        return view('admin.ecommerce.flash_deal.partial.previous_flash_deal_product', compact('flash_deal_id', 'product_ids'));
    }
}
