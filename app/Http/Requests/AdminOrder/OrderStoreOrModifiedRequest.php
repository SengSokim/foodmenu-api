<?php

namespace App\Http\Requests\AdminOrder;

use App\Http\Requests\DefaultFormRequest;

class OrderStoreOrModifiedRequest extends DefaultFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'product_ids' => 'required|array'
        ];
    }
}
