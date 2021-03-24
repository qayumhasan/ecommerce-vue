<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function reset(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        if (Hash::check($request->old_password, Auth::user('web')->password)) {
            if (!Hash::check($request->password, Auth::user('web')->password)) {
                User::where('id', Auth::user('web')->id)->update([
                    'password' => Hash::make($request->password),
                ]);
                session()->flash('successMsg', 'Successfully your password has been changed.');
                Auth::logout();
                return redirect()->route('login');
            } else {
                session()->flash('errorMsg', 'Your old password and new password is same.');
                return redirect()->back();
            }
        } else {
            session()->flash('errorMsg', 'Your old password does not match.');
            return redirect()->back();
        }
    }
}
