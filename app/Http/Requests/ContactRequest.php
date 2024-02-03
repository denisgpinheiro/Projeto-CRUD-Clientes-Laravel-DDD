<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'nome' => 'required|string|min:5|regex:/^[^\d]+$/',
            'contato' => 'required|string|size:9',
            'email' => 'required|email|unique:contacts,email',
        ];
        
        if ($this->isMethod('put')) {
            unset($rules['email']);
        }

        return $rules;
    }
}
