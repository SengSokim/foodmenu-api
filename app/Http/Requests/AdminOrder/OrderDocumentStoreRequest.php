<?php

namespace App\Http\Requests\AdminOrder;

use App\Http\Requests\DefaultFormRequest;

class OrderDocumentStoreRequest extends DefaultFormRequest
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
            'type' => 'required',
            'ext' => 'required',
            'file' => 'required'
        ];
    }
}
