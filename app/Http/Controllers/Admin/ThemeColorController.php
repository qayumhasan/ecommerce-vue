<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ThemeColor;
use Carbon\Carbon;


class ThemeColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // color new
    public function index()
    {
        $allcolor = ThemeColor::where('is_deleted', 0)->get();
        return view('admin.ecommerce.themecolor.all', compact('allcolor'));
    }
    //
    public function insert(Request $request)
    {
        $insert = ThemeColor::insertGetId([
            'color_code' => $request['color_code'],
            'hover_code' => $request['hover_code'],
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($insert) {
            $notification = array(
                'messege' => 'Color Insert Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Color Insert Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    //edit
    public function edit($id)
    {
        $data = ThemeColor::where('id', $id)->first();
        return response($data);
    }
    // update
    public function update(Request $request)
    {
        $id = $request->id;
        $update = ThemeColor::where('id', $id)->update([
            'color_code' => $request['color_code'],
            'hover_code' => $request['hover_code'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($update) {
            $notification = array(
                'messege' => 'Color Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Color Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // softDelete
    public function softDelete($id)
    {
        $delete = ThemeColor::where('id', $id)->delete();
        if ($delete) {
            $notification = array(
                'messege' => 'Delete Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Delete Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // active
    public function active($id)
    {

        $color = ThemeColor::get();
        foreach ($color as $data) {
            $nnid = $data->id;
            $update = ThemeColor::where('id', $nnid)->update([
                'status' => '0',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
        $newupdate = ThemeColor::where('id', $id)->update([
            'status' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($newupdate) {
            $notification = array(
                'messege' => 'Active Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Active Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // multipleSoftDelete
    public function multisofdel(Request $request)
    {
        $deleteid = $request->Input('delid');
        if ($deleteid) {
            $delet = ThemeColor::whereIn('id', $deleteid)->delete();
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
}
