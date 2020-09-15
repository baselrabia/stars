<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\APIRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends APIRequest
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
        return [
            'name' => 'required|min:6',
            'email' => 'unique:users,email,' . $user->id,
            'password' => 'required|min:6',
            'prefix' => 'in:Mr,Ms',
            'mobile' => 'required|numeric|min:10|unique:users,mobile,' . $user->id,
            'landline' => "numeric|min:6",
            'lat' => ['regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lng' => ['regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'type' => 'in:user,admin,provider',
        ];
    }
}
