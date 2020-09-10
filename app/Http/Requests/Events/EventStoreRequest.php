<?php

namespace App\Http\Requests\Events;

use App\Http\Requests\APIRequest;

class EventStoreRequest extends APIRequest
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
            'name' => 'required|min:5' ,
            'description' => 'required|min:10',
            'type' => 'required|in:exhibition,conference,workshop',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i',
            'lat' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lng' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
           // 'Video' => 'required|url',
            'link' => 'required|url',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];


    }


}
