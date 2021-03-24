<?php

namespace App\Http\Controllers\Mobile;

use App\User;
use App\SmsModel;
use Carbon\Carbon;
use App\VerificationOption;
use Illuminate\Http\Request;
use DB;
use App\Logo;
use App\Mail\UserVerificationMail;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{

    public function showLoginForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->back();
        } else {
            return view('mobile.accounts.login');
        }
    }


    protected function register(Request $request)
    {

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|numeric|unique:users|regex:/(01)[0-9]{9}/',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $verify_code = rand(100000, 999999);
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'remember_token' => md5($request->email),
            'verification_code' => $verify_code,
            'ip_address' => $request->ip(),
            'created_at' => Carbon::now(),
        ]);

        $verificationWith = VerificationOption::first();

        if ($verificationWith->verify_with == 0) {
            
            $frontLogo = Logo::select(['front_logo'])->first();

            $siteSettings = DB::table('sitesetting')->select('company_name', 'address', 'facebook', 'twitter', 'instagram')->first();
            Mail::to($user->email)->send(new UserVerificationMail($user->username, $user->remember_token, $frontLogo, $siteSettings));
            session()->flash('successMsg', 'Registration Successful, Please Check your Mail And Verify Your Account.');

            return redirect()->route('user.auth.registration.success', $user->email);
            
        } elseif ($verificationWith->verify_with == 0) {
            // sms varification code send

            $smsusername = $user->username;
            $siteUrl = URL::to("/");
            $sms_text = $smsusername . ", Your Verification Code is:" . $verify_code . ' ' . $siteUrl;
            $user_phone = $user->phone;
            $smsinfo = SmsModel::first();
            $smsurl = $smsinfo->sms_url;
            $smsname = $smsinfo->sms_username;
            $smspassword = $smsinfo->sms_password;
            $smstype = $smsinfo->sms_type;
            $smsmasking = $smsinfo->sms_masking;
            $postData = array(
                'username' => urlencode($smsname),
                'password' => urlencode($smspassword),
                'sms_content' => $sms_text,
                'number' => urlencode($user_phone),
                'sms_type' => urlencode($smstype),
                'masking' => urlencode($smsmasking),
            );

            $ch = curl_init();
            curl_setopt_array($ch, array(

                CURLOPT_URL => $smsurl,
                // CURLOPT_URL => 'http://gosms.xyz/api/v1/sendSms',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData,
                CURLOPT_FOLLOWLOCATION => true

            ));

            $output = curl_exec($ch);
            return redirect()->route('mobile.sms.verify', $user->remember_token);
        }
    }

    // Email Verification Link
    public function emailVerification($token)
    {
        $user = User::where('remember_token', $token)->firstOrFail();
        if ($user) {
            $user->update([
                'status' => 1,
                'remember_token' => NULL,
                'email_verified_at' => Carbon::now(),
            ]);
            session()->flash('successMsg', 'Successfully your email is verified.');
            return redirect()->route('login');
        }
    }

    public function userRegistrationSuccess($email)
    {
        $user = User::where('email', $email)->firstOrFail();
        return view('mobile.accounts.register_success_page', compact('user'));
    }
   

    // show sms veryfication page
    public function smsVerifyPageShow($token)
    {
        $checkRememberToken = User::where('remember_token', $token)->firstOrFail();
        $remember_token = $checkRememberToken->remember_token;
        abort_if(!$checkRememberToken, 403);
        return view('mobile.accounts.sms_verify', compact('checkRememberToken'));
    }

    public function smsVerification(Request $request)
    {
        $userverify = $request->verify_code;
        $user = User::where('verification_code', $userverify)->where('remember_token', $request->verify_token)->firstOrFail();
        if (User::where('verification_code', $userverify)->where('remember_token', $request->verify_token)->exists()) {
            $user->update([
                'status' => 1,
                'remember_token' => NULL,
                'email_verified_at' => Carbon::now(),
            ]);
            $notification = array(
                'messege' => 'Successfully your Account is verified.',
                'alert-type' => 'success'
            );
    
            return redirect()->route('mobile.login.form')->with($notification);
        }
    }


    // user authentication area start

    public function userAuth(Request $request)
    {
        $request->validate([
            'login_email' => 'required',
            'login_password' => 'required',
        ]);

        $admin = User::where('email', request('login_email'))->where('status', 1)->first();
        if ($admin) {
            
            if (Auth::guard('web')->attempt(['email' => $request->login_email, 'password' => $request->login_password])) {
                
                $notification = array(
                    'messege' => 'You are Successfully Login!',
                    'alert-type' => 'success'
                );
                
                return redirect()->intended(url('/'))->with($notification);
                
            } else {
                $notification = array(
                    'messege' => 'Sorry !! Email or Password not matched!',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'messege' => 'Sorry !! Email or Password not matched!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // checkout login page show
    public function checkoutLoingPageShow()
    {
        return view('mobile.accounts.checkout_login');
    }

    // checkout login

    public function checkoutAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = User::where('email', request('email'))->where('status', 1)->first();
        if ($admin) {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect()->intended(route('checkout.page.show'));
            } else {
                $notification = array(
                    'messege' => 'Sorry !! Email or Password not matched!',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'messege' => 'Sorry !! Email or Password not matched!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // Logout a user

    public function userLogOut()
    {
        Auth::logout();
        return back();
    }

    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();
        // $user = Socialite::driver('google')->stateless()->user();
        $checkUser = User::where('email', $user->email)->first();
        if ($checkUser) {
            $checkUser->update([
                'status' => 1,
                'remember_token' => NULL
            ]);
            Auth::login($checkUser);
            return redirect()->intended(route('mobile.myaccount'));
        } else {

            $addUser = User::insert([
                'username' => $user->name,
                'password' => Hash::make(12345),
                'email' => $user->email,
                'status' => 1,
                'ip_address' => $request->ip(),
                'email_verified_at' => Carbon::now(),
            ]);
            Auth::login($addUser);
            return redirect()->intended(route('mobile.myaccount'));
        }
    }

    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderFacebookCallback(Request $request)
    {
        $user = Socialite::driver('facebook')->user();
        // $user = Socialite::driver('facebook')->stateless()->user();
        $checkUser = User::where('email', $user->email)->first();
        if ($checkUser) {
            $checkUser->update([
                'status' => 1,
                'remember_token' => NULL
            ]);
            Auth::login($checkUser);
            return redirect()->intended(route('mobile.myaccount'));
        } else {
            $addUser = User::insert([
                'username' => $user->name,
                'password' => Hash::make(12345),
                'email' => $user->email,
                'status' => 1,
                'ip_address' => $request->ip(),
                'email_verified_at' => Carbon::now(),
            ]);
            Auth::login($addUser);
            return redirect()->intended(route('mobile.myaccount'));
        }
    }
}
