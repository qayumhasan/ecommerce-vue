<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\MobileBanner;
use App\MobileSlider;
use Illuminate\Http\Request;
// use Intervention\Image\Image;
use App\Http\Controllers\Controller;
use Image;

class MobileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //
    public function index()
    {
        $allslider = MobileSlider::where('is_deleted', 0)->get();
        return view('admin.ecommerce.m_slider.all', compact('allslider'));
    }
    // inser
    public function insert(Request $request)
    {
        //return $request;
        $data = new MobileSlider;
        $data->slider_link = $request->slider_link;


        if ($request->hasFile('pic')) {
            $image = $request->file('pic');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(480, 130)->save('public/uploads/banner/mobile/' . $ImageName);
            $data->slider_img = $ImageName;
        }
        if ($request->hasFile('bottom_image')) {
            $image = $request->file('bottom_image');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225, 90)->save('public/uploads/banner/mobile/' . $ImageName);
            $data->bottom_image = $ImageName;
        }

        if ($data->save()) {
            $notification = array(
                'messege' => 'Slider Insert Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Slider Insert Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // active
    public function deactive($id)
    {
        $deactive = MobileSlider::where('id', $id)->Update([
            'status' => '0',
            'updated_at' => Carbon::now()->toDatetimeString(),
        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Slider Deacitve Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Slider Insert Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function active($id)
    {
        $deactive = MobileSlider::where('id', $id)->Update([
            'status' => '1',
            'updated_at' => Carbon::now()->toDatetimeString(),
        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Slider acitve Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Slider Insert Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // softdelete
    public function softdelete($id)
    {
        $deactive = MobileSlider::where('id', $id)->Update([
            'is_deleted' => '1',
            'updated_at' => Carbon::now()->toDatetimeString(),
        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Slider Delete Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Slider Delete Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // edit
    public function edit($id)
    {
        $data = MobileSlider::where('id', $id)->first();
        return json_encode($data);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $old_image = $request->old_image;
        $update = MobileSlider::where('id', $id)->update([
            'slider_link' => $request['slider_link'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('pic')) {
            if ($old_image) {
                unlink('public/uploads/banner/mobile/' . $old_image);
                $image = $request->file('pic');
                $ImageName = '_' . '_' . time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(480, 130)->save('public/uploads/banner/mobile/' . $ImageName);
                MobileSlider::where('id', $id)->update([
                    'slider_img' => $ImageName,
                ]);
            }
        }
        if ($request->hasFile('bottom_image')) {
            $image = $request->file('bottom_image');
            $ImageName = 'bottom_image' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225, 90)->save('public/uploads/banner/mobile/' . $ImageName);
            MobileSlider::where('id', $id)->update([
                'bottom_image' => $ImageName,
            ]);
        }

        if ($update) {
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
    }

    // multipleSoftDelete
    public function multipleSoftDelete(Request $request)
    {
        $deleteid = $request->Input('delid');
        if ($deleteid) {
            $delet = MobileSlider::whereIn('id', $deleteid)->update([
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

    // restore
    public function restore($id)
    {
        $deactive = MobileSlider::where('id', $id)->Update([
            'is_deleted' => '0',
            'updated_at' => Carbon::now()->toDatetimeString(),
        ]);
        if ($deactive) {
            $notification = array(
                'messege' => 'Slider Restore Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Slider Restore Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // delete
    public function delete($id)
    {
        $slider_id = MobileSlider::where('id', $id)->first();
        $slider_image = $slider_id->slider_img;
        $bottom = $slider_id->bottom_image;
        if ($slider_image) {
            unlink('public/uploads/banner/mobile/' . $slider_image);
        }
        if ($bottom) {
            unlink('public/uploads/banner/mobile/' . $bottom);
        }
        $deleteid = MobileSlider::where('id', $id)->delete();
        if ($deleteid) {
            $notification = array(
                'messege' => 'Slider Delete Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Slider Delete Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // bannner
    public function banner()
    {
        $allbanner = MobileBanner::where('is_deleted', 0)->OrderBy('id', 'DESC')->get();
        return view('admin.ecommerce.mobilebanner.all', compact('allbanner'));
    }
    public function bannerinsert(Request $request)
    {
        $data = new MobileBanner;
        $data->section = $request->section;
        $data->link = $request->link;
        // $data->save();
        if ($request->section == 1) {
            if ($request->hasFile('pic')) {
                $image = $request->file('pic');
                $ImageName = 'amni_' . '_' . time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(460, 90)->save('public/uploads/sitebanner/mobile/' . $ImageName);
                $data->img = $ImageName;
            }
        }
        if ($request->section == 2) {
            if ($request->hasFile('pic')) {
                $image = $request->file('pic');
                $ImageName = 'amni_' . '_' . time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(225, 90)->save('public/uploads/sitebanner/mobile/' . $ImageName);
                $data->img = $ImageName;
            }
        }

        if ($data->save()) {
            $notification = array(
                'messege' => 'Banner Insert Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Banner Insert Successfully',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // active
    public function banneractive($id)
    {
        $active = MobileBanner::where('id', $id)->update([
            'status' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($active) {
            $notification = array(
                'messege' => 'Banner Active Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Banner active Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function bannerdeactive($id)
    {
        $active = MobileBanner::where('id', $id)->update([
            'status' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($active) {
            $notification = array(
                'messege' => 'Banner Deactive Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Banner Deactive Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function bannersoftdelete($id)
    {
        $active = MobileBanner::where('id', $id)->update([
            'is_deleted' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($active) {
            $notification = array(
                'messege' => 'Banner softdelete Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Banner softdelete Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function banneredit($id)
    {
        $active = MobileBanner::where('id', $id)->first();
        return json_encode($active);
    }

    public function bannerupdate(Request $request)
    {
        $id = $request->id;
        $old_image = $request->old_image;
        $update = MobileBanner::where('id', $id)->update([
            'section' => $request['section'],
            'link' => $request['link'],
        ]);
        //
        if ($request->section == 1) {
            if ($request->hasFile('pic')) {
                unlink('public/uploads/sitebanner/mobile/' . $old_image);
                $image = $request->file('pic');
                $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(460, 90)->save('public/uploads/sitebanner/mobile/' . $ImageName);
                MobileBanner::where('id', $id)->update([
                    'img' => $ImageName,
                ]);
            }
        }
        if ($request->section == 2) {
            if ($request->hasFile('pic')) {
                unlink('public/uploads/sitebanner/mobile/' . $old_image);
                $image = $request->file('pic');
                $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(225, 90)->save('public/uploads/sitebanner/mobile/' . $ImageName);
                MobileBanner::where('id', $id)->update([
                    'img' => $ImageName,
                ]);
            }
        }
        if ($update) {
            $notification = array(
                'messege' => 'Banner update  Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Banner Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // multipleDelete

    public function multibanmodel(Request $request)
    {
        $deleteid = $request->Input('delid');
        if ($deleteid) {
            $delet = MobileBanner::whereIn('id', $deleteid)->update([
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

    // delete
    public function mobannerdelete($id)
    {
        $del_id = MobileBanner::where('id', $id)->first();
        $image = $del_id->img;
        if ($image) {
            unlink('public/uploads/sitebanner/mobile/' . $image);
        }
        $delete = MobileBanner::where('id', $id)->delete();
        if ($delete) {
            $notification = array(
                'messege' => 'success',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'success',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    // restore
    public function mobanrestore($id)
    {
        $active = MobileBanner::where('id', $id)->update([
            'is_deleted' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($active) {
            $notification = array(
                'messege' => 'Banner Restore Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Banner Restore Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
