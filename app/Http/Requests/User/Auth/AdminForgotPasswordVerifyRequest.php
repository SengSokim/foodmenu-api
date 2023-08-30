<?php

namespace App\Http\Requests\User\Auth;

use App\Http\Requests\DefaultFormRequest;

class AdminForgotPasswordVerifyRequest extends DefaultFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
	    return [
		    'email' => 'required',
	    ];
    }
}
