<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\CreaeteUpdateDeleteByTrait;
use App\Http\Traits\ListingTrait;
use App\Http\Traits\WhenTrait;
use App\Http\Resources\Role\RoleListResource;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use CreaeteUpdateDeleteByTrait,
        ListingTrait,
        WhenTrait,
        SoftDeletes;

    protected $guarded = ['created_at', 'updated_at'];

    public function users() 
    {
        return $this->hasMany(User::class);
    }

    public function scopeWhenSearch($q, $search)
    {
        if(!$search) {
            return;
        }

        $q->where('name', 'LIKE', '%' . $search . '%');
    }

    public static function listAdmin($params) 
    {
        $item = self::whenSearch($params['search'])
                        ->sortLimitTotal($params);

        return [
            'list' => RoleListResource::collection($item['list']),
            'total' => $item['total']
        ];
    }

    public static function createAdmin($request) 
    {
        return self::create([
            'name' => $request->name,
            'data' => json_encode($request->data)
        ]);
    }

    public static function updateAdmin($request, $id) 
    {
        $item = self::find($id);

        if(!$item) {
            abort(fail('Role not found!'));
        }

        return $item->update([
            'name' => $request->name,
            'data' => json_encode($request->data)
        ]);
    }
}
