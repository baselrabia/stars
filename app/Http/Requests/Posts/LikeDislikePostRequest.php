<?php

namespace App\Http\Requests\Posts;

use App\Http\Requests\APIRequest;
use Illuminate\Foundation\Http\FormRequest;

class LikeDislikePostRequest extends APIRequest
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
            'post_id' => 'required|exists:posts,id',
        ];
    }
}
