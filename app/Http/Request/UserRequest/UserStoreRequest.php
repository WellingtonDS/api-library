<?php

namespace App\Http\Request\UserRequest;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
   
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'registration_number' => 'required|unique:users',
        ];
    }
}