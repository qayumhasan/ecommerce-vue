<?php

namespace App\Http\Controllers\Admin;

use App\FooterOption;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    // showing footer page

    public function footerShow()
    {
        $footeroption = FooterOption::findOrFail(11);
        return view('admin.setting.footeroption', compact('footeroption'));
    }


    // Update footer Option

    public function footerupdate(Request $request)
    {

        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'copyright' => 'required',
            'footer_text' => 'required',
        ]);

        $footer_update = FooterOption::where('id',11)->firstOrFail();
        $footer_update->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'copyright' => $request->copyright,
            'footer_text' => $request->footer_text,

        ]);

        if (request()->hasFile('payment_image')) {
            $footer_img = request()->file('payment_image');
            $imagename = uniqid() . '.' . $footer_img->getClientOriginalExtension();
            Image::make($footer_img)->resize(333, 32)->save('public/uploads/footerpayment/' .$imagename, 100);
            if(public_path('/uploads/footerpayment/').$footer_update->payment_image){
                unlink('public/uploads/footerpayment/'.$footer_update->payment_image);
            }
            $footer_update->update([
                'payment_image' => $imagename,
            ]);
        }

        if ($footer_update) {
            $notification = array(
                'messege' => 'Data Deactive Success',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);;
        } else {
            $notification = array(
                'messege' => 'Data Deactive Faild',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);;
        }
    }
}
