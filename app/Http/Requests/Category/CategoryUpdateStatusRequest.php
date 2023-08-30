<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\DefaultFormRequest;

class CategoryUpdateStatusRequest extends DefaultFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'enable_status' => 'required|in:0,1'
        ];
    }
}
