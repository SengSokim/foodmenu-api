<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminUserListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
	    return $this->only('id', 'name', 'email', 'address', 'gender', 'is_active', 'phone') +
		    [
			    'media' => $this->media,
                'role' => optional($this->role)->only('id', 'name')
		    ];
    }
}
