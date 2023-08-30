<?php

namespace App\Http\Requests\User\Auth;

use App\Http\Requests\DefaultFormRequest;

class AdminLoginRequest extends DefaultFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
	    return [
		    'email' => 'required|email|max:255',
		    'password' => 'required',
	    ];
    }
}
