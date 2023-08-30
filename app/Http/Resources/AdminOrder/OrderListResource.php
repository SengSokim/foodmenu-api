<?php

namespace App\Http\Resources\AdminOrder;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderListResource extends JsonResource
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
            'code',
            'customer_name',
            'phone_number',
            'status',
            'total'
        ) + [
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
            'products' => $this->products->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'qty' => $item->pivot->qty,
                    'price' => $item->price,
                    'code' => $item->code,
                    'total' => $item->pivot->total
                ];
            })
        ];
    }
}
