<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
          if (Auth::check()) {
              return redirect()->back();
         }else{
            return view('admin.auth.login');
         }
    }

    public function login(Request $request)
    {
          // Validate the form data
          $this->validate($request, [
              'email'   => 'required|email',
              'password' => 'required|min:6'
          ]);
                 // Attempt to log the user in
          if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
              $notification = array(
                  'messege' => 'Owao!!! Login',
                  'alert-type' => 'success'
              );
            return redirect()->intended(route('admin.dashboard'));
          }else{
            $notification = array(
                'messege' => 'Email/password Are Incorrect',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
          }

               // if unsuccessful, then redirect back to the login with the form data
          return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function passwordrequest()
    {
          return view('admin.auth.password_request');
    }
}
