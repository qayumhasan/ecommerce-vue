<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Color;
use Carbon\Carbon;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // index
    public function index()
    {
        $allcolor = Color::where('is_deleted', 0)->get();
        return view('admin.ecommerce.color.all', compact('allcolor'));
    }

    public function insert(Request $request)
    {
        $insert = Color::insertGetId([
            'color_name' => $request['color_name'],
            'color_code' => $request['color_code'],
        ]);
        if ($insert) {
            $notification = array(
                'messege' => 'Color Insert Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Color Insert Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // active
    public function active($id)
    {
        $active = Color::where('id', $id)->update([
            'color_status' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($active) {
            $notification = array(
                'messege' => 'Color Active Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Color Active Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function deactive($id)
    {
        $deactive = Color::where('id', $id)->update([
            'color_status' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Color Active Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Color Active Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // soft delete
    public function softdelete($id)
    {
        $softdelete = Color::where('id', $id)->update([
            'is_deleted' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($softdelete) {
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
    // multiple soft delete
    public function multisoftdel(Request $request)
    {
        $deleteid = $request->Input('delid');
        if ($deleteid) {
            $delet = Color::whereIn('id', $deleteid)->update([
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

    // recover
    public function recover($id)
    {
        $recover = Color::where('id', $id)->update([
            'is_deleted' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($recover) {
            $notification = array(
                'messege' => 'Recover Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Recover Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // heard delete single
    public function delete($id)
    {
        $delete = Color::where('id', $id)->delete();
        if ($delete) {
            $notification = array(
                'messege' => 'Delete Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Delete Success',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function edit($color_id)
    {
        $data = Color::where('id', $color_id)->first();
        return json_encode($data);
    }
    // update
    public function update(Request $request)
    {
        $id = $request->id;
        $update = Color::where('id', $id)->update([
            'color_name' => $request['color_name'],
            'color_code' => $request['color_code'],

        ]);
        if ($update) {
            $notification = array(
                'messege' => 'Update Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
