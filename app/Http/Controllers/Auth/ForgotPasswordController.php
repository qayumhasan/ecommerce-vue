<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Logo;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendForgetPasswordVerifyCodeMail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('frontend.accounts.forget_password_form');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $number_length = 6;
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

            Mail::to($request->email)->send(new SendForgetPasswordVerifyCodeMail($getUserInfo, $frontLogo, $siteSettings));
            return redirect()->route('forget.password.verify.code.form', $getUserInfo->remember_token);
        } else {
            session()->flash('errorMsg', 'Email ID does not exists.');
            return redirect()->back();
        }
    }

    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    public function forgetPassVerificationCodeFrom($remember_token)
    {
        $checkRememberToken = User::where('remember_token', $remember_token)->firstOrFail();
        $remember_token = $checkRememberToken->remember_token;

        abort_if(!$checkRememberToken, 403);
        return view('frontend.accounts.forget_password_verification_code', compact('remember_token'));
    }

    public function checkForgetPassVerificationCode(Request $request)
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
            return redirect()->route('forget.reset.password', $checkCorrectVerifyingCode->remember_token);
        } else {
            session()->flash('errorMsg', 'Verification code does not match.');
            return redirect()->back();
        }
    }

    public function forgetResetPasswordForm($remember_token)
    {
        $getUser = User::where('remember_token', $remember_token)->firstOrFail();
        abort_if(!$getUser, 403);
        return view('frontend.accounts.forget_reset_password_form', compact('getUser'));
    }

    public function forgetResetPasswordSubmit(Request $request)
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

    public function forgetResendVerificationCodeMail($remember_token)
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
        return redirect()->route('forget.password.verify.code.form', $remember_token);

    }
}
