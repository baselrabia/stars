<?php

namespace App\Http\Requests\BusinessDeals;

use App\Http\Requests\APIRequest;

class BusinessDealStoreRequest extends APIRequest
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
            'name',
            'description' => 'required|min:10',
            'type' => 'required|in:tender,auction,project',
            'envelope_opening' =>'date_format:Y-m-d',
            'publication_date'=> 'date_format:Y-m-d',
            'begin' => 'required|date_format:Y-m-d',
            'end' => 'required|after:begin|date_format:Y-m-d',
            'time' => 'required|date_format:H:i',
            'video' => 'mimes:mp4,mov,ogg,qt|max:20000',
            'attachment' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',

        ];
    }
}
