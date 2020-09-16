<?php

namespace App\Http\Requests\Quotation;

use App\Http\Requests\APIRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuotationRequest extends APIRequest
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
            'type' => 'required|in:quotation,price,sample',
            'payment_term' => 'required|string|min:6',
            'delivery_term' => 'required|string|min:6',
            'delivery_date' => 'required|date_format:Y-m-d',
            'delivery_location' => 'required|numeric',
            'note' => 'string|min:6',
            'attachment' => 'string|min:6',
            'species' => 'required|in:internal,external',
            'providers_ids' => 'required|exists:providers,id',
            'products_ids' => 'required|exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer',
        ];
    }
}
