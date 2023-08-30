<?php

namespace App\Http\Requests\User;

use App\Http\Requests\DefaultFormRequest;

class AdminUserUpdateRequest extends DefaultFormRequest
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
		    'email' => 'required|email|unique:users,email,'.$this->id.',id,deleted_at,NULL',
            'role_id' => 'required|exists:roles,id'
        ];
    }
}
