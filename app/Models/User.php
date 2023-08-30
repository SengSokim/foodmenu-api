<?php

namespace App\Models;

use App\Helpers\MediaHelper;
use App\Http\Resources\User\AdminUserListResource;
use App\Http\Traits\CreaeteUpdateDeleteByTrait;
use App\Http\Traits\ActiveTrait;
use App\Http\Traits\MediaTrait;
use App\Http\Traits\ListingTrait;
use App\Http\Traits\WhenTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Resources\User\UserAuthResource;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use CreaeteUpdateDeleteByTrait,
        ListingTrait,
        MediaTrait,
        ActiveTrait,
        WhenTrait,
        SoftDeletes,
        HasApiTokens;

    protected $guarded = ['created_at', 'updated_at'];

    protected $hidden = [
        'password'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class)->withTrashed();
    }

    public function scopeWhenSearch($q, $search)
    {
        if(!$search) {
            return;
        }

        $q->where('users.name', 'LIKE', '%' . $search . '%')
        ->orWhere('users.phone', 'LIKE', '%' . $search . '%')
        ->orWhere('users.email', 'LIKE', '%' . $search . '%');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

	public static function getToken($user = null)
	{
		$user = $user ?? auth('web')->user();

		return [
			'access_token' => $user->createToken($user->email)->plainTextToken,
			'user' => new UserAuthResource($user)
		];
	}

	public static function login($request)
	{
		if (auth('web')->attempt(['email' => $request['email'],
			'password' => $request['password'],
			'is_active' => true,
			'deleted_at' => null
		])) {
			return self::getToken();
		}
		return false;
	}

    public static function updateProfile($request)
    {
        $item = auth('users')->user();

        $data = $request->only('name', 'gender', 'address');

        if($request->image) {
            $data['media_id'] = MediaHelper::storeImage($request->image);
        }

        $item->update($data);

        $item->fresh('media');

        return new UserAuthResource($item);
    }

    public static function updatePassword($request)
    {
        $item = auth('users')->user();

        if(Hash::check($request->old_password, $item->password)) {
            return $item->update([
                'password' => $request->password
            ]);
        }

        return false;
    }

	public static function createAdmin($request)
	{
		if($request->image) {
			$request->merge(['media_id' => MediaHelper::storeImage($request->image)]);
		}

		$request->merge(['password' => $request->password]);

		return self::create($request->only('name', 'email', 'password', 'gender', 'phone', 'address', 'is_active', 'media_id', 'role_id'));
	}

	public static function listAdmin($params)
	{
		$data = self::select('users.*')
                    ->with('media')
                    ->join('roles', 'roles.id', '=', 'users.role_id', 'left')
                    ->whenSearch($params['search'])
                    ->whenWhere('role_id', request('role_id'))
                    ->whenWhere('gender', request('gender'))
                    ->whenWhere('is_active', request('is_active'))
                    ->sortLimitTotal($params);

		return [
			'list' => AdminUserListResource::collection($data['list']),
			'total' => $data['total']
		];
	}

	public static function updateAdmin($request)
	{
		$user = self::find($request->id);

		if(!$user) {
			abort(fail('Role not found!'));
		}

		$data = $request->only('name', 'email', 'gender', 'phone', 'address', 'is_active', 'role_id');

		if($request->image) {
			$data['media_id'] = MediaHelper::storeImage($request->image);
		}

		return $user->update($data);
	}
}
