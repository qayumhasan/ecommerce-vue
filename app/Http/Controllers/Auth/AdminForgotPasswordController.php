<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;
use Auth;
use Illuminate\Http\Request;
use App\Admin;
use App\Logo;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\adminsendmail;


class AdminForgotPasswordController extends Controller
{


    use SendsPasswordResetEmails;

   public function __construct()
    {
        $this->middleware('guest:admin');
    }

    protected function broker()
    {
      return Password::broker('admins');
    }

    public function showLinkRequestForm()
    {
        return view('admin.auth.forget');
    }
    public function sendResetLinkEmail(Request $request){
        $check=Admin::where('email',$request->email)->first();
        if($check){

          $code=rand(2222,10000);
          Admin::where('email',$request->email)->update([
            'verification_code'=>$code,
          ]);
          Mail::to($request->email)->send(new adminsendmail($code));
          $notification=array(
               'messege'=>'Verification Code Send Your Email!!! ',
               'alert-type'=>'Success'
                );
          return redirect()->route('admin.auth.adminverification',$request->email);


        }else{
          $notification=array(
               'messege'=>'This Email DoesNot Exit !!! ',
               'alert-type'=>'error'
                );
          return redirect()->back()->with($notification);
        }

    }
    // email send
    public function adminverification($email){
      return view('admin.auth.adminverification',compact('email'));
    }

    public function adminverifycode(Request $request){
                $email= $request->email;
                $code= $request->code;
                $check=Admin::where('email',$email)->where('verification_code',$code)->first();
                if($check){
                  $notification=array(
                       'messege'=>'Your Code  Match !!! ',
                       'alert-type'=>'success'
                        );
                  return redirect()->route('admin.forget.pass.reset',$email)->with($notification);
                }else{
                  $notification=array(
                       'messege'=>'Your Code DoesNot Match !!! ',
                       'alert-type'=>'error'
                        );
                  return redirect()->back()->with($notification);
                }



    }

    public function adminpassreset($email){
        //return $email;
      return view('admin.auth.adminpassreset',compact('email'));
    }

    public function adminforpasschange(Request $request){
              $email=$request->email;
              $this->validate($request, [
                  'password' => 'min:8',
                  'password_confirmation' => 'required_with:password|same:password|min:8'
              ]);
              $update=Admin::where('email',$email)->update([
                'password'=>Hash::make($request->password),
              ]);
              if($update){
                $notification=array(
                     'messege'=>' Your Password Successfully Change! ',
                     'alert-type'=>'success'
                      );
                return redirect()->route('admin.login')->with($notification);
              }else{
                $notification=array(
                     'messege'=>'Password Change Faild! ',
                     'alert-type'=>'error'
                      );
                return redirect()->back()->with($notification);
              }
    }





}
