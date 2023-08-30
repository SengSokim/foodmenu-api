<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
	    return $this->only('id', 'name', 'address', 'email', 'is_active', 'gender', 'phone', 'role_id', 'password') +
		    [
			    'media' => $this->media,
		    ];
    }
}
