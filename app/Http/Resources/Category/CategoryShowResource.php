<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryShowResource extends JsonResource
{
    public function toArray($request)
    {
        return $this->only(
            'id',
            'name',
            'sequence',
            'enable_status'
        );
    }
}
