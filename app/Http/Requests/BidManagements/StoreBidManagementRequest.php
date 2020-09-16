<?php

namespace App\Http\Requests\BidManagements;

use App\Http\Requests\APIRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreBidManagementRequest extends APIRequest
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
            'type' => 'required|in:placed,received',
            'quotation_id' => 'required|exists:quotations,id',
            'status' => 'required|in:Viewed,Accepted,Rejected',
            'payment_term' => 'string|min:6',
            'delivery_term' => 'string|min:6',
            'delivery_date' => 'date_format:Y-m-d',
            'delivery_location' => 'numeric|gt:0',
            'note' => 'string|min:6',
            'quantities' => 'array',
            'quantities.*' => 'numeric|gt:0',
            'price_per_item' => 'array',
            'price_per_item.*' => 'numeric|gt:0',
        ];
    }
}
