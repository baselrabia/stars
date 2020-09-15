<?php

namespace App\Http\Requests\Provider;

use App\Http\Requests\APIRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProviderRequest extends APIRequest
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
        $user = Auth::User();
        $provider = $user->provider;
        return [
            'name' => 'required|min:6',
            'email' => 'unique:users,email,' . $user->id,
            'password' => 'required|min:6',
            'prefix' => 'in:Mr,Ms',
            'mobile' => 'required|numeric|min:10|unique:users,mobile,' . $user->id,
            'landline' => "numeric|min:6",
            'lat' => ['regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lng' => ['regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],

            'businessType_id' => 'required|numeric|exists:business_types,id',
            'company_fullname'=> 'string|min:6',
            'company_name_ar'=> 'string|min:6',
            'company_short_name'=> 'string|min:6',
            'number_of_employees'=> 'required|numeric',
            'certified'=> 'in:true,false',
            'certification'=> 'string|min:6',
            'commercial_register' => 'string|min:6',
            'portfolio'=> 'min:6',
            'video' => 'mimes:mp4,mov,ogg,qt|max:20000',
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
