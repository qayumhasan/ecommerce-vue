<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
use Auth;
class AdminResetPasswordController extends Controller
{


    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

     public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
      return Auth::guard('admin');
    }
    protected function broker()
    {
      return Password::broker('admins');
    }
    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.auth.forget_password')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
