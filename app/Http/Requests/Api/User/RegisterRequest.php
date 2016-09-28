<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|alpha|min:3|max:50',
            'last_name' => 'required|string|alpha|min:3|max:80',
            'user_name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:users,email',
            'pleasures' => 'string|max:255',
            'password' => 'required|string|min:8|max:20',
        ];
    }
}
