<?php

namespace App\Http\Resources\AdminOrder;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\OrderImage;

class SaleOrderShowResource extends JsonResource
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
            'type',
            'note',
            'total',
            'status',
            'customer_id'
        ) + [
            'media' => optional( $this->order_images)->map(function($q) {
                return $q->only('ext', 'name', 'type') + ['url' => $q->media->url];
            })->first()
        ];
    }
}
