<?php

namespace App\Http\Requests\AdminOrder;

use App\Http\Requests\DefaultFormRequest;

class SaleOrderUpdateRequest extends DefaultFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'required',
            'total' => 'required',
        ];
    }
}
