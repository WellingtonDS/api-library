<?php

namespace App\Http\Request\LoanRequest;

use Illuminate\Foundation\Http\FormRequest;

class LoanUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
   
    public function rules()
    {
        return [
            'return_date' => 'required|date',
            'status' => 'required|in:Atrasado,Devolvido',
        ];
    }
}