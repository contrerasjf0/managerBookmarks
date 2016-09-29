<?php

namespace App\Http\Requests\User\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'pleasures' => 'string|max:255',
            'change_password' => 'boolean',
            'password' => 'required_if:change_password,1|string|min:8|max:20|confirmed',
        ];
    }
}
