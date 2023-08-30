<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\DefaultFormRequest;

class ProductStoreRequest extends DefaultFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required|unique:products,code,NULL,id,deleted_at,NULL',
            'category_id' => 'required',
            'price' => 'required|numeric'
        ];
    }

    public function messages()
	{
		return [
			'code.unique' => 'Product Code already exists'
		];
	}
}
