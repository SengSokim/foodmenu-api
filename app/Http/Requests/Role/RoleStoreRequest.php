<?php

namespace App\Http\Requests\Role;

use App\Http\Requests\DefaultFormRequest;

class RoleStoreRequest extends DefaultFormRequest
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
            'data' => 'required|array'
        ];
    }
}
