<?php

namespace App\Http\Requests\Ads;

use App\Http\Requests\APIRequest;

class AdStoreRequest extends APIRequest
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
            'title' => 'require|text|min=5',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'location' => 'require|exists:ads_location,location',
            'url'   => 'url'
        ];
    }
}
