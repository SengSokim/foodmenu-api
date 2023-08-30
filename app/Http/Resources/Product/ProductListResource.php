<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResource extends JsonResource
{
    public function toArray($request)
    {
        return $this->only(
            'id',
            'name',
            'price',
            'description',
            'sequence',
            'enable_status',
            'code'
        ) + [
            'category' => optional($this->category)->only('id', 'name'),
            'media' => optional($this->media)->only('id','name','url'),
        ];
    }
}
