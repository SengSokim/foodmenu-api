<?php

namespace App\Http\Requests\User\Profile;

use App\Http\Requests\DefaultFormRequest;

class AdminUserUpdateProfileRequest extends DefaultFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:110'
        ];
    }
}
