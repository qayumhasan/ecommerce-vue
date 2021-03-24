<?php

namespace App\Http\Controllers\Frontend;

use App\Contract;
use App\ContractImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use DB;

class ContractUsController extends Controller
{
    public function index()
    {
        $contact = DB::table('sitesetting')->first();
        return view('frontend.pages.contactus',compact('contact'));
    }

    public function sendMessage(Request $request)
    {
        //return $request;

        $this->validate($request,[
            'visitor_name' => 'required',

            'phone' => 'required|numeric',

        ]);

        $images = $request->file('visitor_image');

        $instantIdNo = Contract::insertGetId([
            'visitor_name' => $request->visitor_name,
            'visitor_email' => $request->visitor_email,
            'visitor_message' => $request->visitor_message,
            'subject' => $request->visitor_subject,
            'phone' => $request->phone,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($instantIdNo){
            $notification = array(
                'messege' => 'messege send success',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
              $notification = array(
                'messege' => 'messege send faild',
                'alert-type' => 'faild'
            );
            return redirect()->back()->with($notification);
        }


    }
}
