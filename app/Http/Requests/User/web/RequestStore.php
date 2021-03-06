<?php

namespace App\Http\Requests\User\web;

use Illuminate\Foundation\Http\FormRequest;

class RequestStore extends FormRequest
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
            'name' => 'required|min:3|max:30',
            'last_name' => 'required|min:3|max:60',
            'user_name' => 'required|min:3|max:20',
            'email' => 'required|email|max:80|unique:users,email',
            'password' => 'required|confirmed|min:6|max:10'
        ];
    }
}
