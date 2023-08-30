<?php

namespace App\Models;

use App\Helpers\MediaHelper;
use App\Http\Traits\WhenTrait;
use App\Http\Traits\MediaTrait;
use App\Http\Traits\ListingTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\CreaeteUpdateDeleteByTrait;
use App\Http\Resources\Product\ProductListResource;

class Product extends Model
{
    use CreaeteUpdateDeleteByTrait,
        ListingTrait,
        WhenTrait,
        MediaTrait,
        SoftDeletes;

    protected $guarded = ['created_at', 'updated_at'];

    protected $casts = [
        'price' => 'float'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function scopeWhenSearch($q, $search)
    {
        if (!isset($search)) {
            return;
        }

        $q->where('code', 'LIKE', '%' . $search . '%')
        ->orWhere('name', 'LIKE', '%' . $search . '%')
        ->orWhere('price', 'LIKE', '%' . $search . '%');
    }

    public static function listAdmin($params)
    {
        $item = self::whenSearch($params['search'])
            ->whenWhere('category_id', request('category_id'))
            ->sortLimitTotal($params);

        return [
            'list' => ProductListResource::collection($item['list']),
            'total' => $item['total']
        ];
    }

    public static function createAdmin($request)
    {
        $data = $request->only('name', 'price', 'category_id', 'description', 'sequence', 'enable_status', 'code');
        if ($request->image) {
            $data['media_id'] = MediaHelper::storeImage($request->image);
        }

        return self::create($data);
    }

    public static function updateAdmin($id, $request)
    {
        $item = self::find($id);

        if (!$item) {
            abort(fail('Product not found'));
        }

        $data = $request->only('name', 'price', 'category_id', 'description', 'sequence', 'enable_status', 'code');
        if ($request->image) {
            $data['media_id'] = MediaHelper::storeImage($request->image);
        }

        return $item->update($data);
    }
}
