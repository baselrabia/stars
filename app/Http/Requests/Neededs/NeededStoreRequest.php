<?php

namespace App\Http\Requests\Neededs;

use App\Http\Requests\APIRequest;
use Illuminate\Foundation\Http\FormRequest;

class NeededStoreRequest extends APIRequest
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
            'person_name' => 'required|min:5',
            'type' => 'required|in:distributers,brokers,agents',
            'link' => 'required|url',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'summary' => 'required|min:10',
            'requirements' => 'required|min:10',
            'phone' => 'required|min:10|numeric',
            'email' => 'required|email',
            'landline' => 'required|min:10|numeric',
            'location' => 'required|min:5',
        ];
    }
}
