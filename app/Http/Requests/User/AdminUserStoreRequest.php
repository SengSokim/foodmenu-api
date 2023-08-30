<?php

namespace App\Http\Requests\User;

use App\Http\Requests\DefaultFormRequest;

class AdminUserStoreRequest extends DefaultFormRequest
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
		    'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
		    'password' => 'required|min:8',
            'role_id' => 'required|exists:roles,id'
	    ];
    }
}
