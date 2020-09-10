<?php

namespace App\Http\Requests\Events;

use App\Http\Requests\APIRequest;

class EventFilterRequest extends APIRequest
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
            'type' =>'required|in:exhibition,conference,workshop',
            'user_id' => 'required|exists:providers',
        ];
    }
}
