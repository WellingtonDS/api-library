<?php

namespace App\Http\Request\LoanRequest;

use Illuminate\Foundation\Http\FormRequest;

class LoanStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
   
    public function rules()
    {
        return [
            'user_id' => 'required',
            'book_id' => 'required',
            'return_date' => 'required|date',
        ];
    }
}