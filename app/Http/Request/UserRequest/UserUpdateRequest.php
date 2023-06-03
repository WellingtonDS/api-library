<?php

namespace App\Http\Request\UserRequest;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
   
    public function rules(User $user)
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'registration_number' => 'required|unique:users,registration_number,' . $user->id,
        ];
    }
}