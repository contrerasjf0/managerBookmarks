<?php

namespace App\Http\Requests\BookMark\api;

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
            'name' => 'string|min:3|max:50',
            'url' => 'required|url',
            'note' => 'string|max:255',
            'tags' => 'array'
        ];
    }

    protected function getValidatorInstance(){

        $validator = parent::getValidatorInstance();
        
        $validator->sometimes('folder_id', 'integer|exists:folders,id', function($input)
        {
            return $input->folder_id !== 0;
        });

        return $validator;
    }
}
