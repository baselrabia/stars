<?php

namespace App\Http\Requests\Provider;

use App\Http\Requests\APIRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends APIRequest
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
            'businessType_id' => 'required|numeric|exists:business_types,id',
            'company_fullname' => 'required|string|min:6',
            'company_name_ar' => 'required|string|min:6',
            'company_short_name' => 'required|string|min:6',
            'number_of_employees' => 'required|numeric',
            'certified' => 'in:true,false',
            'certification' => 'string|min:6',
            'commercial_register' => 'string|min:6',
            'portfolio' => 'min:6',
            'video' => 'mimes:mp4,mov,ogg,qt|max:20000',
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
