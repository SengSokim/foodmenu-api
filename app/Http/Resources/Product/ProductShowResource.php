<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductShowResource extends JsonResource
{
    public function toArray($request)
    {
        return $this->only(
            'id',
            'name',
            'price',
            'category_id',
            'description',
            'code'
        ) + [
            'media' => optional($this->media)->only('id','name','url')
        ];
    }
}
