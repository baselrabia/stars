<?php

namespace App\Http\Requests\Branches;

use App\Http\Requests\APIRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends APIRequest
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
            'person_name' => 'required|min:6',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'landline' => 'required|numeric|min:6',
            'lat' => ['regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lng' => ['regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],

        ];
    }
}
