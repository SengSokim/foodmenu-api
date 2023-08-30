<?php

namespace App\Http\Requests\User\Profile;


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
            'old_password' => 'required',
            'password' => 'required|min:8',
        ];
    }
}
