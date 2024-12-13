<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ];

        if ($this->isMethod('POST')) {
            $rules['password'] = 'required|string|min:6';
        } elseif ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['email'] = 'required|email|unique:users,email,' . $this->route('user');
            $rules['password'] = 'sometimes|string|min:6';
        }

        return $rules;
    }
} 