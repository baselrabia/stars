<?php

namespace App\Http\Requests\BusinessDeals;

use App\Http\Requests\APIRequest;

class BusinessDealFilterRequest extends APIRequest
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
            'type' =>'in:tender,auction,project',
            'user_id' => 'exists:providers',
        ];
    }
}
