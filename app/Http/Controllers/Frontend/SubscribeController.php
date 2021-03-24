<?php

namespace App\Http\Controllers\Frontend;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeSubscribeMessage;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Logo;


class SubscribeController extends Controller
{
    public function insert(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'subscriber_email' => 'required|email|unique:subscribers,email',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'messege' => 'Sorry!This email already exist!',
                'alert-type' => 'warning'
            );
            return Redirect()->back()->with($notification);
        }

        Subscriber::insert([
            'email' => $request->subscriber_email
        ]);

        $siteSettings = DB::table('sitesetting')->select('company_name')->first();
        $frontLogo = Logo::select(['front_logo'])->first();
        Mail::to($request->subscriber_email)->send(new WelcomeSubscribeMessage($siteSettings, $frontLogo));

        $notification = array(
            'messege' => 'Successfully Subcribtion for NewsLetter!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
}
