<?php

namespace App\Http\Requests\\BookMark\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterController extends FormRequest
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
            'name' => 'string|max:50|unique:book_marks,name',
            'folder_id' => 'integer',
            'url' => 'required|url',
            'note' => 'string|max:255',
        ];
    }
}
