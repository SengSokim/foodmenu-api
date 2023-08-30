<?php

namespace App\Models;

use App\Http\Traits\WhenTrait;
use App\Http\Traits\MediaTrait;
use App\Http\Traits\ListingTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\CreaeteUpdateDeleteByTrait;
use App\Http\Resources\Customer\CustomerListResource;

class Customer extends Model
{
    use CreaeteUpdateDeleteByTrait,
        ListingTrait,
        MediaTrait,
        WhenTrait,
        SoftDeletes;

    protected $guarded = ['created_at', 'updated_at'];

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function scopeWhenSearch($q, $search)
    {
        if(!$search) {
            return;
        }

        $q->where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('phone', 'LIKE', '%'.$search.'%')
            ->orWhere('address', 'LIKE', '%'.$search.'%');
    }

    public static function listAdmin($params)
    {
        $item = self::with('orders')
                    ->whenSearch($params['search'])
                    ->whenWhere('gender', request('gender'))
                    ->sortLimitTotal($params);

        return [
            'list' => CustomerListResource::collection($item['list']),
            'total' => $item['total']
        ];
    }
}
