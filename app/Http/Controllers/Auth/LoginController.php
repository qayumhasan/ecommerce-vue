<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('frontend.accounts.account');
    }

    public function login(Request $request)
    {
 
        return $request;

        $this->validate($request, [
            'login_email' => 'required',
            'login_password' => 'required'
        ],
        [
            'login_email.required'=>'The Email field is required',
            'login_password.required'=>'The Password field is required',
        ]
    );

        $user = User::where('email', $request->login_email)->first();
        if ($user) {
            if ($user->status == 1) {
                $checkInformation = Auth::guard('web')->attempt(['email' => $request->login_email, 'password' => $request->login_password]);
                if ($checkInformation) {
                    return redirect()->intended(route('customar.account.page'));
                } else {
                    session()->flash('errorMsg', 'Email ID or Password not matched!');
                    return redirect()->back();
                }
            } else {
                session()->flash('errorMsg', 'You Email ID Is Not Verified!');
                return redirect()->back();
            }
        } else {
            session()->flash('errorMsg', 'Email ID or Password not matched!');
            return redirect()->back();
        }
    }



    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderGoogleCallback(Request $request)
    {
        //$user = Socialite::driver('google')->user();
        $user = Socialite::driver('google')->stateless()->user();
        $checkUser = User::where('email', $user->email)->first();
        if ($checkUser) {
            $checkUser->update([
                'status' => 1,
                'remember_token' => NULL
            ]);
            Auth::login($checkUser);
            return redirect()->intended(route('customer.account'));
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
            return redirect()->intended(route('customer.account'));
        }
    }
    
    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderFacebookCallback(Request $request)
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $checkUser = User::where('email', $user->email)->first();
        if ($checkUser) {
            $checkUser->update([
                'status' => 1,
                'remember_token' => NULL
            ]);
            Auth::login($checkUser);
            return redirect()->intended(route('customer.account'));
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
            return redirect()->intended(route('customer.account'));
        }
    }
}
