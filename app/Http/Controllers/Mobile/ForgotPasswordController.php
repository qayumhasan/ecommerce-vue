<?php

namespace App\Http\Controllers\Mobile;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendForgetPasswordVerifyCodeMail;
use App\Logo;
use DB;

class ForgotPasswordController extends Controller
{
    public function forgotPasswordForm()
    {
        return view('mobile.accounts.forgot_password.forgot_password_form');
    }

    public function mobileForgetPasswordEmail(Request $request)
    {
        $this->validateEmail($request);

        $number_length = 5;
        $i = 0; //counter
        $random_number = ''; //our default pin is blank.
        while ($i < $number_length) {
            //generate a random number between 0 and 9.
            $random_number .= mt_rand(0, 9);
            $i++;
        }

        $checkExistsEmail = User::where('email', $request->email)->first();
        if ($checkExistsEmail) {
            $checkExistsEmail->remember_token = md5($request->email);
            $checkExistsEmail->verification_code = $random_number;
            $checkExistsEmail->save();

            $getUserInfo = User::where('email', $request->email)
                            ->select(['remember_token', 'verification_code', 'email', 'username'])
                            ->first();
               $frontLogo = Logo::select(['front_logo'])->first();
            $siteSettings = DB::table('sitesetting')
                            ->select(['company_name', 'address', 'facebook', 'instagram', 'twitter'])
                            ->first();                
            Mail::to($request->email)
            ->send(new SendForgetPasswordVerifyCodeMail($getUserInfo, $frontLogo, $siteSettings));
            return redirect()->route('mobile.forgot.password.verify.form', $getUserInfo->remember_token);
        } else {
            session()->flash('errorMsg', 'Email ID does not exists.');
            return redirect()->back();
        }
    }

    public function mobileForgotPasswordVerifyCodeFrom($remember_token)
    {
        $checkRememberToken = User::where('remember_token', $remember_token)->firstOrFail();
        $remember_token = $checkRememberToken->remember_token;
        abort_if(!$checkRememberToken, 403);
        return view('mobile.accounts.forgot_password.verification_code_form', compact('remember_token'));
    }

    public function mobileForgetCheckVerificationCode(Request $request)
    {
        $this->validate($request, [
            'verification_code' => 'required'
        ]);

        $checkCorrectVerifyingCode = User::where('remember_token', $request->remember_token)->where('verification_code', $request->verification_code)->first();

        if ($checkCorrectVerifyingCode) {

            $checkCorrectVerifyingCode->remember_token = NULL;
            $checkCorrectVerifyingCode->verification_code = NULL;
            $checkCorrectVerifyingCode->save();
            $checkCorrectVerifyingCode->remember_token = md5($request->verification_code);
            $checkCorrectVerifyingCode->save();
            return redirect()->route('mobile.forgot.reset.password.form', $checkCorrectVerifyingCode->remember_token);
        } else {
            session()->flash('errorMsg', 'Verification code does not match.');
            return redirect()->back();
        }
    }

    public function mobileForgetResetPassFrom($remember_token)
    {
        $getUser = User::where('remember_token', $remember_token)->firstOrFail();
        $remember_token = $getUser->remember_token;
        abort_if(!$getUser, 403);
        return view('mobile.accounts.forgot_password.forgot_reset_password_form', compact('remember_token'));
    }

    public function mobileForgotResetPassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:3'
        ]);
        $resetPassword = User::where('remember_token', $request->remember_token)->first();
        $resetPassword->password = Hash::make($request->password);
        $resetPassword->save();
        session()->flash('successMsg', 'Successfully Your Password Has Been Changed.');
        return redirect()->route('login');
    }

    public function MobileForgotPassResendVerifyCodeMail($remember_token)
    {
        $number_length = 6;
        $i = 0; //counter
        $random_number = ''; //our default pin is blank.
        while ($i < $number_length) {
            //generate a random number between 0 and 9.
            $random_number .= mt_rand(0, 9);
            $i++;
        }

        $user = User::where('remember_token', $remember_token)->first();
        $user->verification_code = NULL;
        $user->save();
        $user->verification_code = $random_number;
        $user->save();
            $frontLogo = Logo::select(['front_logo'])->first();
            $siteSettings = DB::table('sitesetting')
                            ->select(['company_name', 'address', 'facebook', 'instagram', 'twitter'])
                            ->first();
        Mail::to($user->email)->queue(new SendForgetPasswordVerifyCodeMail($user, $frontLogo, $siteSettings));
        session()->flash('successMsg', 'Mail sended again.');
        return redirect()->route('mobile.forgot.password.verify.form', $user->remember_token);

    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

}
