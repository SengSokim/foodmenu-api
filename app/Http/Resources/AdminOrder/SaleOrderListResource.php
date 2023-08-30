<?php

namespace App\Http\Resources\AdminOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleOrderListResource extends JsonResource
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
            'type',
            'total',
        ) + [
            'customer' => optional($this->customer)->only('id', 'name'),
        ];
    }
}
