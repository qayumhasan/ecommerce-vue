<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone_email' => 'required|unique:users,email|unique:users,phone',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return[
            'phone_email.unique'=>'The specified value already exists',
        ]   ;
    }
}
