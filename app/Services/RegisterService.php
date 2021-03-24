<?php
namespace App\Services;
use App\User;
class RegisterService{

    public function userRegister($request)
    {
        $user = new User();

        $fieldType = filter_var($request->phone_email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
 
        if($fieldType == 'email'){
             $user->email = $request->phone_email;     
        }else{
             $user->phone = $request->phone_email;     
        }
        $user->password = Hash::make($request->password);
        $user->ip_address = request()->ip();
        $user->save();
        return $user;
    }

}