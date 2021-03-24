<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SmsModel;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // sms update setting

    public function smsUpdate(Request $request)
    {
        $id = $request->sms_id;
        $update=SmsModel::where('id',$id)->update([
            'sms_url'=>$request['sms_url'],
            'sms_username'=>$request['sms_username'],
            'sms_password'=>$request['sms_password'],
            'sms_type'=>$request['sms_type'],
            'sms_masking'=>$request['sms_masking'],
        ]);
        
        $notification=array(
            'messege'=>'Successfully  Updated',
            'alert-type'=>'success'
            );
        return redirect()->back()->with($notification);
    }


    // sending sms to user

    
}
