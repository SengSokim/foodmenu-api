<?php

namespace App\Http\Resources\AdminOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderPriceHistoryListResource extends JsonResource
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
            'price', 
            'note', 
            'created_at'
        ) + [
            'order' => optional($this->order)->only('id', 'order_id'),
            'created_by' => optional($this->created_by)->only('id', 'name')
        ];
    }
}
