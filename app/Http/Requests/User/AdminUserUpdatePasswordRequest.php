<?php

namespace App\Http\Requests\User;

use App\Http\Requests\DefaultFormRequest;

class AdminUserUpdatePasswordRequest extends DefaultFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:8'
        ];
    }
}
