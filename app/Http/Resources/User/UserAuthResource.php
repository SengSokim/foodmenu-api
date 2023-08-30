<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserAuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
	    return $this->only('id', 'name', 'email', 'gender', 'phone', 'address') + [
            'image' => $this->media->url ?? null,
            'role' => $this->role->name ?? null,
            'permissions' => json_decode($this->role->data)
        ];
    }
}
