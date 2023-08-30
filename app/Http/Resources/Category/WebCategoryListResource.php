<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class WebCategoryListResource extends JsonResource
{
    public function toArray($request)
    {
        return $this->only(
            'id',
            'name',
            'sequence',
            'enable_status'
        ) + [
            'products' => $this->products->map(function ($product) {
               return [
                'id' => $product->id,
                'name' => $product->name,
                'image' => optional($product->media)->only('id', 'url'),
                'price' => $product->price,
                'code' => $product->code,
                'description' => $product->description,
               ];
            })
        ];
    }
}
