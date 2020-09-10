<?php

namespace App\Http\Requests\Brochures;

use App\Http\Requests\APIRequest;

class BrochureStoreRequest extends APIRequest
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
            'name' => 'required|min:5',
            'attachment' => 'string',
            'day' => 'required|numeric ',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
