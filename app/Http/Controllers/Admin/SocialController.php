<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Social;
use Carbon\Carbon;
use Image;
use Session;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
    	$data=Social::first();
    	return view('admin.social.sociallog',compact('data'));
    }
    public function update(Request $request){
    	$id=$request->id;
    	$update=Social::where('id',$id)->update([
    		'facebook'=>$request->facebook,
    		'youtube'=>$request->youtube,
    		'twitter'=>$request->twitter,
    		'google'=>$request->google,
    		'instragram'=>$request->instragram,
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($update){
    		 $notification = array(
                'messege' => 'Update Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    	}else{
    		 $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
    	}
    }
}
