<?php

namespace App\Models;

use App\Http\Traits\WhenTrait;
use App\Http\Traits\ListingTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\CreaeteUpdateDeleteByTrait;
use App\Http\Resources\Category\CategoryListResource;
use App\Http\Resources\Category\WebCategoryListResource;

class Category extends Model
{
    use CreaeteUpdateDeleteByTrait,
        ListingTrait,
        WhenTrait,
        SoftDeletes;

    protected $guarded = ['created_at', 'updated_at'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeWhenSearch($q, $search)
    {
        if (!isset($search)) {
            return;
        }

        $q->where('name', 'LIKE', '%' . $search . '%');
    }

    public static function listAdmin($params)
    {
        $item = self::whenSearch($params['search'])
            ->sortLimitTotal($params);

        return [
            'list' => CategoryListResource::collection($item['list']),
            'total' => $item['total']
        ];
    }

    public static function createAdmin($request)
    {
        return self::create([
            'name' => $request->name,
            'sequence' => $request->sequence,
            'enable_status' => $request->enable_status
        ]);
    }

    public static function updateAdmin($id, $request)
    {
        $item = self::find($id);

        if (!$item) {
            abort(fail('Category not found'));
        }

        return $item->update($request->only('name', 'sequence', 'enable_status'));
    }

    public static function listWeb($params)
    {
        $item = self::with([
            'products' => function ($query) {
                $query->where('enable_status', 1)
                    ->orderBy('sequence', 'ASC');
            }
        ])
            ->has('products')
            ->whenSearch($params['search'])
            ->orderBy('sequence', 'ASC')
            ->where('enable_status', 1)
            ->get()
            ->map(function ($item) {
                return new WebCategoryListResource($item);
            });

        return $item;

    }
}
