<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Mail\UserVerificationMail;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\SmsModel;
use App\Logo;
use DB;
use App\VerificationOption;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\URL;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function register(Request $request)
    {
        

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|numeric|unique:users,phone|regex:/(01)[0-9]{9}/',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $verify_code = rand(100000, 999999);
        $user = User::create([
            'username' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'remember_token' => md5($request->email),
            'verification_code' => $verify_code,
            'company_name' => NULL,
            'ip_address' => $request->ip()
        ]);

        $verificationWith =  VerificationOption::first();
        if ($verificationWith->verify_with == 0) {
            $frontLogo = Logo::select(['front_logo'])->first();
            $siteSettings = DB::table('sitesetting')
                            ->select(['company_name', 'address', 'facebook', 'instagram', 'twitter'])
                            ->first();
            Mail::to($user->email)
            ->send(new UserVerificationMail($user->username, $user->remember_token, $frontLogo, $siteSettings));

            session()->flash('successMsg', 'Registration Successful, Please Check your Mail And Verify Your Account.');

            return redirect()->route('user.auth.registration.success', $user->email);

        } elseif ($verificationWith->verify_with == 1) {

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
                CURLOPT_URL => 'http://gosms.xyz/api/v1/sendSms',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData,
                CURLOPT_FOLLOWLOCATION => true

            ));

            $output = curl_exec($ch);
            return redirect()->route('sms.verification.form', $user->remember_token);
        }
    }

    public function smsVerificationform($token)
    {
        $checkRememberToken = User::where('remember_token', $token)->firstOrFail();
        $remember_token = $checkRememberToken->remember_token;
        abort_if(!$checkRememberToken, 403);
        return view('frontend.accounts.user_sms_verificatation', compact('checkRememberToken'));
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
            session()->flash('successMsg', 'Successfully your email is verified.');
            return redirect()->route('login');
        }
    }

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
        $user = User::where('email', $email)->first();
        return view('frontend.accounts.registration_success_page', compact('user'));
    }
}
