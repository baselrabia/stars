<?php

namespace App\Http\Requests\Neededs;

use App\Http\Requests\APIRequest;
use Illuminate\Foundation\Http\FormRequest;

class NeededFilterRequest extends APIRequest
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
            'type' => 'in:distributers,brokers,agents',
            'user_id' => 'exists:providers',
        ];
    }
}
