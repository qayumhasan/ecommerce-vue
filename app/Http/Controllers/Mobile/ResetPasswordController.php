<?php

namespace App\Http\Controllers\Mobile;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function resetPasswordFrom()
    {
        return view('mobile.accounts.reset_password_form');
    }

    public function resetPassword(Request $request)
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
                return redirect()->route('mobile.login.form');
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
