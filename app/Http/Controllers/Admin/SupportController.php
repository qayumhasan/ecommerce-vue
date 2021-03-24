<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use Carbon\Carbon;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $allsupport = Support::where('is_deleted', 0)->get();
        return view('admin.ecommerce.support.all', compact('allsupport'));
    }

    public function insert(Request $request)
    {
        $insert = Support::insertGetId([
            'heading_text' => $request['heading_text'],
            'details' => $request['details'],
            'icon' => $request['icon'],
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($insert) {
            $notification = array(
                'messege' => 'support Insert Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'support Insert Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // active
    public function active($id)
    {
        // return $id;
        $active = Support::where('id', $id)->update([
            'status' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($active) {
            $notification = array(
                'messege' => 'Warranty Active Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Warranty Active Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // DeActive
    public function deactive($id)
    {
        //return $id;
        $deactive = Support::where('id', $id)->update([
            'status' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Warranty DeActive Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Warranty DeActive Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // soft delete
    public function softDelete($id)
    {

        $deactive = Support::where('id', $id)->update([
            'is_deleted' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Warranty Delete Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Warranty Delete Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // Restore

    public function restore($id)
    {
        $deactive = Support::where('id', $id)->update([
            'is_deleted' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Warranty Restore Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Warranty Restore Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // delete heard
    public function delete($id)
    {
        $delete = Support::where('id', $id)->delete();
        if ($delete) {
            $notification = array(
                'messege' => 'Warranty Delete Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Warranty Delete Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // multidelete
    public function multipleSoftDelete(Request $request)
    {
        $deleteid = $request->Input('delid');
        if ($deleteid) {
            $delet = Support::whereIn('id', $deleteid)->update([
                'is_deleted' => '1',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            if ($delet) {
                $notification = array(
                    'messege' => 'success',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'error',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'messege' => 'Nothing To Delete',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }

    // edit
    public function edit($id)
    {
        $data = Support::where('id', $id)->first();
        return response($data);
    }
    // update
    public function update(Request $request)
    {

        $id = $request->id;
        $update = Support::where('id', $id)->update([
            'heading_text' => $request['heading_text'],
            'details' => $request['details'],
            'icon' => $request['icon'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($update) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
