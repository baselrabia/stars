<?php

namespace App\Http\Requests\Webinars;

use App\Http\Requests\APIRequest;
use Illuminate\Foundation\Http\FormRequest;

class WebinarFilterRequest extends APIRequest
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
            'type' => 'in:public,private',
            'country' => 'numeric',
            'date' => 'date_format:Y-m-d'
        ];
    }
}
