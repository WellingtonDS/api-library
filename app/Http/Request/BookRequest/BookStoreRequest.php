<?php

namespace App\Http\Request\BookRequest;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
   
    public function rules()
    {
        return [
            'name' => 'required',
            'author' => 'required',
            'registration_number' => 'required|unique:books',
            'status' => 'required',
            'genre' => 'required',
        ];
    }
}