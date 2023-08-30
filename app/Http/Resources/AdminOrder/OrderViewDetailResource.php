<?php

namespace App\Http\Resources\AdminOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderViewDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->only(
            'id',
            'order_id',
            'status',
            'total',
            'created_at'
        ) + [
            'customer' => optional($this->customer)->only('id', 'customer_no', 'name', 'sale_id', 'closer_sale_id'),
            'referral' => optional($this->customer)->sale->whenWhere('id', $this->only('referral_sale_id'))->first(['id', 'name', 'sale_code']),
            'close' => optional($this->customer)->sale->whenWhere('id', $this->only('close_sale_id'))->first(['id', 'name', 'sale_code']),
            'types' => optional( $this->order_images)->map(function($q) {
                return $q->only('ext', 'file', 'name', 'type' , 'media');
            }),
            'products' => $this->products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price
                ];
            }),
            'grand_total_product' => $this->products->sum('price'),
        ];
    }
}
