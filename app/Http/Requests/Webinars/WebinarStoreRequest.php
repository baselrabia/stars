<?php

namespace App\Http\Requests\Webinars;

use App\Http\Requests\APIRequest;
use Illuminate\Foundation\Http\FormRequest;

class WebinarStoreRequest extends APIRequest
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
            'description' => 'required|min:10',
            'summary' => 'required|min:10',
            'host' => 'required|min:5',
            'type' => 'required|in:public,private',
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i',
            'link' => 'required|url',
            'country' => 'required|numeric',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
