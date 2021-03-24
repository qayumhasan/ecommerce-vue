<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ThemeSelector;
use Carbon\Carbon;
use Session;
use Image;
use DB;


class ThemeOptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // ThemeSelector page show

    public function themeSelectorPageShow()
    {
        $themselect = ThemeSelector::where('is_deleted',0)->get();
        return view('admin.setting.themeselctor', compact('themselect'));
    }
    public function active($id){
       $theme = ThemeSelector::get();
        foreach ($theme as $data) {
            $nnid = $data->id;
            $update = ThemeSelector::where('id', $nnid)->update([
                'status' => '0',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
        $newupdate = ThemeSelector::where('id', $id)->update([
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

    public function deactive($id){
        return $id;
    }







    public function productModal()
    {
        return view('frontend.product_modal.home1');
    }
}
