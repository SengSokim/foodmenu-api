<?php

namespace App\Http\Requests\AdminOrder;

use App\Http\Requests\DefaultFormRequest;

class OrderDocumentUpdateRequest extends DefaultFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'id' => 'required',
            'name' => 'required',
            'type' => 'required'
        ];

        if($this->file) {
            $rules['ext'] = 'required';
        }

        return $rules;
    }
}
